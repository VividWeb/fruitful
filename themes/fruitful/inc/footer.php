<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
    <footer id="site-footer">
        
        <div class="container">
	
    		<div class="row">
        
    			<div id="copyright" class="col-xs-12 col-sm-3">
                    
                    <? $a = new GlobalArea('Copyright'); $a->display(); ?>
                    
                </div>
    			
    			<div id="info" class="col-xs-12 col-sm-3">
    			
    				<? $a = new GlobalArea('Company Info'); $a->display(); ?>
    			
    			</div><!-- #info -->
    			
    			<nav class="col-xs-12 col-sm-6">
    			
    				<? $a = new GlobalArea('Footer Nav'); $a->display(); ?>
    			    <p><a href="http://isitvivid.com/web-design-services/concrete5-cms/">Concrete5 Web Design</a> by <a href="http://isitvivid.com">Vivid</a></p>
    			
    			</nav>	
    			
    		</div><!-- .row -->
		
		</div>
		    
    </footer>

</div>

<? Loader::element('footer_required'); ?>
<script src="<?=$this->getThemePath()?>/js/functions.js" type="text/javascript"></script>

</body>
</html>