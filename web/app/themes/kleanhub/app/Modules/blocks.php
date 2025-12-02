<?php

namespace App\Modules;

// Block Data Filters
add_filter('block_categories_all', function ($categories, $block_editor_context) {
    return array_merge([['slug' => 'blocks', 'title' => 'Page Modules']], $categories);
}, 10, 2);

// May need for some pages
add_filter('render_block', function ($block_content, $block) {
    if (in_array($block['blockName'], ['core/heading', 'core/paragraph', 'core/list'])) {
        return '<div class="container">' . $block_content . '</div>';
    }

    return $block_content;
}, 99, 2);

// Allowed blocks
add_filter('allowed_block_types_all', function ($allowed_block_types, $block_editor_context) {
    // NOTE to get a full list of registered blocks turn this function off and then in the developer tools add the code below
    //  wp.blocks.getBlockTypes().forEach(item => { console.log(item.name) })
    global $post;

    $block_types = [
        // Custom Blocks
        'acf/home-banner',
        'acf/content-columns',
        'acf/image-banner',
        'acf/left-right',
        'acf/content-cards',
        'acf/promotional-banner',
        'acf/gallery-slider',
        'acf/testimonials',
        'acf/form',
        'acf/page-banner',
        'acf/faqs',
        'acf/members',
        'acf/contact',
        'acf/icon-cards',
        'acf/separator',
    ];

    //    if (in_array($post->post_type, ['testimonial', 'team'])) {
    //        $block_types = [];
    //    }

    return $block_types;
    //    return array_merge($allowed_block_types, $block_types);
}, 1, 2);
