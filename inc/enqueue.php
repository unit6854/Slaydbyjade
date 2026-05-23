<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function slaydbyjade_enqueue_assets() {
    $dir     = get_template_directory_uri();
    $path    = get_template_directory();
    $css_ver = filemtime( $path . '/assets/css/style.css' );
    $js_ver  = filemtime( $path . '/assets/js/main.js' );

    // Google Fonts
    wp_enqueue_style(
        'slaydbyjade-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Great+Vibes&family=Lato:wght@300;400;700&family=Raleway:wght@300;400;500;600;700;800&display=swap',
        [],
        null
    );

    // Main stylesheet — versioned by file modification time
    wp_enqueue_style( 'slaydbyjade-style', $dir . '/assets/css/style.css', [ 'slaydbyjade-fonts' ], $css_ver );

    // Main script — versioned by file modification time, loaded in footer
    wp_enqueue_script( 'slaydbyjade-main', $dir . '/assets/js/main.js', [], $js_ver, true );

    // Pass data to JS
    wp_localize_script( 'slaydbyjade-main', 'sbjData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'slaydbyjade_nonce' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'slaydbyjade_enqueue_assets' );
