<?php
	/**
	 * Starkers functions and definitions
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

/*
=============ADMIN-MENU OPTIONS============
*/
add_action( 'admin_menu', 'all_theme_menu' );

	//add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	//add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
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
    wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
 
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'bootstrap-script' );
}

/**Added Scripts Goes Here in this format**/
    function main_scripts() {
    wp_register_script( 'main_script', get_template_directory_uri() . '/js/main.js', false, null, false);
        
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'main_script' );
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



//Additional Theme Slugs
$prjkts_slug = 'prjktsdashboard';
$theme_options_slug = 'themeoptions';
$shortcodes_slug = 'shortcodes';
get_template_part( $prjkts_slug );
//get_template_part( $theme_options_slug );
//get_template_part( $shortcodes_slug);






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