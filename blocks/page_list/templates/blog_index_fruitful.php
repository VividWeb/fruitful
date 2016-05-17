<?php
defined('C5_EXECUTE') or die("Access Denied.");
$th = Loader::helper('text');
$c = Page::getCurrentPage();
$dh = Core::make('helper/date'); /* @var $dh \Concrete\Core\Localization\Service\Date */
?>

<?php if ( $c->isEditMode() && $controller->isBlockEmpty()) { ?>
    <div class="ccm-edit-mode-disabled-item"><?php echo t('Empty Page List Block.')?></div>
<?php } else { ?>

<div class="ccm-block-page-list-wrapper blog-list fruitful-blog">

    <?php if ($pageListTitle): ?>
        <h1><?php echo $pageListTitle?></h1>
    <?php endif; ?>

    <?php if ($rssUrl): ?>
        <a href="<?php echo $rssUrl ?>" target="_blank" class="ccm-block-page-list-rss-feed"><i class="fa fa-rss"></i></a>
    <?php endif; ?>

    <?php foreach ($pages as $page):

		// Prepare data for each page being listed...
        $buttonClasses = 'ccm-block-page-list-read-more';
        $entryClasses = 'ccm-block-page-list-page-entry';
		$title = $th->entities($page->getCollectionName());
		$url = $nh->getLinkToCollection($page);
		$target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
		$target = empty($target) ? '_self' : $target;
		$description = $page->getCollectionDescription();
		$description = $controller->truncateSummaries ? $th->wordSafeShortText($description, $controller->truncateChars) : $description;
		$description = $th->entities($description);
        $thumbnail = false;
        if ($displayThumbnail) {
            $thumbnail = $page->getAttribute('thumbnail');
        }
        $includeEntryText = false;
        if ($includeName || $includeDescription || $useButtonForLink) {
            $includeEntryText = true;
        }
        if (is_object($thumbnail) && $includeEntryText) {
            $entryClasses = 'ccm-block-page-list-page-entry-horizontal';
        }

        $date = $page->getCollectionDatePublic();
		if(method_exists($entryController,'getCommentCountString')) {
			$comments = $entryController->getCommentCountString('%s '.t('Comment'), '%s '.t('Comments'));
		}
		
		?>
        
        <article class="entry row <?php echo $entryClasses?>">
			<header class="col-xs-12 col-sm-3">
	            <?php if ($includeName): ?>
	            <h2 class="ccm-page-list-title"><a href="<?php  echo $url; ?>"><?php  echo $title; ?></a></h2>
	            <?php endif; ?>
	            <?php if ($includeDate): ?>
	            <time class="date" datetime="<?=$date?>">
	                <span class="month"><?=$dh->formatCustom('M',$date)?></span>
	                <span class="day"><?=$dh->formatCustom('d',$date)?></span>
	                <span class="year"><?=$dh->formatCustom('Y',$date)?></span>                            
	            </time>
	            <?php endif; ?>
	        </header>
	        <div class="col-xs-12 col-sm-9">
    	        <?php if ($includeDescription): ?>
    	        <div class="description">
    		       <?php echo $description; ?>
    	        </div>
    	        <?php endif; ?>
    	        <?php if ($useButtonForLink): ?>
    	        <a class="btn btn-default btnEntry" href="<?=$url?>"><?php echo t('Read More')?></a>
    	        <?php endif; ?>
	        </div>
			
		</article>

	<?php endforeach; ?>

    <?php if (count($pages) == 0): ?>
        <div class="ccm-block-page-list-no-pages"><?php echo $noResultsMessage?></div>
    <?php endif;?>

</div><!-- .blogList-->


<?php if ($showPagination): ?>
    <?php echo $pagination;?>
<?php endif; ?>

<?php } ?>