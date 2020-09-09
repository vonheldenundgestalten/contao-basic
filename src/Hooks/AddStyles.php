<?php

namespace Magmell\Contao\Basic\Hooks;

use Contao\Config;
use Contao\PageModel;
use Contao\LayoutModel;
use Contao\PageRegular;

class AddStyles
{
    /**
     * @param string $strBuffer
     * @return string $strTemplateName
     * @return string
     */
    public function generatePage(PageModel $pageModel, LayoutModel $layout, PageRegular $pageRegular)
    {
		// step 1: include CSS fixed (always)
		// step 2: include only when needed, depending on page content & metadata
        $GLOBALS['TL_CSS'][] = "bundles/contaobasic/css/reset.scss|static";
        $GLOBALS['TL_CSS'][] = "bundles/contaobasic/css/basic-imprint.scss|static";
        $GLOBALS['TL_CSS'][] = "bundles/contaobasic/css/basic-video.scss|static";
        $GLOBALS['TL_CSS'][] = "bundles/contaobasic/css/basic-maps.scss|static";

        return;
    }
}
