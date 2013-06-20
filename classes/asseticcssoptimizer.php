<?php

require_once( '../vendor/autoload.php' );

use Assetic\Asset\AssetCollection;
use Assetic\Asset\StringAsset;
use Assetic\Filter\CssMinFilter;

class eZAsseticCssOptimizer
{
    static public function optimize( $css, $packLevel = 2 )
    {
        $asseticCollection = new AssetCollection(
            array( new StringAsset($css),
            ),
            array( new CssMinFilter() )
        );

        return $asseticCollection->dump();
    }
}