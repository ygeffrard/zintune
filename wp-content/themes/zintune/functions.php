<?php
	/**
	 * 
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * 
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	//require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

add_theme_support('post-thumbnails');


	/* ========================================================================================================================
	Actions and Filters	======================================================================================================================== */
add_filter('show_admin_bar', '__return_false');
//Links all post thumbnails to post link
//add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );

//Removes annoying <p> and <br> that Wordpress generates
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

add_action('wp_enqueue_scripts', 'theme_scripts');
add_action( 'wp_enqueue_scripts', 'bootstrap' );
add_action( 'wp_enqueue_scripts', 'main_scripts' );

/*
=============APPEARANCE OPTIONS============
*/

add_action( 'init', 'register_my_menus' );
//add_action( 'init', 'prjkts');
add_action( 'init', 'register_prjkts_taxonomies');
//add_action( 'init', 'register_artsns_taxonomies');
add_action( 'init', 'all_metaboxes' );
add_action( 'admin_init', 'register_mysettings' );
/*
=============ADMIN-MENU OPTIONS============
*/
add_action( 'admin_menu', 'all_theme_menu' );


/*
=============AJAX FUNCTIONS OPTIONS============
*/
add_action( 'wp_ajax_single_prjkt_play', 'single_prjkt_play_callback' );
add_action( 'wp_ajax_nopriv_single_prjkt_play', 'single_prjkt_play_callback' );
add_action( 'wp_ajax_single_prjkt_artsn', 'single_prjkt_artsn_callback' );
add_action( 'wp_ajax_nopriv_single_prjkt_artsn', 'single_prjkt_artsn_callback' );


/*
=============WIDGET FUNCTIONS===============
*/


/**
 * Register our sidebars and widgetized areas.
 *
 */

add_action( 'widgets_init', 'arphabet_widgets_init' );
add_action( 'widgets_init', 'register_foo_widget' );



/*
================THEME WIDGETS===================
*/


function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Left Footer',
		'id'            => 'left_footer'
	) );

}
// register Social_Widget widget
function register_foo_widget() {
    register_widget( 'Social_Widget' );
}
//Overrides embedded wordpress 'WP_Widget'
class Social_Widget extends WP_Widget {
    
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'social_widget', // Base ID
			__( 'Social Network Footer', 'text_domain' ), // Name
			array( 'description' => __( 'A Zintune Social Footer Widget', 'text_domain' ), ) // Args
		);
	}
    
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        //Global variables
        $fb_string = 'facebook_link';
        $tw_string = 'twitter_link';
        $ig_string = 'instagram_link';
        $yt_string = 'youtube_link';
		echo '<ul class="list-inline nav-justified text-center h0 socials text-white">';
		if ( ! empty( $instance[$fb_string] ) ) {
			echo '<li><a href="'.apply_filters( 'widget_title', $instance[$fb_string] ).'"><p class="icon-facebook-1 facebook center inverse"> </p></a></li>';
		}
        if ( ! empty( $instance[$tw_string] ) ) {
			echo '<li><a href="'.apply_filters( 'widget_title', $instance[$tw_string] ).'"><p class="icon-twitter-1 twitter center inverse"> </p></a></li>';
		}
        if ( ! empty( $instance[$ig_string] ) ) {
			echo '<li><a href="'.apply_filters( 'widget_title', $instance[$ig_string] ).'"><p class="icon-instagram instagram center inverse"> </p></a></li>';
		}
        if ( ! empty( $instance[$yt_string] ) ) {
			echo '<li><a href="'.apply_filters( 'widget_title', $instance[$yt_string] ).'"><p class="icon-youtube-play youtube center inverse"> </p></a></li>';
		}
		echo '</ul>';
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form ($instance) {
        //Global variables
        $fb_string = 'facebook_link';
        $tw_string = 'twitter_link';
        $ig_string = 'instagram_link';
        $yt_string = 'youtube_link';
        //Sets each link for each social networks
		$fb_link = ! empty( $instance[$fb_string] ) ? $instance[$fb_string] : __( '', 'text_domain' );
        $tw_link = ! empty( $instance[$tw_string] ) ? $instance[$tw_string] : __( '', 'text_domain' );
        $ig_link = ! empty( $instance[$ig_string] ) ? $instance[$ig_string] : __( '', 'text_domain' );
        $yt_link = ! empty( $instance[$yt_string] ) ? $instance[$yt_string] : __( '', 'text_domain' );
		?>

		<p>
            <?php 
        
        /*  Examples Pararmeters for create_social_input function
            $social_id = 'facebook_link'; 
            $social_name = 'Facebook Link';
            $social_main_class = 'icon-facebook-1 facebook';
            $social_class = 'center inverse'; 
            $social_link = $fb_link;
        */
            $social_class = 'center inverse';
        
            ?>
             <!--Facebook Link Input-->
		<label for="<?php echo $this->get_field_id( $fb_string); ?>"><?php _e( 'Facebook Link' ); ?></label> 
		<input class="widefat" name="<?php echo $this->get_field_name( $fb_string ); ?>" type="text" value="<?php echo esc_attr( $fb_link ); ?>">
           
         <!--Twitter Link Input-->
		<label for="<?php echo $this->get_field_id( $tw_string ); ?>"><?php _e( 'Twitter Link' ); ?></label> 
		<input class="widefat" name="<?php echo $this->get_field_name( $tw_string ); ?>" type="text" value="<?php echo esc_attr( $tw_link ); ?>">
            
         <!--Instagram Link Input-->
		<label for="<?php echo $this->get_field_id( $ig_string ); ?>"><?php _e( 'Instagram Link' ); ?></label> 
		<input class="widefat" name="<?php echo $this->get_field_name( $ig_string ); ?>" type="text" value="<?php echo esc_attr( $ig_link ); ?>">
            
        <!--Youtube Link Input-->
		<label for="<?php echo $this->get_field_id( $yt_string ); ?>"><?php _e( 'Youtube Link' ); ?></label> 
		<input class="widefat"  name="<?php echo $this->get_field_name( $yt_string ); ?>" type="text" value="<?php echo esc_attr( $yt_link ); ?>">
    </p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
        //Global variables
        $fb_string = 'facebook_link';
        $tw_string = 'twitter_link';
        $ig_string = 'instagram_link';
        $yt_string = 'youtube_link';
		$instance = array();
		$instance[$fb_string] = ( ! empty( $new_instance[$fb_string] ) ) ? strip_tags( $new_instance[$fb_string] ) : '';
        $instance[$tw_string] = ( ! empty( $new_instance[$tw_string] ) ) ? strip_tags( $new_instance[$tw_string] ) : '';
        $instance[$ig_string] = ( ! empty( $new_instance[$ig_string] ) ) ? strip_tags( $new_instance[$ig_string] ) : '';
        $instance[$yt_string] = ( ! empty( $new_instance[$yt_string] ) ) ? strip_tags( $new_instance[$yt_string] ) : '';

		return $instance;
	}

} // class Foo_Widget


	//add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	//add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */


	/* ========================================================================================================================
	
	THEME Scripts
	
	======================================================================================================================== */



	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * 
	 */

	/*function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}*/	

/**Loads latest JQuery with Fallback
https://roots.io/use-the-latest-jquery-with-wordpress/
**/
function theme_scripts() {
  wp_deregister_script('jquery'); // Remove WordPress core's jQuery
    //Registers Google's cdn version
  wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', false, null, false);
    
    
  add_filter('script_loader_src', 'theme_jquery_local_fallback', 10, 2);
    
}
function theme_jquery_local_fallback($src, $handle) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-1.10.2.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }
  return $src;
}

/**Loads Bootstrap locally**/
    function bootstrap() {
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), null, true );
        wp_register_script( 'mobile-swipe-script', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js', array( 'jquery' ), null, true );
        
 
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'bootstrap-script' );
    wp_enqueue_script( 'mobile-swipe-script' );
}


/**Loads MailChimp Remotely needs to go in add scripts**/
    /*function load_mailchimp() {
        wp_enqueue_style( 'mailchimp', get_template_directory_uri() . '/css/bootstrap.min.css' );
        //Registers Google's cdn version
        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', false, null, false);
        
    wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), null, true );
 
 
 
    // For either a plugin or a theme, you can then enqueue the script:
    
    <!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. *//*
</style>
<div id="mc_embed_signup">
<form action="//midnightentmusic.us6.list-manage.com/subscribe/post?u=60f04e225dc6a7f399147c157&amp;id=95d0bf0fcc" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	
<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_60f04e225dc6a7f399147c157_95d0bf0fcc" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
}*/

/**Added Scripts Goes Here in this format**/
    function main_scripts() {
    //main js file
    wp_register_script( 'main_script', get_template_directory_uri() . '/js/main.js', false, null, true);
    //MailChimp Plugin
    //wp_register_script('mailchimp', '//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js');  
/*
=====For either a plugin or a theme, you can then enqueue the script:========
*/
    
    wp_enqueue_script( 'main_script' );
    
    wp_enqueue_script( 'mailchimp' );    
        
  

/*
=============AJAX CONTENTS, LOCALIZE SCRIPT PREPARATION OPTIONS============
*/
    /*  get all custom fields, loop through them and load the field object because this should dynamically happen OOP style so if more content is added later and it's greater then 5, this code won't have to be rewritten
*/

    //Container Array for each the artsns contents
    $vocalist_contents = array();
    $producer_contents = array();
    $songwriter_contents = array();
    //Container for each artsns contents descriptions
    $vocalist_contents_description = array();
    $producer_contents_description = array();
    $songwriter_contents_description = array();
    //URLS for photo
    $vocalist_photo;
    $producer_photo;
    $songwriter_photo;

    $fields = get_fields();
    if( $fields )
    {
        //Will iterate through all teh fields and split the information
        foreach( $fields as $field_name => $value )
        {       
            //echo $field_name, "\n";
            //If it's a vocalist photo match pushes the content to its array
            if (preg_match("/^vocalist_photo/", $field_name) == 1)
            {
                $vocalist_photo = get_field($field_name);
            }
            //If it's a vocalist match pushes the content to its array
            if (preg_match("/^vocalist_content_\d$/", $field_name) == 1)
            {
                array_push($vocalist_contents, $field_name);}
            //If it's a vocalist description match pushes the content to its array
            elseif (preg_match("/^vocalist_content_description_\d$/", $field_name) == 1)
            {
      array_push($vocalist_contents_description, $field_name);}

            //If it's a vocalist photo match pushes the content to its array
            if (preg_match("/^producer_photo/", $field_name) == 1)
            {
                $producer_photo = get_field($field_name);}
            //If it's a producer match pushes the content to its array
            elseif (preg_match("/^producer_content_\d$/", $field_name) == 1)
            {
                array_push($producer_contents, $field_name);}
            //If it's a producer description match pushes the content to its array
            elseif (preg_match("/^producer_content_description_\d$/", $field_name) == 1)
            {
      array_push($producer_contents_description, $field_name);}    

            
                //If it's a vocalist photo match pushes the content to its array
                if (preg_match("/^songwriter_photo/", $field_name) == 1)
                {
                    $songwriter_photo = get_field($field_name);}
                //If it's a songwriter match pushes the content to its array    
                elseif (preg_match("/^songwriter_content_\d$/", $field_name) == 1)
                {
                    array_push($songwriter_contents, $field_name);}
                        //If it's a producer description match pushes the content to its array
                elseif (preg_match("/^songwriter_content_description_\d$/", $field_name) == 1)
                {
          array_push($songwriter_contents_description, $field_name);}   
            }

     /********CLEANUPS OF YOTUBE / IMAGES********/
            //Image cleaned up Div
    function if_img_tag($content_passed){
        $regex_img = '/(([a-zA-Z]+\:\/\/)*([a-zA-Z]{2,3}\.)*)*[a-zA-Z]+\.[a-zA-Z]{2,3}\/([\w-_]+\/)*[\w-_]+\.(jpg|jpeg|png|bmp|svg)/';
        
        //if it exist inside the content passed
        if(preg_match($regex_img, $content_passed, $regex_img_match)) {
            
            //preg_replace( $regex_img, "$0", $content_passed);
            //print_r($regex_img_match);
            //echo $content_passed;
        //Puts it all within the responsive div frame
            $cleaned_up_img_tag[0] = 
            "<div class=\"img-container\" style=\"background-image:url(".$regex_img_match[0].")\"></div>";
            //echo $cleaned_up_img_tag;
            //$cleaned_up_img_tag[1] = $regex_img_match[0];
            $cleaned_up_img_tag[1] =  $cleaned_up_img_tag[0];
            return $cleaned_up_img_tag;
            
        }
        else{
            return false;
        }    
    }

    //Returns Youtube cleaned up iFrame Bootstraped if it is a valid youtube URL
    function if_youtube_iframe_bootstrap($content_passed){
        $regex_youtube = "/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/";

        //if it exist inside the content passed
        if(preg_match($regex_youtube, $content_passed, $regex_youtube_match)){
    
            $youtube_video_id = $regex_youtube_match[2];
            //print_r($regex_youtube_match)
        //Just get the youtube ID of the first one and it will be the second match item in the array

        //Puts it all into a responsive iFrame
        $cleaned_up_youtube_iframe[0] = 
            '<iframe width="810" height="500" frameborder="0"  src="http://www.youtube.com/embed/'.$youtube_video_id.'?showinfo=0&controls=1&rel=0&theme=dark&modestbranding=1&fs=1&color=white&autohide=1" ></iframe>';
            
            $cleaned_up_youtube_iframe[1] = ' <iframe scrolling="no" frameborder="0" src="http://www.youtube.com/embed/'.$youtube_video_id.'?rel=0&amp;controls=0&amp;showinfo=0"></iframe>';
            return $cleaned_up_youtube_iframe;
            
        }
        else{
            return false;
        }
    }

    //Return Youtube cleaned up iFrame if it is valid Youtube URL
    function if_youtube_iframe($content_passed){
        $regex_youtube = "/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/";

        //if it exist inside the content passed
        if(preg_match($regex_youtube, $content_passed)){
        //Just get the youtube ID
        preg_replace( $regex_youtube, "$2", $content_passed);
        //Puts it all into a responsive iFrame
        $cleaned_up_youtube_iframe[0] = 
            '<iframe width="810" height="500" frameborder="0"  src="http://www.youtube.com/embed/'.$content_passed.'?showinfo=0&controls=1&rel=0&theme=dark&modestbranding=1&fs=1&color=white&autohide=1" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; max-width: 810px; max-height: 500px;"></iframe>';
        $cleaned_up_youtube_iframe[1] = ' http://www.youtube.com/embed/'.$content_passed.'?rel=0&amp;controls=0&amp;showinfo=0';
            
            return $cleaned_up_youtube_iframe;
        }
        else{
            return $content_passed;
        }
    }
        
        //Returns the proper tags whether it's youtube or an image, if youtube will return an iFrame, if image will return the div tag
        function return_proper_tag($content_passed){
                 $check_if_youtube_result = if_youtube_iframe_bootstrap($content_passed); 
                if($check_if_youtube_result){
                    return $check_if_youtube_result;
                }
            //Decide to else this because no need to continue if we found that it's a youtube video
                else{
                    $check_if_img_result = if_img_tag($content_passed); 
                    if ($check_if_img_result) {
                        
                        return $check_if_img_result;
                    }
                    else{
                        //return $content_passed;
                        return $content_passed;
                    }
                }
        }
        
        
        //We need the values for arrays and not the keys that access them so this functions gets that for the contents only
        function get_all_field_values_contents($curr_array){
            $temp_array = array();
            foreach($curr_array as $curr_value){
                 
                 //Gets the values user typed in there
                 $curr_value = get_field($curr_value);
                 //Return the proper tag whether an image or youtube iframe
                 $curr_value = return_proper_tag($curr_value);
                 array_push($temp_array, $curr_value );
            }
            return $temp_array;
        }
        //We need the values for arrays and not the keys that access them so this functions gets that for the contents descriptions only
        function get_all_field_values_descriptions(&$curr_array){
            $temp_array = array();
            foreach($curr_array as $curr_value){

                 array_push($temp_array, get_field($curr_value) );
            }
            return $temp_array;
        }    
        
        
        
        
        //Sort all contents properly
        sort($vocalist_contents);
        sort($vocalist_contents_description);
        sort($producer_contents);
        sort($producer_contents_description);
        sort($songwriter_contents);
        sort($songwriter_contents_description);
        
        //Places their contents instead of their values
        $vocalist_contents = get_all_field_values_contents( $vocalist_contents);
        $vocalist_contents_description = get_all_field_values_descriptions($vocalist_contents_description);
        $producer_contents = get_all_field_values_contents($producer_contents);
        $producer_contents_description = get_all_field_values_descriptions($producer_contents_description);
        $songwriter_contents = get_all_field_values_contents($songwriter_contents);
        $songwriter_contents_description = get_all_field_values_descriptions($songwriter_contents_description);
    }  

    

    

/*
==================== LOCALIZED SCRIPTS ================
*/  
        
    // Gets the localized so js external files can access this    
    $datasToBePassed = array(
    "ajaxurl" => admin_url('admin-ajax.php'),
    //introdutions
    "artsn_original_intro" => esc_attr( get_option('single_prjkt_header_text') ),    
    "vocalist_intro" => get_field('vocalist_intro'),
    "producer_intro" =>        get_field('producer_intro'),
    "songwriter_intro" =>     get_field('songwriter_intro'),
    //contents, set in the 'functions.php'
    "vocalist_photo" => $vocalist_photo,
    "producer_photo" => $producer_photo,
    "songwriter_photo" => $songwriter_photo,
    //contents, set in the 'functions.php'
    "vocalist_contents" => $vocalist_contents,
    "producer_contents" => $producer_contents,
    "songwriter_contents" => $songwriter_contents,
    //descriptions set in the 'functions.php'
    "vocalist_contents_description" => $vocalist_contents_description,
    "producer_contents_description" => $producer_contents_description,
    "songwriter_contents_description" => $songwriter_contents_description
);
    wp_localize_script( 'main_script', 'php_vars', $datasToBePassed );
        
}

//Registers menus into WP
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}



/*
=============REGISTER SETTINGS ==============
*/
/*
    Function that registes the settings on the 'Theme Options' page
*/
function register_mysettings() {
    $group_1_option = 'theme_options_group';
	//register our settings
    register_setting( $group_1_option, 'logo_header_img' );
    register_setting( $group_1_option, 'copyright_company' );
	register_setting( $group_1_option, 'single_prjkt_bg_img' //'sanitize' 
);
	register_setting( $group_1_option, 'single_prjkt_header_text' );
    register_setting( $group_1_option, 'single_prjkt_vocalist_title' );
    register_setting( $group_1_option, 'single_prjkt_producer_title' );
    register_setting( $group_1_option, 'single_prjkt_songwriter_title' );
    
    register_setting( $group_1_option, 'single_prjkt_back_button' );
    register_setting( $group_1_option, 'single_artsn_back_button' );
    register_setting( $group_1_option, 'single_prjkt_ajax_loader_text' );
}
/**
 * Sanitize each setting field as needed
 *
 * @param array $input Contains all settings fields as array keys
 */
function sanitize( $input )
{
    $new_input = array();
    if( isset( $input['single_prjkt_bg_img'] ) )
        $new_input['single_prjkt_bg_img'] = sanitize_text_field( $input['single_prjkt_bg_img'] );

    if( isset( $input['single_prjkt_header_text'] ) )
        $new_input['single_prjkt_header_text'] = sanitize_text_field( $input['single_prjkt_header_text'] );

    return $new_input;
}

/*
================ADD EXTERNAL FILES===================
*/
$prjkts_slug = 'prjktsdashboard';
$theme_options_slug = 'theme-options';
$shortcodes_slug = 'shortcodes';
$metabox_slug = 'metaboxes';
$customnav_slug = 'custom-nav';

get_template_part($prjkts_slug); //Prjkt Dashboard
get_template_part($theme_options_slug); //Theme Options
get_template_part($shortcodes_slug); //Shortcodes
get_template_part($metabox_slug); //Metaboxes
get_template_part($customnav_slug); //Nav Walker to 


/*
================ALTERNATE MENU HEADER===================
*/
function get_alt_menu_header(){
    get_template_part('alt-menu-header');
}




/*
================AJAX CALLBACKS===================
*/
//AJAX single prjkt
function single_prjkt_play_callback(){
    
    get_template_part('single-allprjkts-play');
    wp_die();
}
function single_prjkt_artsn_callback(){
    
    get_template_part('single-allprjkts-artsn');
    wp_die();
}



/*
==============ADVANCE CUSTOM FIELDS===================
*/
if(function_exists("register_field_group"))
{
    //Text for all instructions
    $artsn_content_instructions = 'Place the link to the content here. You can embed videos or photos.';
    //
    $artsn_description_placeholder = 'Please describe the current video or image above in 50 characters or less';
    $artsn_intro_max_length = 60;
    $artsn_description_max_length = 50;
    
    /*****AllArtsns******/
    register_field_group(array (
		'id' => 'acf_artsn_bio-section',
		'title' => 'Artsn Bio Section',
		'fields' => array (
			array (
				'key' => 'field_5531ec2945640',
				'label' => 'Artsn Bio Introduction',
				'name' => 'artsn_bio_intro_text',
				'type' => 'text',
				'instructions' => 'Please write one electrifying! sentence that generalize this Artsn\'s Bio',
				'required' => 0,
				'default_value' => '',
				'placeholder' => 'All about this artist',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_intro_max_length,
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'allartsns',
					'order_no' => 1,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				//0 => 'the_content',
			),
		),
		'menu_order' => 4,
	));
    
    
    /*****AllPrjkts*******/
    register_field_group(array (
		'id' => 'acf_songwriter-section',
		'title' => 'Songwriter Section',
		'fields' => array (
			array (
				'key' => 'field_5531eb1834530',
				'label' => 'Songwriter Photo',
				'name' => 'songwriter_photo',
				'type' => 'image',
				'instructions' => 'Please upload Songwriter photo here for this project',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
            array (
				'key' => 'field_5531eb1834530a',
				'label' => 'Songwriter Introduction',
				'name' => 'songwriter_intro',
				'type' => 'text',
                
				'instructions' => 'Please write one sentence that generalize this Songwriter\'s contribution',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'What has this Songwriter done for this project, in one sentence?',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_intro_max_length,
			),
            
			array (
				'key' => 'field_5531eb3134531',
				'label' => 'Songwriter Content 1',
				'name' => 'songwriter_content_1',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
                'required' => 1,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531eb313453b',
				'label' => '',
				'name' => 'songwriter_content_description_1',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
			array (
				'key' => 'field_5531eb6334532',
				'label' => 'Songwriter Content 2',
				'name' => 'songwriter_content_2',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531eb313453c',
				'label' => '',
				'name' => 'songwriter_content_description_2',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
			array (
				'key' => 'field_5531eb7b34533',
				'label' => 'Songwriter Content 3',
				'name' => 'songwriter_content_3',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531eb313453d',
				'label' => '',
				'name' => 'songwriter_content_description_3',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
			array (
				'key' => 'field_5531eb8334534',
				'label' => 'Songwriter Content 4',
				'name' => 'songwriter_content_4',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531eb313453e',
				'label' => '',
				'name' => 'songwriter_content_description_4',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
			array (
				'key' => 'field_5531eb8d34535',
				'label' => 'Songwriter Content 5',
				'name' => 'songwriter_content_5',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531eb313453f',
				'label' => '',
				'name' => 'songwriter_content_description_5',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'allprjkts',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 3,
	));
	register_field_group(array (
		'id' => 'acf_producer-section',
		'title' => 'Producer Section',
		'fields' => array (
			array (
				'key' => 'field_5531e91828a46',
				'label' => 'Producer Photo',
				'name' => 'producer_photo',
				'type' => 'image',
				'instructions' => 'Please upload Vocalist photo here for this project',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
            array (
				'key' => 'field_5531e91828a4a',
				'label' => 'Producer Introduction',
				'name' => 'producer_intro',
				'type' => 'text',
                
				'instructions' => 'Please write one sentence that generalize this Producer\'s contribution',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'What has this Produce done for this project, in one sentence?',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_intro_max_length,
			),
			array (
				'key' => 'field_5531e97728a47',
				'label' => 'Producer Content 1',
				'name' => 'producer_content_1',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'required' => 1,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531e97728a4b',
				'label' => '',
				'name' => 'producer_content_description_1',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
			array (
				'key' => 'field_5531ea1c28a49',
				'label' => 'Producer Content 2',
				'name' => 'producer_content_2',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531e97728a4c',
				'label' => '',
				'name' => 'producer_content_description_2',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
			array (
				'key' => 'field_5531ea3028a4b',
				'label' => 'Producer Content 3',
				'name' => 'producer_content_3',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531e97728a4d',
				'label' => '',
				'name' => 'producer_content_description_3',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
			array (
				'key' => 'field_5531ea4028a4d',
				'label' => 'Producer Content 4',
				'name' => 'producer_content_4',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531e97728a4e',
				'label' => '',
				'name' => 'producer_content_description_4',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
			array (
				'key' => 'field_5531ea5228a4e',
				'label' => 'Producer Content 5',
				'name' => 'producer_content_5',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531e97728a4f',
				'label' => '',
				'name' => 'producer_content_description_5',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'allprjkts',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 2,
	));
	register_field_group(array (
		'id' => 'acf_vocalist-section',
		'title' => 'Vocalist Section',
		'fields' => array (
			array (
				'key' => 'field_5531e7db16566',
				'label' => 'Vocalist Photo',
				'name' => 'vocalist_photo',
				'type' => 'image',
				'instructions' => 'Please upload Vocalist photo here for this project',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
            array (
				'key' => 'field_5531e7db1656a',
				'label' => 'Vocalist Introduction',
				'name' => 'vocalist_intro',
				'type' => 'text',
                
				'instructions' => 'Please write one sentence that generalize this Vocalist\'s contribution',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'What has this Vocalist done for this project, in one sentence?',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_intro_max_length,
			),
			array (
				'key' => 'field_5531e80d16567',
				'label' => 'Vocalist Content 1',
				'name' => 'vocalist_content_1',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'required' => 1,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531e80d1657b',
				'label' => '',
				'name' => 'vocalist_content_description_1',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
			array (
				'key' => 'field_5531e82316568',
				'label' => 'Vocalist Content 2',
				'name' => 'vocalist_content_2',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531e80d1657c',
				'label' => '',
				'name' => 'vocalist_content_description_2',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
			array (
				'key' => 'field_5531e83616569',
				'label' => 'Vocalist Content 3',
				'name' => 'vocalist_content_3',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531e80d1657d',
				'label' => '',
				'name' => 'vocalist_content_description_3',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
			array (
				'key' => 'field_5531e84c1656b',
				'label' => 'Vocalist Content 4',
				'name' => 'vocalist_content_4',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531e80d1657e',
				'label' => '',
				'name' => 'vocalist_content_description_4',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
			array (
				'key' => 'field_5531e85f1656d',
				'label' => 'Vocalist Content 5',
				'name' => 'vocalist_content_5',
				'type' => 'wysiwyg',
				'instructions' => $artsn_content_instructions,
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
            array (
				'key' => 'field_5531e80d1657f',
				'label' => '',
				'name' => 'vocalist_content_description_5',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'placeholder' => $artsn_description_placeholder,
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => $artsn_description_max_length,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'allprjkts',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 1,
	));
}

/*
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_vocalist-section',
		'title' => 'Vocalist Section',
		'fields' => array (
			array (
				'key' => 'field_553a769cdbbdb',
				'label' => 'Vocalist Introduction',
				'name' => 'vocalist_intro',
				'type' => 'text',
				'instructions' => 'Please write one sentence that generalize this Artist\'s contribution',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'What has this vocalist do, in one sentence?',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => 60,
			),
			array (
				'key' => 'field_5531e85f1656d',
				'label' => 'Vocalist Content 5',
				'name' => 'vocalist_content_5',
				'type' => 'wysiwyg',
				'instructions' => 'Place the link to the content here. You can embed videos or photos.',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_553a7786dbbdd',
				'label' => 'Vocalist Content Description 5',
				'name' => 'vocalist_content_description_5',
				'type' => 'text',
				'instructions' => 'Please describe the current video or image above',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'allprjkts',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 1,
	));
}

*/


/*function artsn_content_return(){
    
}*/

/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 * @return void
	 */
	/*function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}*/