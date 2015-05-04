<div id="footer" class="bg-primary addvtop40 addvbottom40">
          <div class="container">
              <div class="row clearfix">
                  <div class="col-md-4">
                      <?php if ( is_active_sidebar( 'left_footer' ) ) : ?>
	
		<?php dynamic_sidebar( 'left_footer' ); ?>
	   <!-- #Left Social Footer SideBar -->
<?php endif; ?>
                      <!--<ul class="list-inline nav-justified text-center h0 socials text-white">
                          <li><a href="#"><p class="icon-facebook-1 facebook center inverse"></p></a></li>
                          <li><a href="#"><p class="icon-twitter-1 twitter center inverse"></p></a></li>
                          <li><a href="#"><p class="icon-instagram instagram center inverse"></p></a></li>
                          <li><a href="#"><p class="icon-youtube-play youtube center inverse"></p></a></li>
                      </ul>-->
                  </div>
                  <div class="col-md-offset-4 col-md-4 ">
                      <?php 
$zt_footer_menu = new cust_nav_walker; //Gets our custom setting for our menu
wp_nav_menu( array('theme_location' => 'footer-menu',
      'items_wrap' => '<ul class="list-inline btn-group btn-group-justified text-right">
      %3$s</ul>', 
     'walker' => $zt_footer_menu))?>
                      
                      <!--<ul class="list-inline btn-group btn-group-justified text-right">
                          <li class="btn-group"><a href="#" class="btn btn-default btn-sm inverse">email</a></li>
                          <li class="btn-group"><a href="#" class="btn btn-default btn-sm inverse">reachout</a></li>
                      </ul>-->
                  </div>
              </div>
              <div class="row clearfix"><p class="text-center">&copy; <?php echo date("Y"); ?> <?php 
$footer_copyright_text = esc_attr( get_option('copyright_company') );
    if (isset($footer_copyright_text) && !empty($footer_copyright_text)) : 
        echo $footer_copyright_text;
    else :
bloginfo( 'name' ); ?>. All rights reserved.
        <?php endif;?>
                  </p></div>
              <div id="scrollToTop" class="btn pull-right"><i class="icon-up-open-big"></i></div>
            </div>
        </div>
        
	<?php wp_footer(); ?>
	</body>
</html>