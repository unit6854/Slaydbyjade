<?php
$booking = slaydbyjade_booking_url();
?>
<nav class="sbj-nav" id="sbj-nav" role="navigation" aria-label="Primary navigation">

    <!-- Logo — far left -->
    <div class="sbj-nav__logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?> home">
            <?php slaydbyjade_logo( 'sbj-nav__logo-img' ); ?>
        </a>
    </div>

    <!-- Nav links — center (desktop only) -->
    <div class="sbj-nav__left">
        <ul class="sbj-nav__menu" id="sbj-nav-menu" role="list">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#about' ) ); ?>">About</a></li>
            <li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a></li>
            <li><a href="<?php echo esc_url( home_url( '/gallery' ) ); ?>">Gallery</a></li>
            <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a></li>
        </ul>
    </div>

    <!-- Book button + mobile toggle — far right -->
    <div class="sbj-nav__right">
        <?php if ( $booking ) : ?>
            <a href="<?php echo $booking; ?>" class="sbj-btn sbj-btn--outline sbj-nav__book-btn" target="_blank" rel="noopener noreferrer">Book Now</a>
        <?php endif; ?>
        <button class="sbj-nav__toggle" id="sbj-nav-toggle" aria-expanded="false" aria-controls="sbj-nav-menu" aria-label="Toggle navigation">
            <span class="sbj-nav__toggle-bar"></span>
            <span class="sbj-nav__toggle-bar"></span>
            <span class="sbj-nav__toggle-bar"></span>
        </button>
    </div>

</nav>
