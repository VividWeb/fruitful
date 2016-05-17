<?php
namespace Concrete\Package\Fruitful\Theme\Fruitful;
use Concrete\Core\Page\Theme\Theme;

class PageTheme extends Theme {

	public function registerAssets() {

        $this->requireAsset('css', 'font-awesome');
       	$this->requireAsset('javascript', 'jquery');
        //$this->requireAsset('javascript', 'bootstrap/*');
	}

   	protected $pThemeGridFrameworkHandle = 'bootstrap3';

    public function getThemeBlockClasses(){
    		
    	// this adds custom classes as a dropdown option on blocks.
		return array(
            'social_links' => array("singleColor","flatFullColor","roundedGradient","roundedFlat"),
            'content' => array('blue-background')
        );
    }

    public function getThemeAreaClasses()
    {
       	// this adds custom classes to be added to an area.
	    /*
		return array(
            'Main' => array('area-content-accent')
        );
		*/
    }

    public function getThemeDefaultBlockTemplates(){
    	// this sets a block to use a custom template by default.            
        return array(
            'search' => 'fruitful_search.php'
        );	       
    }

    public function getThemeEditorClasses()
    {
        // classes available in WYSIWYG	        
        return array(
            array('title' => t('Site Title'), 'menuClass' => 'site-title', 'spanClass' => 'site-title'),
            array('title' => t('Small Text'), 'menuClass' => 'small-text', 'spanClass' => 'small-text'),
            array('title' => t('Page Title'), 'menuClass' => 'page-title', 'spanClass' => 'page-title'),
            array('title' => t('Featured Content Title'), 'menuClass' => 'featured-content-title', 'spanClass' => 'featured-content-title'),
			array('title' => t('Lead'), 'menuClass' => 'lead', 'spanClass' => 'lead'),
			array('title' => t('Captivating Title'), 'menuClass' => 'captivating-title', 'spanClass' => 'captivating-title')
        );
		 
		 
    }

}
