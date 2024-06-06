<?php
namespace Magmell\Contao\Basic;

use Contao\System;
use Symfony\Component\HttpFoundation\Request;

class VHUGUtil {
    public static function include_css(String $path) {
        $GLOBALS['TL_CSS'][] = $path;

        //check if file exists
        $filteredInput = strstr($path, '|', true) ?: $path;
        if(!file_exists("" . $filteredInput)) {
            throw new \Exception("File not found: " . $filteredInput);
        }

        if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create('')))
        {
            $GLOBALS['TL_CSS'][] = self::transformPath($filteredInput);
        }
    }

    //bundles/tbutbasic/css/elements/ce_contact_with_ilustration_and_cta.scss|static
    //assets/css/public_bundles_tbutbasic_css_elements_ce_text_with_animation_and_ilustration.scss.css

    private static function transformPath($inputPath) {
        $pathWithoutBundles = substr($inputPath, strlen('bundles/'));
        $underscoredPath = 'public_bundles_' . str_replace('/', '_', $pathWithoutBundles);
        $outputPath = 'assets/css/' . $underscoredPath . '.css';
        
        dump($outputPath);
        return $outputPath;
    }
}