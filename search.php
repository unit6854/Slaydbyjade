<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php get_template_part( 'partials/header' ); ?>
<main class="sbj-main sbj-search">
    <div class="sbj-container">
        <h1 class="sbj-search__heading"><?php printf( esc_html__( 'Search results for: %s', 'slaydbyjade' ), get_search_query() ); ?></h1>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="sbj-search__result">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
            </article>
        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'No results found.', 'slaydbyjade' ); ?></p>
        <?php endif; ?>
    </div>
</main>
<?php get_template_part( 'partials/footer' ); ?>
