<?php      

namespace Concrete\Package\Fruitful;
use Package;
use BlockType;
use SinglePage;
use PageTheme;
use BlockTypeSet;
use CollectionAttributeKey;
use Concrete\Core\Attribute\Type as AttributeType;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{

	protected $pkgHandle = 'fruitful';
	protected $appVersionRequired = '5.7.1';
	protected $pkgVersion = '1.2';
	
	
	
	public function getPackageDescription()
	{
		return t("May your business be Fruitful");
	}

	public function getPackageName()
	{
		return t("Fruitful");
	}
	
	public function install()
	{
		$pkg = parent::install();
		BlockTypeSet::add("fruitful","Fruitful", $pkg);
        BlockType::installBlockTypeFromPackage('simple_button_fruitful', $pkg); 
        BlockType::installBlockTypeFromPackage('hero_featurette_fruitful', $pkg); 
        BlockType::installBlockTypeFromPackage('intro_cta_fruitful', $pkg); 
        BlockType::installBlockTypeFromPackage('full_width_content_fruitful', $pkg);
		PageTheme::add('fruitful', $pkg);				
		
		$imgAttr = AttributeType::getByHandle('image_file'); 
  		$thumb = CollectionAttributeKey::getByHandle('thumbnail'); 
		if(!is_object($thumb)) {
	     	CollectionAttributeKey::add($imgAttr, 
	     	array(
	     		'akHandle' => 'thumbnail', 
	     		'akName' => t('Thumbnail Image'), 
	     	),$pkg);
	  	}
	}
}
?>