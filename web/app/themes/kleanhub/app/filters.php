<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

/**
 * Allow mime types
 */
add_filter('upload_mimes', function ($mimes) {
    // Allow only WebP
    return [
        // Images
        'webp' => 'image/webp',
        'svg' => 'image/svg+xml', // Review security risk
        'png' => 'image/png',

        // Documents
        'pdf' => 'application/pdf',
        'doc' => 'application/msword',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'xls' => 'application/vnd.ms-excel',
        'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'ppt' => 'application/vnd.ms-powerpoint',
        'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'txt' => 'text/plain',
        'csv' => 'text/csv',
        'rtf' => 'application/rtf',
    ];
});

/**
 * Mime types error message
 */
add_filter('wp_handle_upload_prefilter', function ($file) {
    $allowed_extensions = [
        'webp', 'svg', 'png', 'jpg', 'jpeg', // images
        'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'csv', 'rtf', // docs
    ];

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (! in_array($ext, $allowed_extensions)) {
        $file['error'] = 'Only WebP, SVG, PNG, JPG, and common document types are allowed.';
    }

    return $file;
});
