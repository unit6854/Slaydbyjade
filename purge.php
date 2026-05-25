<?php
// Cache purge entry point for CI/CD. Called by GitHub Actions deploy workflow.
if ( ! isset( $_GET['key'] ) || $_GET['key'] !== 'slayd-purge-xK9mQ7vR3pT2wN8j' ) {
    http_response_code( 403 );
    exit( 'Forbidden' );
}

$wp_load = __DIR__ . '/../../../wp-load.php';
if ( ! file_exists( $wp_load ) ) {
    http_response_code( 500 );
    exit( 'wp-load.php not found' );
}

require_once $wp_load;

do_action( 'litespeed_purge_all' );
wp_cache_flush();

header( 'Content-Type: application/json' );
echo json_encode( [ 'purged' => true, 'time' => time() ] );
