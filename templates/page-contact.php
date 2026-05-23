<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Template Name: Contact Page
 */
get_template_part( 'partials/header' );

$heading    = get_field( 'contact_heading' )    ?: 'Get in Touch';
$subheading = get_field( 'contact_subheading' ) ?: 'Ready to book or have a question?';
$intro      = get_field( 'contact_intro' );
$phone      = get_field( 'site_phone',   'option' );
$email      = get_field( 'site_email',   'option' );
$address    = get_field( 'site_address', 'option' );
$instagram  = get_field( 'social_instagram', 'option' );
$booking    = slaydbyjade_booking_url();
?>

<main class="sbj-main sbj-contact" id="main-content">

    <section class="sbj-page-hero sbj-page-hero--contact" aria-label="Contact header">
        <div class="sbj-container">
            <p class="sbj-section-script">Let's Connect</p>
            <h1 class="sbj-page-hero__title"><?php echo esc_html( $heading ); ?></h1>
            <?php if ( $subheading ) : ?>
                <p class="sbj-page-hero__sub"><?php echo esc_html( $subheading ); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <div class="sbj-container sbj-contact__inner">

        <div class="sbj-contact__info">
            <?php if ( $intro ) : ?>
                <p class="sbj-contact__intro"><?php echo esc_html( $intro ); ?></p>
            <?php endif; ?>

            <ul class="sbj-contact__details">
                <?php if ( $phone ) : ?>
                    <li class="sbj-contact__detail">
                        <span class="sbj-contact__detail-icon" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1l-2.3 2.2z"/></svg>
                        </span>
                        <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
                    </li>
                <?php endif; ?>
                <?php if ( $email ) : ?>
                    <li class="sbj-contact__detail">
                        <span class="sbj-contact__detail-icon" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                        </span>
                        <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                    </li>
                <?php endif; ?>
                <?php if ( $address ) : ?>
                    <li class="sbj-contact__detail">
                        <span class="sbj-contact__detail-icon" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        </span>
                        <address><?php echo nl2br( esc_html( $address ) ); ?></address>
                    </li>
                <?php endif; ?>
                <?php if ( $instagram ) : ?>
                    <li class="sbj-contact__detail">
                        <span class="sbj-contact__detail-icon" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </span>
                        <a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer">@slaydbyjaade_</a>
                    </li>
                <?php endif; ?>
            </ul>

            <?php if ( $booking ) : ?>
                <a href="<?php echo esc_url( $booking ); ?>" class="sbj-btn sbj-btn--primary sbj-btn--lg" target="_blank" rel="noopener noreferrer">Book Your Appointment</a>
            <?php endif; ?>
        </div>

        <div class="sbj-contact__form-col">
            <?php
            // WPForms Lite — approved contact form plugin per architecture rules.
            if ( function_exists( 'wpforms' ) ) {
                wpforms_display( get_option( 'slaydbyjade_contact_form_id', '' ), false, true );
            } else {
                echo '<p class="sbj-contact__form-note">Contact form coming soon.</p>';
            }
            ?>
        </div>

    </div>

</main>
<?php get_template_part( 'partials/footer' ); ?>
