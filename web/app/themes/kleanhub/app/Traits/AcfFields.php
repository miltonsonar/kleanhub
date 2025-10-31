<?php

namespace App\Traits;

use Illuminate\Support\Fluent;
use Illuminate\Support\Str;

trait AcfFields
{
    /**
     * ACF data to be passed to the view before rendering.
     */
    protected function fields(?int $post_id = null): array
    {
        return collect(\get_fields($post_id))
            ->mapWithKeys(function ($value, $key) {
                $value = is_array($value) ? new Fluent($value) : $value;
                $method = Str::camel($key);

                return [$key => method_exists($this, $method) ? $this->{$method}($value) : $value];
            })->toArray();
    }

    /**
     * ACF data to be passed to the view before rendering.
     */
    protected function data(?int $post_id = null): array
    {
        return collect(\get_field('data', $post_id))
            ->mapWithKeys(function ($value, $key) {
                $value = is_array($value) ? new Fluent($value) : $value;
                $method = Str::camel($key);

                return [$key => method_exists($this, $method) ? $this->{$method}($value) : $value];
            })->toArray();
    }

    /**
     * Get Feature Image ACF-ied
     */
    public function get_featured_image($post_id): ?array
    {
        $attachment_id = get_post_thumbnail_id($post_id);

        if (! $attachment_id) {
            return null;
        }

        $meta = wp_get_attachment_metadata($attachment_id);

        if (! $meta) {
            return null;
        }

        $image = [
            'ID' => $attachment_id,
            'id' => $attachment_id,
            'title' => get_the_title($attachment_id),
            'filename' => basename(get_attached_file($attachment_id)),
            'filesize' => filesize(get_attached_file($attachment_id)),
            'url' => wp_get_attachment_url($attachment_id),
            'link' => get_attachment_link($attachment_id),
            'alt' => get_post_meta($attachment_id, '_wp_attachment_image_alt', true),
            'author' => get_post_field('post_author', $attachment_id),
            'description' => get_post_field('post_content', $attachment_id),
            'caption' => wp_get_attachment_caption($attachment_id),
            'name' => get_post_field('post_name', $attachment_id),
            'status' => get_post_status($attachment_id),
            'uploaded_to' => get_post_field('post_parent', $attachment_id),
            'date' => get_post_field('post_date', $attachment_id),
            'modified' => get_post_field('post_modified', $attachment_id),
            'menu_order' => get_post_field('menu_order', $attachment_id),
            'mime_type' => get_post_mime_type($attachment_id),
            'type' => explode('/', get_post_mime_type($attachment_id))[0],
            'subtype' => explode('/', get_post_mime_type($attachment_id))[1],
            'icon' => wp_mime_type_icon($attachment_id),
            'width' => $meta['width'],
            'height' => $meta['height'],
            'sizes' => [],
        ];

        foreach ($meta['sizes'] as $size => $size_data) {
            $image_path = pathinfo($image['url']);
            $dirname = dirname($image['url']);
            $filename = $size_data['file'];
            $image['sizes'][$size] = "{$dirname}/{$filename}";
            $image['sizes']["{$size}-width"] = $size_data['width'];
            $image['sizes']["{$size}-height"] = $size_data['height'];
        }

        return $image;
    }

    /**
     * Get Video ID from Video URL ACF field
     *
     * @return mixed|string|null
     */
    public function get_video_id($url): mixed
    {
        $parsedUrl = parse_url($url);

        // Check for youtu.be short link
        if (isset($parsedUrl['host']) && $parsedUrl['host'] === 'youtu.be') {
            return ltrim($parsedUrl['path'], '/');
        }

        // Check for youtube.com URLs
        if (isset($parsedUrl['host']) && (str_contains($parsedUrl['host'], 'youtube.com'))) {
            parse_str($parsedUrl['query'] ?? '', $queryParams);

            // Format: https://www.youtube.com/watch?v=VIDEO_ID
            if (isset($queryParams['v'])) {
                return $queryParams['v'];
            }

            // Format: https://www.youtube.com/embed/VIDEO_ID
            if (isset($parsedUrl['path']) && preg_match('#^/embed/([^/?]+)#', $parsedUrl['path'], $matches)) {
                return $matches[1];
            }
        }

        // Fallback: try to extract from any valid pattern
        if (preg_match('%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $matches)) {
            return $matches[1];
        }

        // No match found
        return null;
    }
}
