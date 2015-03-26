/***JS & JQUERY***/
 
//General functions are executed on ready or window resize
$( document ).ready( readyFn );
// OR
$( window ).resize( readyFn );

function readyFn( jQuery ) {
    
        //IF the toggle button is hidden, meaning its Desktop View > 768
        if  ( ($(".navbar-toggle")).is(":hidden") ) {
            //Should be fixed and not static
            $(".navbar-wrapper .navbar").addClass("navbar-fixed-top").removeClass("navbar-static-top");
            //We need to always reset the - and + margins that get rid of the annoying body white, since those classes are not needed there
            $(".navbar-wrapper").removeClass("pullupcontainer").removeClass("pullupback");
            //Should always reset the container to its original margin-top setting if the toggle is hidden
            //$("#landing .container").css("margin-top", "160px");
        } else { 
            //$("#landing .container").css("padding-top", "40px");
            $(".navbar-wrapper .navbar").addClass("navbar-static-top").removeClass("navbar-fixed-top");      
            $(".navbar-wrapper").addClass("pullupcontainer").removeClass("pullupback");
            /*if ( ($(".menu")).is(":visible") ){
                $(".navbar-wrapper").removeClass("pullupcontainer").addClass("pullupback");
            }
            else{
                $(".navbar-wrapper").addClass("pullupcontainer").removeClass("pullupback");
            }*/
        }

    
        
        //Display background overlay if scrolled and it's not at the top
        $( window ).scroll(function() {
            if( ($(window).width() > 768) && ($(window).scrollTop() != 0) ) /*|| $(window).scrollTop() == $(document).height()- $(window).height()*/{
                $(".navbar-default").css({"background-color":"rgba(0, 0, 0, 0.6)","padding-bottom": "0px"}); //place overlay and makeup for lost space
            }   else {
                $(".navbar-default").css({"background-color":"transparent","top": "0px"});
            }
        });
    
    
        //Reset landing container initially
        $("#landing .container").css("margin-top", "170px");
        //Resets
        if($(window).width() < 768){
            $(".menu").removeAttr("style");  
        }
        else{ 
            $(".menu").css("display","none");
        }
}

//Click functions don't need to be initiated if window is resized, or else flickering will occur
$( document ).ready(function() {
    
        //Fix for navbar toggling pulling contents all the way down and body bg showing
        $( ".navbar-toggle" ).click(function() {
            $("#landing .container").css("margin-top", "530px");
            if ( ($(".navbar-collapse")).is(":hidden")){
                $(".navbar-wrapper").addClass("pullupback").removeClass("pullupcontainer");
            } else{
                //Fix to not show body background
                $(".navbar-wrapper .pullupcontainer").show();//.removeClass("pullup340");
                $(".navbar-wrapper").removeClass("pullupcontainer");
            }
        });
    
        //Scroll To Top Funtion
        $("#scrollToTop").click(function(e) {
            e.preventDefault();
            $('html,body').animate({scrollTop:0},'slow');
            return false;
        });
        
        //Toggle Inline menu on/off
        $(".menu-btn").click(function(e){
            e.preventDefault();
            if( ($(".menu")).is(":hidden") ){
                $(".menu").css("display","block");
            } else{
                $(".menu").css("display","none");
            }
        });
});


