<?php  defined('C5_EXECUTE') or die("Access Denied.");

$fp = FilePermissions::getGlobal();
$tp = new TaskPermission();
$ps = Loader::helper('form/page_selector');
$color = Loader::helper('form/color');
?>

<style type="text/css">
    .item-summary { padding: 10px; }
    .item-summary.active { background: #efefef; }
    .item-detail { display: none; background: #efefef; padding: 10px; }
    .ccm-ui .nav-tabs { margin-left: 0; }
</style>
<style>

    .well {  }
    .tab-pane { padding: 20px 0; }
    .ccm-image-slider-block-container .redactor_editor { padding: 20px;  }
    .ccm-image-slider-block-container input[type="text"],
    .ccm-image-slider-block-container textarea { display: block; width: 100%;    }
    .ccm-image-slider-block-container .btn-success { margin-bottom: 20px; }
    .ccm-image-slider-entries { padding-bottom: 30px; }
    .ccm-pick-slide-image { padding: 15px; cursor: pointer; background: #dedede; border: 1px solid #cdcdcd;text-align: center; vertical-align: center;}
    .ccm-pick-slide-image img {max-width: 100%;}
    .ccm-image-slider-entry {position: relative;padding-bottom: 0 !important;  }
    
</style>

<p>
<?php print Loader::helper('concrete/ui')->tabs(array(
    array('pane-items', t('Slides'), true),
    array('pane-settings', t('Slider Settings'))
));?>
</p>
<div class="tab-content">
    
    <div class="ccm-tab-content" id="ccm-tab-content-pane-items">
        
        <div class="well">
            <?=t('You can rearrange slides if needed.')?>
        </div>
        
        <div class="featurette-slides"></div>  
        
        <span class="btn btn-success ccm-add-image-slider-entry"><?php echo t('Add Entry') ?></span>  
        
    </div>
    
    <div class="ccm-tab-content" id="ccm-tab-content-pane-settings">
        
        <div class="row">
            
            <fieldset>
                <legend><?=t('Slider Settings')?></legend>
            <div class="col-xs-6">
                
                <div class="form-group">                    
                    <label class="form-label"><?=t('Seconds for each slide')?></label>
                    <div class="input-group">
                        <?php echo $form->text("duration",$duration?$duration:"5"); ?> 
                        <div class="input-group-addon">secs</div> 
                    </div>                  
                </div>
                <div class="form-group">                    
                    <label class="form-label"><?=t('Transition Speed')?></label>
                    <div class="input-group">
                        <?php echo $form->text("speed",$speed?$speed:"500"); ?> 
                        <div class="input-group-addon">ms</div> 
                    </div>                    
                </div>
                
            </div>
            <div class="col-xs-6">
                
                <div class="form-group">                    
                    <label class="form-label"><?=t('Show Navigation Arrows')?></label>
                    <?php echo $form->select("arrows",array("yes"=>t("Yes"),"no"=>t("No")),$arrows); ?>                     
                </div>
                
            </div>
            </fieldset>
            
        </div><!-- .row -->
        <div class="row">
            
            <fieldset>
                
                <legend><?=t('Color Settings')?></legend>
                <div class="col-xs-6">
                    <div class="form-group">                    
                        <label class="form-label"><?=t('Would you like a Color Overlay?')?></label>
                        <?php echo $form->select("imgColorOverlay",array("yes"=>"Yes","no"=>"No"),$imgColorOverlay); ?>                     
                    </div>
                    <div class="form-group">                    
                        <label class="form-label"><?=t('Text Color')?></label><br>
                        <?php echo $color->output("textColor", $textColor?$textColor:"rgb(255, 255, 255)"); ?>                    
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">                    
                        <label class="form-label"><?=t('Overlay Color')?></label><br>
                        <?php echo $color->output("imgColorOverlayColor", $imgColorOverlayColor?$imgColorOverlayColor:"rgb(0, 0, 0)"); ?>                    
                    </div>
                </div>
                
            </fieldset>
            
        </div>
        
    </div>
</div>
    
<script type="text/template" id="imageTemplate">
    <div class="ccm-image-slider-entry well" data-order="<%=sort_order%>">
        <div class="form-group row item-summary">
            <div class="col-xs-8">
                <div class="ccm-pick-slide-image">
                    <% if (image_url.length > 0) { %>
                        <img src="<%= image_url %>" />
                    <% } else { %>
                        <i class="fa fa-picture-o"></i>
                    <% } %>
                </div>
                <input type="hidden" name="<?php echo $view->field('fID')?>[]" class="image-fID" value="<%=fID%>" />
            </div>
            <div class="col-xs-4 text-right">
                <a href="javascript:editItem(<%=sort_order%>)" class="btn btn-info btnEditSlide"><?=t('Edit')?></a>
                <a href="#" class="btn btn-danger btnDeleteSlide"><?=t('Delete')?></a>
            </div>
        </div>
        <div class="item-detail clearfix">
            <div class="form-group row">
                <div class="col-xs-12">
                    <label><?=t('Title')?></label>
                    <input class="form-control" type="text" name="<?php echo $view->field('title')?>[]" value="<%=title%>" />
                </div>
            </div>     
            <div class="form-group row">
                <div class="col-xs-6">
                    <label><?=t('Button 1 URL')?></label>
                    <input class="form-control" type="text" name="<?php echo $view->field('btn1Link')?>[]" value="<%=btn1Link%>" />
                </div>
                <div class="col-xs-6">
                    <label><?=t('Button 1 Text')?></label>
                    <input class="form-control" type="text" name="<?php echo $view->field('btn1Text')?>[]" value="<%=btn1Text%>" />
                </div>
            </div>    
            <div class="form-group row">
                <div class="col-xs-6">
                    <label><?=t('Button 2 URL')?></label>
                    <input class="form-control" type="text" name="<?php echo $view->field('btn2Link')?>[]" value="<%=btn2Link%>" />
                </div>
                <div class="col-xs-6">
                    <label><?=t('Button 2 Text')?></label>
                    <input class="form-control" type="text" name="<?php echo $view->field('btn2Text')?>[]" value="<%=btn2Text%>" />
                </div>
            </div>         
        </div>
        <input class="ccm-image-slider-entry-sort" type="hidden" name="<?php echo $view->field('sortOrder')?>[]" value="<%=sort_order%>"/>
    </div>
</script>

<script>
    
      
    var CCM_EDITOR_SECURITY_TOKEN = "<?php echo Loader::helper('validation/token')->generate('editor')?>";
    var editItem = function(sortID) {
            //$(".itemDetails").hide();
            $(".ccm-image-slider-entry [data-order="+sortID+"] .item-summary").toggleClass("active");
            $(".ccm-image-slider-entry [data-order="+sortID+"] .item-detail").toggle('fast');  
        }
    $(document).ready(function(){
        $(".featurette-slides").sortable({
            update: function(event, ui){
                doSortCount();
            }
        });

        var ccmReceivingEntry = '';
        var sliderEntriesContainer = $('.featurette-slides');
        var _templateSlide = _.template($('#imageTemplate').html());
        var attachDelete = function($obj) {
            $obj.click(function(){
                var deleteIt = confirm('<?php echo t('Are you sure?') ?>');
                if(deleteIt == true) {
                    $(this).closest('.ccm-image-slider-entry').remove();
                    doSortCount();
                }
            });
        }
        var attachEdit = function($obj) {
            $obj.click(function(){
                $(this).closest(".ccm-image-slider-entry").find(".item-detail").toggle();
            });
        }
        
        var attachFileManagerLaunch = function($obj) {
            $obj.click(function(){
                var oldLauncher = $(this);
                ConcreteFileManager.launchDialog(function (data) {
                    ConcreteFileManager.getFileDetails(data.fID, function(r) {
                        jQuery.fn.dialog.hideLoader();
                        var file = r.files[0];
                        oldLauncher.html(file.resultsThumbnailImg);
                        oldLauncher.next('.image-fID').val(file.fID)
                    });
                });
            });
        }
        
        var attachPageSelector = function($obj) {
            $obj.click(function(){
                var oldLauncher = $(this);
                ConcreteFileManager.launchDialog(function (data) {
                    ConcreteFileManager.getFileDetails(data.fID, function(r) {
                        jQuery.fn.dialog.hideLoader();
                        var file = r.files[0];
                        oldLauncher.html(file.resultsThumbnailImg);
                        oldLauncher.next('.image-fID').val(file.fID)
                    });
                });
            });
        }

        var doSortCount = function(){
            $('.ccm-image-slider-entry').each(function(index) {
                $(this).find('.ccm-image-slider-entry-sort').val(index);
                $(this).attr("data-sort",index);
                $(this).find(".btnEditSlide").attr("href","javascript:editItem("+index+")");
            });
        };
        
        

       <?php if($items) {
           foreach ($items as $item) { ?>
           sliderEntriesContainer.append(_templateSlide({
                fID: '<?php echo $item['fID'] ?>',
                <?php if(File::getByID($item['fID'])) { ?>
                image_url: '<?php echo File::getByID($item['fID'])->getThumbnailURL('file_manager_listing');?>',
                <?php } else { ?>
                image_url: '',
               <?php } ?>
                title: '<?php echo addslashes($item['title']) ?>',
                btn1Link: '<?php echo $item['btn1Link']?>',
                btn1Text: '<?php echo $item['btn1Text']?>',
                btn2Link: '<?php echo $item['btn2Link']?>',
                btn2Text: '<?php echo $item['btn2Text']?>',
                sort_order: '<?php echo $item['sortOrder'] ?>'
            }));
        <?php }
        }?>

        doSortCount();
        
        
        
        $('.ccm-add-image-slider-entry').click(function(){
           var thisModal = $(this).closest('.ui-dialog-content');
            sliderEntriesContainer.append(_templateSlide({
                fID: '',
                title: '',
                btn1Link: '',
                btn1Text: '',
                btn2Link: '',
                btn2Text: '',
                sort_order: '',
                image_url: ''
            }));
            var newSlide = $('.ccm-image-slider-entry').last();
            thisModal.scrollTop(newSlide.offset().top);
           
            attachDelete(newSlide.find('.btnDeleteSlide'));
            attachEdit(newSlide.find('.btnEditSlide'));
            attachFileManagerLaunch(newSlide.find('.ccm-pick-slide-image'));
            doSortCount();
        });
        attachDelete($('.btnDeleteSlide'));
        attachEdit($('.btnEditSlide'));
        attachFileManagerLaunch($('.ccm-pick-slide-image'));
        
    });
</script>
