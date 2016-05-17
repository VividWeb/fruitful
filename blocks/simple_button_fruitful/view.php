<?php defined('C5_EXECUTE') or die(_("Access Denied."));

	$nav = Loader::helper('navigation');
	$page = Page::getByID($pageID);
    
	if ($linkType == "internal"){
		if(is_object($page)){    
    		$theLink = $nav->getLinkToCollection($page);
    		$target = "";
        }
	}
	else { 
		$theLink = $externalLink;
		$target = " target='_blank'";
	}
	if ($arrow != "noarrow")
		$arrowClass=$arrow;
 
?>  

<a href="<?php echo $theLink; ?>" class="simpleButton btn btn-primary btn-lg <?php echo $arrowClass;?>"<?php echo $target;?>><?php echo $buttonText; ?></a>  