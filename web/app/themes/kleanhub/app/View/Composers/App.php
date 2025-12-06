<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Retrieve the site name.
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }

    /**
     * @return false|mixed
     */
    public function header(): mixed
    {
        return get_field('header', 'option');
    }

    /**
     * @return false|mixed
     */
    public function footer(): mixed
    {
        return get_field('footer', 'option');
    }
}
