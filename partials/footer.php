<?php
$instagram   = get_field( 'social_instagram', 'option' );
$facebook    = get_field( 'social_facebook',  'option' );
$tiktok      = get_field( 'social_tiktok',    'option' );
$threads_url = get_field( 'social_threads',   'option' ) ?: 'https://www.threads.com/@slaydbyjade_?xmt=AQG0M8SJovj0pZx1sA-SGq9LipcXgG1a7NvE_WnUeseCHuw';
$tagline    = get_field( 'footer_tagline',   'option' );
$copyright  = get_field( 'footer_copyright_text', 'option' );
$booking    = slaydbyjade_booking_url();
?>
<footer class="sbj-footer" role="contentinfo">
    <div class="sbj-footer__inner sbj-container">

        <div class="sbj-footer__top">
            <div class="sbj-footer__brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sbj-footer__logo-link" aria-label="<?php bloginfo( 'name' ); ?> home">
                    <?php slaydbyjade_logo( 'sbj-footer__logo' ); ?>
                </a>
                <?php if ( $tagline ) : ?>
                    <p class="sbj-footer__tagline"><?php echo esc_html( $tagline ); ?></p>
                <?php endif; ?>
            </div>

            <nav class="sbj-footer__nav" aria-label="Footer navigation">
                <ul class="sbj-footer__nav-list">
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">About</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/gallery' ) ); ?>">Gallery</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
                </ul>
            </nav>

            <div class="sbj-footer__social">
                <p class="sbj-footer__social-label">Follow the Journey</p>
                <div class="sbj-footer__social-links">
                    <?php
                    slaydbyjade_social_link( 'instagram', 'Instagram', 'https://www.instagram.com/slaydbyjade_/' );
                    slaydbyjade_social_link( 'tiktok',    'TikTok' );
                    slaydbyjade_social_link( 'threads',   'Threads',   $threads_url );
                    slaydbyjade_social_link( 'facebook',  'Facebook' );
                    ?>
                </div>
                <?php if ( $booking ) : ?>
                    <a href="<?php echo $booking; ?>" class="sbj-btn sbj-btn--primary sbj-footer__book-btn" target="_blank" rel="noopener noreferrer">Book Now</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="sbj-footer__bottom">
            <p class="sbj-footer__copyright">
                <?php
                if ( $copyright ) {
                    echo esc_html( $copyright );
                } else {
                    echo '&copy; ' . esc_html( date( 'Y' ) ) . ' ' . esc_html( get_bloginfo( 'name' ) ) . '. All rights reserved.';
                }
                ?>
            </p>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
