{{--
  Title: Promotional Banner
  Description: Eye-catching banner with heading and call-to-action for promotions
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: promotional-banner
  Icon: megaphone
--}}
<section id="{{ $block_id }}" class="block promotional-banner js-modal relative px-5 pt-[36px] pb-[50px] md:py-[70px] {{ $block_class }}">
  <div class="container mx-auto max-w-[83.125rem]">
    <div class="banner min-h-[366px] relative rounded-3xl rounded-bl-none overflow-hidden py-[70px] px-[25px]">
      @if($image)
        @include('utilities.bg', ['image' => $image, 'class' => '' ])
      @endif

      <div class="content max-w-[811px] mx-auto text-center relative">
        @if($sub_heading)
          @include('utilities.text', ['tag' => 'h6', 'class' => 'text-blue', 'text' => $sub_heading])
        @endif

        @if($title)
          @include('utilities.text', ['tag' => 'h2', 'class' => 'h1 text-white mb-6', 'text' => $title])
        @endif

        @if($content)
          @include('utilities.text', ['tag' => 'div', 'class' => '[&>*]:text-2xl text-white mb-8', 'text' => $content])
        @endif

        @if($cta)
          @include('utilities.cta', [
            'cta' => $cta,
            'class' => 'w-full md:w-auto mb-0 md:min-w-[270px]',
            'id' => 'promo-banner-cta-'.$block_id
          ])
        @endif
      </div>
    </div>
  </div>
</section>
