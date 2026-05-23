<?php
function slaydbyjade_enqueue_assets() {
    $ver = wp_get_theme()->get( 'Version' );
    $dir = get_template_directory_uri();

    // Google Fonts
    wp_enqueue_style(
        'slaydbyjade-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Great+Vibes&family=Lato:wght@300;400;700&family=Raleway:wght@300;400;500;600;700;800&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style( 'slaydbyjade-style', $dir . '/assets/css/style.css', [ 'slaydbyjade-fonts' ], $ver );

    // Main script
    wp_enqueue_script( 'slaydbyjade-main', $dir . '/assets/js/main.js', [], $ver, true );

    // Pass data to JS
    wp_localize_script( 'slaydbyjade-main', 'sbjData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'slaydbyjade_nonce' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'slaydbyjade_enqueue_assets' );
