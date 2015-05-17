<?php 
//***********SHORTCODE MANUAL******************
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

/*
========================SHORTCODES===========================
*/
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
            $add_wb_style = ($wb_text_size != null) ? 'style="font-size:'.$wb_text_size.'px; font-weight: 400;"' : '';
           
                
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
        <div class="feature text-white"  style="background-image: url('.$feat_url.');">
                <div class="overlay overlay40"></div>
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
    
    
    
    $ap_out = '<div class="row clearfix addvbottom20 addvtop20">';
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
                $display_loop_out .='
                <div class="visible-xs inherit-space"><div class="overlay overlay20 "></div>
                <div class="overlay-text lead-title"><p class="center-v">'.get_the_title().'</p></div></div>
                    ';
                
                $display_loop_out .= '
                    </div>
                    <div class="prjkt-artsn-name center hidden-xs">
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
?>