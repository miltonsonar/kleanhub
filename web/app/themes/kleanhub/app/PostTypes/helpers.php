<?php

namespace App\PostTypes;

/*
 * Register a post type
 */
function site_register_post_type($key, $singular, $plural, $args = []): void
{
    $labels = [
        'name' => $plural,
        'singular_name' => $singular,
        'add_new' => 'Add New',
        'add_new_item' => 'Add New '.$singular,
        'edit_item' => 'Edit '.$singular,
        'new_item' => 'New '.$singular,
        'view_item' => 'View '.$singular,
        'view_items' => 'View '.$plural,
        'search_items' => 'Search '.$plural,
        'not_found' => 'No '.$plural.' found.',
        'not_found_in_trash' => 'No '.$plural.' found in Trash.',
        'parent_item_colon' => 'Parent '.$singular.':',
        'all_items' => 'All '.$plural,
        'archives' => $singular.' Archives',
        'attributes' => $singular.' Attributes',
        'insert_into_item' => 'Insert into '.$singular,
        'uploaded_to_this_item' => 'Uploaded to this '.$singular,
        'featured_image' => 'Featured Image',
        'set_featured_image' => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image' => 'Use as featured image',
        'filter_items_list' => 'Filter '.$plural.' list',
        'items_list_navigation' => $plural.' list navigation',
        'items_list' => $plural.' list',
        'item_published' => $singular.' published.',
        'item_published_privately' => $singular.' published privately.',
        'item_reverted_to_draft' => $singular.' reverted to draft.',
        'item_scheduled' => $singular.' scheduled.',
        'item_updated' => $singular.' updated.',
    ];

    $args = array_merge([
        'label' => $singular,
        'labels' => $labels,
        'description' => $singular,
        'public' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-admin-post',
        'capability_type' => 'page',
        'supports' => ['title', 'editor', 'thumbnail'],
        'taxonomies' => [], // ['category', 'post_tag'],
        'has_archive' => false,
        'rewrite' => true,
    ], $args);

    register_post_type($key, $args);
}
