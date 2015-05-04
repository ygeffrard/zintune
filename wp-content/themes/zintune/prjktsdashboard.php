<?php


/*
================CUSTOM POSTS=================
*/
//Prjkts Section
$prjkts_post_type = 'allprjkts';
$prjkts_args = array(
        'labels' => array(
            'name' => __('All Prjkts'),
            'singular_name' => __('A Prjkt'),
            'add_new' => __('Add New Project'),
            'add_new_item' => __('Add New Project'),
            'edit_item' => __('Edit Project'),
            'new_item' => __('New Project'),
            'view_item' => __('View Project'),
            'search_items' => __('Search Projects'),
            'not_found' => __('No Prjkts found'),
            'not_found_in_trash' => __('No Prjkts found in Trash')
        ),
        'query_var' => 'allprjkts',
        'rewrite' => array(
            'slug' => 'prjkt'
        ),
        'public' => true,
        'menu_position' => 61.1,
        'supports' => array(
            'title',
            'thumbnail',
            'editor'
        )
);
register_post_type( $prjkts_post_type, $prjkts_args );

//Artsns Section
$artsns_post_type = 'allartsns';
$artsns_args = array(
    'labels' => array(
        'name' => 'All Artsns',
        'singular_name' => 'Artsn',
        'add_new' => 'Add New Artist',
        'add_new_item' => 'Add New Artist',
        'edit_item' => 'Edit Artist',
        'new_item' => 'New Artist',
        'view_item' => 'View Artist',
        'search_items' => 'Search Artist',
        'not_found' => 'No Artsns found',
        'not_found_in_trash' => 'No Artsns found in Trash'
    ),
    'query_var' => 'allartsns',
    'rewrite' => array(
        'slug' => 'artsn',
    ),
    'public' => true,
    'menu_position' => 61.2,
    'supports' => array(
            'title',
            'thumbnail',
            'editor'
    )
);

register_post_type( $artsns_post_type, $artsns_args );





function prjkts() {
    
}

/*
=================PRJKTS CATEGORIES=================
*/
function register_prjkts_taxonomies(){

    $prjkts_tax = array ();
    $prjkts_tax['producer'] = array (
        'hierarchical' => true,
        'query_var' => 'pjkts_producers',
        'rewrite' => array(
            'slug' => 'prjkts/producers'
        ),
        'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
        'labels' => array(
            'name' => __('All Producers'),
            'singular_name' => __('Producer'),
            'add_new' => __('Add New Producers'),
            'add_new_item' => __('Add New Producer'),
            'edit_item' => __('Edit Producer'),
            'new_item' => __('New Producer'),
            'view_item' => __('View Producer'),
            'search_items' => __('Search Producer')
        ),
    );
    $prjkts_tax['songwriter'] = array (
        'hierarchical' => true,
        'query_var' => 'pjkts_songwriters',
        'rewrite' => array(
            'slug' => 'prjkts/songwriters'
        ),
        'show_in_nav_menus'          => false,
        'labels' => array(
            'name' => __('All Songwriters'),
            'singular_name' => __('Songwriter'),
            'add_new' => __('Add New Songwriter'),
            'add_new_item' => __('Add New Songwriter'),
            'edit_item' => __('Edit Songwriter'),
            'new_item' => __('New Songwriter'),
            'view_item' => __('View Songwriter'),
            'search_items' => __('Search Songwriter')
            //,'parent_item' => __('All Producers'),
            //'parent_item_colon' => __('All Producers:')
        )
    );
    $prjkts_tax['vocalist'] = array (
        'hierarchical' => true,
        'query_var' => 'pjkts_vocalists',
        'rewrite' => array(
            'slug' => 'prjkts/vocalists'
        ),
        'show_in_nav_menus'          => false,
        'labels' => array(
            'name' => __('All Vocalists'),
            'singular_name' => __('Vocalist'),
            'add_new' => __('Add New Vocalist'),
            'add_new_item' => __('Add New Vocalist'),
            'edit_item' => __('Edit Vocalist'),
            'new_item' => __('New Vocalist'),
            'view_item' => __('View Vocalist'),
            'search_items' => __('Search Vocalist')
        )
    );
     /*$prjkts_tax['viewable_prjkts'] = array (
        'hierarchical' => true,
        'query_var' => 'viewable_prjkts',
        'rewrite' => array(
            'slug' => 'prjkts'
        ),
        'show_in_nav_menus'          => true,
        'labels' => array(
            'name' => __('Viewable Prjkts Group'),
            'singular_name' => __('Viewable Prjkt Group'),
            'add_new' => __('Add New Viewable Prjkt Group'),
            'add_new_item' => __('Add New Viewable Prjkt Group'),
            'edit_item' => __('Edit Viewable Prjkt Group'),
            'new_item' => __('New Viewable Prjkt Group'),
            'view_item' => __('View Viewable Prjkt Group'),
            'search_items' => __('Search Viewable Prjkt Group'),
        )
    );*/
        
    //register_taxonomy('artsns', array('allprjkts'), $args);
    foreach($prjkts_tax as $name => $arr){
//register_taxonomy_for_object_type()
        register_taxonomy($name, array('allprjkts'), $arr);
    }
}


/*
=====================ARTSNS=======================
*/
function register_artsns_taxonomies(){    
    /*$artsns_tax['producer'] = array (
        'hierarchical' => true,
        'query_var' => 'artsns_producers',
        'rewrite' => array(
            'slug' => 'artsns/producers'
        ),
        'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
        'labels' => array(
            'name' => __('All Producers'),
            'singular_name' => __('Producer'),
            'add_new' => __('Add New Producers'),
            'add_new_item' => __('Add New Producer'),
            'edit_item' => __('Edit Producer'),
            'new_item' => __('New Producer'),
            'view_item' => __('View Producer'),
            'search_items' => __('Search Producer')     
        )
    );
    $artsns_tax['songwriter'] = array (
        'hierarchical' => true,
        'query_var' => 'artsns_songwriters',
        'rewrite' => array(
            'slug' => 'artsns/songwriters'
        ),
        'show_in_nav_menus'          => false,
        'labels' => array(
            'name' => __('All Songwriters'),
            'singular_name' => __('Songwriter'),
            'add_new' => __('Add New Songwriter'),
            'add_new_item' => __('Add New Songwriter'),
            'edit_item' => __('Edit Songwriter'),
            'new_item' => __('New Songwriter'),
            'view_item' => __('View Songwriter'),
            'search_items' => __('Search Songwriter')
        )
    );
    $artsns_tax['vocalist'] = array (
        'hierarchical' => true,
        'query_var' => 'artsns_vocalists',
        'rewrite' => array(
            'slug' => 'artsns/vocalists'
        ),
        'show_in_nav_menus'          => false,
        'labels' => array(
            'name' => __('All Vocalists'),
            'singular_name' => __('Vocalist'),
            'add_new' => __('Add New Vocalist'),
            'add_new_item' => __('Add New Vocalist'),
            'edit_item' => __('Edit Vocalist'),
            'new_item' => __('New Vocalist'),
            'view_item' => __('View Vocalist'),
            'search_items' => __('Search Vocalist')
        )
    );
    
    
    foreach($artsns_tax as $aname => $aarr){
//register_taxonomy_for_object_type()
            register_taxonomy($aname, array('allartsns'), $aarr);
    }*/
}



//Artsns Section
/*$artsns_post_type = 'AllArtsns';
$artsns_args = array(
    'labels' => array(
        'name' => 'All Artsns',
        'singular_name' => 'Artsn',
        'add_new' => 'Add New Artist',
        'add_new_item' => 'Add New Artist',
        'edit_item' => 'Edit Artist',
        'new_item' => 'New Artist',
        'view_item' => 'View Artist',
        'search_items' => 'Search Artist',
        'not_found' => 'No Artsns found',
        'not_found_in_trash' => 'No Artsns found in Trash'

    ),
    'query_var' => 'prjkts',
    'rewrite' => array(
        'slug' => 'movies/',
    ),
    'public' => true,
    'menu_position' => 61.2

);*/






/*foreach($prjkts_tax as $name => $arr){
        echo $name, "\n";
    //register_taxonomy_for_object_type()
        register_taxonomy($name, array($prjkts_post_type), $arr);
        echo $arr['query_var'], "\n";
}*/
//register_all_taxonomies($prjkts_tax);
//register_post_type( $artsns_post_type, $artsns_args );

function all_theme_menu() {
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
            <th scope="row">Text for the AJAX Loader</th>
            <td><input type="text" class="widefat" name="single_prjkt_ajax_loader_text" value="<?php echo esc_attr( get_option('single_prjkt_ajax_loader_text') ); ?>" placeholder="Text that is shown when AJAX loader is shown, this happens while program is preparing for a session" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
    </div>
<?php
}




//***********SHORTCODE******************
function shortcodes_manual() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
?>
<h1>Welcome To ZinTune</h1><h2>List of Shortcodes and other Manual Instructions</h2>

        <table class="form-table">
            <tr valign="top">
            <th scope="row"><h3>
                [whiteblock min_height="250" img_url="http://img.png" text="WriteHere" text_size_px="20" ] [/whiteblock]
                </h3></th>
            <th scope="row"> 
                <td class="widefat">
                    To Add a whiteblock just type the above, note that the img_url and min_height are optional, <br\> just makesure the min_height that you set in the whiteblock is greater than the img_url height, You can add a custom font-size for the content that's between the tag using "text_size_px"
                </td>
                </th>
            </tr>

            <tr valign="top">
            <th scope="row"><h3>
                [feature img_url="http://url" text="WriteHere"]
                </h3></th>
            <th scope="row"> 
                <td class="widefat">
                    To Add a darkened image block just type , note that the image is a must for this part to look nice
                </td>
                </th>
            </tr>
            
            <tr valign="top">
            <th scope="row"><h3>
                [featurebtn img_url="http://url" text="WriteHere" l_menu_txt="Left" l_menu_link="pagename" l_menu_description="About Left" r_menu_txt="Right"  r_menu_description="About Right" r_menu_link="pagename"]
                </h3></th>
            <th scope="row"> 
                <td class="widefat">
                    To Add a darkened image block just type , note that the image is a must for this part to look nice
                </td>
                </th>
            </tr>

            <tr valign="top">
                <th scope="row"><h3>
                [email text="GET ALL THE LATEST PRJKTS!" subtext="Singing up is important..."]
                </h3></th>
            <th scope="row"> 
                <td class="widefat">
                    To Add an Email block just type the text you want displayed at the top
                </td>
                </th>
            </tr>

            <tr valign="top">
                <th scope="row"><h3>
                [display_company logo="Y" nam="zintune" email="all@zintune.com" address="123 SomeStreet Suit 1A, Brooklyn, NY 10001" phone="+1(213)986-5866"]
                </h3></th>
            <th scope="row"> 
                <td class="widefat">
                    To add company information, if you want to enable the logo just put a 'Y' for logo as shown, if no "name" is set it will default to your blog name, the e-mail address that you it to be sent to, the adress and telephone number, for the address you can add a &#60;br\&#62; between the (address) and (city,state,zipcode) to seperate them by a line.
                </td>
                </th>
            </tr>

            <tr valign="top">
                <th scope="row"><h3>
                [display_left_footer text='Follow Us']
                </h3></th>
            <th scope="row"> 
                <td class="widefat">
                    This is used when you want to show the left footer widget, such as a social network, please be sure to set the correct widget in the panel ex.. 'the social network' if that's what you want displayed
                </td>
                </th>
            </tr>

            <tr valign="top">
                <th scope="row"><h3>
                [showall type="artsns" bg_img_url="http://gregmihalko.com/webpatterns/projects/geffrard/wp-content/uploads/2015/04/bg_gradient.jpg"]
                </h3></th>
            <th scope="row"> 
                <td class="widefat">
                    To set a page that displays all artisns you must set the type to be "artsns" or else it will default to show all "prjkts". You can also set the default image that shows up behind the display
                </td>
                </th>
            </tr>

            <tr valign="top">
                <th scope="row"><h3>
                [showall type="prjkts" bg_img_url="http://gregmihalko.com/webpatterns/projects/geffrard/wp-content/uploads/2015/04/bg_gradient.jpg"]
                </h3></th>
            <th scope="row"> 
                <td class="widefat">
                    To set a page that displays all prjkts you don\'t have to set the type to be anything and it will default to show all prjkts. You can also set the default image that shows up behind the display
                </td>
                </th>
            </tr>

            <tr valign="top">
                <th scope="row"><h3>
                [paragraph img_position="left" img_url="http://img.png"] Write Paragraph Here[/paragraph]
                </h3></th>
            <th scope="row"> 
                <td class="widefat">
                    To Add a nice looking paragraph just type the above in where it says 'Write Paragraph Here..', it's best if you copy and past this information to there, note that the img_url and and img_position are optional
                </td>
                </th>
            </tr>
    </table>
<?php
}

//Whiteblock that you can place image in, typicaly a logo
function addwhiteblock($atts, $content = null){
    $wb = shortcode_atts( array(
        'min_height' => '150',
        'img_url' => null,
        'logo_text' => null,
        'text_size_px' => null,
    ), $atts );
    $wb_min_height = $wb['min_height'];
    $wb_responsive_min_height = 0.6 * $wb_min_height;
    $wb_img_url = $wb['img_url'];
    $wb_logo_text = $wb['logo_text'];
    $wb_text = $content;
    $wb_text_size = $wb['text_size_px'];

    //echo $wb_min_height, "\n",
    //$wb_responsive_min_height, "\n", $wb_img_url, "\n";
    
$wb_out = '<div class="white-block';
        if($wb_min_height != 150){ $wb_out.= '" style="min-height: '.$wb_min_height.'px ';
        }
        $wb_out .= '">';
        
        if ($wb_img_url != null){
            $wb_out.='<div>
                <img class="img-200" src="'.$wb_img_url.'" />
                <p class="logo-section">'.$wb_logo_text.'</p>
                <p class="lead">'.$wb_text.'</p>
            </div>';
        }
        else if ($wb_text != null){
            $add_wb_style = ($wb_text_size != null) ? 'style="font-size:'.$wb_text_size.'px;"' : '';
           
                
            $wb_out.='<div style="height: 150px;">
                    <div class="container full-height" ><p class="lead center center-v" '.$add_wb_style.'>'.$wb_text.'</p></div>
            </div>';            
        }
        $wb_out .= '</div>';
    return $wb_out;
}
add_shortcode( 'whiteblock', 'addwhiteblock' );

//Block feature you can place an image, with a darken overlay and text centered in the middle
function addfeature($atts, $content = null){
    $feat = shortcode_atts( array(
        'img_url' => null,
        'text' => null
    ), $atts );
    $feat_url = $feat['img_url'];
    if(strpos($feat_url , 'wp-content') !== false
){ strstr($feat_url, 'wp-content');}
    $feat_text = $feat['text'];
    //echo $feat_url,"\n";
    $feat_out = '
        <div class="feature text-white fadeInBlock"  style="background-image: url('.$feat_url.');">
                <div class="overlay overlay60"></div>
                <div class="container full-height">
                    <p class="col-md-8 lead-title center center-v">'.$feat_text.'</p>
                </div>
            </div>';
    return $feat_out;
}
add_shortcode( 'feature', 'addfeature' );

//Adds Paragraph format with an image on the left or right of text paragraph
function addparagraph($atts, $content = null){
    $ap = shortcode_atts( array(
        'img_position' => null,
        'img_url' => null
    ), $atts );
    $ap_img_postion = strtolower($ap['img_position']);
    $ap_img_url = $ap['img_url'];
    
    
    
    $ap_out = '<div class="row clearfix addvbottom20 addvtop20 fadeInBlock">';
    //IF image is left and Text is right
    if($ap_img_postion === 'left'){
        $ap_out .='<div class="col-sm-4">
                        <div class="artsn-photo-display center">
                            <div class="artsn-photo" style="background-image:url('.$ap_img_url.')"></div>
                            <div class="overlay overlay-cp"></div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-sm-offset-1 artsn-text">'.$content.'
    </div>';
    }
    //IF image is right and Text is left
    elseif ($ap_img_postion === 'right'){
        $ap_out .= '
            <div class="col-sm-7 artsn-text">'.$content.'
        </div>
    <div class="col-sm-4">
                        <div class="artsn-photo-display center">
                            <div class="artsn-photo" style="background-image:url('.$ap_img_url.')"></div>
                            <div class="overlay overlay-cp"></div>
                        </div>
                    </div>
        
        ';
    }
    //IF image is big, no text
    elseif ( ($ap_img_postion === 'big') || (($ap_img_postion == null) && $ap_img_url!=null && $content == null) ){
        $ap_out.='
            <div class="col-sm-12 artsn-text">
                        <div class="artsn-photo-display artsn-photo-display-full center">
                            <div class="artsn-photo" style="background-image:url('.$ap_img_url.')"></div>
                        </div>
                    </div>
        ';
    }
    //Else text only
    else{
        $ap_out.='
            <div class="col-sm-12 artsn-text">
                '.$content.'
            </div>
        ';
    }
    $ap_out .= '</div>';
    return $ap_out;
}
add_shortcode( 'paragraph', 'addparagraph' );


//Adds the feature buttons that you see on the home screen
function addfeaturebtn($atts, $content = null){
    $featbtn = shortcode_atts( array(
        'img_url' => null,
        'l_menu_txt' => null,
        'l_menu_description' => null,
        'l_menu_page' => '#',
        'r_menu_txt' => null,
        'r_menu_description' => null,
        'r_menu_page' => '#'
    ), $atts );
    //Gets the url to the background image
    $featbtn_url = $featbtn['img_url'];
    //Strips the long "http://.. to wp-content for faster load
    if(strpos($featbtn_url, 'wp-content') !== false
){ strstr( $featbtn_url, 'wp-content');}
    
    //The text of the buttons to be displayed
    $featbtn_left =$featbtn['l_menu_txt'];
    $featbtn_right =$featbtn['r_menu_txt'];
    
    //The text of the descriptions that is displayed beneath the buttons
    $featbtn_left_desc =$featbtn['l_menu_description'];
    $featbtn_right_desc =$featbtn['r_menu_description'];
    
    //Get IDs of the pages so function can work 
    $featbtn_left_id = get_page_by_title($featbtn['l_menu_page'])->ID;
    $featbtn_right_id = get_page_by_title($featbtn['r_menu_page'])->ID;

    //Converts the ids to the actual http links for the pages
    $featbtn_left_link = get_page_link($featbtn_left_id);
    $featbtn_right_link = get_page_link($featbtn_right_id);
    
    //echo $feat_url,"\n";
    
    $featbtn_out = '
        <div class="feature-btn" style="background-image: url('.$featbtn_url.');">
                <div class="overlay"></div>
                <div class="container-fluid full-height"> 
                    <a href="'.$featbtn_left_link.'" class="col-xs-6">
                        <p class="btn-lg">'.$featbtn_left.'</p>
                        <p class="lead">'.$featbtn_left_desc.'</p>
                    </a>
                    <a href="'.$featbtn_right_link.'" class="col-xs-6">
                        <p class="btn-lg">'.$featbtn_right.'</p>
                        <p class="lead">'.$featbtn_right_desc.'</p>
                    </a>
                </div>
            </div>
        </div>';
    return $featbtn_out;
}
add_shortcode( 'featurebtn', 'addfeaturebtn' );

function addemailsignup($atts, $content = null){
    $e_signup = shortcode_atts( array(
        'text' => null,
        'subtext' => null
    ), $atts );
    $e_signup_text = $e_signup['text'];
    $e_signup_subtext = $e_signup['subtext'];
    $e_signup_out = 
        '<div class="container addvbottom40 addvtop60">
            <div class="row clearfix addvbottom20  text-center"><p class="h2 text-uppercase">'.$e_signup_text.'</p>
            <p class="text-capitalize">'.$e_signup_subtext.'</p>
            </div>
            <div class="row clearfix" id="mc_embed_signup">
                <form action="//midnightentmusic.us6.list-manage.com/subscribe/post?u=60f04e225dc6a7f399147c157&amp;id=95d0bf0fcc" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div class="clearfix">
                    <div class="col-md-8 form-group">
                        <input type="text" class="form-control text-center required email" placeholder="EMAIL" value="" name="EMAIL" id="mce-EMAIL">
                    </div>
                    <div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div class="col-md-4 form-group">
                        <button type="submit" class="form-control btn btn-default btn-block text-green text-uppercase border-left-radius" name="subscribe" id="mc-embedded-subscribe">Sign Up</button>
                    </div>
                </div>
                <div class="clearfix col-xs-12">
                    <div class="result clearfix"></div></div>
                </form>
            </div>
        </div>';
    return $e_signup_out;
}
add_shortcode( 'emailsignup', 'addemailsignup' );

//Short code that displays the left footer content, which is meant really for your social network
function adddisplay_left_footer($atts, $content = null){
    $lf_signup = shortcode_atts( array(
        'text' => null,
    ), $atts );
    $lf_text = $lf_signup['text'];
    
    ob_start();
    dynamic_sidebar( 'left_footer' );
    $lf_sidebar = '<div class="clearfix hidden-xs addvbottom40"><div class="col-md-4 center text-center">';
    $lf_sidebar .= '<p class="lead">'.$lf_text.'</p>';
    $lf_sidebar .= ob_get_contents();
    $lf_sidebar .= '</div></div>';
    ob_end_clean();
    //the_widget( 'Social_Widget');
    
    return $lf_sidebar;
    /*ob_start();
    echo '<div class="clearfix"><div class="col-md-4 center">';
        get_sidebar( 'left_footer' );
    echo '</div></div>';*/
    
}
add_shortcode( 'display_left_footer', 'adddisplay_left_footer' );

//Shortcodethat Displays company information
function adddisplay_company($atts, $content = null){
    $company = shortcode_atts( array(
        'name' => null,
        'email' => null,
        'phone' => null,
        'address' => null,
        'logo' => null
    ), $atts );
    $company_name = null;
    $company_name = $company['name'];
    if($company_name == null){$company_name = get_bloginfo( 'name' );}
    $company_email = $company['email'];
    $company_phone = $company['phone'];
    $company_address = $company['address'];
    $company_logo = $company['logo'];
    $company_out = '<div class="clearfix addvtop40 company"><div class="col-md-4 center text-center">';
    if( (strtolower($company_logo) == 'y') || strtolower($company_logo) == 'yes'){
        $company_out .= '<div class="col-md-4">';
        $company_out .= ' <img id="logo" src="';        
        $logo_header_link = esc_attr( get_option('logo_header_img') );
    if (isset($logo_header_link) && !empty($logo_header_link)) : 
        $company_out .=  $logo_header_link;
else : 
        $company_out .=  get_template_directory_uri();
        $company_out .= '/img/logo.png';
        endif;
        $company_out .= '">';
        $company_out .= '<p class="lead">'.$company_name.'</p>';
        $company_out .='</div>';
    }
    else{
        $company_out .= '<p class="lead">'.$company_name.'</p>';
    }
    $company_out .= '<div class="col-md-8 addvtop20">';   
    $company_out .= '<p> <a href="mailto:'.$company_email.'?subject=ZinTuneInquiries">'.$company_email.'</a></p>';
    $company_out .= '<p <a href="tel:+'.$company_phone.'">'.$company_phone.'</a></p>';
    $company_out .= '<p><address>'.$company_address.'</address></p>';
    
    $company_out.= '</div>';
    /*$company_out .= '<div class="col-md-8>jh';
    $company_out .= '<p>'.$company_name.'</p>';
    $company_out .= '<p>'.$company_email.'</p>';
    $company_out .= '<p>'.$company_phone.'</p>';
    $company_out .= '<p>'.$company_address.'</p>';
    $company_out .= '</div>';*/
    
    $company_out .= '</div></div>';

    return $company_out;
    
}
add_shortcode( 'display_company', 'adddisplay_company' );


//Shortcode that's used for the page template and pulls all blog post of either all the artists or projects posted
function displayall($atts, $content =null){
    $to_display = shortcode_atts( array(
        'bg_img_url' => null,
        'type' => null
    ), $atts );
    
    $to_display_type = $to_display['type'];
    
    if( ($to_display_type === 'allartsns') || ($to_display_type === 'artsns') || ($to_display_type === 'artsn') ){
        $to_display_type = 'allartsns';
    }
    else {
        $to_display_type = 'allprjkts';
    }
    
    $allprjkts = '';
    $display_loop = new WP_Query(
        array(
            'post_type' => $to_display_type,
            'orderby' => 'title'
        )
    );
    
    $display_loop_out = '
    <style>
        .prjkts-artsns-contents{
            background-image: url("'.$to_display['bg_img_url'].'");
        }
    </style>

<div class="container-fluid clearfix text-center prjkts-artsns-contents addvbottom40">
            <div class="row clearfix overlay"></div>
            <div class="row clearfix text-white">';
        if ($display_loop->have_posts() ){
            
            while ($display_loop->have_posts() ){
                $display_loop->the_post();
                $meta = get_post_meta(get_the_id(), '');
                
            $display_loop_out .= '
            <a href="'.get_permalink().'" class="col-md-4 col-sm-6 prjkt-artsn-display">
                <div class="prjkt-artsn-photo center"'; 
            if (has_post_thumbnail( $post->ID ) ): 
                $display_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                
                 $display_loop_out .= 'style="background-image: url('.$display_image[0].')"';
            endif; 
                $display_loop_out .='>';
                
                $display_loop_out .= '
                    </div>
                    <div class="prjkt-artsn-name center">
                    <div class="overlay"></div>
                    <div class="overlay-text lead-title"><p class="center-v">'.get_the_title().'</p></div>
                </div>
            </a>';
            }
        }
        
        $display_loop_out .= '
                </div>
<div class="row clearfix text-center  addvtop60">
            <a href="#" class="text-uppercase center col-xs-8 btn btn-default inverse load-more">Load More</a>      </div>
        </div>
        ';
    return $display_loop_out;
}
add_shortcode( 'showall', 'displayall' );       


function all_metaboxes(){
    add_action('add_meta_boxes', function (){
        //css id, title, callback function, posttype, priority, callback functions args
        add_meta_box('header-img', 'Header Image URL', 'add_header_img', 'page');
        add_meta_box('header-text', 'Header Text', 'add_header_text', 'page');
        add_meta_box('artsn-one-img', 'Header Text', 'add_header_text', 'all-prjkts');
    });

    function add_header_img($post){
        $header_image_value = get_post_meta($post->ID, 'header_img', true);
        $header_img_out = '
        <p>
            <label for="add_header_img" >URL For Header Image</label>
<input type="text" class="widefat" name="header_img" id="header_img" placeholder="http://url.jpg" value="'. esc_attr__($header_image_value).'"/>
</p>';
        echo $header_img_out;
    }
    function add_header_text($post){
        $header_text_value = get_post_meta($post->ID, 'header_text', true);
        $header_text_out = '
        <p>
            <label for="add_header_img" >Text Within Header Image</label>
<input type="text" class="widefat" name="header_text" id="header_text" placeholder="Type Text Here" value="'. esc_attr__($header_text_value).'"/>
</p>';
        echo $header_text_out;
    }
    
    add_action('save_post', function($id){
        if(isset($_POST['header_img'])){
            update_post_meta(
                $id,
                'header_img',
                strip_tags($_POST['header_img'])
            );
        }
        if(isset($_POST['header_text'])){
            update_post_meta(
                $id,
                'header_text',
                strip_tags($_POST['header_text'])
            );
        }
    });
}
?>
<?php  class cust_nav_walker extends Walker {
        /**
         * What the class handles.
         *
         * @see Walker::$tree_type
         * @since 3.0.0
         * @var string
         */
        public $tree_type = array( 'post_type', 'taxonomy', 'custom' );

        /**
         * Database fields to use.
         *
         * @see Walker::$db_fields
         * @since 3.0.0
         * @todo Decouple this.
         * @var array
         */
        public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

        /**
         * Starts the list before the elements are added.
         *
         * @see Walker::start_lvl()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"sub-menu\">\n";
        }

        /**
         * Ends the list of after the elements are added.
         *
         * @see Walker::end_lvl()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }

        /**
         * Start the element output.
         *
         * @see Walker::start_el()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Menu item data object.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         * @param int    $id     Current item ID.
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID.' btn-group';
            //Additional li class goes here
            
            /**
             * Filter the CSS class(es) applied to a menu item's list item element.
             *
             * @since 3.0.0
             * @since 4.1.0 The `$depth` parameter was added.
             *
             * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
             * @param object $item    The current menu item.
             * @param array  $args    An array of {@see wp_nav_menu()} arguments.
             * @param int    $depth   Depth of menu item. Used for padding.
             */
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            /**
             * Filter the ID applied to a menu item's list item element.
             *
             * @since 3.0.1
             * @since 4.1.0 The `$depth` parameter was added.
             *
             * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
             * @param object $item    The current menu item.
             * @param array  $args    An array of {@see wp_nav_menu()} arguments.
             * @param int    $depth   Depth of menu item. Used for padding.
             */
            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $class_names .'>';

            $atts = array();
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
            $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
            $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

            /**
             * Filter the HTML attributes applied to a menu item's anchor element.
             *
             * @since 3.6.0
             * @since 4.1.0 The `$depth` parameter was added.
             *
             * @param array $atts {
             *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
             *
             *     @type string $title  Title attribute.
             *     @type string $target Target attribute.
             *     @type string $rel    The rel attribute.
             *     @type string $href   The href attribute.
             * }
             * @param object $item  The current menu item.
             * @param array  $args  An array of {@see wp_nav_menu()} arguments.
             * @param int    $depth Depth of menu item. Used for padding.
             */
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;
            $item_output .= '<a class="btn btn-default btn-sm inverse"'. $attributes .'>';
            //Additional li a class goes here
            /** This filter is documented in wp-includes/post-template.php */
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            /**
             * Filter a menu item's starting output.
             *
             * The menu item's starting output only includes `$args->before`, the opening `<a>`,
             * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
             * no filter for modifying the opening and closing `<li>` for a menu item.
             *
             * @since 3.0.0
             *
             * @param string $item_output The menu item's starting HTML output.
             * @param object $item        Menu item data object.
             * @param int    $depth       Depth of menu item. Used for padding.
             * @param array  $args        An array of {@see wp_nav_menu()} arguments.
             */
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

        /**
         * Ends the element output, if needed.
         *
         * @see Walker::end_el()
         *
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Page data object. Not used.
         * @param int    $depth  Depth of page. Not Used.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         */
        public function end_el( &$output, $item, $depth = 0, $args = array() ) {
            $output .= "</li>\n";
        }
    } // Walker_Nav_Menu
?>