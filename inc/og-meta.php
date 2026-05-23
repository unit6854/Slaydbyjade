<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Override <title> with ACF seo_title field when set
add_filter( 'pre_get_document_title', 'slaydbyjade_seo_title_override' );
function slaydbyjade_seo_title_override( $title ) {
    $seo_title = get_field( 'seo_title' );
    if ( $seo_title ) {
        return esc_html( $seo_title ) . ' | ' . get_bloginfo( 'name' );
    }
    return $title;
}

// Meta description tag
add_action( 'wp_head', 'slaydbyjade_meta_description', 2 );
function slaydbyjade_meta_description() {
    $seo_desc = get_field( 'seo_description' );
    if ( $seo_desc ) {
        echo '<meta name="description" content="' . esc_attr( wp_strip_all_tags( $seo_desc ) ) . '">' . "\n";
    }
}

// Open Graph + Twitter Card tags
add_action( 'wp_head', 'slaydbyjade_og_meta', 1 );
function slaydbyjade_og_meta() {
    global $post;

    $site_name = get_bloginfo( 'name' );
    $default_og = get_template_directory_uri() . '/assets/images/og-default.png';
    $seo_title  = get_field( 'seo_title' );
    $seo_desc   = get_field( 'seo_description' );

    if ( is_front_page() ) {
        $title = $seo_title ?: $site_name;
        $desc  = $seo_desc  ?: get_bloginfo( 'description' );
        $url   = home_url( '/' );
        $image = $default_og;
    } elseif ( is_singular() && isset( $post ) ) {
        $title = $seo_title ?: get_the_title( $post );
        $desc  = $seo_desc  ?: ( has_excerpt( $post ) ? get_the_excerpt( $post ) : wp_trim_words( strip_tags( get_the_content() ), 20, '...' ) );
        $url   = get_permalink( $post );
        $image = has_post_thumbnail( $post ) ? get_the_post_thumbnail_url( $post, 'large' ) : $default_og;
    } else {
        $title = $seo_title ?: wp_get_document_title();
        $desc  = $seo_desc  ?: get_bloginfo( 'description' );
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

// JSON-LD structured data
add_action( 'wp_head', 'slaydbyjade_schema_jsonld', 5 );
function slaydbyjade_schema_jsonld() {
    $schemas = [];

    // WebSite schema — every page
    $schemas[] = [
        '@context' => 'https://schema.org',
        '@type'    => 'WebSite',
        'name'     => get_bloginfo( 'name' ),
        'url'      => home_url( '/' ),
    ];

    // LocalBusiness + optional FAQPage — homepage only
    if ( is_front_page() ) {
        $phone    = get_field( 'site_phone',   'option' );
        $email    = get_field( 'site_email',   'option' );
        $address  = get_field( 'site_address', 'option' );
        $logo     = get_field( 'site_logo',    'option' );
        $logo_url = ( $logo && ! empty( $logo['url'] ) ) ? $logo['url'] : '';

        $business = [
            '@context' => 'https://schema.org',
            '@type'    => 'LocalBusiness',
            'name'     => get_bloginfo( 'name' ),
            'url'      => home_url( '/' ),
        ];
        if ( $phone )    { $business['telephone'] = $phone; }
        if ( $email )    { $business['email']     = $email; }
        if ( $address )  { $business['address']   = $address; }
        if ( $logo_url ) { $business['logo']      = $logo_url; }

        $schemas[] = $business;

        $faq_schema = slaydbyjade_build_faq_schema( get_field( 'faq_items' ) );
        if ( $faq_schema ) {
            $schemas[] = $faq_schema;
        }
    }

    // Service schema — single service CPT
    if ( is_singular( 'services' ) ) {
        $service = [
            '@context' => 'https://schema.org',
            '@type'    => 'Service',
            'name'     => get_the_title(),
            'provider' => [
                '@type' => 'LocalBusiness',
                'name'  => get_bloginfo( 'name' ),
                'url'   => home_url( '/' ),
            ],
        ];
        $price    = get_field( 'service_price' );
        $duration = get_field( 'service_duration' );
        $desc     = get_field( 'service_description' );
        if ( $price )    { $service['offers']      = [ '@type' => 'Offer', 'price' => $price, 'priceCurrency' => 'USD' ]; }
        if ( $duration ) { $service['duration']    = $duration; }
        if ( $desc )     { $service['description'] = wp_strip_all_tags( $desc ); }

        $schemas[] = $service;
    }

    // ContactPage schema
    if ( is_page_template( 'templates/page-contact.php' ) ) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type'    => 'ContactPage',
            'name'     => get_the_title(),
            'url'      => get_permalink(),
        ];
    }

    // FAQPage schema — services archive page
    if ( is_page_template( 'templates/archive-services.php' ) ) {
        $faq_schema = slaydbyjade_build_faq_schema( get_field( 'faq_items' ) );
        if ( $faq_schema ) {
            $schemas[] = $faq_schema;
        }
    }

    foreach ( $schemas as $schema ) {
        echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
    }
}

function slaydbyjade_build_faq_schema( $faq_items ) {
    if ( empty( $faq_items ) ) {
        return null;
    }
    $entries = [];
    foreach ( $faq_items as $item ) {
        if ( empty( $item['faq_question'] ) || empty( $item['faq_answer'] ) ) {
            continue;
        }
        $entries[] = [
            '@type'          => 'Question',
            'name'           => $item['faq_question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => wp_strip_all_tags( $item['faq_answer'] ),
            ],
        ];
    }
    if ( empty( $entries ) ) {
        return null;
    }
    return [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $entries,
    ];
}
