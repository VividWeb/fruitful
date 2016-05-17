<?php  defined('C5_EXECUTE') or die("Access Denied."); 
$c = Page::getCurrentPage();
?>
<div class="fruitful-page-title">
<h1 class="page-title"><?php echo $title?></h1>
<p><?=$c->getCollectionDescription();?></p>
</div>