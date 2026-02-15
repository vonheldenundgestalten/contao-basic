# contao-basic
Basic stylings and logic for every client project (Contao 5.3+)

## contents
* setting basic video parameters in DCA, aspect ratio set to 16:9 if nothing else was selected
* adding basic CSS including reset logic for all projects
* adding CSS for basic layout and responsive behaviour on video and map elements (based on aspect ratio)
* adding CSS for imprint and privacy pages (requires page class *privacy* and content class *dsgvo21* on the mandatory info block to object direct advertising and data collection)

All logic is compatible with the bundle [contao-privacy](https://github.com/vonheldenundgestalten/contao-privacy) and includes not only the element style, but also the responsive styling for the privacy overlay.

## includes an Asset Helper that enables Contao backend styling!

In classic template mode (.html5) you can now include your assets like this, and the helper will make your styling also available in the backend, for nice backend previews:

```PHP 
<?php

use VHUG\ContaoBasic\AssetUtil;
AssetUtil::include_css('bundles/<your bundle>/<your css folder>/<the CSS file>.scss|static');

?>

<?php $this->extend('block_searchable'); ?>
....
```


## including our helper CSS files is optional

Please overwrite these settings if you prefer to not include our CSS helper files (reset.css) and the 3 styling helpers "video", "maps" and "privacy".

```YML
# in contao/config.yaml switch either one to false
parameters:
    vhug_contao_basic.include_reset_css: true
    vhug_contao_basic.include_basic_styles: true
```

## additional instructions

To set the aspect ratio to the basic 16:9 on existing video elements this query directly on the DB helps. Only needed once, for example after a Contao upgrade from 4.4:
```SQL
UPDATE `tl_content` SET playerAspect = '16:9' 
WHERE (`type` LIKE 'youtube' OR type LIKE 'vimeo') and (playerAspect = 'none' OR playerAspect = '')
```


