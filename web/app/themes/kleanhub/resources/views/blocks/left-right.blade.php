{{--
  Title: Left | Right
  Description: Two-column layout with image and content, switchable left/right positioning with optional accordion
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: left-right
  Icon: align-pull-left
--}}
<section id="{{ $block_id }}" class="block left-right js-modal relative px-5 pt-[36px] pb-[50px] md:py-[70px] {{ $block_class }}">
  <div class="container mx-auto max-w-[83.125rem]">
    @if(!empty(array_filter($heading)))
      @include('utilities.heading', [
        'class' => 'md:max-w-[90%] mb-16',
        'sub_heading' => $heading['sub_heading'] ?? '',
        'sub_heading_class' => 'mb-2 leading-none',
        'title' => $heading['title'] ?? '',
        'title_class' => '',
        'content' => $heading['content'] ?? '',
        'content_class' => '']
      )
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
      {{-- Image Column --}}
      <div class="h-full {{ $layout == 'right' ? 'md:order-2' : 'md:order-1' }}">
        @if($image)
          <div class="image relative h-[350px] w-full bg-chinese-black rounded-3xl rounded-bl-none overflow-hidden">
            @include('utilities.bg', ['class' => '', 'image' => $image])
          </div>
        @endif
      </div>

      {{-- Content Column --}}
      <div class="h-full flex flex-col justify-center {{ $layout == 'right' ? 'md:order-1' : 'md:order-2' }}">
        @if($content)
          @include('utilities.heading', [
              'class' => 'md:max-w-[90%] mb-6',
              'sub_heading' => $content['sub_heading'] ?? '',
              'sub_heading_class' => 'mb-2 leading-none',
              'title' => $content['title'] ?? '',
              'title_class' => '',
              'content' => $content['content'] ?? '',
              'content_class' => '']
          )
        @endif

        @if($cta)
          <div class="ctas">
            @include('utilities.cta', [
            'cta' => $cta,
            'class' => 'w-full md:w-auto',
            'id' => 'left-right-cta-'.$block_id
          ])
          </div>
        @endif
      </div>
    </div>
  </div>
</section>
