<?php

namespace App\Taxonomies;

add_action('init', function () {
    site_register_taxonomy('taxonomy', 'Taxonomy', 'Taxonomies', [], [
        'show_in_nav_menus' => true,
        'hierarchical' => true,
        'meta_box_cb' => false,
    ]);
    register_taxonomy_for_object_type('post', 'page');
});
