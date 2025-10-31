<?php

namespace App\Taxonomies;

/*
 * Register a taxonomy
 */

function site_register_taxonomy($key, $singular, $plural, $object_types = [], $args = []): void
{
    $labels = [
        'name' => $plural,
        'singular_name' => $singular,
        'search_items' => 'Search '.$plural,
        'popular_items' => 'Popular '.$plural,
        'all_items' => 'All '.$plural,
        'parent_item' => 'Parent '.$singular,
        'parent_item_colon' => 'Parent '.$singular.':',
        'edit_item' => 'Edit '.$singular,
        'view_item' => 'View '.$singular,
        'update_item' => 'Update '.$singular,
        'add_new_item' => 'Add New '.$singular,
        'new_item_name' => 'New '.$singular.' Name',
        'separate_items_with_commas' => 'Separate '.$plural.' with commas',
        'add_or_remove_items' => 'Add or remove '.$plural,
        'choose_from_most_used' => 'Choose from the most used '.$plural,
        'not_found' => 'No '.$plural.' found',
        'no_terms' => 'No '.$plural,
        'items_list_navigation' => $plural.' items list navigation',
        'items_list' => $plural.' items list',
        'most_used' => 'Most used '.$plural,
        'back_to_items' => 'Back to '.$plural,
    ];

    $args = array_merge([
        'labels' => $labels,
        'description' => $plural,
        'public' => true,
        'publicly_queryable' => true,
        'hierarchical' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'show_tagcloud' => false,
        'show_in_quick_edit' => true,
        'show_admin_column' => true,
        'meta_box_cb' => 'post_categories_meta_box',
        'rewrite' => true,
        'query_var' => true,
    ], $args);

    register_taxonomy($key, $object_types, $args);
}
