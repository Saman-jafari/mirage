<?php

namespace App\Controllers\Admin;

use WP_Customize_Manager;

class Customizer
{
    public function __construct()
    {
    }

    public function init(WP_Customize_Manager $wpCustomize)
    {
        $wpCustomize->get_setting('blogname')->transport = 'postMessage';
        $wpCustomize->selective_refresh->add_partial('blogname', [
            'selector'        => '.navbar-brand',
            'render_callback' => function () {
                bloginfo('name');
            },
        ]);
        $this->showcaseSection($wpCustomize);
        $this->secondSection($wpCustomize);
    }

    private function callbackPartial($option)
    {
        echo get_theme_mod($option);
    }

    private function showcaseSection(WP_Customize_Manager $wpCustomize)
    {
        $wpCustomize->add_section('showcase', [
            'title'       => __('Showcase', 'mirage'),
            'description' => sprintf(__('Option for showcase', 'mirage')),
            'priority'    => 130,
        ]);
        $wpCustomize->add_setting('showcase_heading', [
            'default'   => _x('YOUR FAVORITE SOURCE OF FREE BOOTSTRAP THEMES', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);
        $wpCustomize->add_setting('showcase_text', [
            'default'   => _x('Start Bootstrap can help you build better websites using the Bootstrap
             framework! Just download a theme and start customizing,
             no strings attached', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('showcase_btn', [
            'default'   => _x('Find Out More', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);
        $wpCustomize->add_setting('showcase_btn_href', [
            'default'   => _x('#about', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);

        $this->addControlAndPartial($wpCustomize, 'showcase_heading', '.masthead h1', 'showcase', __('Heading', 'mirage'), 1);
        $this->addControlAndPartial($wpCustomize, 'showcase_text', '.masthead p', 'showcase', __('Text', 'mirage'), 2);
        $this->addControlAndPartial($wpCustomize, 'showcase_btn', '.masthead a', 'showcase', __('Button', 'mirage'), 3);
        $this->addControlAndPartial($wpCustomize, 'showcase_btn_href', '.masthead a[href]', 'showcase', __('Link', 'mirage'), 4, false);
    }

    private function secondSection(WP_Customize_Manager $wpCustomize)
    {
        $wpCustomize->add_section('secondSection', [
            'title'       => __('Second Section', 'mirage'),
            'description' => sprintf(__('Option for second section', 'mirage')),
            'priority'    => 131,
        ]);
        $wpCustomize->add_setting('secSection_heading', [
            'default'   => _x('We\'ve got what you need!', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);
        $wpCustomize->add_setting('secSection_text', [
            'default'   => _x('Start Bootstrap has everything you need to get your new website up and running in no time!
             Choose one of our open source, free to download, and easy to use themes! No strings attached!', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('secSection_btn', [
            'default'   => _x('Get Started!', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);
        $wpCustomize->add_setting('secSection_btn_href', [
            'default'   => _x('#services', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);

        $this->addControlAndPartial($wpCustomize, 'secSection_heading', '.second-section h2', 'secondSection', __('Heading', 'mirage'), 1);
        $this->addControlAndPartial($wpCustomize, 'secSection_text', '.second-section p', 'secondSection', __('Text', 'mirage'), 2);
        $this->addControlAndPartial($wpCustomize, 'secSection_btn', '.second-section a', 'secondSection', __('Button', 'mirage'), 3);
        $this->addControlAndPartial($wpCustomize, 'secSection_btn_href', '.second-section a[href]', 'secondSection', __('Link', 'mirage'), 4, false);
    }

    /**r
     *
     * @param WP_Customize_Manager $wpCustomize
     * @param                      $settingId
     * @param                      $selector
     * @param                      $section
     * @param                      $label
     * @param                      $priority
     * @param bool                 $refresh
     */
    private function addControlAndPartial(WP_Customize_Manager $wpCustomize, $settingId, $selector, $section, $label, $priority, $refresh = true)
    {
        $wpCustomize->add_control($settingId, [
            'label'    => $label,
            'section'  => $section,
            'priority' => $priority,
        ]);

        if ($refresh) {
            $wpCustomize->selective_refresh->add_partial($settingId, [
                'selector'        => $selector,
                'render_callback' => function () use ($settingId) {
                    $this->callbackPartial($settingId);
                },
            ]);
        }
    }
}
