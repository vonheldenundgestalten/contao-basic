<?php

declare(strict_types=1);

namespace VHUG\ContaoBasic\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use VHUG\ContaoBasic\AssetUtil;

class AssetExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('vhug_include_css', [$this, 'includeCss']),
        ];
    }

    public function includeCss(string $path): string
    {
        AssetUtil::include_css($path);

        return '';
    }
}
