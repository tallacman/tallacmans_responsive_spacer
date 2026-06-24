<?php

namespace Concrete\Package\TallacmansResponsiveSpacer;

use Concrete\Core\Block\BlockType\BlockType;
use Concrete\Core\Database\Connection\Connection;
use Concrete\Core\Package\Package;

defined('C5_EXECUTE') or exit('Access Denied.');

class Controller extends Package
{
    protected $pkgHandle = 'tallacmans_responsive_spacer';

    protected $appVersionRequired = '9.0.0';

    protected $pkgVersion = '2.0.5';

    public function getPackageName()
    {
        return t('Tallacmans Responsive Spacer');
    }

    public function getPackageDescription()
    {
        return t('Dynamically varies your vertical spacing depending on screen ' .
            'width, with per-breakpoint unit control.');
    }

    public function install()
    {
        $pkg = parent::install();

        $btHandles = ['tallacmans_responsive_spacer'];
        foreach ($btHandles as $btHandle) {
            if (! BlockType::getByHandle($btHandle)) {
                BlockType::installBlockType($btHandle, $pkg);
            }
        }
    }

    public function upgrade()
    {
        parent::upgrade();

        // Migrate existing rows: copy hUnits into the new per-breakpoint unit
        // columns so old blocks keep their previously-saved unit.
        $db = $this->app->make(Connection::class);

        $unitCols = ['smUnits', 'mdUnits', 'lgUnits', 'xlUnits', 'xxlUnits'];
        foreach ($unitCols as $col) {
            // Only back-fill rows where the column is still NULL
            $db->executeStatement(
                "UPDATE btTallacmansResponsiveSpacer
                    SET {$col} = hUnits
                  WHERE {$col} IS NULL OR {$col} = ''"
            );
        }
    }

    public function uninstall()
    {
        parent::uninstall();

        $db = $this->app->make(Connection::class);
        $db->executeStatement('DROP TABLE IF EXISTS btTallacmansResponsiveSpacer');
    }
}
