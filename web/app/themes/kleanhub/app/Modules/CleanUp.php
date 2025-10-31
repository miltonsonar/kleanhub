<?php

namespace App\Modules;

class CleanUp extends BaseSingleton
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'removeBlockCss'], 100);

        // Cleanup html head.
        add_action('init', [$this, 'cleanupHead']);

        add_filter('rewrite_rules_array', [$this, 'cleanRewrites']);

        // Remove WP version from RSS.
        add_filter('the_generator', '__return_false');

        // Remove WP version from css.
        add_filter('style_loader_src', [$this, 'removeWpVerCssJs'], 9999);

        // Remove WP version from scripts.
        add_filter('script_loader_src', [$this, 'removeWpVerCssJs'], 9999);

        add_filter('wp_php_error_message', function ($message, $error) {
            return 'Our website will be back soon. – Income Asset Management';
        }, 10, 2);
    }

    public function removeBlockCss()
    {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-blocks-style');
        wp_dequeue_style('global-styles');
    }

    /**
     * Clean up head
     */
    public function cleanupHead()
    {
        // EditURI link.
        remove_action('wp_head', 'rsd_link');

        // Category feed links.
        remove_action('wp_head', 'feed_links_extra', 3);

        // Post and comment feed links.
        remove_action('wp_head', 'feed_links', 2);

        // Windows Live Writer.
        remove_action('wp_head', 'wlwmanifest_link');

        // WP version.
        remove_action('wp_head', 'wp_generator');

        // Remove emojis from the frontend and backend
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    }

    /**
     * Remove the `feed` endpoint
     */
    public function cleanRewrites($rules)
    {
        foreach ($rules as $rule => $rewrite) {
            // remove feed rewrites
            if (preg_match('/.*(feed).*/', $rule)) {
                unset($rules[$rule]);
            }

            // trackbacks
            if (preg_match('/.*(trackback).*/', $rule)) {
                unset($rules[$rule]);
            }

            // remove comment rewrites
            if (preg_match('/.*(comment).*/', $rule)) {
                unset($rules[$rule]);
            }

            // remove author rewrites
            if (preg_match('/.*(author).*/', $rule)) {
                unset($rules[$rule]);
            }

            // remove year rewrites
            if (preg_match('/\(\[0-9\]\{4\}.*/', $rule)) {
                unset($rules[$rule]);
            }

            // remove attachment rewrites
            if (preg_match('/.*(attachment).*/', $rule)) {
                unset($rules[$rule]);
            }
            if (preg_match('/.*(attachment).*/', $rewrite)) {
                unset($rules[$rule]);
            }

            // remove post type rewrites
            if (preg_match('/.*(type).*/', $rule)) {
                unset($rules[$rule]);
            }
        }
        return $rules;
    }

    // Remove WP version from scripts.
    public function removeWpVerCssJs($src)
    {
        if (strpos($src, 'ver=')) {
            $src = remove_query_arg('ver', $src);
        }
        return $src;
    }
}
