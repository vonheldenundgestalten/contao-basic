<?php

// add new common video ratios
$GLOBALS['TL_DCA']['tl_content']['fields']['playerAspect']['options'][] = '2:1';
$GLOBALS['TL_DCA']['tl_content']['fields']['playerAspect']['options'][] = '1:1';

// default setting for the video ratio - without it, the responsive container is missing
$GLOBALS['TL_DCA']['tl_content']['fields']['playerAspect']['default'] = '16:9';

// update existing entries:
// UPDATE `tl_content` SET playerAspect = '16:9' WHERE (`type` LIKE 'youtube' OR type LIKE 'vimeo') and (playerAspect = 'none' OR playerAspect = '')

$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = ['tl_content_contaobasic', 'updateAspectRatio'];

class tl_content_contaobasic extends tl_content
{
	public function updateAspectRatio($dc)
    {
        // not to be confused, edit action is also happening upon creation
        if (!in_array(\Contao\Input::get('act'), ['edit', 'editAll'])) {
            return;
        }
		
		if(!$dc->activeRecord->playerAspect){
			$this->Database->prepare("UPDATE tl_content SET playerAspect=? WHERE id=?")->execute('16:9', $dc->activeRecord->id);
		}
    }	
}

