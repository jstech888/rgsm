<?php
/**
 * Performs tax calculations and loads tax rates.
 *
 * @class 		WC_Tax
 * @version		2.2.0
 * @package		WooCommerce/Classes
 * @category	Class
 * @author 		WooThemes
 */
class WC_Tax {

	public static $precision;
	public static $round_at_subtotal;

	/**
	 * Load options
	 *
	 * @access public
	 */
	public static function init() {
		self::$precision         = WC_ROUNDING_PRECISION;
		self::$round_at_subtotal = 'yes' === get_option( 'woocommerce_tax_round_at_subtotal' );
	}

	/**
	 * Calculate tax for a line
	 * @param  float  $price              Price to calc tax on
	 * @param  array  $rates              Rates to apply
	 * @param  boolean $price_includes_tax Whether the passed price has taxes included
	 * @param  boolean $suppress_rounding  Whether to suppress any rounding from taking place
	 * @return array                      Array of rates + prices after tax
	 */
	public static function calc_tax( $price, $rates, $price_includes_tax = false, $suppress_rounding = false ) {
		// Work in pence to X precision
		$price = self::precision( $price );

		if ( $price_includes_tax )
			$taxes = self::calc_inclusive_tax( $price, $rates );
		else
			$taxes = self::calc_exclusive_tax( $price, $rates );

		// Round to precision
		if ( ! self::$round_at_subtotal && ! $suppress_rounding ) {
			$taxes = array_map( 'round', $taxes ); // Round to precision
		}

		// Remove precision
		$price     = self::remove_precision( $price );
		$taxes     = array_map( array( __CLASS__, 'remove_precision' ), $taxes );

		return apply_filters( 'woocommerce_calc_tax', $taxes, $price, $rates, $price_includes_tax, $suppress_rounding );
	}

	/**
	 * Calculate the shipping tax using a passed array of rates.
	 *
	 * @param   float		Price
	 * @param	array		Taxation Rate
	 * @return  array
	 */
	public static function calc_shipping_tax( $price, $rates ) {
		return self::calc_exclusive_tax( $price, $rates );
	}

	/**
	 * Multiply cost by pow precision
	 * @param  float $price
	 * @return float
	 */
	private static function precision( $price ) {
		return $price * ( pow( 10, self::$precision ) );
	}

	/**
	 * Divide cost by pow precision
	 * @param  float $price
	 * @return float
	 */
	private static function remove_precision( $price ) {
		return $price / ( pow( 10, self::$precision ) );
	}

	/**
	 * Round to precision.
	 *
	 * Filter example: to return rounding to .5 cents you'd use:
	 *
	 * public function euro_5cent_rounding( $in ) {
	 *      return round( $in / 5, 2 ) * 5;
	 * }
	 * add_filter( 'woocommerce_tax_round', 'euro_5cent_rounding' );
	 */
	public static function round( $in ) {
		return apply_filters( 'woocommerce_tax_round', round( $in, self::$precision ), $in );
	}

	/**
	 * Calc tax from inclusive price
	 *
	 * @param  float $price
	 * @param  array $rates
	 * @return array
	 */
	private static function calc_inclusive_tax( $price, $rates ) {
		$taxes = array();

		$regular_tax_rates = $compound_tax_rates = 0;

		foreach ( $rates as $key => $rate )
			if ( $rate['compound'] == 'yes' )
				$compound_tax_rates = $compound_tax_rates + $rate['rate'];
			else
				$regular_tax_rates  = $regular_tax_rates + $rate['rate'];

		$regular_tax_rate 	= 1 + ( $regular_tax_rates / 100 );
		$compound_tax_rate 	= 1 + ( $compound_tax_rates / 100 );
		$non_compound_price = $price / $compound_tax_rate;

		foreach ( $rates as $key => $rate ) {
			if ( ! isset( $taxes[ $key ] ) )
				$taxes[ $key ] = 0;

			$the_rate      = $rate['rate'] / 100;

			if ( $rate['compound'] == 'yes' ) {
				$the_price = $price;
				$the_rate  = $the_rate / $compound_tax_rate;
			} else {
				$the_price = $non_compound_price;
				$the_rate  = $the_rate / $regular_tax_rate;
			}

			$net_price       = $price - ( $the_rate * $the_price );
			$tax_amount      = $price - $net_price;
			$taxes[ $key ]   += apply_filters( 'woocommerce_price_inc_tax_amount', $tax_amount, $key, $rate, $price );
		}

		return $taxes;
	}

	/**
	 * Calc tax from exclusive price
	 *
	 * @param  float $price
	 * @param  array $rates
	 * @return array
	 */
	private static function calc_exclusive_tax( $price, $rates ) {
		$taxes = array();

		// Multiple taxes
		foreach ( $rates as $key => $rate ) {

			if ( $rate['compound'] == 'yes' )
				continue;

			$tax_amount = $price * ( $rate['rate'] / 100 );

			// ADVANCED: Allow third parties to modify this rate
			$tax_amount = apply_filters( 'woocommerce_price_ex_tax_amount', $tax_amount, $key, $rate, $price );

			// Add rate
			if ( ! isset( $taxes[ $key ] ) )
				$taxes[ $key ] = $tax_amount;
			else
				$taxes[ $key ] += $tax_amount;
		}

		$pre_compound_total = array_sum( $taxes );

		// Compound taxes
		if ( $rates ) {
			foreach ( $rates as $key => $rate ) {

				if ( $rate['compound'] == 'no' )
					continue;

				$the_price_inc_tax = $price + ( $pre_compound_total );

				$tax_amount = $the_price_inc_tax * ( $rate['rate'] / 100 );

				// ADVANCED: Allow third parties to modify this rate
				$tax_amount = apply_filters( 'woocommerce_price_ex_tax_amount', $tax_amount, $key, $rate, $price, $the_price_inc_tax, $pre_compound_total );

				// Add rate
				if ( ! isset( $taxes[ $key ] ) )
					$taxes[ $key ] = $tax_amount;
				else
					$taxes[ $key ] += $tax_amount;
			}
		}

		return $taxes;
	}

	/**
	 * Searches for all matching country/state/postcode tax rates.
	 *
	 * @access public
	 * @param array $args
	 * @return array
	 */
	public static function find_rates( $args = array() ) {
		global $wpdb;

		$defaults = array(
			'country' 	=> '',
			'state' 	=> '',
			'city' 		=> '',
			'postcode' 	=> '',
			'tax_class'	=> ''
		);

		$args = wp_parse_args( $args, $defaults );

		extract( $args, EXTR_SKIP );

		if ( ! $country ) {
			return array();
		}

		// Handle postcodes
		$valid_postcodes 	= array( '*', strtoupper( wc_clean( $postcode ) ) );

		// Work out possible valid wildcard postcodes
		$postcode_length	= strlen( $postcode );
		$wildcard_postcode	= strtoupper( wc_clean( $postcode ) );

		for ( $i = 0; $i < $postcode_length; $i ++ ) {

			$wildcard_postcode = substr( $wildcard_postcode, 0, -1 );

			$valid_postcodes[] = $wildcard_postcode . '*';
		}

		// Build transient key and try to retrieve them from cache
		$rates_transient_key = 'wc_tax_rates_' . md5( sprintf( '%s+%s+%s+%s+%s', $country, $state, $city, implode( ',', $valid_postcodes), $tax_class ) );
		$matched_tax_rates = get_transient( $rates_transient_key );

		if ( false === $matched_tax_rates ) {

			// Run the query
			$found_rates = $wpdb->get_results( $wpdb->prepare( "
				SELECT tax_rates.*
				FROM {$wpdb->prefix}woocommerce_tax_rates as tax_rates
				LEFT OUTER JOIN {$wpdb->prefix}woocommerce_tax_rate_locations as locations ON tax_rates.tax_rate_id = locations.tax_rate_id
				LEFT OUTER JOIN {$wpdb->prefix}woocommerce_tax_rate_locations as locations2 ON tax_rates.tax_rate_id = locations2.tax_rate_id
				WHERE tax_rate_country IN ( %s, '' )
				AND tax_rate_state IN ( %s, '' )
				AND tax_rate_class = %s
				AND (
					locations.location_type IS NULL
					OR (
						locations.location_type = 'postcode'
						AND locations.location_code IN ('" . implode( "','", $valid_postcodes ) . "')
						AND (
							locations2.location_type = 'city' AND locations2.location_code = %s
							OR 0 = (
								SELECT COUNT(*) FROM {$wpdb->prefix}woocommerce_tax_rate_locations as sublocations
								WHERE sublocations.location_type = 'city'
								AND sublocations.tax_rate_id = tax_rates.tax_rate_id
							)
						)
					)
					OR (
						locations.location_type = 'city'
						AND locations.location_code = %s
						AND 0 = (
								SELECT COUNT(*) FROM {$wpdb->prefix}woocommerce_tax_rate_locations as sublocations
								WHERE sublocations.location_type = 'postcode'
								AND sublocations.tax_rate_id = tax_rates.tax_rate_id
							)
					)
				)
				GROUP BY tax_rate_id
				ORDER BY tax_rate_priority, tax_rate_order
				",
				strtoupper( $country ),
				strtoupper( $state ),
				sanitize_title( $tax_class ),
				strtoupper( $city ),
				strtoupper( $city )
			) );

			$matched_tax_rates = array();
			$found_priority    = array();

			foreach ( $found_rates as $found_rate ) {
				if ( in_array( $found_rate->tax_rate_priority, $found_priority ) ) {
					continue;
				}

				$matched_tax_rates[ $found_rate->tax_rate_id ] = array(
					'rate'     => $found_rate->tax_rate,
					'label'    => $found_rate->tax_rate_name,
					'shipping' => $found_rate->tax_rate_shipping ? 'yes' : 'no',
					'compound' => $found_rate->tax_rate_compound ? 'yes' : 'no'
				);

				$found_priority[] = $found_rate->tax_rate_priority;
			}

			$matched_tax_rates = apply_filters( 'woocommerce_matched_tax_rates', $matched_tax_rates, $country, $state, $postcode, $city, $tax_class );

			set_transient( $rates_transient_key, $matched_tax_rates, DAY_IN_SECONDS );
		}

		return apply_filters( 'woocommerce_find_rates', $matched_tax_rates, $args );
	}

	/**
	 * Searches for all matching country/state/postcode tax rates.
	 *
	 * @param array $args
	 * @return array
	 */
	public static function find_shipping_rates( $args = array() ) {
		$rates          = self::find_rates( $args );
		$shipping_rates = array();

		foreach ( $rates as $key => $rate ) {
			if ( 'yes' === $rate['shipping'] ) {
				$shipping_rates[ $key ] = $rate;
			}
		}

		return $shipping_rates;
	}

	/**
	 * Get the customer tax location based on their status and the current page
	 *
	 * Used by get_rates(), get_shipping_rates()
	 *
	 * @param  $tax_class string Optional, passed to the filter for advanced tax setups.
	 * @return array
	 */
	public static function get_tax_location( $tax_class = '' ) {
		$location = array();

		if ( defined( 'WOOCOMMERCE_CHECKOUT' ) || ( ! empty( WC()->customer ) && WC()->customer->has_calculated_shipping() ) ) {
			$location = WC()->customer->get_taxable_address();
		} elseif ( 'yes' === get_option( 'woocommerce_prices_include_tax' ) || get_option( 'woocommerce_default_customer_address' ) == 'base' ) {
			$location = array(
				WC()->countries->get_base_country(),
				WC()->countries->get_base_state(),
				WC()->countries->get_base_postcode(),
				WC()->countries->get_base_city()
			);
		}

		return apply_filters( 'woocommerce_get_tax_location', $location, $tax_class );
	}

	/**
	 * Get's an array of matching rates for a tax class.
	 * @param string $tax_class
	 * @return  array
	 */
	public static function get_rates( $tax_class = '' ) {
		$tax_class         = sanitize_title( $tax_class );
		$location          = self::get_tax_location( $tax_class );
		$matched_tax_rates = array();

		if ( sizeof( $location ) === 4 ) {
			list( $country, $state, $postcode, $city ) = $location;

			$matched_tax_rates = self::find_rates( array(
				'country' 	=> $country,
				'state' 	=> $state,
				'postcode' 	=> $postcode,
				'city' 		=> $city,
				'tax_class' => $tax_class
			) );
		}

		return apply_filters( 'woocommerce_matched_rates', $matched_tax_rates, $tax_class );
	}

	/**
	 * Get's an array of matching rates for the shop's base country.
	 *
	 * @param   string	Tax Class
	 * @return  array
	 */
	public static function get_shop_base_rate( $tax_class = '' ) {
		return self::find_rates( array(
			'country' 	=> WC()->countries->get_base_country(),
			'state' 	=> WC()->countries->get_base_state(),
			'postcode' 	=> WC()->countries->get_base_postcode(),
			'city' 		=> WC()->countries->get_base_city(),
			'tax_class' => $tax_class
		) );
	}

	/**
	 * Gets an array of matching shipping tax rates for a given class.
	 *
	 * @param   string	Tax Class
	 * @return  mixed
	 */
	public static function get_shipping_tax_rates( $tax_class = null ) {
		// See if we have an explicitly set shipping tax class
		if ( $shipping_tax_class = get_option( 'woocommerce_shipping_tax_class' ) ) {
			$tax_class = $shipping_tax_class == 'standard' ? '' : $shipping_tax_class;
		}

		$location          = self::get_tax_location( $tax_class );
		$matched_tax_rates = array();

		if ( sizeof( $location ) === 4 ) {
			list( $country, $state, $postcode, $city ) = $location;

			if ( ! is_null( $tax_class ) ) {
				// This will be per item shipping
				$matched_tax_rates = self::find_shipping_rates( array(
					'country' 	=> $country,
					'state' 	=> $state,
					'postcode' 	=> $postcode,
					'city' 		=> $city,
					'tax_class' => $tax_class
				) );

			} else {

				// This will be per order shipping - loop through the order and find the highest tax class rate
				$cart_tax_classes = WC()->cart->get_cart_item_tax_classes();

				// If multiple classes are found, use highest. Don't bother with standard rate, we can get that later.
				if ( sizeof( $cart_tax_classes ) > 1 && ! in_array( '', $cart_tax_classes ) ) {
					$tax_classes = self::get_tax_classes();

					foreach ( $tax_classes as $tax_class ) {
						if ( in_array( $tax_class, $cart_tax_classes ) ) {
							$matched_tax_rates = self::find_shipping_rates( array(
								'country' 	=> $country,
								'state' 	=> $state,
								'postcode' 	=> $postcode,
								'city' 		=> $city,
								'tax_class' => $tax_class
							) );
							break;
						}
					}

				// If a single tax class is found, use it
				} elseif ( sizeof( $cart_tax_classes ) == 1 ) {
					$matched_tax_rates = self::find_shipping_rates( array(
						'country' 	=> $country,
						'state' 	=> $state,
						'postcode' 	=> $postcode,
						'city' 		=> $city,
						'tax_class' => $cart_tax_classes[0]
					) );
				}
			}

			// Get standard rate if no taxes were found
			if ( ! sizeof( $matched_tax_rates ) ) {
				$matched_tax_rates = self::find_shipping_rates( array(
					'country' 	=> $country,
					'state' 	=> $state,
					'postcode' 	=> $postcode,
					'city' 		=> $city
				) );
			}
		}

		return $matched_tax_rates;
	}

	/**
	 * Return true/false depending on if a rate is a compound rate.
	 *
	 * @param   int		key
	 * @return  bool
	 */
	public static function is_compound( $key ) {
		global $wpdb;
		return $wpdb->get_var( $wpdb->prepare( "SELECT tax_rate_compound FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_id = %s", $key ) ) ? true : false;
	}

	/**
	 * Return a given rates label.
	 *
	 * @param mixed $key_or_rate Tax rate ID, or the db row itself in object format
	 * @return  string
	 */
	public static function get_rate_label( $key_or_rate ) {
		global $wpdb;

		if ( is_object( $key_or_rate ) ) {
			$key       = $key_or_rate->tax_rate_id;
			$rate_name = $key_or_rate->tax_rate_name;
		} else {
			$key       = $key_or_rate;
			$rate_name = $wpdb->get_var( $wpdb->prepare( "SELECT tax_rate_name FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_id = %s", $key ) );
		}

		if ( ! $rate_name ) {
			$rate_name = WC()->countries->tax_or_vat();
		}

		return apply_filters( 'woocommerce_rate_label', $rate_name, $key );
	}

	/**
	 * Return a given rates percent.
	 *
	 * @param mixed $key_or_rate Tax rate ID, or the db row itself in object format
	 * @return  string
	 */
	public static function get_rate_percent( $key_or_rate ) {
		global $wpdb;

		if ( is_object( $key_or_rate ) ) {
			$key      = $key_or_rate->tax_rate_id;
			$tax_rate = $key_or_rate->tax_rate;
		} else {
			$key      = $key_or_rate;
			$tax_rate = $wpdb->get_var( $wpdb->prepare( "SELECT tax_rate FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_id = %s", $key ) );
		}

		return apply_filters( 'woocommerce_rate_percent', floatval( $tax_rate ) . '%', $key );
	}

	/**
	 * Get a rates code. Code is made up of COUNTRY-STATE-NAME-Priority. E.g GB-VAT-1, US-AL-TAX-1
	 *
	 * @access public
	 * @param mixed $key_or_rate Tax rate ID, or the db row itself in object format
	 * @return string
	 */
	public static function get_rate_code( $key_or_rate ) {
		global $wpdb;

		if ( is_object( $key_or_rate ) ) {
			$key  = $key_or_rate->tax_rate_id;
			$rate = $key_or_rate;
		} else {
			$key  = $key_or_rate;
			$rate = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}woocommerce_tax_rates WHERE tax_rate_id = %s", $key ) );
		}

		$code_string = '';

		if ( null !== $rate ) {
			$code   = array();
			$code[] = $rate->tax_rate_country;
			$code[] = $rate->tax_rate_state;
			$code[] = $rate->tax_rate_name ? $rate->tax_rate_name : 'TAX';
			$code[] = absint( $rate->tax_rate_priority );
			$code_string = strtoupper( implode( '-', array_filter( $code ) ) );
		}

		return apply_filters( 'woocommerce_rate_code', $code_string, $key );
	}

	/**
	 * Round tax lines and return the sum.
	 *
	 * @param   array
	 * @return  float
	 */
	public static function get_tax_total( $taxes ) {
		return array_sum( array_map( array( __CLASS__, 'round' ), $taxes ) );
	}

	/**
	 * Get store tax classes
	 * @return array
	 */
	public static function get_tax_classes() {
		return array_filter( array_map( 'trim', explode( "\n", get_option( 'woocommerce_tax_classes' ) ) ) );
	}
}
WC_Tax::init();
