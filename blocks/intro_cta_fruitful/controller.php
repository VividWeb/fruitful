<?php 
namespace Concrete\Package\Fruitful\Block\IntroCtaFruitful;
use \Concrete\Core\Block\BlockController;

defined('C5_EXECUTE') or die(_("Access Denied."));

	class Controller extends BlockController {
		
		var $pobj;
		
		protected $btDescription = "Add a CTA";
		protected $btName = "Intro CTA";
		protected $btTable = 'btIntroCtaFruitful';
		protected $btInterfaceWidth = "370";
		protected $btInterfaceHeight = "350";
		protected $btWrapperClass = 'ccm-ui';
		protected $btDefaultSet = 'fruitful';
				
		
	}
	
?>