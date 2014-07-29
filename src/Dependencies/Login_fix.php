<?php

/**
 * Fix for login / register / password pages
 * else WP prints all styles outside the `<head>` tag, producing invalid HTML
 * as a `<link>` tag with a `rel` attribute is not allowed outside the `<head>` tag
 * @author Thomas "toscho" Scholz
 */
if ( ! has_action( 'login_enqueue_scripts', 'wp_print_styles' ) )
{
	add_action( 'login_enqueue_scripts', 'wp_print_styles', 11 );
}