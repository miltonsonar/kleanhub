<?php

namespace App\View\Composers;

use App\Traits\AcfFields;
use Roots\Acorn\View\Composer;

class Blocks extends Composer
{
    use AcfFields;

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'blocks.home-banner',
        'blocks.content-columns',
        'blocks.image-banner',
        'blocks.left-right',
        'blocks.content-cards',
        'blocks.promotional-banner',
        'blocks.gallery-slider',
        'blocks.testimonials',
        'blocks.form',
        'blocks.page-banner',
        'blocks.faqs',
        'blocks.members',
        'blocks.contact',
        'blocks.icon-cards',
        'blocks.separator',
    ];

    /**
     * Data to be passed to view before rendering.
     */
    public function with(): array
    {
        return $this->data();
    }

}
