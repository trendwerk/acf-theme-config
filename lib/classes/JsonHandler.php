<?php
/**
 * Handle JSON
 */

namespace Trendwerk\Acf\ThemeConfig;

final class JsonHandler
{
    private $path;

    public function __construct()
    {
        add_action('admin_init', array($this, 'verifyPath'));
        add_filter('acf/settings/load_json', array($this, 'load'));
        add_filter('acf/settings/save_json', array($this, 'save'));
    }

    public function verifyPath()
    {
        $path = $this->getPath();

        if (! is_dir($path)) {
            mkdir($path, 0775, true);
        }
    }

    public function load($paths)
    {
        unset($paths[0]);
        $paths[] = $this->getPath();

        return $paths;
    }

    public function save($path)
    {
        return $this->getPath();
    }

    private function getPath()
    {
        return get_stylesheet_directory() . '/config/acf';
    }
}
