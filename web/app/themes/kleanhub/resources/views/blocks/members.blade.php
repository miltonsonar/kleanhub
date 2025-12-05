{{--
  Title: Members
  Description: Showcase team members or staff with photos, titles, and descriptions in a grid layout
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: members
  Icon: groups
--}}
<section id="{{ $block_id }}" class="block members js-modal relative px-5 pt-[36px] pb-[50px] md:py-[70px] {{ $block_class }}">
  <div class="container mx-auto max-w-[83.125rem]">
    @include('utilities.heading', [
        'class' => 'md:max-w-[90%] mb-12',
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
            <div class="member-col relative h-full rounded-t-2xl bg-dark-blue overflow-hidden">
              @if($card['image'])
                <div class="image relative w-full h-[250px] bg-chinese-black overflow-hidden">
                  @include('utilities.bg', ['class' => '', 'image' => $card['image']])
                </div>
              @endif

              @if($card['title'] || $card['sub_heading'] || $card['content'])
                <div class="content p-6">
                  @if($card['title'])
                    @include('utilities.text', ['tag' => 'h3', 'class' => 'text-white mb-3', 'text' => $card['title']])
                  @endif

                  @if($card['sub_heading'])
                    @include('utilities.text', ['tag' => 'p', 'class' => 'text-white font-medium', 'text' => $card['sub_heading']])
                  @endif

                  @if($card['content'])
                    @include('utilities.text', ['tag' => 'p', 'class' => 'text-white font-medium mb-0', 'text' => $card['content']])
                  @endif

                </div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    @endif

  </div>
</section>
