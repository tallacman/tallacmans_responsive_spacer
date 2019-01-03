<?php namespace Concrete\Package\TallacmansResponsiveSpacer;

use Package;
use BlockType;

defined('C5_EXECUTE') or die("Access Denied.");

class Controller extends Package
{
    protected $pkgHandle = 'tallacmans_responsive_spacer';
    protected $appVersionRequired = '5.7.5.5';
    protected $pkgVersion = '0.9.0';

    public function getPackageName()
    {
        return t('Tallacmans Responsive Spacer');
    }

    public function getPackageDescription()
    {
        return t('Changes height depending on your screen size.');
    }

    public function install()
    {
        $pkg = parent::install();
	    $btHandles = array (
   'tallacmans_responsive_spacer',
);
	    foreach($btHandles as $btHandle){
	        if (!BlockType::getByHandle($btHandle)) {
                BlockType::installBlockType($btHandle, $pkg);
            }
	    }
    }
}
