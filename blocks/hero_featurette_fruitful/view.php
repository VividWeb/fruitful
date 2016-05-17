<?php defined('C5_EXECUTE') or die("Access Denied.");?>
<?php $ih = Loader::helper("image"); ?>
<script type="text/javascript">
$(function(){
    function sliderBackground(){
        if($("body").width() > 767){
            $(".swiper-slide").each(function(){
                var bg = $(this).attr("data-large-background");
                $(this).css("background-image", "url('"+bg+"')");
            });
        }
        else{
            $(".swiper-slide").each(function(){
                var bg = $(this).attr("data-small-background");
                $(this).css("background-image", "url('"+bg+"')");
            });
        }
    }; 
    var swiper<?=$bID?> = $('.swiper-container').swiper({
        autoplay: <?=$duration?>000,
        speed: <?=$speed?>,
        mode:'horizontal',
        loop: true,
        onFirstInit: function(swiper){
            sliderBackground();   
        }
    });       
    window.onresize = function(event) {    
        sliderBackground();        
    };
    $("#btn-slide-next-<?=$bID?>").click(function(){
        swiper<?=$bID?>.swipeNext();    
    });
    $("#btn-slide-prev-<?=$bID?>").click(function(){
        swiper<?=$bID?>.swipePrev();    
    });
});
</script>
<div class="jumbotron swiper-container hero-featurette" style="color:<?=$textColor?>">
    
    <div class="swiper-wrapper">
            
        <?php
        foreach($items as $item){
            $file = File::getByID($item['fID']);
            if(is_object($file) && $file->getApprovedVersion()){
                $large = $ih->getThumbnail($file,2000,684,true);
                $small = $ih->getThumbnail($file,768,300,true);            
        ?>
        <div class="swiper-slide" data-small-background="<?=$small->src?>" data-large-background="<?=$large->src?>">
            
            <?php if($imgColorOverlay=="yes"){?>
                <div class="slide-color-overlay" style="background-color:<?=$imgColorOverlayColor?>"></div>
            <?php } ?>
            <div class="container slider-text">
                
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <h1><?=$item['title']?></h1>
                        <?php if($item['btn1Text']){?>
                        <a href="<?=$item['btn1Link']?>" class="btn btn-lg btn-transparent"><?=$item['btn1Text']?></a>
                        <?php } ?>
                        <?php if($item['btn2Text']){?>
                        <a href="<?=$item['btn2Link']?>" class="btn btn-lg btn-transparent"><?=$item['btn2Text']?></a>
                        <?php } ?>
                    </div>
                </div>
                
            </div><!-- .slider-text -->
            
        </div>
        <?php   
            }//if obj
        }//foreach ?>
    
    </div>
        
    <div class="btn-slide-prev" id="btn-slide-prev-<?=$bID?>"><i class="fa fa-angle-left"></i></div>
    <div class="btn-slide-next" id="btn-slide-next-<?=$bID?>"><i class="fa fa-angle-right"></i></div>
    
</div>