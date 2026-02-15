<?php

namespace VHUG\ContaoBasic\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\NewsBundle\ContaoNewsBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use VHUG\ContaoBasic\ContaoBasicBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoBasicBundle::class)
                ->setLoadAfter([
                    ContaoCoreBundle::class
                ])
        ];
    }
}
