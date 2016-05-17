<?php   
defined('C5_EXECUTE') or die(_("Access Denied."));
$formPageSelector = Loader::helper('form/page_selector');
?>

<style type="text/css">
	#external { display: none; }
</style>
<script type="text/javascript">

	function updateLinkType(){
		$("#linkType").each(function(){
			
			if ( $(this).find("option:selected").val() == "internal" ) {
				$("#linkTypes").find(">div").hide();
				$("#linkTypes").find("#internal").show();
			}
			if ($(this).find("option:selected").val() == "external" ) {
				$("#linkTypes").find(">div").hide();
				$("#linkTypes").find("#external").show();
			}
		});
	};
	updateLinkType();

</script>

<div class="form-group">
	<?php echo $form->label('buttonText', t("Button Text:"));?>
	<?php echo $form->text('buttonText', $buttonText);?>
</div>

<div class="form-group">
	<?php echo $form->label('arrow', t('Arrow Direction:'));?>
	<?php echo $form->select('arrow', array('noarrow'=>'No Arrow','left'=>'Left', 'right'=>'Right'), $arrow); ?>
</div>

<div class="form-group">
	<?php echo $form->label('linkType', t('Link Type:'));?>
	<?php echo $form->select('linkType', array('internal'=>t('Internal Page'),'external'=>t('External Link')), $linkType, array("onChange" => "updateLinkType();")); ?>
</div>


<div id="linkTypes" style="margin: 20px 0;">

	<div id="internal" class="form-group">
		<?php echo $form->label('pageID', t('Select which page to link to:'));?>
		<?php echo $formPageSelector->selectPage('pageID',$pageID); ?>
	</div>
	
	<div id="external" class="form-group">
		<?php echo $form->label('externalLink', t('Type the URL to link to:'));?>
		<?php echo $form->text('externalLink', $externalLink);?>
	</div>
	
</div>

