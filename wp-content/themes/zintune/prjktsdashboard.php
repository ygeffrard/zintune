<?php


/*
===================CUSTOM POSTS=====================
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
====================PRJKTS CATEGORIES=================
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
   
?>
