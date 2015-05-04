<style>
    /**Override for menu on whiteBG if not homepage**/
    .navbar-default .navbar-nav > li > a {
        color: #24a88f;
    }
    .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
        color: #FFA878;
    }
    .menu-btn .btn:hover, .menu-btn .btn:focus,  .menu-btn .btn.focus,
    .navbar-header .btn:hover,.navbar-header .btn:focus, .navbar-header .btn.focus{
        color: #24a88f;
    }
    @media screen and (max-width: 767px){
        .navbar .navbar-collapse{
            border-top: 3px solid #24a88f;
        }
    }
</style>
<div id="alternate" class="main-bg clearfix">
            <div class="container text-center">
                <div class="row clearfix"><p class="col-md-8 center page-title"><?php echo the_title();?></p></div>
            </div>  
        </div>