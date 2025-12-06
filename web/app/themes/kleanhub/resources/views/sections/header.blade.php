<header class="header hidden">
  <a class="brand" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a>

  @if (has_nav_menu('main_nav'))
    <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('main_nav') }}">
      {!! wp_nav_menu(['theme_location' => 'main_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    </nav>
  @endif
</header>
