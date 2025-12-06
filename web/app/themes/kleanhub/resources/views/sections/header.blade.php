<header class="header js-header fixed z-10 w-full">
  <div class="header-wrap relative container mx-auto max-w-[83.125rem] bg-black-o pt-[32px] pb-[32px] pl-[20px] pr-[20px] md:pt-[26px] md:pb-[26px] md:pl-[30px] md:pr-[30px] rounded-br-2xl rounded-bl-2xl text-white">

    <div class="header-top grid grid-cols-[auto_1fr]  relative">
      <div class="h-full flex justify-start">
        <a class="brand" href="{{ home_url('/') }}">
          @if($header()['logo'])
            @include('utilities.img', ['image' => $header()['logo'], 'class' => 'w-auto h-[38px] mb-0'])
          @else
            {!! $siteName !!}
          @endif
        </a>

      </div>
      <div class="h-full flex justify-end">
        @if($header()['phone'])
          <div class="top-link hidden xl:block pt-3">
            @include('utilities.link', [
                  'link' => $header()['phone'],
                  'class' => 'icon-phone'
              ])
          </div>
        @endif

        @if($header()['top_cta'])
          <div class="top-cta lg:ml-6">
            @include('utilities.cta', [
              'cta' => $header()['top_cta'],
              'class' => 'top-cta-link lg:!text-lg',
              'id' => 'md-top-cta'
            ])
          </div>
        @endif

        <button class="hamburger lg:hidden ml-10 mt-2" aria-label="Toggle menu">
          <span></span>
          <span></span>
          <span></span>
        </button>

      </div>
    </div>

    <div class="header-menu grid grid-cols-1 relative lg:absolute lg:bottom-[29px] lg:left-[20%]">
      @if (has_nav_menu('main_nav'))
        <nav class="nav-primary mt-6 lg:mt-0" aria-label="{{ wp_get_nav_menu_name('main_nav') }}">
          {!! wp_nav_menu(['theme_location' => 'main_nav', 'menu_class' => 'nav', 'echo' => false]) !!}
        </nav>
      @endif
    </div>

  </div>


</header>
