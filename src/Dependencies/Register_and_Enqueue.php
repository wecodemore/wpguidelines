<?php

#----------------------------#
#   1. Register the script   #
#----------------------------#
# Use a priority of 5 to give others a chance to unregister it

// For the front end / theme
add_action( 'wp_enqueue_scripts', 'registerPluginScripts', 5 );
// For the admin / back end
add_action( 'admin_enqueue_scripts', 'registerPluginScripts', 5 );
// For login / register / lost password screens
add_action( 'login_enqueue_scripts', 'registerPluginScripts', 5 );

/**
 * Register a script for a PLUGIN
 * Adds it to the footer (last argument/footer equals TRUE)
 */
function registerPluginScripts()
{
	wp_register_script(
		'your-script-handle',
		plugin_dir_url( __FILE__ ).'assets/ajax.js',
		array( 'jquery', ),
		filemtime( plugin_dir_path( __FILE__ ).'assets/ajax.js' ),
		TRUE
	);
}

add_action( 'wp_enqueue_scripts', 'addThemeScripts', 5 );
/**
 * Register a script for a THEME
 * Adds it to the footer (last argument/footer equals TRUE)
 */
function registerThemeScripts()
{
	wp_register_script(
		'your-script-handle',
		get_stylesheet_directory_uri().'/assets/ajax.js',
		array( 'jquery', ),
		filemtime( plugin_dir_path( __FILE__ ).'assets/ajax.js' ),
		TRUE
	);
}

#---------------------------#
#   2. Enqueue the script   #
#---------------------------#
# Use the default priority of 10 (default) to make it predictable

// For the front end / theme
add_action( 'wp_enqueue_scripts', 'enqueueThemeScript' );
// For the admin / back end
add_action( 'admin_enqueue_scripts', 'enqueueThemeScript' );
// For login / register / lost password screens
add_action( 'login_enqueue_scripts', 'enqueueThemeScript' );

function enqueueThemeScript()
{
	wp_enqueue_script( 'your-script-handle' );
}