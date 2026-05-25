<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Loads the Home Page template when a static front page is set.
// Template: templates/page-home.php (assigned in WP Admin → Settings → Reading)
get_template_part( 'partials/header' );

// Home page ACF fields
$about_script   = get_field( 'about_script_heading' )    ?: 'About';
$about_heading  = get_field( 'about_main_heading' )      ?: 'LICENSED. PASSIONATE. DEDICATED TO YOU.';
$about_body     = get_field( 'about_body' );
$about_sig      = get_field( 'about_signature' )         ?: 'Slayd by Jade';
$about_image    = get_field( 'about_image' );
$svc_script     = get_field( 'services_script_heading' ) ?: 'My Services';
$svc_heading    = get_field( 'services_main_heading' )   ?: 'BEAUTY. CARE. SLAYED.';
$cta_heading    = get_field( 'cta_heading' )             ?: 'Ready For Your Next Signature Look?';
$cta_subtext    = get_field( 'cta_subtext' )             ?: 'Your luxury protective style experience awaits.';
$booking        = slaydbyjade_booking_url();
$instagram      = get_field( 'social_instagram', 'option' ) ?: 'https://www.instagram.com/slaydbyjade_/';
$followers      = get_field( 'instagram_follower_count', 'option' );
?>

<main class="sbj-main sbj-home" id="main-content">

    <?php get_template_part( 'partials/hero' ); ?>

    <!-- ABOUT -->
    <section class="sbj-about" id="about" aria-labelledby="sbj-about-heading">
        <div class="sbj-container sbj-about__inner">
            <div class="sbj-about__image-col sbj-reveal">
                <div class="sbj-about__crossfade">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/ceo.webp' ); ?>"
                         alt="Jade Mobley — CEO, Slayd by Jade"
                         class="sbj-about__img sbj-about__img--ceo1"
                         width="900" height="1200">
                </div>
                <div class="sbj-about__image-frame" aria-hidden="true"></div>
                <div class="sbj-about__image-accent" aria-hidden="true"></div>
            </div>
            <div class="sbj-about__text-col sbj-reveal" data-delay="2">
                <p class="sbj-section-script" aria-hidden="true"><?php echo esc_html( $about_script ); ?></p>
                <h2 class="sbj-about__heading" id="sbj-about-heading"><?php echo esc_html( $about_heading ); ?></h2>
                <?php if ( $about_body ) : ?>
                    <div class="sbj-about__body"><?php echo wp_kses_post( $about_body ); ?></div>
                <?php endif; ?>
                <p class="sbj-about__signature"><?php echo esc_html( $about_sig ); ?></p>
                <a href="<?php echo esc_url( home_url( '/#about' ) ); ?>" class="sbj-btn sbj-btn--outline">Learn More About Me</a>
            </div>
        </div>
    </section>

    <!-- SERVICES PREVIEW -->
    <section class="sbj-services-preview" id="services" aria-labelledby="sbj-services-heading">
        <div class="sbj-container">
            <header class="sbj-section-header sbj-reveal">
                <p class="sbj-section-script" aria-hidden="true"><?php echo esc_html( $svc_script ); ?></p>
                <h2 class="sbj-section-title" id="sbj-services-heading"><?php echo esc_html( $svc_heading ); ?></h2>
                <div class="sbj-section-divider" aria-hidden="true"></div>
            </header>
            <?php
            $services_query = slaydbyjade_get_cpt_query( 'services', 6 );
            if ( $services_query->have_posts() ) :
            ?>
                <div class="sbj-services-grid">
                    <?php while ( $services_query->have_posts() ) : $services_query->the_post(); ?>
                        <?php get_template_part( 'partials/card-services' ); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <div class="sbj-services-preview__cta">
                    <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="sbj-btn sbj-btn--outline">View All Services</a>
                </div>
            <?php else : ?>
                <?php
                // Featured signature services — curated homepage preview
                $featured_services = [
                    [
                        'category' => 'KNOTLESS BRAIDS',
                        'title'    => 'Medium Knotless Braids',
                        'price'    => '$200',
                        'duration' => '4 hrs',
                        'note'     => 'Hair included · $25 deposit',
                    ],
                    [
                        'category' => 'SOFT LOCS',
                        'title'    => 'Mid Back Soft Locs',
                        'price'    => '$200',
                        'duration' => '5 hrs',
                        'note'     => 'Hair included · $50 deposit',
                    ],
                    [
                        'category' => 'ISLAND TWIST',
                        'title'    => 'Medium Island Twist',
                        'price'    => '$250',
                        'duration' => '5 hrs',
                        'note'     => 'Human boho hair included · $50 deposit',
                    ],
                    [
                        'category' => 'FULANI',
                        'title'    => 'Fulani Braids',
                        'price'    => '$200',
                        'duration' => '5 hrs',
                        'note'     => 'Hair included · $25 deposit',
                    ],
                    [
                        'category' => 'LOC STYLES',
                        'title'    => 'Invisible Locs',
                        'price'    => '$185',
                        'duration' => '6 hrs',
                        'note'     => 'Hair included · $25 deposit',
                    ],
                    [
                        'category' => 'STITCH BRAIDS',
                        'title'    => '6 Feed In Braids',
                        'price'    => '$110',
                        'duration' => '4 hrs',
                        'note'     => 'Hair included · $25 deposit',
                    ],
                ];
                ?>
                <div class="sbj-services-placeholder">
                    <?php foreach ( $featured_services as $svc ) : ?>
                        <div class="sbj-services-placeholder__card">
                            <p class="sbj-service-card__category"><?php echo esc_html( $svc['category'] ); ?></p>
                            <div class="sbj-services-placeholder__divider" aria-hidden="true"></div>
                            <h3 class="sbj-service-card__title"><?php echo esc_html( $svc['title'] ); ?></h3>
                            <div class="sbj-service-card__pricing">
                                <span class="sbj-service-card__price"><?php echo esc_html( $svc['price'] ); ?></span>
                                <span class="sbj-service-card__sep" aria-hidden="true">·</span>
                                <span class="sbj-service-card__duration"><?php echo esc_html( $svc['duration'] ); ?></span>
                            </div>
                            <p class="sbj-service-card__deposit"><?php echo esc_html( $svc['note'] ); ?></p>
                            <a href="<?php echo esc_url( slaydbyjade_booking_url() ); ?>" class="sbj-btn sbj-btn--gold sbj-service-card__book" target="_blank" rel="noopener noreferrer">Book</a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="sbj-services-preview__cta">
                    <p class="sbj-services-placeholder__all-note">Featuring 6 of 30+ available styles</p>
                    <a href="<?php echo esc_url( slaydbyjade_booking_url() ); ?>" class="sbj-btn sbj-btn--outline" target="_blank" rel="noopener noreferrer">View All Services &amp; Book</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- GALLERY PREVIEW -->
    <section class="sbj-gallery-preview" aria-labelledby="sbj-gallery-heading">
        <div class="sbj-container">
            <header class="sbj-section-header sbj-reveal">
                <p class="sbj-section-script" aria-hidden="true">The Work</p>
                <h2 class="sbj-section-title" id="sbj-gallery-heading">GALLERY</h2>
                <div class="sbj-section-divider" aria-hidden="true"></div>
            </header>
            <?php
            $g_base    = content_url( 'uploads/2026/05/' );
            $g_preview = [ 'gallery-1.webp', 'gallery-2.webp', 'gallery-3.webp', 'gallery-4.webp', 'gallery-5.webp', 'gallery-6.webp' ];
            ?>
                <div class="sbj-gallery-grid sbj-gallery-grid--preview">
                    <?php foreach ( $g_preview as $i => $img ) :
                        $g_img_url = $g_base . $img;
                        $g_alt     = 'Slayd by Jade — style ' . ( $i + 1 );
                    ?>
                        <a href="<?php echo esc_url( home_url( '/gallery' ) ); ?>"
                           class="sbj-gallery-item sbj-reveal"
                           aria-label="<?php echo esc_attr( $g_alt ); ?>">
                            <img src="<?php echo esc_url( $g_img_url ); ?>"
                                 alt="<?php echo esc_attr( $g_alt ); ?>"
                                 class="sbj-gallery-item__img"
                                 loading="lazy"
                                 decoding="async">
                            <div class="sbj-gallery-item__overlay" aria-hidden="true">
                                <span class="sbj-gallery-item__view-label">View</span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="sbj-gallery-preview__cta">
                    <a href="<?php echo esc_url( home_url( '/gallery' ) ); ?>" class="sbj-btn sbj-btn--outline">View Full Gallery</a>
                </div>
        </div>
    </section>

    <!-- INSTAGRAM FEED -->
    <section class="sbj-ig-section" aria-label="Instagram feed">
        <div class="sbj-container">
            <header class="sbj-section-header sbj-reveal">
                <p class="sbj-section-script">Stay Connected</p>
                <h2 class="sbj-section-title">FOLLOW THE JOURNEY</h2>
                <div class="sbj-section-divider" aria-hidden="true"></div>
                <a href="<?php echo esc_url( $instagram ); ?>" class="sbj-btn sbj-btn--outline" target="_blank" rel="noopener noreferrer">@slaydbyjade_ on Instagram</a>
            </header>
            <?php if ( shortcode_exists( 'instagram-feed' ) ) : ?>
                <div class="sbj-ig-feed">
                    <?php echo do_shortcode( '[instagram-feed num=12 cols=3 showheader=false showfollow=false disablelightbox=true]' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- BOOKING CTA -->
    <section class="sbj-booking-cta" aria-labelledby="sbj-booking-heading">
        <div class="sbj-booking-cta__atmosphere" aria-hidden="true"></div>
        <div class="sbj-container sbj-booking-cta__inner">
            <div class="sbj-booking-cta__eyebrow" aria-hidden="true"></div>
            <h2 class="sbj-booking-cta__heading sbj-reveal" id="sbj-booking-heading"><?php echo esc_html( $cta_heading ); ?></h2>
            <p class="sbj-booking-cta__sub sbj-reveal"><?php echo esc_html( $cta_subtext ); ?></p>
            <a href="<?php echo esc_url( $booking ); ?>" class="sbj-btn sbj-btn--primary sbj-btn--lg sbj-reveal" target="_blank" rel="noopener noreferrer">Book Your Appointment</a>
        </div>
    </section>


    <?php
    $faq_items = get_field( 'faq_items' );
    if ( $faq_items ) :
    ?>
    <section class="sbj-faq" aria-labelledby="sbj-faq-heading">
        <div class="sbj-container">
            <header class="sbj-section-header sbj-reveal">
                <h2 class="sbj-section-title" id="sbj-faq-heading">FREQUENTLY ASKED QUESTIONS</h2>
                <div class="sbj-section-divider" aria-hidden="true"></div>
            </header>
            <div class="sbj-faq__list">
                <?php foreach ( $faq_items as $item ) :
                    if ( empty( $item['faq_question'] ) ) continue;
                ?>
                <details class="sbj-faq__item">
                    <summary class="sbj-faq__question"><?php echo esc_html( $item['faq_question'] ); ?></summary>
                    <div class="sbj-faq__answer"><?php echo wp_kses_post( $item['faq_answer'] ); ?></div>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

</main>
<?php get_template_part( 'partials/footer' ); ?>
