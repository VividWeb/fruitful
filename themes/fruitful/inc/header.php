<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<!DOCTYPE HTML>
<html>
<head>

    <? Loader::element('header_required'); ?>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,900' rel='stylesheet' type='text/css'>
	<?php echo $html->css($view->getStylesheet('iGotStyle.less'))?>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0,  maximum-scale=1.0, user-scalable=no">
	
</head>

<body id="page<?php echo $c->getCollectionID();?>">

<div class="<?php echo $c->getPageWrapperClass()?>">
		
	<header id="siteHeader">
	    
	    <div id="searchShell">
	        
	        <div class="container">
	            
	            <? $a = new GlobalArea('Search'); $a->display(); ?>
	            
	        </div>
	        
	    </div>
	    
	    <?php
        $a = new GlobalArea('Links');
        $blocks = $a->getTotalBlocksInArea();
        $displayLinksShell = $blocks > 0 || $c->isEditMode();
        if($displayLinksShell){
        ?>
        <div id="store-links-shell">
            
            <div class="container">
                
                <div class="col-xs-12">
            
                    <?php $a->display(); ?>
            
                </div>
            
            </div>
            
        </div>
        <?php } ?>
	
        <div class="container">
            
            <div class="row">
        
    	        <div id="logo" class="col-xs-6 col-md-3">
    	        
    	            <? $a = new GlobalArea('Logo'); $a->display(); ?>
    	        
    	        </div><!-- #logo -->
    		        
		        <nav id="mainNav" class="clearfix hidden-xs hidden-sm col-sm-9">
		        
		            <? $a = new GlobalArea('Header Nav'); $a->display(); ?>
		            
		        </nav>
		        
		        <div id="mobileAssets" class="col-xs-6 visible-xs-block visible-sm-block text-right">
                    
                    <div id="icoMobileNav"><i class="fa fa-bars"></i></div>
                
                </div><!-- #mobileAssets -->
	        
	        </div><!-- .row -->
	              
        </div><!-- .container -->             
	                	
	</header>
	