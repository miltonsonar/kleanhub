{{--
  Title: Content Cards
  Description: Grid of cards with icons, titles, descriptions and call-to-action buttons
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: content-cards
  Icon: grid-view
--}}
<section id="{{ $block_id }}" class="block content-cards js-modal js-content-cards relative px-5 pt-[36px] pb-[50px] md:py-[70px] {{ $block_class }}">
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
      <div class="cards-slider mb-8 md:grid md:grid-cols-2 {{ $layout == 'grid-cols-2' ? 'lg:grid-cols-2' : ($layout == 'grid-cols-4' ? 'lg:grid-cols-4' : 'lg:grid-cols-3') }} md:gap-5">
        @foreach($cards as $card)
          <div class="slide-item">
            <div class="content-card p-6 rounded-2xl bg-cultured h-full">
              @if($card['icon'])
                @include('utilities.img', ['image' => $card['icon'], 'class' => 'w-auto h-[52px] mb-8'])
              @endif
              @if($card['title'])
                @include('utilities.text', ['tag' => 'h4', 'class' => 'mb-2', 'text' => $card['title']])
              @endif
              @if($card['content'])
                @include('utilities.text', ['tag' => 'p', 'class' => 'mb-0', 'text' => $card['content']])
              @endif
            </div>
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
</section>
