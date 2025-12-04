{{--
  Title: Icon Cards
  Description: Cards with icons, titles and links for highlighting key features or services
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: icon-cards
  Icon: star-filled
--}}
<section id="{{ $block_id }}" class="block icon-cards js-modal relative px-5 pt-[36px] pb-[50px] md:py-[70px] {{ $block_class }}">
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
      <div class="grid grid-cols-1 md:grid-cols-2 {{ $layout == 'grid-cols-2' ? 'lg:grid-cols-2' : ($layout == 'grid-cols-4' ? 'lg:grid-cols-4' : 'lg:grid-cols-3') }} gap-6">
        @foreach($cards as $card)
          <div class="h-full">
            <div class="icon-card h-full p-8 rounded-lg bg-anti-white">
              @if($card['icon'])
                @include('utilities.img', ['image' => $card['icon'], 'class' => 'w-auto h-[48px] mb-6'])
              @endif
              @if($card['title'])
                @include('utilities.text', ['tag' => 'h3', 'class' => 'mb-6', 'text' => $card['title']])
              @endif

              @if($card['link'])
                @include('utilities.link', [
                    'link' => $card['link'],
                    'class' => 'text-[20px] font-bold'
                ])
              @endif
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>
