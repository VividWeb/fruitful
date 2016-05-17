<?php  
defined('C5_EXECUTE') or die("Access Denied.");
$color = Loader::helper('form/color');
$al = Loader::helper('concrete/asset_library');
$fp = FilePermissions::getGlobal();
$tp = new TaskPermission();
$formPageSelector = Loader::helper('form/page_selector');
?>
<script>
    var CCM_EDITOR_SECURITY_TOKEN = "<?php  echo Loader::helper('validation/token')->generate('editor')?>";
    $('#redactor-content').redactor({
            minHeight: '130',
            'concrete5': {
                filemanager: <?php  echo $fp->canAccessFileManager()?>,
                sitemap: <?php  echo $tp->canAccessSitemap()?>,
                lightbox: true
            },
            'plugins': [
                'fontfamily','fontsize','fontcolor','concrete5'
            ]
        });
</script>
<div class="well bg-info">
    <p><?=t('Choosing a background image will overwrite using the background color')?></p>
</div>
<div class="row">
    <div class="col-xs-6">
        <div class="form-group">
        	<?php echo $form->label('bgColor', t("Background:"));?>
        	<?php echo $color->output("bgColor", $bgColor?$bgColor:"rgb(80,80,80)"); ?>  
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            <?php echo $form->label('textColor', t("Text:"));?>
            <?php echo $color->output("textColor", $textColor?$textColor:"rgb(255,255,255)"); ?>  
        </div>
    </div>
</div>
<div class="form-group">
	<?php echo $form->label('fID', t('Background Image:'));?>
	<?php echo $al->image('fID', 'fID', t('Choose Image'), $fID?File::getByID($fID):null);?>
</div>
<div class="form-group">
	<?php echo $form->label('content', t('Content:'));?>
    <textarea style="display: none" id="redactor-content" name="content"><?=$content?></textarea>
</div>
<div class="form-group">
    <?php echo $form->label('btnLink', t('Button Link:'));?>
    <?php echo $formPageSelector->selectPage('btnLink',$btnLink); ?>
</div>
<div class="form-group">
    <?php echo $form->label('btnText', t('Button Text:'));?>
    <?php echo $form->text('btnText',$btnText); ?>
</div>
