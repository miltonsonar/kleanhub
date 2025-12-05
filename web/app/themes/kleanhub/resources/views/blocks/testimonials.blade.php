{{--
  Title: Testimonials
  Description: Display customer testimonials with quotes and author information
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: testimonials
  Icon: testimonial
--}}
<section id="{{ $block_id }}" class="block testimonials js-modal js-testimonials relative px-5 pt-[36px] pb-[50px] md:py-[70px] overflow-hidden {{ $block_class }}">
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
      <div class="testimonials-slider mb-8" data-layout="{{ $layout }}">
        @foreach($cards as $card)
          <div class="slide-item">
            <div class="testimonial-card p-6 rounded-lg bg-cultured h-full">
              @include('utilities.img', ['image' => ['url' => Vite::asset('resources/images/quote.png'), 'alt' => 'Quote', 'width' => '36', 'height' => '30'], 'class' => 'mx-auto w-auto h-[30px] mb-8'])

              @if($card['quote'])
                @include('utilities.text', ['tag' => 'p', 'class' => 'mb-4', 'text' => $card['quote']])
              @endif
              @if($card['author'])
                @include('utilities.text', ['tag' => 'h6', 'class' => '', 'text' => $card['author']])
              @endif
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>
