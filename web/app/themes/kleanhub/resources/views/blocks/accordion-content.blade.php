{{--
  Title: Accordion Content
  Description: Content section with heading, image, CTA button and optional collapsible accordion items
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: accordion-content
  Icon: list-view
--}}
<section id="{{ $block_id }}" class="block accordion-content js-modal relative px-5 pt-[36px] pb-[50px] md:py-[70px] {{ $block_class }} {{ ($bg_color == 'dots')? 'bg-light-blue' : 'bg-white' }}">
  @if(($bg_color == 'dots'))
    @include('utilities.bg', ['image' => ['url' => Vite::asset('resources/images/dots.svg')], 'class' => 'bg-light-blue !bg-contain !bg-repeat' ])
  @endif

  <div class="container mx-auto max-w-[83.125rem] relative z-0">
    <div class="grid grid-cols-1 md:grid-cols-2">
      <div class="h-full">
        @include('utilities.heading', [
            'class' => 'md:max-w-[90%] mb-10',
            'sub_heading' => $sub_heading,
            'sub_heading_class' => 'mb-2 leading-none',
            'title' => $title,
            'title_class' => '',
            'content' => $content,
            'content_class' => 'text-xl [&>*]:text-xl']
        )

        @if($enable_accordion && $accordion)
          <div class="accordion-list js-accordion-content mb-8">
            @foreach($accordion as $index => $card)
              <div class="accordion-item py-[14px] relative {{ $index === 0 ? 'active' : '' }} hover:cursor-pointer">
                <div class="arrow absolute top-[20px] right-0 w-[24px] h-[24px]">
                  @include('utilities.img', ['image' => ['url' => Vite::asset('resources/images/icon-minus.svg'), 'alt' => 'Arrow Up', 'width' => '24', 'height' => '24'], 'class' => 'arrow-up transition-opacity duration-300 ' . ($index === 0 ? 'block' : 'hidden')])
                  @include('utilities.img', ['image' => ['url' => Vite::asset('resources/images/icon-plus.svg'), 'alt' => 'Arrow Down', 'width' => '24', 'height' => '24'], 'class' => 'arrow-down transition-opacity duration-300 ' . ($index === 0 ? 'hidden' : 'block')])
                </div>
                <div class="question w-[85%]">
                  @include('utilities.text', ['tag' => 'h5', 'class' => 'my-2', 'text' => $card['title']])
                </div>
                <div class="answer w-[85%] overflow-hidden transition-all duration-300 ease-in-out">
                  @include('utilities.text', ['tag' => 'p', 'class' => '', 'text' => $card['content']])
                </div>
                <div class="absolute left-0 bottom-0 h-px w-full bg-[#d0d5dd]"></div>
              </div>
            @endforeach
          </div>
        @endif

        @if($cta)
          @include('utilities.cta', [
            'cta' => $cta,
            'class' => 'w-full md:w-auto',
            'id' => 'content-card-cta-'.$block_id
          ])
        @endif
      </div>
      <div class="h-full md:pl-6 flex justify-end items-center">
        @if($image)
          <div class="image relative mt-6 md:mt-0 h-[425px] w-full md:max-w-[526px] bg-chinese-black rounded-3xl rounded-bl-none overflow-hidden">
            @include('utilities.bg', ['class' => '', 'image' => $image])
          </div>
        @endif
      </div>
    </div>
  </div>
</section>
