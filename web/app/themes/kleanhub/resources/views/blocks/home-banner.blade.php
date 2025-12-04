{{--
  Title: Home Banner
  Description: Hero banner for homepage with heading and call-to-action buttons
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: home-banner
  Icon: welcome-view-site
--}}
<section id="{{ $block_id }}" class="block home-banner js-modal relative min-h-[393px] md:min-h-[600px] px-5 {{ $block_class }}">
  @include('utilities.bg', ['class' => 'max-h-[393px] md:max-h-none', 'image' => $image])
  <div class="container mx-auto pt-[409px] md:pt-[195px] max-w-[83.125rem]">
    @include('utilities.heading', [
              'class' => 'max-w-[744px]',
              'sub_heading' => $sub_heading,
              'sub_heading_class' => 'text-dark-blue mb-2',
              'title' => $title,
              'title_tag' => 'h1',
              'title_class' => 'text-dark-blue md:text-white',
              'content' => $content,
              'content_class' => 'text-[22px] md:text-[24px] [&>*]:text-[22px] [&>*]:md:text-[24px] text-dark-blue md:text-white font-medium [&>*]:font-medium [&>*]:leading-tight']
              )

    <div class="ctas">
      @if($cta_1)
        @include('utilities.cta', [
          'cta' => $cta_1,
          'class' => 'w-full md:w-auto mb-4 md:mr-4',
          'id' => 'home-banner-cta-1-'.$block_id
        ])
      @endif

      @if($cta_2)
        @include('utilities.cta', [
          'cta' => $cta_2,
          'class' => 'w-full md:w-auto mb-4',
          'id' => 'home-banner-cta-2-'.$block_id
        ])
      @endif
    </div>
  </div>
</section>
