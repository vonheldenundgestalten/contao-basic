<?php

spl_autoload_register(function ($class) {
    static $aliases = [
        // 'Magmell\\Contao\\Basic\\Hooks\\AddStyle'   => 'VHUG\\ContaoBasic\\Hooks\\AddStyle',
        'Magmell\\Contao\\Basic\\VHUGUtil'          => 'VHUG\\ContaoBasic\\AssetUtil',
        'Magmell\\Contao\\Basic\\Helpers'           => 'VHUG\\ContaoBasic\\Helpers',
        // ... add all your Magmell classes here
    ];
    
    if (isset($aliases[$class])) {
        if (class_exists($aliases[$class], true)) {
            class_alias($aliases[$class], $class);
        }
    }
}, true, true);

// Create aliases for all old classes
// class_alias('VHUG\ContaoBasic\Helpers', 'Magmell\Contao\Basic\Helpers');
// class_alias('VHUG\ContaoBasic\ContaoBasicBundle', 'Magmell\Contao\Basic\ContaoBasicBundle');
// class_alias('VHUG\ContaoBasic\AssetUtil', 'Magmell\Contao\Basic\VHUGUtil');
// class_alias('VHUG\ContaoBasic\Hooks\AddStyle', 'Magmell\Contao\Basic\Hooks\AddStyle');
// class_alias('VHUG\ContaoBasic\ContaoManager\Plugin', 'Magmell\Contao\Basic\ContaoManager\Plugin');
// class_alias('VHUG\ContaoBasic\DependencyInjection\ContaoBasicExtension', 'Magmell\Contao\Basic\DependencyInjection\ContaoBasicExtension');