<?php
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
            'slug' => 'allprjkts'
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
        'slug' => 'allartsns',
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
================PRJKTS=================
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
     $prjkts_tax['viewable_prjkts'] = array (
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
    );
        
    //register_taxonomy('artsns', array('allprjkts'), $args);
    foreach($prjkts_tax as $name => $arr){
//register_taxonomy_for_object_type()
        register_taxonomy($name, array('allprjkts'), $arr);
    }
}


/*
================ARTSNS=================
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
            echo '<h1 class="lead-title">Welcome To Theme Options</h1>';
            echo '</div>&nbsp; &nbsp; ';
            echo "<div class=\"lead\"> To Add/Change header logo just click on media and Height must be xyz x xyz pixels to function properly</div>&nbsp;";
            echo "<div class=\"lead\"> To Add/Change logo just click on media and Height must be at least xyz x xyz pixels to look clean</div>&nbsp;";    
            echo "<div class=\"lead\"> To Add/Change copyright info just type the info following the year, so '© 2015' is already written for you you're just adding the info that precedes it</div>&nbsp;"; 
              
}


//SHORTCODE
function shortcodes_manual() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }

    echo '<div>';
            echo '<h1 class="lead-title">Welcome To ZinTune List of Shortcodes and other Manual Instructions</h1>';
            echo '</div>&nbsp; &nbsp; ';
            echo '<div class="lead"> To Add a whiteblock just type [whiteblock height="250" img="http://url"], note that the image is optional, like the logo image was added in the whiteblock, if so just makesure the height that you set in the whiteblock is greater than the image height</div>&nbsp';
        
            echo '<div class="lead"> To Add a darkened  image block just type [darkblock height="350" img="http://url"], note that the image is a must for this part to look nice;</div>&nbsp';  
            echo '<div class="lead"> To Add a Email block  just type [email msg="GET ALL THE LATEST PRJKTS!"], note that the height is set alongside with all the other information</div>&nbsp';  

}


?>