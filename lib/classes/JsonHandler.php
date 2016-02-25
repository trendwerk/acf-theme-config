<?php
/**
 * Handle JSON
 */

namespace Trendwerk\Acf\ThemeConfig;

final class JsonHandler
{
    public function __construct()
    {
        add_filter('acf/settings/load_json', array($this, 'load'));
        add_filter('acf/settings/save_json', array($this, 'save'));
    }

    public function load($paths)
    {
        unset($paths[0]);
        $paths[] = get_stylesheet_directory() . '/config/acf';

        return $paths;
    }

    public function save($path)
    {
        return get_stylesheet_directory() . '/config/acf';
    }
}
