<?php
$eyebrow     = get_field( 'hero_eyebrow' );
$headline    = get_field( 'hero_headline' )    ?: 'Your Vision. Perfected.';
$hero_sub    = get_field( 'hero_subheadline' ) ?: 'Premium protective styling, crafted with precision and care — exclusively for you.';
$script_line = get_field( 'hero_script_line' );
if ( $script_line ) {
    $script_line = str_ireplace( 'slayd it', 'slay it', $script_line );
}
$cta_label   = get_field( 'hero_cta_label' );
$cta_url     = get_field( 'hero_cta_url' );
$instagram   = get_field( 'social_instagram', 'option' ) ?: 'https://www.instagram.com/slaydbyjade_/';
$tiktok      = get_field( 'social_tiktok',    'option' );
$followers   = get_field( 'instagram_follower_count', 'option' );
$threads_url = get_field( 'social_threads', 'option' ) ?: 'https://www.threads.com/@slaydbyjade_?xmt=AQG0M8SJovj0pZx1sA-SGq9LipcXgG1a7NvE_WnUeseCHuw';

$cta_href = $cta_url ?: slaydbyjade_booking_url();
$cta_text = $cta_label ?: 'Book Your Appointment';
?>

<section class="sbj-hero" aria-label="Hero — <?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
    <div class="sbj-hero__bg" aria-hidden="true"></div>

    <div class="sbj-hero__watermark" aria-hidden="true">
        <?php slaydbyjade_logo( 'sbj-hero__watermark-img' ); ?>
    </div>

    <div class="sbj-hero__inner sbj-container">

        <div class="sbj-hero__content">

            <?php if ( $eyebrow ) : ?>
                <p class="sbj-hero__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
            <?php endif; ?>

            <h1 class="sbj-hero__headline"><?php echo esc_html( $headline ); ?></h1>

            <p class="sbj-hero__sub"><?php echo esc_html( $hero_sub ); ?></p>

            <?php if ( $script_line ) : ?>
                <p class="sbj-hero__script"><?php echo esc_html( $script_line ); ?></p>
            <?php endif; ?>

            <!-- Mobile only: model between script and CTA -->
            <div class="sbj-hero__model-mobile" aria-hidden="true">
                <?php slaydbyjade_hero_image(); ?>
            </div>

            <div class="sbj-hero__divider" aria-hidden="true"></div>

            <a href="<?php echo esc_url( $cta_href ); ?>" class="sbj-btn sbj-btn--primary sbj-hero__cta" target="_blank" rel="noopener noreferrer">
                <?php echo esc_html( $cta_text ); ?>
            </a>
            <p class="sbj-hero__cta-sub" aria-hidden="true">Hair not included &middot; Please arrive washed &amp; blown out</p>

            <?php if ( $instagram || $tiktok || $threads_url ) : ?>
                <div class="sbj-hero__social">
                    <span class="sbj-hero__social-label">Follow the Journey</span>
                    <div class="sbj-hero__social-links">
                        <?php
                        slaydbyjade_social_link( 'tiktok',    'TikTok' );
                        slaydbyjade_social_link( 'instagram', 'Instagram', 'https://www.instagram.com/slaydbyjade_/' );
                        slaydbyjade_social_link( 'threads',   'Threads',   $threads_url );
                        ?>
                    </div>
                    <?php if ( $followers ) : ?>
                        <a href="<?php echo esc_url( $instagram ?: '#' ); ?>" class="sbj-hero__follower-count" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $followers ); ?> Instagram followers">
                            <span class="sbj-hero__follower-number"><?php echo esc_html( $followers ); ?></span>
                            <span class="sbj-hero__follower-label">Followers</span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>

        <div class="sbj-hero__model" aria-hidden="true">
            <?php slaydbyjade_hero_image(); ?>
            <div class="sbj-hero__model-glow"></div>
        </div>

    </div>

    <div class="sbj-hero__scroll-indicator" aria-hidden="true">
        <span class="sbj-hero__scroll-line"></span>
    </div>
</section>
