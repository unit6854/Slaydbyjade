<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function slaydbyjade_register_image_sizes() {
    add_image_size( 'sbj-hero',        1920, 1080, true );
    add_image_size( 'sbj-service-card', 600,  600, true );
    add_image_size( 'sbj-gallery-thumb', 800, 800, true );
    add_image_size( 'sbj-about',        900,  700, false );
}
add_action( 'after_setup_theme', 'slaydbyjade_register_image_sizes' );
