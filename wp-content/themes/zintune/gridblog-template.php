<?php
/*
 * Template Name: Grid Blog
 * Description: Gri Blog Page Template
 */
 ?>

<?php get_header(); ?>
<style>
    /**Override for menu on whiteBG if not homepage**/
    .page-template-gridblog-template .navbar-default .navbar-nav > li > a {
        color: #24a88f;
    }
    .page-template-gridblog-template .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
        color: #FFA878;
    }
    .page-template-gridblog-template .menu-btn .btn:hover, .page-template-gridblog-template .menu-btn .btn:focus, .page-template-gridblog-template .menu-btn .btn.focus,
    .page-template-gridblog-template .navbar-header .btn:hover, .page-template-gridblog-template .navbar-header .btn:focus, .page-template-gridblog-template .navbar-header .btn.focus{
        color: #24a88f;
    }
    @media screen and (max-width: 767px){
        .page-template-gridblog-template .navbar .navbar-collapse{
            border-top: 3px solid #24a88f;
        }
    }
</style>
<div id="alternate" class="main-bg clearfix">
            <div class="container text-center">
                <div class="row clearfix"><p class="col-md-8 center page-title"><?php echo the_title();?></p></div>
            </div>  
        </div>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>	
<?php endwhile; ?>

<?php get_footer(); ?>