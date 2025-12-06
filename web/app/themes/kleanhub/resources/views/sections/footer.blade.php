<footer class="footer bg-dark-blue px-5 pt-[41px] pb-[21px] md:pt-[67px] md:pb-[33px] text-white">
  <div class="container mx-auto max-w-[83.125rem]">
    <div class="grid grid-cols-2 max-w-[1140px] mx-auto mb-9 md:mb-12">
      <div class="h-full flex justify-start items-start">
        @if($footer()['logo'])
          @include('utilities.img', ['image' => $footer()['logo'], 'class' => 'w-auto h-[38px] mb-0'])
        @endif
      </div>
      <div class="h-full flex justify-end items-start gap-4">
        @if($footer()['socials'])
          @foreach($footer()['socials'] as $social)
            <div class="social w-[32px] h-[32px] relative overflow-hidden">
              @if($social['icon'])
                @include('utilities.bg', ['class' => 'z-0 contain', 'image' => $social['icon']])
              @endif

              @if($social['link'])
                @include('utilities.link', [
                  'link' => $social['link'],
                  'class' => 'absolute h-full w-full opacity-0 z-1 cursor-pointer'
              ])
              @endif
            </div>
          @endforeach
        @endif
      </div>
    </div>

    <div class="footer-content grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 max-w-[1140px] mx-auto mb-10">
      <div class="h-full flex lg:justify-start">
        @if($footer()['contact'])
          <div class="content mb-6 md:mb-0">
            @if($footer()['contact']['title'])
              @include('utilities.text', ['tag' => 'h4', 'class' => 'mb-4', 'text' => $footer()['contact']['title']])
            @endif

            @if($footer()['contact']['content'])
              @include('utilities.text', ['tag' => 'div', 'class' => '', 'text' => $footer()['contact']['content']])
            @endif
          </div>
        @endif
      </div>
      <div class="h-full flex lg:justify-center">
        @if (has_nav_menu('footer_left_nav'))
          <div class="content">
            <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('footer_left_nav') }}">
              {!! wp_nav_menu(['theme_location' => 'footer_left_nav', 'menu_class' => 'nav', 'echo' => false]) !!}
            </nav>
          </div>
        @endif
      </div>
      <div class="h-full flex lg:justify-center">
        <div class="content">
          @if (has_nav_menu('footer_right_nav'))
            <div class="content">
              <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('footer_right_nav') }}">
                {!! wp_nav_menu(['theme_location' => 'footer_right_nav', 'menu_class' => 'nav', 'echo' => false]) !!}
              </nav>
            </div>
          @endif
        </div>
      </div>
      <div class="h-full flex lg:justify-end">
        @if($footer()['acknowledge'])
          <div class="content">
            @if($footer()['acknowledge']['title'])
              @include('utilities.text', ['tag' => 'h4', 'class' => 'mb-4', 'text' => $footer()['acknowledge']['title']])
            @endif

            @if($footer()['acknowledge']['content'])
              @include('utilities.text', ['tag' => 'div', 'class' => '', 'text' => $footer()['acknowledge']['content']])
            @endif
          </div>
        @endif
      </div>
    </div>
  </div>

  @if($footer()['credits'])
    <div class="footer-credits grid grid-cols-2  max-w-[1140px] mx-auto pt-[24px] pb-[24px] md:pt-[29px] md:pb-[33px] border-t border-white">
      <div class="h-full flex justify-start">
        @if($footer()['credits']['left_link'])
          @include('utilities.link', [
              'link' => $footer()['credits']['left_link'],
              'class' => ''
          ])
        @endif
      </div>
      <div class="h-full flex justify-end">
        @if($footer()['credits']['right_link'])
          @include('utilities.link', [
              'link' => $footer()['credits']['right_link'],
              'class' => ''
          ])
        @endif
      </div>
    </div>
  @endif
</footer>
