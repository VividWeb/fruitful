<?php 
namespace Concrete\Package\Fruitful\Block\SimpleButtonFruitful;
use \Concrete\Core\Block\BlockController;

defined('C5_EXECUTE') or die(_("Access Denied."));

	class Controller extends BlockController {
		
		var $pobj;
		
		protected $btDescription = "Add a Button";
		protected $btName = "Simple Button";
		protected $btTable = 'btSimpleButtonFruitful';
		protected $btInterfaceWidth = "370";
		protected $btInterfaceHeight = "350";
		protected $btWrapperClass = 'ccm-ui';
		protected $btDefaultSet = 'fruitful';
				
		
	}
	
?>