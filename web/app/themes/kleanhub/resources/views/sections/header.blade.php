<header class="banner">
  <a class="brand" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a>

  @if (has_nav_menu('main_navigation'))
    <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('main_navigation') }}">
      {!! wp_nav_menu(['theme_location' => 'main_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    </nav>
  @endif
</header>
