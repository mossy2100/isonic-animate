<?php
/**
 * Plugin Name: iSonic Custom Login Page
 */

get_header();

echo 'custom login page plugin - testing page load';

if ( ! is_user_logged_in() ) {
	$args = array(
		'redirect'       => admin_url(), // redirect to admin dashboard.
		'form_id'        => 'isonic_custom_login_form',
		'label_username' => __( 'Username:' ),
		'label_password' => __( 'Password:' ),
		'label_remember' => __( 'Remember Me' ),
		'label_log_in'   => __( 'Log Me In' ),
		'remember'       => true,
	);
	wp_login_form( $args );
}
get_footer();
