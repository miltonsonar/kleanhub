<?php

namespace App\Modules;

if (defined('WP_ENV') && WP_ENV == 'production') {
    add_filter('acf/settings/show_admin', '__return_false');
}

add_filter('acf/settings/save_json', function ($path) {
    $path = get_stylesheet_directory().'/resources/acf-json';
    if (! is_dir($path)) {
        mkdir($path);
    }

    return $path;
});

add_filter('acf/settings/load_json', function ($paths) {
    $paths[] = get_stylesheet_directory().'/resources/acf-json';

    return $paths;
});

add_filter('acf/fields/google_map/api', function ($api) {
    $api['key'] = env('GOOGLE_API_KEY');

    return $api;
});

if (function_exists('acf_add_options_page')) {
    // add parent
    $parent = acf_add_options_page([
        'page_title' => 'Site Settings',
        'menu_title' => 'Site Settings',
        'position' => 76,
        'redirect' => true,
    ]);
}
