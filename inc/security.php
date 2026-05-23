<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

add_filter( 'xmlrpc_enabled', '__return_false' );

if ( ! is_admin() ) {
    if ( isset( $_SERVER['QUERY_STRING'] ) && preg_match( '/author=([0-9]*)/i', $_SERVER['QUERY_STRING'] ) ) {
        wp_die( '' );
    }
}
