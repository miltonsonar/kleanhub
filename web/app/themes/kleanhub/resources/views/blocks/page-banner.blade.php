{{--
  Title: Page Banner
  Description: Page header banner with title and background image
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: page-banner
  Icon: cover-image
--}}
<section id="{{ $block_id }}" class="block page-banner relative min-h-[340px] px-5 {{ $block_class }}">
  @include('utilities.bg', ['class' => '', 'image' => $image])

  <div class="container z-1 relative mx-auto max-w-[83.125rem] min-h-[340px] flex items-center  pt-[112px]  md:pt-[110px]">
    <div class="content max-w-[811px] mx-auto text-center w-full">
      @if($enable_title)
        @include('utilities.text', ['tag' => 'h1', 'class' => 'text-light-blue', 'text' => get_the_title()])
      @else
        @if($title)
          @include('utilities.text', ['tag' => 'h1', 'class' => 'text-light-blue', 'text' => $title])
        @endif
      @endif
    </div>
  </div>
</section>
