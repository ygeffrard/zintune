<div class="prjkt-play clearfix">
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
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      <?php
            

            //Checks if a yoube link was placed
            $current_field_selected_content = if_youtube_iframe($current_field_selected_content);
            
        ?>
    <div class="item active">
        <div class="slider-img-container item1">
           <div class="center-v">
                <!--Credit http://www.skipser.com/p/2/p/auto-resize-youtube-videos-in-responsive-layout.html-->
               <div style="max-width:1020px;margin:0 auto; padding:5px;">
      <div style="position: relative;padding-bottom: 56.25%; height: 0; overflow: hidden;">
          <iframe width="1020" height="630" frameborder="0"  src="http://www.youtube.com/embed/PINWYWNNFHk?showinfo=0&controls=1&rel=0&theme=dark&modestbranding=1&fs=1&color=white&autohide=1" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; max-width: 1020px; max-height: 630px;"></iframe>
      </div>
    </div>
        </div></div>
      <div class="carousel-caption">
        <h3 class="lead-title">Chania is dope balah afhdl a kfldkffd</h3>
      </div>
    </div>

    <div class="item">
      <div class="slider-img-container item2">
        <div class="center-v"><div style="max-width:1020px;margin:0 auto; padding:5px;">
      <div style="position: relative;padding-bottom: 56.25%; height: 0; overflow: hidden;">
        <iframe width="1020" height="630" frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/PINWYWNNFHk?showinfo=0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; max-width: 1020px; max-height: 630px;"></iframe>
      </div>
    </div>
        </div>
        </div>
      <div class="carousel-caption">
        <h3 class="lead-title">Chania sceciirn nsnduberen nkndnfd,FDFdsf</h3>
      </div>
    </div>

    <div class="item">
        <div class="slider-img-container item3">
            <div class="center-v"><div style="max-width:1020px;margin:0 auto; padding:5px;">
      <div style="position: relative;padding-bottom: 56.25%; height: 0; overflow: hidden;">
        <iframe width="1020" height="630" frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/PINWYWNNFHk?showinfo=0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; max-width: 1020px; max-height: 630px;"></iframe>
      </div>
    </div>
        </div>
        </div>
      <div class="carousel-caption">
        <h3 class="lead-title">Flowers</h3>
      </div>
    </div>

    <div class="item">
       <div class="slider-img-container item4"> 
            <div class="center-v"><div style="max-width:765px;margin:0 auto; padding:5px;">
      <div style="position: relative;padding-bottom: 56.25%; height: 0; overflow: hidden;">
        <iframe width="765" height="472" frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/PINWYWNNFHk?showinfo=0" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; max-width: 765px; max-height: 472px;"></iframe>
      </div>
    </div>
        </div>
        </div>
      <div class="carousel-caption">
        <h3 class="lead-title">Flowers is fj great !! kl;dsfd</h3>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
                        <div class="l-control slide-nav-controls">
  <a class="prev left carousel-control" href="#prjktCarousel" role="button" data-slide="prev">
						<span class="left-nav glyphicon glyphicon-triangle-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
						<div class="content-preview">
							<h3 class="lead">Previous Title</h3>
							<img src="img/7.png" alt="Previous thumb"/>
						</div>
					</a></div>
                        <div class="r-control slide-nav-controls">
  <a class="next right carousel-control" href="#prjktCarousel" role="button" data-slide="next">
						<span class="right-nav glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
						<div class="content-preview">
							<h3 class="lead">Next Title</h3>
							<img src="img/8.png" alt="Next thumb"/>
						</div>
					</a></div>
                        
                        
     
</div> <!--/Carousel-->                                  
            </div> <!--/Prjkt-Play-->