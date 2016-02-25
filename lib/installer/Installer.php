<?php
/**
 * Composer install script
 */

namespace Trendwerk\Acf\ThemeConfig;

use Composer\Script\Event;

final class Installer
{
    private static $configFolder = 'config/acf';
    private static $themesFolder = 'themes';

    /**
     * Set namespace for theme
     */
    public static function createFolder($event)
    {
        $io = $event->getIO();

        if (! $io->isInteractive()) {
            return 1;
        }

        $io->write('<info>Creating ' . self::$configFolder . ' folder automatically</info>');

        $appRoot = dirname(dirname(dirname(dirname(__DIR__))));
        $themesPath = $appRoot . '/' . self::$themesFolder;
        $themes = glob($themesPath . '/*', GLOB_ONLYDIR);

        if (count($themes) == 0) {
            $io->write('<error>No themes found in ' . $themesPath . '.</error>');
            return 1;
        } else if (count($themes) == 1) {
            $theme = array_pop($themes);
            $io->write('<info>One theme found, creating ' . self::$configFolder . ' in \'' . basename($theme) . '\'</info>');
        } else {
            $theme = $io->ask('<info>Multiple themes found.</info> <question>Which theme would you like to use?</question> [<comment>' . basename($themes[0]) . '</comment>] ', $themes[0]);

            if ($theme != $themes[0]) {
                $theme = $themesPath . '/' . $theme;
            }
        }

        if (! file_exists($theme)) {
            $io->write('<error>Theme not found.</error>');
            return 1;
        }

        $configPath = $theme . '/' . self::$configFolder;

        if (! is_dir($configPath)) {
            mkdir($configPath, 0755, true);
        }

        return 1;
    }
}
