<?php defined('C5_EXECUTE') or die(_("Access Denied."));

	$nav = Loader::helper('navigation');
	$page = Page::getByID($pageID);
	if ($linkType == "internal"){
		$theLink = $nav->getLinkToCollection($page);
		$target = "";
	}
	else { 
		$theLink = $externalLink;
		$target = " target='_blank'";
	}
	if ($arrow != "noarrow")
		$arrowClass=$arrow;
 
?>  

<div class="intro-cta row">
    <p class="intro-cta-text col-xs-12 col-sm-9 col-md-offset-1 col-md-8">
       <?=$ctaText?> 
    </p>
    <div class="intro-cta-btn col-xs-12 col-sm-3 col-md-2">
        <a href="<?php echo $theLink; ?>" class="simpleButton btn btn-primary btn-lg <?php echo $arrowClass;?>"<?php echo $target;?>><?php echo $buttonText; ?></a>  
    </div>
</div>