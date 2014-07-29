<?php

$name = 'your-script-handle';

# Logged in users:
add_action( "wp_ajax_{$name}_action", array( $this, 'AJAXCallback' ) );

# Guests:
add_action( "wp_ajax_nopriv_{$name}_action", array( $this, 'AJAXCallback' ) );


function AJAXCallback()
{
	// Nonce not met! Fail and abort!
	if ( ! check_ajax_referer(
		$_POST['action'],
		'_ajax_nonce',
		false
	) )
		wp_send_json_error();

	// @TODO Validate and sanitize data
	$data = $_POST;

	// @TODO Set fail cases
	if ( 'dragons' !== $data['foo'] )
		wp_send_json_error( 'Missing dragons' );

	wp_send_json_success( array(
		'foo' => 'bar',
		'baz' => 'dragons',
	) );
}