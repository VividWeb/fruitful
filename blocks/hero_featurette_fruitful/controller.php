<?php
namespace Concrete\Package\Fruitful\Block\HeroFeaturetteFruitful;
use \Concrete\Core\Block\BlockController;
use Loader;

class Controller extends BlockController
{
    protected $btTable = 'btHeroFeaturetteFruitful';
    protected $btInterfaceWidth = "600";
    protected $btWrapperClass = 'ccm-ui';
    protected $btInterfaceHeight = "465";
    protected $btIgnorePageThemeGridFrameworkContainer = true;
    protected $btDefaultSet = 'fruitful';

    public function getBlockTypeDescription()
    {
        return t("Display a Large Featurette");
    }

    public function getBlockTypeName()
    {
        return t("Hero Featurette");
    }

    public function add()
    {
        $this->requireAsset('core/file-manager');
    }

    public function edit()
    {
        $this->requireAsset('core/file-manager');
        $db = Loader::db();
        $items = $db->GetAll('SELECT * from btHeroFeaturetteFruitfulSlides WHERE bID = ? ORDER BY sortOrder', array($this->bID));
        $this->set('items', $items);
    }

    public function view()
    {
        $db = Loader::db();
        $items = $db->GetAll('SELECT * from btHeroFeaturetteFruitfulSlides WHERE bID = ? ORDER BY sortOrder', array($this->bID));
        $this->set('items', $items);
    }

    public function duplicate($newBID) {
        parent::duplicate($newBID);
        $db = Loader::db();
        $v = array($this->bID);
        $q = 'select * from btHeroFeaturetteFruitfulSlides where bID = ?';
        $r = $db->query($q, $v);
        while ($row = $r->FetchRow()) {
            $db->execute('INSERT INTO btHeroFeaturetteFruitfulSlides (bID, fID, linkURL, title, btn1Link, btn1Text, btn2Link, btn2Text, sortOrder) values(?,?,?,?,?,?,?,?,?)',
                array(
                    $newBID,
                    $row['fID'],
                    $args['linkURL'][$i],
                    $args['title'][$i],
                    $args['btn1Link'][$i],
                    $args['btn1Text'][$i],
                    $args['btn2Link'][$i],
                    $args['btn2Text'][$i],
                    $args['sortOrder'][$i]
                )
            );
        }
    }

    public function delete()
    {
        $db = Loader::db();
        $db->delete('btHeroFeaturetteFruitfulSlides', array('bID' => $this->bID));
        parent::delete();
    }

    public function save($args)
    {
        $db = Loader::db();
        $db->execute('DELETE from btHeroFeaturetteFruitfulSlides WHERE bID = ?', array($this->bID));
        $count = count($args['sortOrder']);
        $i = 0;
        parent::save($args);
        while ($i < $count) {
            $db->execute('INSERT INTO btHeroFeaturetteFruitfulSlides (bID, fID, linkURL, title, btn1Link, btn1Text, btn2Link, btn2Text, sortOrder) values(?,?,?,?,?,?,?,?,?)',
                array(
                    $this->bID,
                    intval($args['fID'][$i]),
                    $args['linkURL'][$i],
                    $args['title'][$i],
                    $args['btn1Link'][$i],
                    $args['btn1Text'][$i],
                    $args['btn2Link'][$i],
                    $args['btn2Text'][$i],
                    $args['sortOrder'][$i]
                )
            );
            $i++;
        }
    }

}