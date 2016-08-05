<?php
/**
 * Plugin Name: ACF theme config
 * Description: Configure ACF for use in a theme.
 *
 * Plugin URI: https://github.com/trendwerk/acf-theme-config
 *
 * Author: Trendwerk
 * Author URI: https://github.com/trendwerk
 *
 * Version: 0.1.2
 */

include_once('lib/autoload.php');

new Trendwerk\Acf\ThemeConfig\JsonHandler();
new Trendwerk\Acf\ThemeConfig\Editor();
