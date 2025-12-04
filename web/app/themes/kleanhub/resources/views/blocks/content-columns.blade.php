{{--
  Title: Content Columns
  Description: Display content in a multi-column grid layout with optional images, titles, descriptions and CTAs
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: content-columns
  Icon: columns
--}}
<section id="{{ $block_id }}" class="block content-columns js-modal js-content-columns relative px-5 pt-[36px] pb-[50px] md:py-[70px] {{ $block_class }}">
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
      <div class="grid grid-cols-1 md:grid-cols-2 lg:{{ $layout }} gap-6">
        @foreach($cards as $card)
          <div class="h-full">
            <div class="content-col group relative h-full md:p-6 rounded-2xl rounded-bl-none border-[1.5px] border-white transition duration-300 cursor-pointer md:hover:border-blue"
                 @if($card['cta'] && $card['cta']['type'] == 'link' && $card['cta']['link'])
                   data-card-link="{{ $card['cta']['link']['url'] }}"
                 data-card-target="{{ $card['cta']['link']['target'] }}"
                 @elseif($card['cta'] && $card['cta']['type'] == 'modal')
                   data-card-modal="content-col-cta-1-{{ $block_id }}"
              @endif>
              <div class="card-wrap flex flex-col h-full">
                <div class="card-content flex-grow">
                  @if($card['image'])
                    <div class="card-image relative rounded-2xl rounded-bl-none overflow-hidden h-[250px] w-full mb-4">
                      @include('utilities.bg', ['class' => 'max-h-[393px] md:max-h-none', 'image' => $card['image']])
                    </div>
                  @endif

                  @if($card['title'])
                    @include('utilities.text', ['tag' => 'h3', 'class' => 'mb-4', 'text' => $card['title']])
                  @endif

                  @if($card['content'])
                    @include('utilities.text', ['tag' => 'p', 'class' => 'mb-4', 'text' => $card['content']])
                  @endif
                </div>

                @if($card['cta'])
                  <div class="card-cta mt-auto">
                    @include('utilities.cta', [
                      'cta' => $card['cta'],
                      'class' => 'w-full md:w-auto ' .
                                 (isset($card['cta']['style']) && $card['cta']['style'] == 'secondary'
                                   ? 'group-hover:!bg-light-blue group-hover:!border-light-blue group-hover:!text-dark-blue'
                                   : (isset($card['cta']['style']) && $card['cta']['style'] == 'inverse'
                                     ? 'group-hover:!bg-white group-hover:!border-dark-blue group-hover:!text-dark-blue'
                                     : 'group-hover:!bg-blue group-hover:!border-blue group-hover:!text-white')),
                      'id' => 'content-col-cta-1-'.$block_id
                    ])
                  </div>
                @endif

              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>
