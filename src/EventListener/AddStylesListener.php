<?php

namespace VHUG\ContaoBasic\EventListener;

use Contao\PageModel;
use Contao\LayoutModel;

class AddStylesListener
{
	public function __construct(
        private bool $includeResetCss,
        private bool $includeBasicStyles
    ) {}
	
	public function __invoke(PageModel $page, LayoutModel $layout): void
    {
		if (!isset($GLOBALS['TL_CSS']) || !is_array($GLOBALS['TL_CSS']))
		{
			$GLOBALS['TL_CSS'] = array();
		}
				
        if ($this->includeBasicStyles) {
			array_unshift(
				$GLOBALS['TL_CSS'],
				"bundles/contaobasic/css/basic-video.scss|static",
				"bundles/contaobasic/css/basic-maps.scss|static"
			);
            
			$this->includeImprintCss($page);
        }
		
		if ($this->includeResetCss) {
			array_unshift(
				$GLOBALS['TL_CSS'],
				"bundles/contaobasic/css/reset.scss|static",
			);
        }       
    }

    /**
     * Include styles on 'data protection' and 'imprint' pages
     */
    protected function includeImprintCss(PageModel $objPage)
    {
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
