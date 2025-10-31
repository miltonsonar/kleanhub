<?php

namespace App\PostTypes;

add_action('init', function () {
    site_register_post_type('posttype', 'Post Type', 'Post Types', [
        'menu_icon' => 'dashicons-location',
        'menu_position' => 20,
        'supports' => ['title', 'thumbnail'],
        'taxonomies' => [],
        'has_archive' => false,
        'rewrite' => false,
    ]);
});
