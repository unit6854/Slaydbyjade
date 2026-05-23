<?php
function slaydbyjade_og_meta() {
    global $post;

    $site_name  = get_bloginfo( 'name' );
    $default_og = get_template_directory_uri() . '/assets/images/og-default.png';

    if ( is_front_page() ) {
        $title = $site_name;
        $desc  = get_bloginfo( 'description' );
        $url   = home_url( '/' );
        $image = $default_og;
    } elseif ( is_singular() && isset( $post ) ) {
        $title = get_the_title( $post );
        $desc  = has_excerpt( $post ) ? get_the_excerpt( $post ) : wp_trim_words( strip_tags( get_the_content() ), 20, '...' );
        $url   = get_permalink( $post );
        $image = has_post_thumbnail( $post ) ? get_the_post_thumbnail_url( $post, 'large' ) : $default_og;
    } else {
        $title = wp_get_document_title();
        $desc  = get_bloginfo( 'description' );
        $url   = home_url( isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '/' );
        $image = $default_og;
    }
    ?>
    <meta property="og:type"         content="website" />
    <meta property="og:site_name"    content="<?php echo esc_attr( $site_name ); ?>" />
    <meta property="og:title"        content="<?php echo esc_attr( $title ); ?>" />
    <meta property="og:description"  content="<?php echo esc_attr( wp_strip_all_tags( $desc ) ); ?>" />
    <meta property="og:url"          content="<?php echo esc_url( $url ); ?>" />
    <meta property="og:image"        content="<?php echo esc_url( $image ); ?>" />
    <meta property="og:image:width"  content="1200" />
    <meta property="og:image:height" content="630" />
    <meta name="twitter:card"        content="summary_large_image" />
    <meta name="twitter:title"       content="<?php echo esc_attr( $title ); ?>" />
    <meta name="twitter:description" content="<?php echo esc_attr( wp_strip_all_tags( $desc ) ); ?>" />
    <meta name="twitter:image"       content="<?php echo esc_url( $image ); ?>" />
    <?php
}
add_action( 'wp_head', 'slaydbyjade_og_meta', 1 );
