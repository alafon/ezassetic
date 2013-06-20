<?php

require_once( '../vendor/autoload.php' );

use Assetic\Asset\AssetCollection;
use Assetic\Asset\StringAsset;
use Assetic\Filter\GoogleClosure\CompilerJarFilter;

class eZAsseticJsOptimizer
{
    static public function optimize( $js, $packLevel = 2 )
    {
        $compilerPath = realpath( dirname( __FILE__ ) . "/../lib/closure-compiler/compiler.jar" );
        $closureCompilerFilter = new CompilerJarFilter( $compilerPath );
        $closureCompilerFilter->setCompilationLevel( CompilerJarFilter::COMPILE_WHITESPACE_ONLY );

        $asseticCollection = new AssetCollection(
            array( new StringAsset($js),
            ),
            array( $closureCompilerFilter
            )
        );

        return $asseticCollection->dump();
    }
}