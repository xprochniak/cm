<?php
/**
 * @package HK
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
<?php else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'hk' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
