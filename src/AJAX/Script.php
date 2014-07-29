<?php

add_action( 'wp_enqueue_scripts', 'addAJAXScripts' );
/**
 * Register, enqueue and localize the script
 */
function addAJAXScripts()
{
	$name = 'your-script-handle';
	wp_register_script(
		$name,
		plugin_dir_url( __FILE__ ).'assets/ajax.js',
		array( 'jquery', ),
		filemtime( plugin_dir_path( __FILE__ ).'assets/ajax.js' ),
		true
	);

	wp_enqueue_script( $name );

	$action = 'some-ajax-action';
	// In case there is user input data, use `esc_js()`, `filter_var()`
	// and other sanitization functions to not open the door for hacks.
	wp_localize_script(
		$name,
		'plugin_YourScriptHandle_Object',

		array(
			// This should always be the same
			'adminurl'     => esc_js( admin_url( 'admin-ajax.php' ) ),
			'_ajax_nonce'  => wp_create_nonce( $action ),

			// Here goes your custom, plugin specific data
			'custom'       => 'data',
			'custom_array' => array(
				'foo' => 'bar',
			),
		)
	);
}

