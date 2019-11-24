<?php

namespace App;

use App\Controllers\Admin\Customizer;

/**
 * Theme customizer
 */
add_action('customize_register', [new Customizer(), 'init']);

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('mirage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});
