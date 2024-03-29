<?php
$groups              = function_exists( 'acf_get_field_groups' ) ? acf_get_field_groups() : apply_filters( 'acf/get_field_groups', array() );
$groups_param_values = $fields_params = array();
foreach ( $groups as $group ) {
	$id = isset( $group['id'] ) ? 'id' : ( isset( $group['ID'] ) ? 'ID' : 'id' );
	$groups_param_values[$group['title']] = $group[ $id ];
	$fields = function_exists( 'acf_get_fields' ) ? acf_get_fields( $group[ $id ] ) : apply_filters('acf/field_group/get_fields', array(), $group[ $id ]);
	$fields_param_value = array();
	foreach($fields as $field) {
		$fields_param_value[$field['label']] = (string)$field['key'];
	}
	$fields_params[] = array(
		'type'        => 'dropdown',
		'heading'     => __( 'Field name', 'js_composer' ),
		'param_name'  => 'field_from_' .$group[ $id ],
		'value'       => $fields_param_value,
		'description' => __( 'Select field from group.', 'js_composer' ),
		'dependency' => array(
			'element' => 'field_group',
			'value' => array( (string)$group[ $id ] )
		),
	);
}
return array(
	'vc_gitem_acf' => array(
		'name'           => __( 'Advanced Custom Field', 'js_composer' ),
		'base'           => 'vc_gitem_acf',
		'icon'           => 'vc_icon-acf',
		'category'       => __( 'Content', 'js_composer' ),
		'description'    => __( 'Advanced Custom Field', 'js_composer' ),
		'php_class_name' => 'Vc_Gitem_Acf_Shortcode',
		'params'         => array_merge( array(array(
			'type'        => 'dropdown',
			'heading'     => __( 'Field group', 'js_composer' ),
			'param_name'  => 'field_group',
			'value'       => $groups_param_values,
			'description' => __( 'Select field group.', 'js_composer' ),
		)), $fields_params, array(
			array(
				'type'       => 'checkbox',
				'heading'    => __( 'Show label', 'js_composer' ),
				'param_name' => 'show_label',
				'value'      => array( __( 'Yes, please', 'js_composer' ) => 'yes' ),
				'description' => __( 'Enter label to display before key value.', 'js_composer' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Align', 'js_composer' ),
				'param_name' => 'align',
				'value' => array(
					__('left', 'js_composer') => 'left',
					__('right', 'js_composer') => 'right',
					__('center', 'js_composer') => 'center',
					__('justify', 'js_composer') => 'justify',
				),
				'description' => __( 'Select alignment.', 'js_composer' ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			),
		) )
	)
);