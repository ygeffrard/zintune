<?php
/*
 * Template Name: Home Page
 * Description: Home Page Template
 */
 ?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="landing" class="main-bg clearfix"
     <?php
        $header_img_url = get_post_meta(get_the_ID(), 'header_img', true);
        if(strpos($header_img_url , 'wp-content') !== false){ $header_img_url = strstr($header_img_url, 'wp-content');}
        if ( ! empty ($header_img_url)) {
            $final_header_img_url = 'style="background-image:url('.$header_img_url.');"';
            echo $final_header_img_url;
        }
        else{
            echo $header_img_url;
        }
    ?>
     >
            <div class="overlay"></div>
            <div class="container text-center">
                <div class="row clearfix"><p class="col-md-8 lead-title center"><?php echo get_post_meta($post->ID, 'header_text', true); ?></p></div>     
            </div>  
        </div>
<div class="text-center">
<?php the_content(); ?>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>