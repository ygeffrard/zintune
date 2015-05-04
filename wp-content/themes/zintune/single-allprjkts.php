<?php
/**
 * The Template for displaying all single project post
 *
 *
 * @package 	WordPress
 */
?>
<?php get_header(); ?>
<?php get_alt_menu_header();?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<!-- MAIN -->
<style>
    .prjkt-content {
        background-image: url(<?php echo esc_attr( get_option('single_prjkt_bg_img') );?>);
    }
</style>
        <div class="container-fluid clearfix text-center prjkt-content addvbottom40">
            <div class="row clearfix overlay"></div>
            <div class="row clearfix text-white swappable-container">
                <div class="clearfix addvtop20">
                    <p class="col-sm-2 col-xs-12 menu-btn "><a href="<?php $single_prjkts_parent = get_page_by_title(get_option('single_prjkt_back_button'))->ID;
      echo get_page_link($single_prjkts_parent);?>" data-toggle="tooltip" data-placement="top" title="Back To Prjkts" class="col-xs-6"> <span class="icon-eject nav-menu nav-menu-sm skinny-border center"></span></a>
    <a href="#" data-toggle="tooltip" data-placement="top" title="Back To Artsns" class="col-xs-6 back-to-artsn"> <span class="icon-reply nav-menu nav-menu-sm skinny-border center"></span></a>
                    </p>
                <!--AJAX Should start swap here-->
                <p class="col-sm-8 col-xs-12 lead-title artsn-menu"><?php
        echo esc_attr( get_option('single_prjkt_header_text') ); ?></p></div>
        <?php 
/*  get all custom fields, loop through them and load the field object because this should dynamically happen OOP style so if more content is added later and it's greater then 5, this code won't have to be rewritten
*/

/*
//Container Array for each the artsns contents
$vocalist_contents = array();
$producer_contents = array();
$songwriter_contents = array();
//Container for each artsns contents descriptions
$vocalist_contents_description = array();
$producer_contents_description = array();
$songwriter_contents_description = array();


    $fields = get_fields();
    if( $fields )
    {
        //Will iterate through all teh fields and split the information
        foreach( $fields as $field_name => $value )
        {       
            //echo $field_name, "\n";
            //If it's a vocalist match pushes the content to its array
            if (preg_match("/^vocalist_content_\d$/", $field_name) == 1)
            {
                array_push($vocalist_contents, $field_name );}
            //If it's a vocalist description match pushes the content to its array
            elseif (preg_match("/^vocalist_content_description_\d$/", $field_name) == 1)
            {
      array_push($vocalist_contents_description, $field_name);}
                
                
            //If it's a producer match pushes the content to its array
            elseif (preg_match("/^producer_content_\d$/", $field_name) == 1)
            {
                array_push($producer_contents, $field_name);}
            //If it's a producer description match pushes the content to its array
            elseif (preg_match("/^producer_content_description_\d$/", $field_name) == 1)
            {
      array_push($producer_contents_description, $field_name);}    
              
                
            //If it's a songwriter match pushes the content to its array    
            elseif (preg_match("/^songwriter_content_\d$/", $field_name) == 1)
            {
                array_push($songwriter_contents, $field_name);}
                    //If it's a producer description match pushes the content to its array
            elseif (preg_match("/^songwriter_content_description_\d$/", $field_name) == 1)
            {
      array_push($songwriter_contents_description, $field_name);}   
            
        //Sort all contents properly
        sort($vocalist_contents);
        sort($vocalist_contents_description);
        sort($producer_contents);
        sort($producer_contents_description);
        sort($songwriter_contents);
        sort($songwriter_contents_description);
                    
        }
    }
$current_field_selected_content = array();  $current_field_selected_content_descriptions = array(); 

//$current_field_selected_content = $vocalist_contents;
//echo count($current_field_selected_content);
*/

/*foreach ($vocalist_contents_description as $key => $val) {
    echo $key.  " = " . $val . "\n";
}*/
        ?><div class="artsn-menu clearfix">
            <?php get_template_part('single-allprjkts-artsn');?>
        </div>
                
        </div>
             
    </div>


	<!--<h2><?php //the_title(); ?></h2>-->
	
	<?php //the_content(); ?>			

	<?php //comments_template( '', true ); ?>

<?php endwhile; ?>

<?php get_footer(); ?>