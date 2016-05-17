<?php
defined('C5_EXECUTE') or die("Access Denied.");
$th = Loader::helper('text');
$c = Page::getCurrentPage();
$dh = Core::make('helper/date'); /* @var $dh \Concrete\Core\Localization\Service\Date */
?>

<?php if ( $c->isEditMode() && $controller->isBlockEmpty()) { ?>
    <div class="ccm-edit-mode-disabled-item"><?php echo t('Empty Page List Block.')?></div>
<?php } else { ?>

<div class="blog-list homepage-blog-list">

    <?php if ($pageListTitle): ?>
        <h2><?php echo $pageListTitle?></h2>
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
        $original_author = Page::getByID($page->getCollectionID(), 1)->getVersionObject()->getVersionAuthorUserName();
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

       
        <?php if (is_object($thumbnail)): ?>
            <div class="ccm-block-page-list-page-entry-thumbnail">
                <?php
                $img = Core::make('html/image', array($thumbnail));
                $tag = $img->getTag();
                $tag->addClass('img-responsive');
                print $tag;
                ?>
            </div>
        <?php endif; ?>
        
        <article class="entry <?php echo $entryClasses?>">
			<header class="row">
	            <div class="col-xs-3">
    	            <time class="date" datetime="<?=$date?>">
    	                <div class="day"><?=$dh->formatCustom('d',$date)?></div>
                        <div class="month"><?=$dh->formatCustom('M',$date)?></div>  
    	            </time>
	            </div>
	            <div class="col-xs-9">
    	            <?php if ($includeName): ?>
    	            <h3 class="ccm-page-list-title"><a href="<?php  echo $url; ?>"><?php  echo $title; ?></a></h3>
    	            <p><small>posted by <?=$original_author?></small></p>
    	            <?php endif; ?>
	            </div>
	        </header>
            <div class="entry-content row">
                <?php if ($includeDescription): ?>
                <div class="col-xs-9 col-xs-offset-3">
                    <p><?=$description?></p>
                </div>
                <?php endif; ?>
            </div>
            <div class="read-more-shell row">
	            <div class="col-xs-12">
	               <a class="btn-read-more" href="<?=$url?>"><?php echo $buttonLinkText?></a>
	            </div>
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