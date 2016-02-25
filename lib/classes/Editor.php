<?php
/**
 * Setup editor
 */

namespace Trendwerk\Acf\ThemeConfig;

final class Editor
{
    public function __construct()
    {
        add_filter('acf/fields/wysiwyg/toolbars', array($this, 'toolbars'));
    }

    /**
     * Use WordPress' WYSIWYG toolbars
     */
    public function toolbars($toolbars)
    {
        $tinymce = apply_filters('tiny_mce_before_init', array(
            'toolbar1'             => '',
            'toolbar2'             => '',
            'wordpress_adv_hidden' => null
        ));

        $toolbars['Full']['1'] = explode(',', $tinymce['toolbar1']);
        $toolbars['Full']['2'] = explode(',', $tinymce['toolbar2']);

        return $toolbars;
    }
}
