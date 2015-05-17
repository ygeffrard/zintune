<?php
/**
 * The Template for displaying all single artist profile post
 *
 *
 * @package 	WordPress
 */
?>
<?php get_header(); ?>
<?php get_alt_menu_header();?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="container-fluid">
            <div class="row">
                <div class="feature feature-short text-white" style="background-image:url(<?php
              if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	echo wp_get_attachment_url(get_post_thumbnail_id());  //Adds the URL to the background image tag
}                                                        ?>)">
                <div class="overlay overlay30"></div>
                <div class="container full-height">
                    <p class="col-md-8 lead-title center center-v text-center"><?php the_field('artsn_bio_intro_text') ;?></p>
                </div>
            </div>
            </div>
        </div>
<div class="container clearfix addvbottom40 artsn-bio">
    
    <!--Gets the back button to artsns page-->
    <div class="clearfix addvtop20">
                    <p class="col-sm-2 col-xs-12 menu-btn "><a href="<?php $single_artsns_parent = get_page_by_title(get_option('single_artsn_back_button'))->ID;
      echo get_page_link($single_artsns_parent);?>" data-toggle="tooltip" data-placement="top" title="Back To Artsns Page" class="col-xs-6"> <span class="icon-eject nav-menu nav-menu-sm skinny-border center"></span></a>
                    </p>
                </div>
    
    <div class="lead center">
<?php the_content(); ?>	
    </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>