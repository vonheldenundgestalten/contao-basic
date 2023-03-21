<?php

namespace Magmell\Contao\Basic\Hooks;

use Contao\PageModel;
use Contao\LayoutModel;
use Contao\PageRegular;

class AddStyles
{
    /**
     * @param PageModel $pageModel
     * @param LayoutModel $layout
     * @param PageRegular $pageRegular
     */
    public function generatePage(PageModel $pageModel, LayoutModel $layout, PageRegular $pageRegular)
    {
		if (!isset($GLOBALS['TL_CSS']) || !is_array($GLOBALS['TL_CSS']))
		{
			$GLOBALS['TL_CSS'] = array();
		}

		array_unshift(
			$GLOBALS['TL_CSS'],
			"bundles/contaobasic/css/reset.scss|static",
			"bundles/contaobasic/css/basic-video.scss|static",
			"bundles/contaobasic/css/basic-maps.scss|static"
		);

		$this->includeImprintCss();
    }

    /**
     * Include styles on 'data protection' and 'imprint' pages
     */
    protected function includeImprintCss()
    {
        /** @var PageModel $objPage*/
        global $objPage;

        $arrAlias = explode('/', $objPage->alias);
        $strAliasLastFragment = $arrAlias[count($arrAlias) - 1];

        if (in_array($strAliasLastFragment, [
            'datenschutz',
            'impressum',
            'legal-notice',
            'data-protection',
            'privacy'
        ]))
        {
            array_unshift(
                $GLOBALS['TL_CSS'],
                "bundles/contaobasic/css/basic-imprint.scss|static"
            );
        }
    }
}
