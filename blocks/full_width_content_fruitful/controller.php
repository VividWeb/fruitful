<?php 
namespace Concrete\Package\Fruitful\Block\FullWidthContentFruitful;
use \Concrete\Core\Block\BlockController;
use Loader;

class Controller extends BlockController 
{
		
	protected $btDescription = "";
	protected $btName = "Featured Content";
	protected $btTable = 'btFullWidthContentFruitful';
	protected $btInterfaceWidth = "370";
	protected $btInterfaceHeight = "350";
	protected $btWrapperClass = 'ccm-ui';
	protected $btIgnorePageThemeGridFrameworkContainer = true;
    protected $btDefaultSet = 'fruitful';
    
    public function add()
    {
        $this->requireAsset('redactor');
        $this->requireAsset('core/file-manager');
    }
    
    public function edit()
    {
        $this->requireAsset('redactor');
        $this->requireAsset('core/file-manager');
    }				
}
	
?>