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

        $this->addControlAndPartial($wpCustomize, 'showcase_heading', '.masthead h1', 'showcase', __('Heading', 'mirage'), 1);
        $this->addControlAndPartial($wpCustomize, 'showcase_text', '.masthead p', 'showcase', __('Text', 'mirage'), 2);
    }

    private function callbackPartial($option)
    {
        echo get_theme_mod($option);
    }

    /**
     * @param WP_Customize_Manager $wpCustomize
     * @param                      $settingId
     * @param                      $selector
     * @param                      $section
     * @param                      $label
     * @param                      $priority
     */
    private function addControlAndPartial(WP_Customize_Manager $wpCustomize, $settingId, $selector, $section, $label, $priority)
    {
        $wpCustomize->add_control($settingId, [
            'label'    => $label,
            'section'  => $section,
            'priority' => $priority,
        ]);

        $wpCustomize->selective_refresh->add_partial($settingId, [
            'selector'        => $selector,
            'render_callback' => function () use ($settingId) {
                $this->callbackPartial($settingId);
            },
        ]);
    }
}
