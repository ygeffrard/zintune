<?php function all_theme_menu() {
    //include_once 'prjktsdashboard.php';
    /*    
    2 - Dashboard
    4 - Separator
    5 - Posts
    10 - Media
    15 - Links
    20 - Pages
    25 - Comments
    59 - Separator
    60 - Appearance
    65 - Plugins
    70 - Users
    75 - Tools
    80 - Settings
    99 - Separator
    */
    
    /*$page_title='Theme Options';
    $menu_title=$page_title; 
    $capability='manage_options';
    $menu_slug= 'theme-options';
    $function= 'theme_options';
    $icon_url='';
    $position=60.1;
    
    $s1page_title='All Prjkts';
    $s1menu_title=$s1page_title; 
    $s1capability='manage_options';
    $s1menu_slug= 'all-prjkts';
    $s1function= "all_prjkts";
    $s1parent_slug=$menu_slug;
    $s1icon_url='';
    
    $s2page_title='All Artsns';
    $s2menu_title=$s2page_title; 
    $s2capability='manage_options';
    $s2menu_slug= 'all-artsns';
    $s2function= "all_artsns";
    $s2parent_slug=$menu_slug;
    $s2icon_url='';*/
    
    
	//add_options_page( 'My Prjkts', 'My Prjkts', 'manage_options', 'my-prjkts', 'prjkts_options' );
    
    
    //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    //add_submenu_page( $s1parent_slug, $s1page_title, $s1menu_title, $s1capability, $s1menu_slug, $s1function);
    //add_submenu_page( $s2parent_slug, $s2page_title, $s2menu_title, $s2capability, $s2menu_slug, $s2function);
    //add_submenu_page( 'my-top-level-handle', 'Page title', 'Sub-menu title', 'manage_options', 'my-submenu-handle', 'my_magic_function');
    //THEME OPTIONS SETTINGS
    $to_page_title='Theme Options';
    $to_menu_title=$to_page_title; 
    $to_capability='manage_options';
    $to_menu_slug= 'theme-options';
    $to_function= 'theme_options';
    $to_icon_url='';
    $to_position=61.1;
    
    //SHORTCODES SETTINGS
    $sm_page_title='Shortcodes & Manual';
    $sm_menu_title=$sm_page_title; 
    $sm_capability='manage_options';
    $sm_menu_slug= 'shortcodes-manual';
    $sm_function= 'shortcodes_manual';
    $sm_icon_url='';
    $sm_position=62.2;
    add_menu_page($to_page_title, $to_menu_title, $to_capability, $to_menu_slug, $to_function, $to_icon_url, $to_position );
    add_menu_page($sm_page_title, $sm_menu_title, $sm_capability, $sm_menu_slug, $sm_function, $sm_icon_url, $sm_position );
}
/*
=======================THEME OPTIONS======================
*/
function theme_options(){
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
        
            echo '<div>';
            echo '<h1 class="lead-title">Welcome To ZinTune Theme Options</h1></div>';
            
    
    /*add_action('add_meta_boxes', function (){
        //css id, title, callback function, posttype, priority, callback functions args
        //add_meta_box('bg-img', 'Background Image URL', 'add_prjkt_content_bg_img', 'page');
        //add_meta_box('header-text', 'Header Text', 'add_prjkt_content_header_text', 'page');
        add_meta_box('artsnone-img', 'Artsn 1 Photo Image URL', 'add_artsnone_img', 'page');
        add_meta_box('artsnone-title', 'Artsn 1 Title', 'add_artsnone_text', 'page');
    });*/

    /*function add_prjkt_content_bg_img($post){
        $header_image_value = get_post_meta($post->ID, 'header_img', true);
        $header_img_out = '
        <p>
            <label for="add_header_img" >URL For Header Image</label>
<input type="text" class="widefat" name="header_img" id="header_img" placeholder="http://url.jpg" value="'. esc_attr__($header_image_value).'"/>
</p>';
        echo $header_img_out;
    }
    function add_prjkt_content_header_text($post){
        $header_text_value = get_post_meta($post->ID, 'header_text', true);
        $header_text_out = '
        <p>
            <label for="add_header_img" >Text Within Header Image</label>
<input type="text" class="widefat" name="header_text" id="header_text" placeholder="Type Text Here" value="'. esc_attr__($header_text_value).'"/>
</p>';
        echo $header_text_out;
    }*/
    ?>
    <div class="wrap">
    <h2>General Settings</h2>
    <form method="post" action="options.php">
        <?php settings_fields( 'theme_options_group' );  do_settings_sections( 'theme_options_group' ); ?>
        <table class="form-table">
            
            <tr>
                To Add/Change header logo just click on media and Height must be same pixels to function properly, also you can upload and replace 'logo.png' in the 'img' folder 
            </tr>
            
            <tr valign="top">
                <th scope="row">Logo Image Link for Header</th>
                <td><input type="text" class="widefat" name="logo_header_img" value="<?php echo esc_attr( get_option('logo_header_img') ); ?>" placeholder="http://img.jpg Past your image link here"/>
                </td>
            </tr>                
          
            <tr valign="top"><th>Copyright Information</th>
            <td><input type="text" class="widefat" name="copyright_company" value="<?php echo esc_attr( get_option('copyright_company') ); ?>" placeholder="Just type the Company or Owner name and 'All Rights Reserved', no need to add '© 2015', it will already be written for you"/></td>
            </tr>      
        </table>
        
        <br><br>
            
        <h2>Prjkts Single Page Settings</h2>
        <table class="form-table">
            <tr>
                Enter the URL to the image you want for individual project posts, and enter the text you want above the "vocalist, producer, songwriter" options as shown from the demo site
            </tr>
            
            <tr valign="top">
            <th scope="row">Background Image Link for Single Prjkts Posts</th>
            <td><input type="text" name="single_prjkt_bg_img" class="widefat" value="<?php echo esc_attr( get_option('single_prjkt_bg_img') ); ?>" placeholder="http://xyz.jpg Paste the background image link here"/></td>
            </tr>

            <tr valign="top">
            <th scope="row">Header Text for Single Prjkts Posts</th>
            <td><input type="text" class="widefat" name="single_prjkt_header_text" value="<?php echo esc_attr( get_option('single_prjkt_header_text') ); ?>" placeholder="Type the text you want shown here"/></td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Vocalist title for Single Prjkts Posts</th>
            <td><input type="text" class="widefat" name="single_prjkt_vocalist_title" value="<?php echo esc_attr( get_option('single_prjkt_vocalist_title') ); ?>" placeholder="Type the Vocalist title you want shown here"/></td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Producer title for Single Prjkts Posts</th> 
            <td><input type="text" class="widefat" name="single_prjkt_producer_title" value="<?php echo esc_attr( get_option('single_prjkt_producer_title') ); ?>" placeholder="Type the Producer title you want shown here"/></td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Songwriter Text for Single Prjkts Posts</th>
            <td><input type="text" class="widefat" name="single_prjkt_songwriter_title" value="<?php echo esc_attr( get_option('single_prjkt_songwriter_title') ); ?>" placeholder="Type the Songwriter title you want shown here"/></td>
            </tr>

            
            <tr valign="top">
            <th scope="row">Name of Page the (Back To Prjkts) Button should link to</th>
            <td><input type="text" class="widefat" name="single_prjkt_back_button" value="<?php echo esc_attr( get_option('single_prjkt_back_button') ); ?>" placeholder="Name of the page as it is typed in your Pages, if not is selected it will reload current page" /></td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Name of Page the (Back To Artsns) Button should link to</th>
            <td><input type="text" class="widefat" name="single_artsn_back_button" value="<?php echo esc_attr( get_option('single_artsn_back_button') ); ?>" placeholder="Name of the page as it is typed in your Pages, if not is selected it will reload current page" /></td>
            </tr>
            
            
            <tr valign="top">
            <th scope="row">Text for the AJAX Loader</th>
            <td><input type="text" class="widefat" name="single_prjkt_ajax_loader_text" value="<?php echo esc_attr( get_option('single_prjkt_ajax_loader_text') ); ?>" placeholder="Text that is shown when AJAX loader is shown, this happens while program is preparing for a session" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
    </div>
<?php
}