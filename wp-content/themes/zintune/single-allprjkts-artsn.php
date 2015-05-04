<!--<div class="artsn-menu clearfix">-->
    <?php
        /*
*  get all custom fields, loop through them and load the field object
*/
/*$fields = get_fields();
if( $fields )
{
	foreach( $fields as $field_name => $value )
	{        
		echo '<div>';
			echo '<h3>' . $field_name . '</h3>';
			echo $value;
		echo '</div>';
	}
}*/
    //Get AJAX LOADER
    get_template_part('ajax-loader');
    ?>
                
                    <div class="clearfix col-md-4 col-sm-6 center">
                        <a href="#" class="prjkt-content-display icon-effect addvtop40 addvbottom20" id="acf_vocalist-section" name="acf_vocalist-section">
                            <?php
                            //If the first link clicked

                            ?>
                            <div class="prjkt-content-title center" style="background-image:url(<?php echo the_field('vocalist_photo') ;?>)">            
                                <div class="overlay greenbg"></div><div class="overlay overlay-cp"></div>
                                <div class="overlay-text lead-title skinny-text"><div class="center-v"><p class="center col-xs-8 underline-text text-capitalize artsn-title"><?php echo esc_attr( get_option('single_prjkt_vocalist_title') ); ?></p></div></div>
                            </div>
                </a>
                    </div>
                
                <div class="clearfix col-md-8 center">
                    <a href="#" class="pull-left prjkt-content-display center addvtop20 addvbottom20" id="acf_producer-section" name="acf_producer-section">      
                        <?php
                        //If second link is clicked
                        
                        ?>

                            <div class="prjkt-content-title center" style="background-image:url(<?php echo the_field('producer_photo') ;?>)">
                                <div class="overlay bluebg"></div><div class="overlay overlay-cp"></div>
                                <div class="overlay-text lead-title skinny-text"><div class="center-v"><p class="center col-xs-8 underline-text text-capitalize artsn-title"><?php echo esc_attr( get_option('single_prjkt_producer_title') ); ?></p></div></div>
                            </div>
                </a>
                    
                    <a href="#" class="pull-right prjkt-content-display addvtop20" id="acf_songwriter-section" name="acf_songwriter-section">
                        <?php
                        //If third link is clicked
                        
                        ?>
                            <div class="prjkt-content-title center" style="background-image:url(<?php echo the_field('songwriter_photo') ;?>)">
                                <div class="overlay"></div><div class="overlay overlay-cp"></div>
                                <div class="overlay-text lead-title skinny-text"><div class="center-v"><p class="center col-xs-8 underline-text text-capitalize artsn-title"><?php echo esc_attr( get_option('single_prjkt_songwriter_title') ); ?></p></div></div>
                            </div>
                </a>
                </div>
            <!--</div>-->