<?php
/*
 * Template Name: Grid Blog
 * Description: Gri Blog Page Template
 */
 ?>

<?php get_header(); ?>
<?php get_alt_menu_header();?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>	
<?php endwhile; ?>

<?php get_footer(); ?>