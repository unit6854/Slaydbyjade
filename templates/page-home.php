<?php
/**
 * Template Name: Home Page
 */

get_template_part( 'partials/header' );

// Home page ACF fields
$about_script   = get_field( 'about_script_heading' )   ?: 'About';
$about_heading  = get_field( 'about_main_heading' )     ?: 'LICENSED. PASSIONATE. DEDICATED TO YOU.';
$about_body     = get_field( 'about_body' );
$about_sig      = get_field( 'about_signature' )        ?: 'Slayd by Jade';
$about_image    = get_field( 'about_image' );
$svc_script     = get_field( 'services_script_heading' ) ?: 'My Services';
$svc_heading    = get_field( 'services_main_heading' )   ?: 'BEAUTY. CARE. SLAYED.';
$booking        = slaydbyjade_booking_url();
$followers      = get_field( 'instagram_follower_count', 'option' );
$instagram      = get_field( 'social_instagram', 'option' ) ?: 'https://www.instagram.com/slaydbyjade_/';
?>

<main class="sbj-main sbj-home" id="main-content">

    <?php get_template_part( 'partials/hero' ); ?>

    <!-- ======================================================
         ABOUT SECTION
    ====================================================== -->
    <section class="sbj-about" id="about" aria-labelledby="sbj-about-heading">
        <div class="sbj-container sbj-about__inner">

            <div class="sbj-about__image-col">
                <?php if ( $about_image && ! empty( $about_image['ID'] ) ) : ?>
                    <?php echo wp_get_attachment_image( $about_image['ID'], 'sbj-about', false, [ 'class' => 'sbj-about__img', 'alt' => esc_attr( $about_image['alt'] ?: 'Jade Mobley — Slayd by Jade' ) ] ); ?>
                <?php else : ?>
                    <div class="sbj-about__img-placeholder" aria-hidden="true"></div>
                <?php endif; ?>
                <div class="sbj-about__image-accent" aria-hidden="true"></div>
            </div>

            <div class="sbj-about__text-col">
                <p class="sbj-section-script" aria-hidden="true"><?php echo esc_html( $about_script ); ?></p>
                <h2 class="sbj-about__heading" id="sbj-about-heading"><?php echo esc_html( $about_heading ); ?></h2>

                <?php if ( $about_body ) : ?>
                    <div class="sbj-about__body"><?php echo wp_kses_post( $about_body ); ?></div>
                <?php endif; ?>

                <p class="sbj-about__signature"><?php echo esc_html( $about_sig ); ?></p>

                <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="sbj-btn sbj-btn--outline">Learn More About Me</a>
            </div>

        </div>
    </section>

    <!-- ======================================================
         SERVICES SECTION
    ====================================================== -->
    <section class="sbj-services-preview" id="services" aria-labelledby="sbj-services-heading">
        <div class="sbj-container">

            <header class="sbj-section-header">
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
                <p class="sbj-no-results">Services coming soon.</p>
            <?php endif; ?>

        </div>
    </section>

    <!-- ======================================================
         GALLERY PREVIEW
    ====================================================== -->
    <section class="sbj-gallery-preview" aria-labelledby="sbj-gallery-heading">
        <div class="sbj-container">
            <header class="sbj-section-header">
                <p class="sbj-section-script" aria-hidden="true">The Work</p>
                <h2 class="sbj-section-title" id="sbj-gallery-heading">GALLERY</h2>
                <div class="sbj-section-divider" aria-hidden="true"></div>
            </header>

            <?php
            $gallery_query = slaydbyjade_get_cpt_query( 'gallery_item', 9 );
            if ( $gallery_query->have_posts() ) :
            ?>
                <div class="sbj-gallery-grid sbj-gallery-grid--preview">
                    <?php while ( $gallery_query->have_posts() ) : $gallery_query->the_post();
                        $gimg = get_field( 'gallery_item_image' );
                        if ( $gimg && ! empty( $gimg['ID'] ) ) :
                    ?>
                        <a href="<?php the_permalink(); ?>" class="sbj-gallery-item" aria-label="<?php echo esc_attr( $gimg['alt'] ?: get_the_title() ); ?>">
                            <?php echo wp_get_attachment_image( $gimg['ID'], 'sbj-gallery-thumb', false, [ 'class' => 'sbj-gallery-item__img', 'alt' => esc_attr( $gimg['alt'] ?: get_the_title() ) ] ); ?>
                            <div class="sbj-gallery-item__overlay" aria-hidden="true"></div>
                        </a>
                    <?php endif; endwhile; wp_reset_postdata(); ?>
                </div>
                <div class="sbj-gallery-preview__cta">
                    <a href="<?php echo esc_url( home_url( '/gallery' ) ); ?>" class="sbj-btn sbj-btn--outline">View Full Gallery</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- ======================================================
         INSTAGRAM CTA STRIP
    ====================================================== -->
    <?php if ( $instagram ) : ?>
        <section class="sbj-insta-strip" aria-label="Instagram">
            <div class="sbj-container sbj-insta-strip__inner">
                <div class="sbj-insta-strip__text">
                    <p class="sbj-section-script">Stay Connected</p>
                    <h2 class="sbj-insta-strip__heading">FOLLOW THE JOURNEY</h2>
                    <?php if ( $followers ) : ?>
                        <p class="sbj-insta-strip__count"><strong><?php echo esc_html( $followers ); ?></strong> Followers on Instagram</p>
                    <?php endif; ?>
                </div>
                <a href="<?php echo esc_url( $instagram ); ?>" class="sbj-btn sbj-btn--primary" target="_blank" rel="noopener noreferrer">@slaydbyjade_</a>
            </div>
        </section>
    <?php endif; ?>

    <!-- ======================================================
         BOOKING CTA BANNER
    ====================================================== -->
    <section class="sbj-booking-cta" aria-labelledby="sbj-booking-heading">
        <div class="sbj-container sbj-booking-cta__inner">
            <h2 class="sbj-booking-cta__heading" id="sbj-booking-heading">Ready to Get <span class="sbj-text-script">Slayed?</span></h2>
            <p class="sbj-booking-cta__sub">Book your appointment today — deposits required at booking.</p>
            <a href="<?php echo $booking; ?>" class="sbj-btn sbj-btn--primary sbj-btn--lg" target="_blank" rel="noopener noreferrer">Book Your Appointment</a>
        </div>
    </section>

</main>

<?php get_template_part( 'partials/footer' ); ?>
