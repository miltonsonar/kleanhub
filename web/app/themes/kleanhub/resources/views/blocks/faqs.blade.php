{{--
  Title: FAQs
  Description: Frequently asked questions with collapsible question and answer pairs
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: faqs
  Icon: editor-help
--}}
<section id="{{ $block_id }}" class="block faqs js-modal relative px-5 pt-[36px] pb-[50px] md:py-[70px] {{ $block_class }}">
  <div class="container mx-auto max-w-[83.125rem]">
    @include('utilities.heading', [
        'class' => 'md:max-w-[90%] mb-6',
        'sub_heading' => $sub_heading,
        'sub_heading_class' => 'mb-2 leading-none',
        'title' => $title,
        'title_class' => '',
        'content' => $content,
        'content_class' => '']
    )

    @if($cards)
      <div class="faqs-list js-faqs">
        @foreach($cards as $index => $card)
          <div class="faq py-4 relative {{ $index === 0 ? 'active' : '' }} hover:cursor-pointer">
            <div class="arrow absolute top-0 right-0 w-[40px] h-[40px]">
              @include('utilities.img', ['image' => ['url' => Vite::asset('resources/images/rounded-arrow-up.png'), 'alt' => 'Arrow Up', 'width' => '40', 'height' => '40'], 'class' => 'arrow-up transition-opacity duration-300 ' . ($index === 0 ? 'block' : 'hidden')])
              @include('utilities.img', ['image' => ['url' => Vite::asset('resources/images/rounded-arrow-down.png'), 'alt' => 'Arrow Down', 'width' => '40', 'height' => '40'], 'class' => 'arrow-down transition-opacity duration-300 ' . ($index === 0 ? 'hidden' : 'block')])
            </div>
            <div class="question w-[85%]">
              @include('utilities.text', ['tag' => 'h4', 'class' => '', 'text' => $card['question']])
            </div>
            <div class="answer w-[85%] overflow-hidden transition-all duration-300 ease-in-out">
              @include('utilities.text', ['tag' => 'p', 'class' => 'pt-4', 'text' => $card['answer']])
            </div>
            <div class="absolute left-0 bottom-0 h-px w-[85%] bg-[#d0d5dd]"></div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>
