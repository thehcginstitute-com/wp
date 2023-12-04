<?php

$breakpoint = '1200';

if( isset($apicona['menu_breakpoint']) && isset($apicona['menu_breakpoint_custom']) ){ if( $apicona['menu_breakpoint']=='custom' ){  $breakpoint = $apicona['menu_breakpoint_custom']; } else {  $breakpoint = $apicona['menu_breakpoint']; }

}

?>

.tm-custombutton,
.headerlogo, 
.search_box, 
.thememount-header-cart-link-wrapper{   
	 height: <?php echo $headerHeight; ?>px;    
     line-height: <?php echo $headerHeight; ?>px !important;
}


/**

* Responsive Menu

* ----------------------------------------------------------------------------

*/



@media (max-width: <?php echo $breakpoint; ?>px){  	
/* Header Section *********************/            
    .k_flying_searchform_wrapper{        
        position: absolute;        
        width: 100%;        
        z-index: 33;    
    }   
   .tm-header-overlay .tm-titlebar-wrapper .tm-titlebar-inner-wrapper{    	
   		padding-top: 0px;    
   }          
   .tm-header-overlay.thememount-header-style-6 #stickable-header,    
   .tm-header-overlay #stickable-header{    	
   		background-color: <?php echo $stickyheaderbgcolor; ?>;    
   }   
   .thememount-header-style-3 .tm-header-small-search-form .k_flying_searchform_wrapper {    	
   		display: none !important;    
   }        
   .thememount-header-style-3 .w-search-input input {       
        font-size: 26px;        
        text-align: center;        
        border: none;        
        border-radius: 0;        
        box-shadow: none !important;       
        background-color: rgba( 
        <?php echo tm_hex2rgb($apicona['skincolor']); ?> , 0.75);        
        color: #fff;        width: 100%;       
        line-height: 1.3em;        
        padding-top: 30px;       
        padding-bottom: 30px;    
     }      
    .thememount-header-style-3 .k_flying_searchform_wrapper .field:-webkit-input-placeholder {       
    	color: rgba(255, 255, 255, 0.80);         
    }      
    .thememount-header-style-3 .k_flying_searchform_wrapper .field:-moz-placeholder { 
        /* Firefox 18- */        
        color: rgba(255, 255, 255, 0.80);            
    }    
    .thememount-header-style-3 .k_flying_searchform_wrapper .field:-moz-placeholder {  
        /* Firefox 19+ */        
        color: rgba(255, 255, 255, 0.80);         
    }    
    .thememount-header-style-3 .k_flying_searchform_wrapper .field:-ms-input-placeholder {         
     	color: rgba(0, 0, 0, 0.80);       
    }
	#stickable-header{
		height:auto !important;
	}
	.masthead-header-stickyOnScroll{
		position: relative !important;
	}
	.sticky-wrapper .header-inner{
		top:0px;
	}       
    .header-controls .thememount-header-cart-link-wrapper a{        
    	background-color: <?php echo $apicona['skincolor']; ?>;        
        color: #fff;        
        border-radius: 50%;           
    }        
    .header-controls .thememount-header-cart-link-wrapper a:hover{        	
        background-color: <?php echo tm_adjustBrightness($apicona['skincolor'], -30); ?>;          
        color: #fff;    
    }    
    .tm-topbar-hidden .thememount-fbar-btn {    	
    	right: 128px;    
    }

   	/* Navigation *********************/     
    .main-navigation {    	
    	clear: both;    
    } 
	.headercontent .headerlogo img {
		height: auto;
		max-width: 100%;
	}         	
    #navbar #site-navigation div.nav-menu > ul,    
    #navbar #site-navigation .mega-menu-wrap .mega-menu{        
   		background-color: <?php echo $headerbgcolor; ?>;    
    }
	<?php if( isset($apicona['dropmenu_background']['background-color']) && trim($apicona['dropmenu_background']['background-color'])!='' ): ?>
    #navbar #site-navigation div.nav-menu > ul,    
    #navbar #site-navigation .mega-menu-wrap .mega-menu{    	
    	background-color: <?php echo $apicona['dropmenu_background']['background-color']; ?>;    
    }
    <?php endif; ?>
	.headerlogo,    
    #navbar #site-navigation div.mega-menu-wrap,
	.menu-main-menu-container,    
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu,
	#navbar {
    	float: none;	    
     }       
    .menu-toggle {        
        display: block;        
        text-align: center;        
        cursor: pointer;        
        padding: 0px;        
        margin: 0px;        
        position: absolute;        
        top: 50%;        
        left: 20px;        
        padding-right: 0px;       
        margin-top: -15px;      
    }    
    .thememount-header-style-3 .menu-toggle {       
    	left: 20px;
    }    
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item li.mega-menu-item-has-children > a:after,        
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:after,    
    .menu-toggle span{    	
    	display: none;    
    }
    #navbar #site-navigation div.nav-menu > ul ul a, 
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-menu-item a {
        padding: 14px 15px 14px 0px;
    }
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, 
    #navbar #site-navigation div.nav-menu > ul > li ul {
    	padding: 0px 10px;
    }
   
	/*Responsive Menu*/	    
    .righticon{       
        position: absolute;        
        right: 0px;        
        z-index: 33;       
        top: 24px;    
    }
	.righticon i{
		font-size:20px;
		cursor:pointer;        
        display:block;       
        line-height: 0px;
	}    
    #navbar #site-navigation div.nav-menu > ul{    
    	display: none;    
    }                   
        
    /* Default menu box *********************/         
    #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal,    
    #navbar #site-navigation div.nav-menu > ul{    
        position: absolute;        
        padding: 10px 20px;         
        left: 0px;	        
        box-shadow: rgba(0, 0, 0, 0.12) 3px 3px 15px;        
        border-top: 3px solid <?php echo $apicona['skincolor']; ?>;	   
    }          
    #navbar #site-navigation div.nav-menu > ul{
		float: none;
		overflow: hidden;
		max-height: 0px;
		position: absolute;
		left: 0px;
		z-index: 1;        
        margin:0px;        
        width: 100%;  
	}        
	#navbar #site-navigation div.nav-menu > ul,    
	#navbar #site-navigation div.nav-menu > ul ul {       
		overflow: hidden;        
        max-height: 0px;        
        -webkit-transition: max-height 0.25s ease-out;        
        -moz-transition: max-height 0.25s ease-out;        
        -ms-transition: max-height 0.25s ease-out;        
        -o-transition: max-height 0.25s ease-out;        
        transition: max-height 0.25s ease-out;    
     }        
     #navbar #site-navigation div.nav-menu > ul ul ul{    	
     	max-height: none;    
     }        
     #navbar #site-navigation div.nav-menu > ul > li{    	
     	position: relative;    
     }        
     #navbar #site-navigation.toggled-on div.nav-menu > ul{
		display:block;
		max-height: 500px;
		overflow: auto;    
     }    
     #navbar #site-navigation.toggled-on div.nav-menu > ul ul.open{    	
     	max-height: 1000px;    
     }
     
    /* Mega menu box */    
    #navbar #site-navigation div.mega-menu-wrap{
    	  position: inherit;
    }    
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle {
        display: block;
        position: absolute;        
        width: 30px;       
        background: none;
        z-index: 1;
    }    
    .thememount-header-style-4 #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle {
    	left: 15px;
    }   
    
    h3.menu-toggle i,   
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle:before {
    	font-size: 30px;
        margin: 0px;
        display: none;
    }       
    h3.menu-toggle span,    
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span {      
    	position: absolute;
        top: 50%;
        left: 0;
        display: block;
        width: 100%;         
        height: 4px;
        border-radius: 0px;
        margin-top: -2px;
        background-color: #282828;
        font-size: 0px;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-transition: background-color 0.3s;
        transition: background-color 0.3s;
    }    
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span{
    	 z-index: -1;
    }    
    #navbar #site-navigation div.mega-menu-wrap .mega-toggle-block {
    	margin-right: 0px;
        width: 100%;
        display: block;
        height: 35px;
        width: 35px;
    }
    #mega-menu-wrap-primary .mega-menu-toggle:focus {
 		outline:0px;
	}
    #navbar #site-navigation div.mega-menu-wrap .mega-toggle-block:after,
    #navbar #site-navigation div.mega-menu-wrap .mega-toggle-block:before{
    	display: none;
    }     
    h3.menu-toggle{
    	width: 35px;
        height: 30px;
    }     
    h3.menu-toggle span:after,
    h3.menu-toggle span:before,    
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span:after,
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span:before{
        position: absolute;
        left: 0;
        width: 100%;
        height: 100%;
        background: #282828;
        content: '';
        -webkit-transition: -webkit-transform 0.3s;
        transition: transform 0.3s;
        display: block;
    }    
    h3.menu-toggle span:before,    
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span:before {
        -webkit-transform: translateY(-250%);
        transform: translateY(-250%);
    }      
    h3.menu-toggle span:after,  
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span:after {
        -webkit-transform: translateY(250%);
        transform: translateY(250%);  
        top: 0;     
    }     
    .toggled-on  h3.menu-toggle span:after,    
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle.mega-menu-open span:after {
        -webkit-transform: translateY(0) rotate(-45deg);
        transform: translateY(0) rotate(-45deg);
    }    
    .toggled-on  h3.menu-toggle span:before,
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle.mega-menu-open span:before {
        -webkit-transform: translateY(0) rotate(45deg);
        transform: translateY(0) rotate(45deg);
    }    
    body .toggled-on  h3.menu-toggle span,
    body #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle.mega-menu-open span{
   		background-color: transparent;
    }      
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle{
    	 top: <?php echo ceil($headerHeight/2)-20; ?>px;
    }    
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal, 
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu{
    	width: 100%;
    }     
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal, 
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu {
        width: auto;       
        left: 50px;
        right: 50px;
    }    
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-toggle-on > a, 
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a,
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a {
    	background: none !important;
    }
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item{
    	float: none;
    }
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li{
    	width: 100% !important;
        padding-bottom: 0px;
    }
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item ul.mega-sub-menu a {
    	padding-left: 0px;
    }
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu a,
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li ul.mega-sub-menu,
    #navbar #site-navigation div.nav-menu > ul ul{
    	  background-color: transparent !important;
    }
    #navbar #site-navigation div.nav-menu > ul > li a,    
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li a{
        display: block;
        padding: 15px 0px;        
        text-decoration: none;
        line-height: 18px;
        height: auto;
        line-height: 18px !important;
    }          
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item li.mega-menu-item .textwidget a:before{
    	display: none;
    }       
    .mega-sub-menu {
     	display: none !important;
    }
    .mega-sub-menu.open, 
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li .mega-sub-menu .mega-sub-menu {
    	display: block !important;
    }
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li  {
        padding: 0px;
    }  
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title{
    	margin-top:15px;
    }    
      
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item{
   		position: relative;
    }
    #navbar #site-navigation div.nav-menu > ul > li a, 
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li a{
    	display: inline-block;
    }      
    .thememount-header-style-3 #navbar .main-navigation {
        position: inherit;
    }    
    .thememount-header-style-3.tm-header-overlay #navbar{
    	border-top: none;
    }    
    .thememount-header-style-3 .k_flying_searchform_wrapper{
        top: <?php echo ceil($headerHeight); ?>px;
    }
	.thememount-header-style-3 .search_box{
    	display: block;
   	}
    .site-title{
        width: inherit;
        margin: 0 auto;
    }	
	#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal>li.mega-menu-item ul.mega-sub-menu {
		opacity: 1!important;
		height: auto!important;
	} 

 	/*Defaultmenu*/       
    .tm-mmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:hover,    
    .tm-mmenu-active-color-skin #navbar #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
    .tm-mmenu-active-color-skin #navbar #site-navigation div.nav-menu > ul > li.current_page_item > a, 
    .tm-mmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
    .tm-mmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a,     
    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,  
    .tm-dmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current_page_item > a,          
    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.nav-menu > ul > li li a:hover,
    .tm-mmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu a:hover,
    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.nav-menu > ul > li li:hover > a,
    .tm-mmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item li:hover > a,        
    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a,    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-ancestor > a,     
    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a,    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.nav-menu > ul > li li.current-menu-item > a,    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.nav-menu > ul > li li.current_page_item > a {
    	color: <?php echo $apicona['skincolor']; ?> !important;
    }

	#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu{
    	opacity: 1 !important;
    }
    <?php if( isset($apicona['dropdownmenufont']['color']) && trim($apicona['dropdownmenufont']['color'])!='' ): ?>
	#navbar #site-navigation div.nav-menu > ul > li > a, 
    #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
    
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title,
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget,
    .righticon i  {
    	color: rgba( <?php echo tm_hex2rgb($apicona['dropdownmenufont']['color']); ?> , 1) !important;
    }    
    #navbar #site-navigation div.nav-menu > ul li,
  	#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li {
    	border-bottom: 1px solid rgba( <?php echo tm_hex2rgb($apicona['dropdownmenufont']['color']); ?> , 0.15);
    }  
    #navbar #site-navigation div.nav-menu > ul li li:last-child,
  	#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li:last-child{
    	border-bottom: none;
    }
    <?php endif; ?>
    <?php //if( isset($apicona['mainmenufont']['color']) && trim($apicona['mainmenufont']['color'])!='' ): ?>
	/* Dynamic main menu color applying to responsive menu link text */  
           
    .menu-toggle i,   
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle:before,
    .header-controls a{
		color: rgba( <?php echo tm_hex2rgb($mainMenuFontColor); ?> , 1) ;
	}
        
    h3.menu-toggle span,
    h3.menu-toggle span:after,
    h3.menu-toggle span:before,    
    
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span,
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span:after,
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span:before{
    	background-color: rgba( <?php echo tm_hex2rgb($mainMenuFontColor); ?> , 1) ;
    }
    
    .thememount-header-style-3 h3.menu-toggle span,
    .thememount-header-style-3 h3.menu-toggle span:after,
    .thememount-header-style-3 h3.menu-toggle span:before,    
    
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span,
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span:after,
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span:before{
    	background-color: #282828;
    }
    .thememount-header-style-3 .toggled-on h3.menu-toggle span, 
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle.mega-menu-open span {
   		background-color: transparent;
    }    
    .thememount-header-style-3 .header-controls .search_box a {
    	color: #282828;
    }

        <?php //endif; ?>
     <?php if( isset($apicona['mainmenu_active_link_color']) && trim($apicona['mainmenu_active_link_color'])=='custom' ){ ?>
	/* Main Menu Active Link Color --------------------------------*/     
    .tm-mmenu-active-color-custom #navbar #site-navigation div.nav-menu > ul > li.current-menu-item > a,
    .tm-mmenu-active-color-custom #navbar #site-navigation div.nav-menu > ul > li.current_page_item > a,
    .tm-mmenu-active-color-custom #navbar #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a,      
    .tm-mmenu-active-color-custom ul.nav-menu > li > a:hover, 
    
    .tm-mmenu-active-color-custom #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,
    .tm-mmenu-active-color-custom #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:hover{
        color: <?php echo $apicona['mainmenu_active_link_custom_color']; ?> !important;
    }
    <?php } ?>
    
    <?php if( isset($apicona['dropmenu_active_link_color']) && trim($apicona['dropmenu_active_link_color'])=='custom' ){ ?>
	/*Main Menu Active Link Color --------------------------------*/
	.tm-mmenu-active-color-custom #navbar #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a {
            color: <?php echo $apicona['dropmenu_active_link_custom_color']; ?> !important;
        }
    <?php } ?>
	#navbar #site-navigation div.nav-menu > ul{
        padding-right: 15px;
        padding-left: 15px;
    }    
    #navbar #site-navigation div.nav-menu > ul ul{
    	list-style: none;
    }      
    .header-controls{
        position: absolute;
        top: 0;
        float: none;
        right: 0px;
        margin-right: 0px;
    }    
    .tm-header-invert .menu-toggle{
        right: inherit;
        left: 0;
    }
    .thememount-header-style-1.tm-header-invert #navbar, 
    .thememount-header-style-4.tm-header-invert #navbar {
    	float: none;
    }    
    .thememount-header-style-4.tm-header-overlay #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle{
        top: 50%;
        margin-top: -18px;
    }
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, 
    #navbar #site-navigation div.nav-menu > ul > li ul{
    	background-image: none !important;
    }  
    #stickable-header{
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.06);
        -khtml-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.06);
        -moz-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
        -ms-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
        -o-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
	}
    .tm-custombutton,  
    .thememount-header-cart-link-wrapper{
    	display: none;
    }    
    .thememount-header-style-1.tm-header-highlight-logo #stickable-header{
    	background-color: <?php echo $apicona['skincolor']; ?>;
    }
    .thememount-header-style-1.tm-header-highlight-logo:not(.tm-header-overlay) h3.menu-toggle span, 
	.thememount-header-style-1.tm-header-highlight-logo:not(.tm-header-overlay) h3.menu-toggle span:after, 
    .thememount-header-style-1.tm-header-highlight-logo:not(.tm-header-overlay) h3.menu-toggle span:before, 
    .thememount-header-style-1.tm-header-highlight-logo:not(.tm-header-overlay) #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span, 
    .thememount-header-style-1.tm-header-highlight-logo:not(.tm-header-overlay) #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span:after, 
    .thememount-header-style-1.tm-header-highlight-logo:not(.tm-header-overlay) #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle span:before {
    	background-color: #fff;
    }	
	.thememount-header-style-1:not(.tm-header-overlay) .toggled-on h3.menu-toggle span,
	.thememount-header-style-1.tm-header-highlight-logo:not(.tm-header-overlay) #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle.mega-menu-open span{
		background-color: transparent;
	}	
	.thememount-header-style-3 .tm-header-bottom.container {
		width: auto;
	}
	.thememount-header-style-3 .header-controls .tm-header-small-search-form{
		height: <?php echo $headerHeight; ?>px;    
		line-height: <?php echo $headerHeight; ?>px !important;
	}
	.thememount-header-style-3 .header-controls .tm-header-small-search-form a{
		display: inline-block;
		color: #fff;
		height: 35px;
		width: 35px;
		line-height: 35px;
		border-radius: 3px;
		position: relative;
		z-index: 12;
		text-align: center;
	}
	.thememount-header-style-3 .header-controls .tm-header-small-search-form a,
	body:not(.thememount-header-style-3) .header-controls .search_box a{
    	background-color: <?php echo $apicona['skincolor']; ?>;
        color: #fff;
    }
	body.thememount-header-style-1.tm-header-highlight-logo:not(.tm-header-overlay) .header-controls .search_box a {       
        background-color: #fff;
		color: #282828;
    }	
	.thememount-header-style-3 .header-controls {
		right: 30px;
	}
	.thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle {	
		left: 30px;
	}

}



@media (min-width: <?php echo $breakpoint; ?>px) {
    /* Tm-Header-Invert*************************/     
    #navbar, 
    .header-controls, 
    #navbar #site-navigation .mega-menu-wrap, 
    .menu-main-menu-container, div.nav-menu {
    	float: right;
    }
    .tm-header-invert .tm-custombutton, 
    .tm-header-invert .search_box, 
    .tm-header-invert .thememount-header-cart-link-wrapper {
        padding: 0px 14px 0px 18px;
        float: left;
        position: relative;
    }
    .tm-header-invert #navbar, 
    .tm-header-invert .header-controls, 
    .tm-header-invert #navbar #site-navigation .mega-menu-wrap, 
    .tm-header-invert .menu-main-menu-container, 
    .tm-header-invert div.nav-menu {
    	float: left;
    }    
    .thememount-header-style-1.tm-header-invert .headerlogo, 
    .thememount-header-style-4.tm-header-invert .headerlogo{
    	float:right;	
    } 
    .thememount-header-style-4.tm-header-invert .header-controls{
    	padding-left: 20px;
    } 
    .thememount-header-style-4.tm-header-invert .headerlogo{
    	padding-right: 20px;
        padding-left: 0px;
    } 
    .thememount-header-style-4 .headerlogo{
    	padding-left: 20px;
    }       
    .tm-header-invert .search_box, .tm-header-invert .tm-custombutton{
    	padding-left: 0px;
    }   
    .tm-header-invert .thememount-header-cart-link-wrapper{
        padding-right: 20px;
        padding-left: 0;
    }         
    .righticon {
    	display: none;
    }
	.navbar{
        vertical-align: top;
    }
    .menu-toggle {
        display: none;
        z-index: 10;	
    }
    .menu-toggle i{
        color:#fff;
        font-size:28px;
    }
    .toggled-on li, .toggled-on .children {
        display: block;
    }
    
    
    body:not(.thememount-header-style-3) .header-controls .search_box a{
    	background-color: <?php echo $apicona['skincolor']; ?>;
        color: #fff;
    }    
    body:not(.thememount-header-style-3) .header-controls .thememount-header-cart-link-wrapper a .thememount-cart-qty {
        padding-left: 5px;
        position: absolute;
        left: 16px;
        top: -13px;
        background-color: <?php echo $apicona['skincolor']; ?>;
        color: #fff !important;
        height: 23px;
        width: 23px;
        line-height: 23px !important;
        border-radius: 50%;
        text-align: center;
        padding-left: 0;
        font-size: 12px !important;
        -moz-transform:scale(0);
        -webkit-transform:scale(0);
        -o-transform:scale(0);
        transform:scale(0);
    }
    body:not(.thememount-header-style-3) .header-controls .thememount-header-cart-link-wrapper a:hover .thememount-cart-qty {     
    	-moz-transform:scale(1);
        -webkit-transform:scale(1);
        -o-transform:scale(1);
        transform:scale(1);
    }    
    body:not(.thememount-header-style-3) .header-controls {
    	position: relative;
        padding-left: 0px;
    }
    
    
	/* Mega Menu Section*************************/
    #navbar #site-navigation div.mega-menu-wrap{
        clear: none;
        position: inherit;
    }
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal{
        position: static !important;
    }
    #navbar #site-navigation .nav-menu-wrapper > ul {
        margin: 0;
        padding: 0; 
    }
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a{
    	background: none;
    }
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal .mega-sub-menu a {	
        padding-top: 10px;
        padding-bottom: 10px;	
    } 
	/* End Mega Menu Section *************************/   
       

	#navbar #site-navigation div.nav-menu > ul > li,
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item{
        height: <?php echo $headerHeight; ?>px;
        line-height: <?php echo $headerHeight; ?>px !important;
    }
	#navbar #site-navigation div.nav-menu > ul{
    	margin: 0px;
    }    
    #navbar #site-navigation div.nav-menu > ul > li {
        float: left;
        position: relative;
    }   
    #navbar #site-navigation div.nav-menu > ul > li > a,
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
    	display: block;	
        margin: 0px 18px 0px 18px;
        padding:  0px; 
        text-decoration: none;
        position: relative;
        z-index: 1;       
        height: <?php echo $headerHeight; ?>px;
        line-height: <?php echo $headerHeight; ?>px !important;
    }        
    .header-controls .tm-custombutton,
    .header-controls .tm-custombutton h1,
    .header-controls .tm-custombutton h2,
    .header-controls .tm-custombutton h3,
    .header-controls .tm-custombutton h4,
    .header-controls .tm-custombutton h5,
    .header-controls .tm-custombutton h6,
    .header-controls .tm-custombutton span, 
      
    .is-sticky .header-controls .thememount-header-cart-link-wrapper a .thememount-cart-qty,
    .is-sticky .header-controls .thememount-header-cart-link-wrapper a,     
    .is-sticky #navbar #site-navigation div.nav-menu > ul > li > a,
    .is-sticky #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
    	color: <?php echo $apicona['stickymainmenufontcolor']; ?>;
    }  	
    .header-controls .tm-custombutton,    
    .header-controls .thememount-header-cart-link-wrapper a:hover,
    .header-controls .tm-header-small-search-form a:hover{
    	color: rgba( <?php echo tm_hex2rgb($mainMenuFontColor); ?> , 1) ;
    }        

            
    /*Defaultmenu*/    
    .tm-mmenu-active-color-skin  #navbar #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
    .tm-mmenu-active-color-skin  #navbar #site-navigation div.nav-menu > ul > li.current_page_item > a, 
    .tm-mmenu-active-color-skin  #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
    .tm-mmenu-active-color-skin  #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a,     
    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,  
    .tm-dmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current_page_item > a,   
            
    .tm-dmenu-active-color-skin #navbar #site-navigation div.nav-menu > ul > li li a:hover,
    .tm-mmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu a:hover,
    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.nav-menu > ul > li li:hover > a,
    .tm-mmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item li:hover > a,        
    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a,    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-ancestor > a,     
    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a,    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.nav-menu > ul > li li.current-menu-item > a,    
    .tm-dmenu-active-color-skin #navbar #site-navigation div.nav-menu > ul > li li.current_page_item > a {
    	color: <?php echo $apicona['skincolor']; ?> ;
    }   
    
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a:after,
    #navbar #site-navigation div.nav-menu > ul > li > a:after,       
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a:before,
    #navbar #site-navigation div.nav-menu > ul > li > a:before {   
        display: block;
        content: "";
        position: absolute;        
        height: 1px;
        bottom: <?php echo ceil($headerHeight/2 - 12); ?>px;
        width: 100%;
        left: 50%;
        max-width: 0;        
        background-color: <?php echo $apicona['skincolor']; ?> ;
        visibility: hidden;
        margin: 0;        
        -webkit-transition: max-width 0.5s;
        -moz-transition: max-width 0.5s;
        transition: max-width 0.5s;
        -webkit-transition: all 0.3s ease-in-out 0s;
        -moz-transition: all 0.3s ease-in-out 0s;
        -o-transition: all 0.3s ease-in-out 0s;
        transition: all 0.3s ease-in-out 0s;
    }         
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a:before,
    #navbar #site-navigation div.nav-menu > ul > li > a:before {   
    	bottom: <?php echo ceil($headerHeight/2 - 14); ?>px;
    }  
	
    .is-sticky #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a:after,
    .is-sticky #navbar #site-navigation div.nav-menu > ul > li > a:after{
    	bottom: <?php echo ceil($headerHeightSticky/2 - 12); ?>px;
    } 
    .is-sticky #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a:before,
    .is-sticky #navbar #site-navigation div.nav-menu > ul > li > a:before{
    	bottom: <?php echo ceil($headerHeightSticky/2 - 14); ?>px;
    }      
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li:hover > a:after,
    #navbar #site-navigation div.nav-menu > ul > li:hover > a:after{
    	 max-width: 100%;
         visibility: visible;
		 left: 0%;
    }                
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li:hover > a:before,
    #navbar #site-navigation div.nav-menu > ul > li:hover > a:before {
		max-width: 100%;
        visibility: visible;
		left: 0%;
    }    
    .thememount-header-style-3  #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a:before,
    .thememount-header-style-3  #navbar #site-navigation div.nav-menu > ul > li > a:before,
    .thememount-header-style-3  #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a:after,
    .thememount-header-style-3  #navbar #site-navigation div.nav-menu > ul > li > a:after,    
    
    .thememount-header-style-6  #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a:before,
    .thememount-header-style-6  #navbar #site-navigation div.nav-menu > ul > li > a:before,
    .thememount-header-style-6  #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a:after,
    .thememount-header-style-6  #navbar #site-navigation div.nav-menu > ul > li > a:after{
    	display: none;
    } 
    
    /* Sub Navigation Section *********************/     
    .thememount-header-style-1 #navbar #site-navigation div.nav-menu > ul li.last ul.sub-menu,
    .thememount-header-style-1 #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.last ul.mega-sub-menu,
    .thememount-header-style-1 #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.mega-last ul.mega-sub-menu,    
    .thememount-header-style-2 #navbar #site-navigation div.nav-menu > ul li.last ul.sub-menu,
    .thememount-header-style-2 #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.last ul.mega-sub-menu,
    .thememount-header-style-2 #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.mega-last ul.mega-sub-menu    {
        left: auto;
        right: 0px !important;
    }   
    
    .thememount-header-style-1 #navbar #site-navigation div.nav-menu > ul li.last ul.sub-menu ul.sub-menu, 
    .thememount-header-style-1 #navbar #site-navigation div.nav-menu > ul li.lastsecond ul.sub-menu ul.sub-menu, 
    
    .thememount-header-style-1 #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.lastsecond ul.mega-sub-menu ul.mega-sub-menu,
    .thememount-header-style-1 #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.last ul.mega-sub-menu ul.mega-sub-menu,
    .thememount-header-style-1 #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.mega-last ul.mega-sub-menu ul.mega-sub-menu,
        
    .thememount-header-style-2 #navbar #site-navigation div.nav-menu > ul li.last ul.sub-menu ul.sub-menu, 
    .thememount-header-style-2 #navbar #site-navigation div.nav-menu > ul li.lastsecond ul.sub-menu ul.sub-menu, 
    
    .thememount-header-style-2 #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.lastsecond ul.mega-sub-menu ul.mega-sub-menu,
    .thememount-header-style-2 #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.last ul.mega-sub-menu ul.mega-sub-menu,
    .thememount-header-style-2 #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal li.mega-menu-flyout.mega-last ul.mega-sub-menu ul.mega-sub-menu{
    	left: -100%;
    }      
    #navbar #site-navigation div.nav-menu > ul ul,
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout ul.mega-sub-menu {
        width: 250px;
    }    
    #navbar #site-navigation div.nav-menu > ul ul ul{  
        margin-top: -10px;      
    }          
    #mega-menu-wrap-primary #mega-menu-primary li.mega-menu-item a.mega-menu-link:before {
        margin: 0 9px 0 0px;
    }   

    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item{    
        padding: 0px 0px 0px 0px;     
        height: 100%;        
    }    
    .tm-dmenu-v-sep-white #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.widget_nav_menu > div:after,
    .tm-dmenu-v-sep-grey #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.widget_nav_menu > div:after{
        content: '';
        width: 1px;
        height: 1000px;
        right: 0;
        top: 0;     
        position: absolute;
        border-right: 1px solid rgba(255, 255, 255, 0.08);
    }  
    .tm-dmenu-v-sep-grey #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.widget_nav_menu > div:after{
     	 border-right: 1px solid rgba(0, 0, 0, 0.08);
    }     
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.widget_nav_menu:last-child > div:after {
    	border-right: none;
    }  
	#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu {
 		overflow: hidden;
	}
    .tm-dmenu-v-sep-white #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item{
      border-right: 1px solid rgba(255, 255, 255, 0.08);
    }
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.mega-menu-columns-1-of-1:nth-child(1n),
	#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.mega-menu-columns-1-of-2:nth-child(2n),
	#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.mega-menu-columns-1-of-3:nth-child(3n),
	#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.mega-menu-columns-1-of-4:nth-child(4n),
	#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.mega-menu-columns-1-of-5:nth-child(5n),
	#navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.mega-menu-columns-1-of-6:nth-child(6n) {
	  border-right:none;
	}    
    .tm-dmenu-v-sep-grey #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item{
      border-right: 1px solid rgba(0, 0, 0, 0.08);
    }
    .tm-dmenu-v-sep-white #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.widget_nav_menu,
    .tm-dmenu-v-sep-grey #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item.widget_nav_menu,
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item:last-child{
     border-right: none;
    }
    #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title{
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 15px;
        padding-bottom: 15px;      
    }          
    #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title{
    	margin-top:10px;
        margin-bottom: 0px;
    }         
    #navbar #site-navigation div.nav-menu > ul li:hover > ul {
      opacity: 1;
      display: block;
      visibility: visible;
      height: auto;
    }
	#navbar #site-navigation div.nav-menu > ul li > ul ul  {
        border-left: 0;
        left: 100%;
        top: 0;
        border-top: 0;
    }
    #navbar #site-navigation ul ul li {
    	position: relative;
    }    
    #navbar #site-navigation div.nav-menu > ul ul {
        position: absolute;
        visibility: hidden;
        display: block;
        opacity: 0; 
        line-height: 14px;        
        padding-left: 0;
        margin: 0;
        list-style: none;
        left: 0;        
        border-radius: 0;
        -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
        background-clip: padding-box;
        transition: all .2s ease;
        z-index: 99;
    }    
    #navbar #site-navigation div.nav-menu > ul ul,
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu { 
        border-radius: 0;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);         
    } 
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li ul.mega-sub-menu ul.mega-sub-menu,
    #navbar #site-navigation div.nav-menu > ul ul ul  {
    	border-top: none;
    }
    #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a{
    	background-color: transparent !important;
    }     
  	.tm-header-invert #navbar #site-navigation div.nav-menu > ul > li, 
    .tm-header-invert #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item {
        float: right;
    }
  
  	/* Dropdown Seprator *********************/    
    /* Greay sep*/    
    .tm-dmenu-sep-grey #navbar #site-navigation div.nav-menu ul ul li a,
    .tm-dmenu-sep-grey #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu a {
    	border-bottom: 1px solid rgba(0, 0, 0, 0.08);
    }
    .tm-dmenu-sep-white #navbar #site-navigation div.nav-menu ul ul li a,
    .tm-dmenu-sep-white #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu a {
    	border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }  
    #navbar #site-navigation div.nav-menu ul ul li a:after,
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu a:after {
        display: block;
        content: '';
        position: absolute !important;
        left: 0;
        bottom: 0px;
        margin: 0 auto -1px;
        height: 1px;
        width: 100%;
        z-index: -1;
        opacity: 0;
        background-color: transparent ;
        transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -webkit-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
    }  
    #navbar #site-navigation div.nav-menu ul ul li a:hover:after,
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu a:hover:after {      
        opacity: 1;
        width: 100%;        
    }
    
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu .textwidget a:after{
    	display: none;
    }
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul.mega-sub-menu .textwidget a{
    	border-bottom: none;
   	}

	/* Sticky Header Height *********************/
    .is-sticky .tm-custombutton, 
    .is-sticky .headerlogo, 
    .is-sticky .search_box, 
    .is-sticky .thememount-header-cart-link-wrapper,
    .is-sticky #navbar #site-navigation div.nav-menu > ul > li,
    .is-sticky #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li,    
    .is-sticky #navbar #site-navigation div.nav-menu > ul > li > a, 
    .is-sticky #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
        height: <?php echo $headerHeightSticky; ?>px ;
        line-height: <?php echo $headerHeightSticky; ?>px !important;
    }     
    
    /* Sub Navigation menu *********************/    
    #navbar #site-navigation div.nav-menu > ul ul,
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu{
        top: <?php echo $headerHeight; ?>px;
    }  
      
    /* Sticky Sub Navigation menu *********************/    
    .is-sticky  #navbar #site-navigation div.nav-menu > ul > li > ul, 
    .is-sticky  #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu{
        top: <?php echo $headerHeightSticky; ?>px;
    }

	/* Header height *********************/ 
    #navbar #site-navigation div.mega-menu-wrap .mega-menu-toggle + label{
        top: <?php echo ceil($headerHeight/2); ?>px;
    }
    .thememount-header-style-6 .k_flying_searchform_wrapper.stickyform{
    	position: fixed;
    	top: 68px;
    }
    .thememount-header-style-6 .k_flying_searchform_wrapper.stickyform{    	
    	top: 55px;
    }   
    
    /* thememount-header-style-3 --------------------------------*/	
	.thememount-header-style-3.tm-header-overlay .is-sticky #navbar {
		width: 100%;
		z-index: 9;
		left: 0;
		top: 0;
		box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-khtml-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-webkit-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-moz-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-ms-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-o-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
	}
	.thememount-header-style-3.tm-header-overlay .is-sticky #navbar {
		box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-khtml-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-webkit-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-moz-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-ms-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-o-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
	}
	.thememount-header-style-3.tm-header-overlay #stickable-header .headerlogo, 
	.thememount-header-style-3.tm-header-overlay #navbar {
		background-color: transparent;
	}
	.thememount-header-style-3.tm-header-overlay .is-sticky #stickable-header #navbar{
		border-top: none;
	}
	.tm-header-overlay  .headerblock {
		position: absolute;
		z-index: 21;	
		width:100%;
		box-shadow: none;
		-khtml-box-shadow: none;
		-webkit-box-shadow: none;
		-moz-box-shadow: none;
		-ms-box-shadow: none;
		-o-box-shadow: none;
	}
	.tm-header-hrelative.tm-header-overlay .headerblock {
		position: relative;
		z-index: 21;
		width:100%;
		box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-khtml-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-webkit-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-moz-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-ms-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
		-o-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
	}
	.thememount-header-style-4 #stickable-header{
		margin-top: 35px;
	}        
     
    /* thememount-header-style-2 *********************/   
    .thememount-header-style-2 #navbar #site-navigation div.nav-menu > ul,
    .thememount-header-style-2 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal,
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul,
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal {      
        text-align: left;
    }
    .thememount-header-style-2 #navbar #site-navigation div.nav-menu > ul ul,
    .thememount-header-style-2 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul,
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul ul,
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal ul{      
        text-align: left;
    }   
    .thememount-header-style-2 #navbar #site-navigation div.nav-menu > ul > li,
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul > li {
        float: left;  
        display: inline-block;
    }      
    .thememount-header-style-2 #stickable-header .headerlogo {
        text-align: center;
        position: absolute;
        width: 100%;
    }     
    .thememount-header-style-2 #navbar #site-navigation div.nav-menu > ul > li.logo-after-this, 
    .thememount-header-style-2 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-logo-after-this{
        margin-right: <?php echo $centerLogoWidth; ?>px;
    }
    .thememount-header-style-2 h1.site-title,
    .thememount-header-style-2 span.site-title { 
        width: <?php echo $centerLogoWidth; ?>px; 
        margin: 0 auto; 
    }
    .thememount-header-style-2 #navbar #site-navigation div.nav-menu > ul > li:first-child,
    .thememount-header-style-2 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li:first-child{
        margin-left: <?php echo $firstMenuMargin; ?>px;
 	}    
    .thememount-header-style-2 #navbar, 
    .thememount-header-style-2 #navbar #site-navigation div.mega-menu-wrap{
    	float: none;
    } 
 
 	/* thememount-header-style-3 *********************/  
    .thememount-header-style-3 .thememount-header-cart-link-wrapper > a,   
    .thememount-header-style-3 .tm-header-small-search-form > a{
    	width: 50px;
        display: block;
        text-align: center;
    }
    .thememount-header-style-3 .tm-header-small-search-form{       
        position: relative;	
        float: right;
    }     
    .thememount-header-style-3 .header-controls{
    	z-index: 1;
    }     
    .thememount-header-style-3 .is-sticky #navbar{
    	  width: 100%;
    }    
    .thememount-header-style-3 #navbar,   
    .thememount-header-style-3 #navbar #site-navigation .mega-menu-wrap, 
    .thememount-header-style-3 .menu-main-menu-container, 
    .thememount-header-style-3 div.nav-menu,
    .thememount-header-style-2 div.nav-menu{
        float: none;
    }    
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal{
    	 float: left;
    }  
    .thememount-header-style-3 .tm-header-small-search-form > a,   
    .thememount-header-style-3 .tm-header-small-search-form label,
    .thememount-header-style-3 .is-sticky #navbar #site-navigation div.nav-menu > ul > li,
    .thememount-header-style-3 .is-sticky #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li,    
    .thememount-header-style-3 .is-sticky #navbar #site-navigation div.nav-menu > ul > li > a, 
    .thememount-header-style-3 .is-sticky #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,    
    .thememount-header-style-3 .tm-custombutton,
    .thememount-header-style-3 .search_box, 
    .thememount-header-style-3 .thememount-header-cart-link-wrapper,
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul > li, 
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item,
    .thememount-header-style-3 .is-sticky #navbar #site-navigation div.nav-menu > ul > li, 
    .thememount-header-style-3 .is-sticky #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li{
        height: 62px;
        line-height: 62px !important;
    }        
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul > li > a, 
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a,    
    .thememount-header-style-3 .is-sticky #navbar #site-navigation div.nav-menu > ul > li > a,
    .thememount-header-style-3 .is-sticky #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
        margin-top: 0px;
    }    
    .thememount-header-style-3 .header-controls .tm-custombutton *,
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a,
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul > li > a{
        height: 62px;
        line-height: 62px !important;       
    }    
    .tm-header-overlay #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li ul.mega-sub-menu, 
    .tm-header-overlay #navbar #site-navigation div.nav-menu > ul ul{
    	border-top: 2px solid <?php echo $apicona['skincolor']; ?>;
    }    
    .thememount-header-style-3.tm-header-overlay #stickable-header #navbar {	
    	border-top: 1px solid rgba(0, 0, 0, 0.09);	
    }
    .thememount-header-style-3.tm-header-overlay #stickable-header.tm-dark-header #navbar{
   		border-top: 1px solid rgba(255, 255, 255, 0.2);
    }
    .thememount-header-style-3 .thememount-header-cart-link-wrapper:before {
    	background-color: rgba( 0,0,0 , 0.09);
    }    
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li:hover > a,
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul > li:hover > a{
    	background-color: <?php echo $apicona['skincolor']; ?>;
    }    
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > a:before, 
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul > li > a:before{
    	display: none;
    }    
    
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal,
    .thememount-header-style-3 .header-controls{
    	border-right: 1px solid rgba(255, 255, 255, 0.3);
    }
    .thememount-header-style-3 .header-controls > div,
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul > li, 
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item{
		border-left: 1px solid rgba(255, 255, 255, 0.3);
    } 
    .header-controls .thememount-header-cart-link-wrapper a:hover,
    .header-controls .tm-header-small-search-form a:hover,
    
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul > li:hover > a, 
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a {
		background-color: rgba(255, 255, 255, 0.15);
    } 
    
        
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul > li > a, 
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
        margin: 0px;
        padding: 0px 22px 0px 22px;
    } 
    .thememount-boxed.thememount-header-style-3 #navbar {      
        margin-left: -15px;
        margin-right: -15px;
    }    
     .thememount-boxed.thememount-header-style-3 .is-sticky #navbar {      
        margin-left: 0px;
        margin-right: 0px;
    } 
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor:hover > a,     
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item:hover > a, 
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul > li:hover > a, 
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a{
        color: #fff;       
    }   
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul > li > a:after, 
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a:after {       
        right: -6px;
    }    
    .thememount-header-style-3 .tm-top-info-con{
    	display: block;
    }    
    .thememount-header-style-3 .is-sticky #navbar{
		width: 100%;
        left: 0;
	}     
    .thememount-header-style-3 .is-sticky #navbar .main-navigation {
		max-width: 1140px;
        margin: 0 auto;
        position: relative;
	}         
    .thememount-header-style-3 #navbar {        
        position: relative;
    }
    .thememount-header-style-3 .site-title{
        display:inline-block;
        height:auto;
        width:auto;
    }
    .thememount-header-style-3 #navbar #site-navigation div.nav-menu > ul ul, 
    .thememount-header-style-3 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu,
    .thememount-header-style-3 .is-sticky #navbar #site-navigation div.nav-menu > ul ul, 
    .thememount-header-style-3 .is-sticky #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > ul.mega-sub-menu {
        top: 62px;
    }
	.thememount-header-style-3 #stickable-header .headerlogo{
        float:left;
        text-align:left; 
        display:block;
        position: relative;
        z-index: 10;
    }
    .thememount-header-style-3 #navbar{
    	background-color: #f5f5f5;
    }
    .thememount-header-style-3 .is-sticky #navbar{
        box-shadow: 0 1px 5px rgba(0,0,0,0.2);
        -khtml-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
        -webkit-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
        -moz-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
        -ms-box-shadow: 0 1px 5px rgba(0,0,0,0.2);
        -o-box-shadow: 0 1px 5px rgba(0,0,0,0.2);    
    }
    .thememount-header-style-3 .w-search-input input{
        background-color: transparent;
        border: none;
        padding: 15px 20px;
    }
    
    /* thememount-header-style-6 *********************/  
    .thememount-header-style-6 #stickable-header .headerlogo {
        float: none;
        text-align: center;
        width: 100%;
        display: block;
        position: relative;
        z-index: 10;
    }
    .thememount-header-style-6 #navbar, 
    .thememount-header-style-6 #navbar #site-navigation .mega-menu-wrap, 
    .thememount-header-style-6 .menu-main-menu-container, 
    .thememount-header-style-6 div.nav-menu{
    	float: none;
    }    
    .thememount-header-style-6 #navbar #site-navigation div.nav-menu > ul, 
    .thememount-header-style-6 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal{
    	text-align: center;
    }    
    .thememount-header-style-6 .tm-custombutton,
    .thememount-header-style-6 #navbar #site-navigation div.nav-menu > ul > li > a, 
    .thememount-header-style-6 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,    
    .thememount-header-style-6 .search_box, 
    .thememount-header-style-6 .thememount-header-cart-link-wrapper, 
    .thememount-header-style-6 #navbar #site-navigation div.nav-menu > ul > li, 
    .thememount-header-style-6 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item, 
    .thememount-header-style-6 .is-sticky #navbar #site-navigation div.nav-menu > ul > li, 
    .thememount-header-style-6 .is-sticky #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li {
        height: 55px;
        line-height: 55px !important;
    }    
    .thememount-header-style-6 #navbar #site-navigation div.nav-menu > ul > li {
        float: none;        
        display: inline-block;
        height: auto;
    }  
    .thememount-header-style-6 #navbar #site-navigation div.nav-menu > ul ul{
    	text-align: left;
    }      
    .thememount-header-style-6 #navbar #site-navigation div.nav-menu > ul > li > a{
    	margin-top: 0px;
    }    
    .thememount-header-style-6 #navbar #site-navigation div.nav-menu > ul ul, 
    .thememount-header-style-6 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu,    
    
    .thememount-header-style-6 .is-sticky #navbar #site-navigation div.nav-menu > ul > li > ul, 
    .thememount-header-style-6 .is-sticky #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li > ul.mega-sub-menu{
    	top: 55px;
    }       
    .thememount-header-style-6 #navbar #site-navigation div.nav-menu > ul li > ul ul{
    	top: 0px;
    }      
    .thememount-header-style-6 #stickable-header .container {
    	width: auto;
		padding: 0;
    }    
    .thememount-header-style-6:not(.tm-header-overlay) #navbar {
    	background-color: rgba( <?php echo tm_hex2rgb($apicona['menubgcolor']); ?> , 1); 
    }    
    .thememount-header-style-6 #navbar .main-navigation {
        max-width: 1170px;
        margin: 0 auto;
        position: relative;
    }
    .thememount-header-style-6 .is-sticky #navbar, 
    .thememount-header-style-6 .is-sticky #navbar .main-navigation {
    	width: 100%;
        left: 0;
    }        
    .thememount-boxed.thememount-header-style-6 .is-sticky #navbar{        
        width: 1200px;
        left: auto;
        right: auto;
    }    
    .thememount-header-style-6 .header-controls {        
        z-index: 2;
        position: absolute;
        right: 0px;
    }    
    body.thememount-header-style-6 .k_flying_searchform_wrapper {
        margin-top: -24px;
    }      
    .thememount-header-style-6 .site-title {
        display: inline-block;
        height: auto;
        width: auto;
    }    
    .thememount-header-style-6 .is-sticky #navbar,
    .thememount-header-style-6.tm-header-overlay .is-sticky #navbar {
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.20);
        -khtml-box-shadow: 0 1px 5px rgba(0,0,0,0.20);
        -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.20);
        -moz-box-shadow: 0 1px 5px rgba(0,0,0,0.20);
        -ms-box-shadow: 0 1px 5px rgba(0,0,0,0.20);
        -o-box-shadow: 0 1px 5px rgba(0,0,0,0.20);
    }   
    .thememount-header-style-6 #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li:hover > a:before, 
    .thememount-header-style-6 #navbar #site-navigation div.nav-menu > ul > li:hover > a:before{
    	top: -1px;
    }    
    .tm-top-info-con ul{
    	height: <?php echo $headerHeight; ?>px;
    }
	
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout .mega-sub-menu li:last-child,
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-megamenu .mega-sub-menu li.mega-menu-item li:last-child{
    	margin-bottom: 0px;
    }    
    .tm-header-overlay:not(.thememount-header-style-4) .kwayy-header-white #navbar .header-controls .tm-custombutton, 
    .tm-header-overlay:not(.thememount-header-style-4) .kwayy-header-white #navbar .header-controls .thememount-header-cart-link-wrapper a, 
    .tm-header-overlay:not(.thememount-header-style-4) .kwayy-header-white #navbar .header-controls .search_box a,
    
    .tm-header-overlay:not(.thememount-header-style-4) .kwayy-header-white #navbar #site-navigation div.nav-menu > ul > li > a, 
    .tm-header-overlay:not(.thememount-header-style-4) .kwayy-header-white #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
        color: #fff;
    }        
    .tm-header-overlay:not(.thememount-header-style-4) .is-sticky .kwayy-header-white #navbar .header-controls .tm-custombutton, 
    .tm-header-overlay:not(.thememount-header-style-4) .is-sticky .kwayy-header-white #navbar .header-controls .thememount-header-cart-link-wrapper a, 
    .tm-header-overlay:not(.thememount-header-style-4) .is-sticky .kwayy-header-white #navbar .header-controls .search_box a,
    
    .tm-header-overlay:not(.thememount-header-style-4) .is-sticky .kwayy-header-white #navbar #site-navigation div.nav-menu > ul > li > a, 
    .tm-header-overlay:not(.thememount-header-style-4) .is-sticky .kwayy-header-white #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
        color: #222222;
    }
    .tm-header-overlay:not(.thememount-header-style-4) #stickable-header.kwayy-header-white {
        border-bottom-color: rgba(255, 255, 255, 0.15);
    }
	.tm-header-overlay:not(.thememount-header-style-4) .kwayy-header-white #navbar .header-controls .thememount-header-cart-link-wrapper a:hover, 
    .tm-header-overlay:not(.thememount-header-style-4) .kwayy-header-white #navbar .header-controls .search_box a:hover{
		color: <?php echo $apicona['skincolor']; ?>;
	}


	.tm-header-small-search-form .tm-hedear-search{
        position: absolute;
        right: 0px;
        background-color: #fff;
        border: 4px solid rgba(0, 0, 0, 0.19);
        width: 315px;
    }
    .thememount-header-style-4 #stickable-header .container-full .headercontent, 
    .thememount-header-style-4 #stickable-header .container .headercontent{
        padding-left: 0px;
        padding-right: 0px;	
        box-shadow: 0 1px 2px rgba(0,0,0,0.2);
        -khtml-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
        -ms-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
        -o-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
    }
	.thememount-header-style-6.tm-header-overlay #navbar{
    	 background-color: rgba( <?php echo tm_hex2rgb($apicona['menubgcolor']); ?> , 0.08);         
    }   
    .thememount-header-style-6.tm-header-overlay #navbar:before {
        content: "";
        position: absolute;
        top: -2px;
        left: 0;
        width: 100%;
        height: 0;
        border-top: 1px solid rgba( <?php echo tm_hex2rgb($apicona['menubgcolor']); ?> , 0.20);
    }
     .thememount-header-style-6.tm-header-overlay #navbar:after {
        content: "";
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 0;
        border-bottom: 1px solid rgba( <?php echo tm_hex2rgb($apicona['menubgcolor']); ?> , 0.20);
    } 
    .thememount-header-style-6.tm-header-overlay .is-sticky #navbar:after {
		display: none;
    }   
	.thememount-header-style-6 .is-sticky #navbar, 
    .thememount-header-style-6.tm-header-overlay .is-sticky #navbar{
		background-color: <?php echo $stickyheaderbgcolor; ?>;
	}    
    #navbar #site-navigation div.nav-menu > ul > li ul li.page_item_has_children > a:before,
    #navbar #site-navigation div.nav-menu > ul > li ul li.menu-item-has-children > a:before,
    #navbar #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-flyout .mega-sub-menu li.mega-menu-item-has-children > a:before{
        font-family: "FontAwesome";
        font-style: normal;
        font-weight: normal;
        speak: none;
        display: inline-block;
        text-decoration: inherit;        
        text-align: center;
        opacity: .8;
        font-variant: normal;
        text-transform: none;        
        font-size: 13px;
        content: "\f105";       
        position: absolute;
        background-color: transparent;
        right: 14px;
        top: 17px;
        margin: 0;
    }
	.header-controls{
    	position: relative;
    }    
	.thememount-header-style-6 .tm-custombutton,
    body.thememount-header-style-6 .header-controls:before {
    	display: none !important;
    } 
	.thememount-header-style-6 .navigation  .header-controls {
		z-index: 1;
		position: absolute;
		right: 0px;
	}
	   
    body:not(.thememount-header-style-3) .header-controls:before {
        display: block;
        content: '';
        position: absolute;
        left: 0px;
        top: 50%;
        height: 22px;
        width: 1px;
        background-color: #DCDCDC;
        margin-top: -11px;
    }
    body.tm-header-invert:not(.thememount-header-style-3) .header-controls:before {
        left: auto;
        right: 2px;
    }    
    body:not(.thememount-header-style-3) .header-controls:before {
        background-color: rgba( <?php echo tm_hex2rgb($mainMenuFontColor); ?> , 0.12) ;
    }
    .thememount-header-style-4 .search_box {
    	padding-right: 15px;
    }
    body.tm-header-invert:not(.thememount-header-style-3) .k_flying_searchform_wrapper {
         right: auto;
    }
    body.tm-header-invert:not(.thememount-header-style-3) .w-search-input input{
    	 text-align: right;
    }

	/* thememount-header-style-1 ( Highlight Logo ) *********************/  
	.thememount-header-style-1.tm-header-highlight-logo .headerlogo{
    	position: relative;
    	background-color: <?php echo $apicona['skincolor']; ?>;
   	}
    .thememount-header-style-1.tm-header-highlight-logo .headerlogo:after,
    .thememount-header-style-1.tm-header-highlight-logo .headerlogo:before  {
        content: "";       
        position: absolute;
        left: 100%;
        top: 0;
        width: 64px;
        height: 100%;
        background-color: <?php echo $apicona['skincolor']; ?>;
    }
    
	.thememount-header-style-1.tm-header-highlight-logo.tm-header-invert.thememount-boxed .is-sticky .headerlogo:after,
	.thememount-header-style-1.tm-header-highlight-logo.thememount-boxed:not(.tm-header-invert) .is-sticky .headerlogo:before {
		width: 30px;
	}
	
    
    .thememount-header-style-1.tm-header-highlight-logo .headerlogo:before {       
        left: auto;
        right: 100%;        
        width: 1200px;        
    }    
    .thememount-header-style-1.tm-header-highlight-logo.tm-header-invert .headerlogo:before {
        right: 100%;
        left: auto;       
        width: 80px;    
    }    
     .thememount-header-style-1.tm-header-highlight-logo.tm-header-invert .headerlogo:after {
        left: 100%;
        right: auto;       
        width: 1200px;    
    }    
    body:not(.thememount-header-style-3).tm-header-highlight-logo .header-controls{
    	padding-left: 0px;
    }
    

    


} 