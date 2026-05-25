<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Secret key for the CI/CD cache purge endpoint.
// Also stored as PURGE_KEY in GitHub Actions secrets.
define( 'SLAYD_PURGE_KEY', 'slayd-purge-xK9mQ7vR3pT2wN8j' );

add_action( 'rest_api_init', function () {
    register_rest_route( 'slaydbyjade/v1', '/purge', [
        'methods'             => 'POST',
        'permission_callback' => function ( WP_REST_Request $req ) {
            return $req->get_param( 'key' ) === SLAYD_PURGE_KEY;
        },
        'callback'            => function () {
            do_action( 'litespeed_purge_all' );
            wp_cache_flush();
            return [ 'purged' => true, 'time' => time() ];
        },
    ] );
} );
