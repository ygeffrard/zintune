<?php /************Metaboxes Options***************/
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