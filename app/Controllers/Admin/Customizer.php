<?php

namespace App\Controllers\Admin;

use WP_Customize_Manager;

class Customizer
{
    public function init(WP_Customize_Manager $wpCustomize): void
    {
        $wpCustomize->get_setting('blogname')->transport = 'postMessage';
        $wpCustomize->selective_refresh->add_partial('blogname', [
            'selector'        => '.navbar-brand',
            'render_callback' => function (): void {
                bloginfo('name');
            },
        ]);
        $this->showcaseSection($wpCustomize);
        $this->secondSection($wpCustomize);
        $this->thirdSection($wpCustomize);
        $this->fifthSection($wpCustomize);
        $this->sixthSection($wpCustomize);
    }

    /**
     * @param string $option
     */
    private function callbackPartial(string $option): void
    {
        echo get_theme_mod($option);
    }

    private function showcaseSection(WP_Customize_Manager $wpCustomize): void
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

    private function secondSection(WP_Customize_Manager $wpCustomize): void
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

    private function fifthSection(WP_Customize_Manager $wpCustomize): void
    {
        $wpCustomize->add_section('fifthSection', [
            'title'       => __('Fifth Section', 'mirage'),
            'description' => sprintf(__('Option for Fifth section', 'mirage')),
            'priority'    => 134,
        ]);
        $wpCustomize->add_setting('fifthSection_heading', [
            'default'   => _x('We\'ve got what you need!', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);
        $wpCustomize->add_setting('fifthSection_btn', [
            'default'   => _x('Get Started!', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);
        $wpCustomize->add_setting('fifthSection_btn_href', [
            'default'   => _x('#services', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);

        $this->addControlAndPartial($wpCustomize, 'fifthSection_heading', '.fifth-section h2', 'fifthSection', __('Heading', 'mirage'), 1);
        $this->addControlAndPartial($wpCustomize, 'fifthSection_btn', '.fifth-section a', 'fifthSection', __('Button', 'mirage'), 3);
        $this->addControlAndPartial($wpCustomize, 'fifthSection_btn_href', '.fifth-section a[href]', 'fifthSection', __('Link', 'mirage'), 4, false);
    }

    private function sixthSection(WP_Customize_Manager $wpCustomize): void
    {
        $wpCustomize->add_section('sixthSection', [
            'title'       => __('Sixth Section', 'mirage'),
            'description' => sprintf(__('Option for sixth section', 'mirage')),
            'priority'    => 134,
        ]);
        $wpCustomize->add_setting('sixthSection_heading', [
            'default'   => _x('Let\'s Get In Touch!', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);
        $wpCustomize->add_setting('sixthSection_text', [
            'default'   => _x('Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon
                    as possible!', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('sixthSection_first_icon', [
            'default'   => _x('fas fa-phone fa-3x', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);
        $wpCustomize->add_setting('sixthSection_first_icon_text', [
            'default'   => _x('+1 (202) 555-0149', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);
        $wpCustomize->add_setting('sixthSection_second_icon', [
            'default'   => _x('fas fa-envelope fa-3x', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('sixthSection_second_icon_text', [
            'default'   => _x('contact@yourwebsite.com', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);
        $wpCustomize->add_setting('sixthSection_btn_href', [
            'default'   => _x('mailto:contact@yourwebsite.com', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',

        ]);

        $this->addControlAndPartial($wpCustomize, 'sixthSection_heading', '.sixth-section h2', 'sixthSection', __('Heading', 'mirage'), 1);
        $this->addControlAndPartial($wpCustomize, 'sixthSection_text', '.sixth-section .header-section p', 'sixthSection', __('Text', 'mirage'), 2);
        $this->addControlAndPartial(
            $wpCustomize,
            'sixthSection_first_icon',
            '.sixth-section .first-col i',
            'sixthSection',
            __('First Icon', 'mirage'),
            3,
            false
        );
        $this->addControlAndPartial(
            $wpCustomize,
            'sixthSection_first_icon_text',
            '.sixth-section .first-col div',
            'sixthSection',
            __('First Icon Text', 'mirage'),
            4,
            false
        );
        $this->addControlAndPartial(
            $wpCustomize,
            'sixthSection_second_icon',
            '.sixth-section .second-col i',
            'sixthSection',
            __('Second Icon', 'mirage'),
            5,
            false
        );
        $this->addControlAndPartial(
            $wpCustomize,
            'sixthSection_second_icon_text',
            '.sixth-section .second-col a',
            'sixthSection',
            __('Second Icon Text', 'mirage'),
            6,
            false
        );
        $this->addControlAndPartial($wpCustomize, 'sixthSection_btn_href', '.sixth-section a[href]', 'sixthSection', __('Link', 'mirage'), 8, false);
    }

    /**r
     *
     * @param WP_Customize_Manager $wpCustomize
     * @param string               $settingId
     * @param string               $selector
     * @param string               $section
     * @param string               $label
     * @param int                  $priority
     * @param bool                 $refresh
     */
    private function addControlAndPartial(
        WP_Customize_Manager $wpCustomize,
        string $settingId,
        string $selector,
        string $section,
        string $label,
        int $priority,
        bool $refresh = true
    ): void {
        $wpCustomize->add_control($settingId, [
            'label'    => $label,
            'section'  => $section,
            'priority' => $priority,
        ]);
        if ($refresh) {
            $wpCustomize->selective_refresh->add_partial($settingId, [
                'selector'        => $selector,
                'render_callback' => function () use ($settingId): void {
                    $this->callbackPartial($settingId);
                },
            ]);
        }
    }

    private function thirdSection(WP_Customize_Manager $wpCustomize): void
    {
        $wpCustomize->add_section('thirdSection', [
            'title'       => __('Third Section', 'mirage'),
            'description' => sprintf(__('Option for third section', 'mirage')),
            'priority'    => 132,
        ]);
        $wpCustomize->add_setting('thirdSection_heading', [
            'default'   => _x('At Your Service', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('thirdSection_first_icon', [
            'default'   => _x('fas fa-4x fa-gem', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('thirdSection_first_heading', [
            'default'   => _x('Sturdy Themes', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('thirdSection_first_text', [
            'default'   => _x('Our themes are updated regularly to keep them bug free!', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('thirdSection_second_icon', [
            'default'   => _x('fas fa-4x fa-laptop-code', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('thirdSection_second_heading', [
            'default'   => _x('Up to Date', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('thirdSection_second_text', [
            'default'   => _x('All dependencies are kept current to keep things fresh.', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('thirdSection_third_icon', [
            'default'   => _x('fas fa-4x fa-globe', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('thirdSection_third_heading', [
            'default'   => _x('Ready to Publish', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('thirdSection_third_text', [
            'default'   => _x('You can use this design as is, or you can make changes!', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('thirdSection_fourth_icon', [
            'default'   => _x('fas fa-4x fa-heart', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('thirdSection_fourth_heading', [
            'default'   => _x('Made with Love', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);
        $wpCustomize->add_setting('thirdSection_fourth_text', [
            'default'   => _x('Is it really open source if it\'s not made with love?', 'mirage'),
            'type'      => 'theme_mod',
            'transport' => 'postMessage',
        ]);

        $this->addControlAndPartial($wpCustomize, 'thirdSection_heading', '.third-section h2', 'thirdSection', __('Heading', 'mirage'), 1);
        $this->addControlAndPartial($wpCustomize, 'thirdSection_first_icon', '.third-section .first-col i', 'thirdSection', __('Icon', 'mirage'), 2, false);
        $this->addControlAndPartial($wpCustomize, 'thirdSection_first_heading', '.third-section .first-col h3', 'thirdSection', __('Heading', 'mirage'), 3);
        $this->addControlAndPartial($wpCustomize, 'thirdSection_first_text', '.third-section .first-col p', 'thirdSection', __('Text', 'mirage'), 4);
        $this->addControlAndPartial($wpCustomize, 'thirdSection_second_icon', '.third-section .second-col i', 'thirdSection', __('Icon', 'mirage'), 5, false);
        $this->addControlAndPartial($wpCustomize, 'thirdSection_second_heading', '.third-section .second-col h3', 'thirdSection', __('Heading', 'mirage'), 6);
        $this->addControlAndPartial($wpCustomize, 'thirdSection_second_text', '.third-section .second-col p', 'thirdSection', __('Text', 'mirage'), 7);
        $this->addControlAndPartial($wpCustomize, 'thirdSection_third_icon', '.third-section .third-col i', 'thirdSection', __('Icon', 'mirage'), 8, false);
        $this->addControlAndPartial($wpCustomize, 'thirdSection_third_heading', '.third-section .third-col h3', 'thirdSection', __('Heading', 'mirage'), 9);
        $this->addControlAndPartial($wpCustomize, 'thirdSection_third_text', '.third-section .third-col p', 'thirdSection', __('Text', 'mirage'), 10);
        $this->addControlAndPartial($wpCustomize, 'thirdSection_fourth_icon', '.third-section .fourth-col i', 'thirdSection', __('Icon', 'mirage'), 11, false);
        $this->addControlAndPartial($wpCustomize, 'thirdSection_fourth_heading', '.third-section .fourth-col h3', 'thirdSection', __('Heading', 'mirage'), 12);
        $this->addControlAndPartial($wpCustomize, 'thirdSection_fourth_text', '.third-section .fourth-col p', 'thirdSection', __('Text', 'mirage'), 13);
    }
}
