<?php
/**
 * Template Loader
 *
 * @class 		WC_Template
 * @version		2.2.0
 * @package		WooCommerce/Classes
 * @category	Class
 * @author 		WooThemes
 */
class WC_Template_Loader {

	/**
	 * Hook in methods
	 */
	public static function init() {
		add_filter( 'template_include', array( __CLASS__, 'template_loader' ) );
		add_filter( 'comments_template', array( __CLASS__, 'comments_template_loader' ) );
	}

	/**
	 * Load a template.
	 *
	 * Handles template usage so that we can use our own templates instead of the themes.
	 *
	 * Templates are in the 'templates' folder. woocommerce looks for theme
	 * overrides in /theme/woocommerce/ by default
	 *
	 * For beginners, it also looks for a woocommerce.php template first. If the user adds
	 * this to the theme (containing a woocommerce() inside) this will be used for all
	 * woocommerce templates.
	 *
	 * @param mixed $template
	 * @return string
	 */
	public static function template_loader( $template ) {
		$find = array( 'woocommerce.php' );
		$file = '';

		if ( is_single() && get_post_type() == 'product' ) {

			$file 	= 'single-product.php';
			$find[] = $file;
			$find[] = WC()->template_path() . $file;

		} elseif ( is_product_taxonomy() ) {

			$term   = get_queried_object();

			if ( is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {
				$file = 'taxonomy-' . $term->taxonomy . '.php';
			} else {
				$file = 'archive-product.php';
			}

			$find[] = 'taxonomy-' . $term->taxonomy . '-' . $term->slug . '.php';
			$find[] = WC()->template_path() . 'taxonomy-' . $term->taxonomy . '-' . $term->slug . '.php';
			$find[] = 'taxonomy-' . $term->taxonomy . '.php';
			$find[] = WC()->template_path() . 'taxonomy-' . $term->taxonomy . '.php';
			$find[] = $file;
			$find[] = WC()->template_path() . $file;

		} elseif ( is_post_type_archive( 'product' ) || is_page( wc_get_page_id( 'shop' ) ) ) {

			$file 	= 'archive-product.php';
			$find[] = $file;
			$find[] = WC()->template_path() . $file;

		}

		if ( $file ) {
			$template       = locate_template( array_unique( $find ) );
			$status_options = get_option( 'woocommerce_status_options', array() );
			if ( ! $template || ( ! empty( $status_options['template_debug_mode'] ) && current_user_can( 'manage_options' ) ) ) {
				$template = WC()->plugin_path() . '/templates/' . $file;
			}
		}

		return $template;
	}

	/**
	 * comments_template_loader function.
	 *
	 * @param mixed $template
	 * @return string
	 */
	public static function comments_template_loader( $template ) {
		if ( get_post_type() !== 'product' )
			return $template;

		if ( file_exists( get_stylesheet_directory() . '/' . WC()->template_path() . 'single-product-reviews.php' ))
			return get_stylesheet_directory() . '/' . WC()->template_path() . 'single-product-reviews.php';
		elseif ( file_exists( get_template_directory() . '/' . WC()->template_path() . 'single-product-reviews.php' ))
			return get_template_directory() . '/' . WC()->template_path() . 'single-product-reviews.php';
		elseif ( file_exists( get_stylesheet_directory() . '/' . 'single-product-reviews.php' ))
			return get_stylesheet_directory() . '/' . 'single-product-reviews.php';
		elseif ( file_exists( get_template_directory() . '/' . 'single-product-reviews.php' ))
			return get_template_directory() . '/' . 'single-product-reviews.php';
		else
			return WC()->plugin_path() . '/templates/single-product-reviews.php';
	}
}

WC_Template_Loader::init();
