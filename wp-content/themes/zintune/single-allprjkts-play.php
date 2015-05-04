<!--<div class="prjkt-play clearfix">-->
<?php
    //Get AJAX LOADER
    get_template_part('ajax-loader'); ?>
                    <div id="prjktCarousel" class="carousel slide nav-reveal carousel-fade" data-ride="carousel" data-interval="false">
                        
    <?php 
    //load proper project content settings
    //get_template_part('load-prjkt-content');

    //this is set in the 'load-prjkt-content'
    //echo count($current_field_selected_content);
        //Foreach indicator inside the current selected artist contribution to that specific project
        //echo count($songwriter_contents);
        
        /*for($i=0;$i<$arr_length;$i++)
        {
             
        }*/

        //Make indicators more Object Oriented                          
        /*
        Get the ID of the current field, can be songwriter, producer or vocalist => does that with jQuery check out in main.js*/

        /*
        Gets the content introduction that introduces the specific artsn =>  does that in jQuery check out in main.js
        */

        /*From that ID It should pull the specific ID's Content, in on the 'content' sections as an array OOP, and the 'descriptions' as an array OOP style =>  does that in jQuery check out in main.js*/

        //$current_field = the_field('acf_songwriter-section');
        //foreach($current_field as $current_field_sectio){}
    ?>
                        
   <!-- Indicators -->
  <ol class="carousel-indicators">
      
    <li data-target="#prjktCarousel" data-slide-to="0" class="active"></li>
    <!--<li data-target="#prjktCarousel" data-slide-to="1"></li>
    <li data-target="#prjktCarousel" data-slide-to="2"></li>
    <li data-target="#prjktCarousel" data-slide-to="3"></li>-->
      <?php
         //This is filed with jQuery AJAX, content is passed through wp_localize_script() in an array, then accessed by jQuery AJAX to append to this div, which will the indicators that link to specific images / youtube iFrame posts
        ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner center" role="listbox">
      <?php
         //This is filed with jQuery AJAX, content is passed through wp_localize_script() in an array, then accessed by jQuery AJAX to append to this div, which will be images and Youtube only
        ?>
    
  </div>

  <!-- Left and right controls -->
                        <div class="l-control slide-nav-controls">
  <a class="prev left carousel-control" href="#prjktCarousel" role="button" data-slide="prev">
						<span class="left-nav glyphicon glyphicon-triangle-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
						<div class="content-preview">
							<h3 class="lead text-uppercase">Previous</h3>
                            <div class="iframe-containter"><iframe scrolling="no" frameborder="0"></iframe></div>
                            
						</div>
					</a></div>
                        <div class="r-control slide-nav-controls">
  <a class="next right carousel-control" href="#prjktCarousel" role="button" data-slide="next">
						<span class="right-nav glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
						<div class="content-preview">
							<h3 class="lead text-uppercase">Next</h3>
							<div class="iframe-containter"><iframe scrolling="no" frameborder="0"></iframe></div>
						</div>
					</a></div>
                        
                        
     
</div> <!--/Carousel-->                                  
            <!--</div>--> <!--/Prjkt-Play-->