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

// Populate Gravity Forms in ACF select fields
add_filter('acf/load_field', function ($field) {
    // Array of field keys that should load Gravity Forms
    $gravity_form_fields = [
        'field_692e62b768627', // Utility - CTA modal form
        'field_692e9c304d782',  // Block - Form
        'field_692ea37f3070a',  // Contact - Form
        // Add more field keys here as needed
    ];

    // Check if this field should load Gravity Forms
    if (in_array($field['key'], $gravity_form_fields) && class_exists('GFAPI')) {
        $forms = \GFAPI::get_forms();
        $field['choices'] = [];

        if (!empty($forms)) {
            foreach ($forms as $form) {
                $field['choices'][$form['id']] = $form['title'];
            }
        }
    }

    return $field;
});

// Disable ACF block mode switcher (eye icon) globally
add_filter('acf/blocks/register_block_type_args', function ($args) {
    $args['mode'] = 'edit';
    $args['supports']['mode'] = false;
    return $args;
});
