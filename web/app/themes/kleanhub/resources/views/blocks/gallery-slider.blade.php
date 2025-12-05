{{--
  Title: Gallery Slider
  Description: Image gallery carousel/slider for showcasing multiple photos
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: gallery-slider
  Icon: images-alt2
--}}
<section id="{{ $block_id }}" class="block gallery-slider js-modal js-gallery-slider relative px-5 pt-[36px] pb-[50px] md:py-[70px] {{ $block_class }}">
  <div class="container mx-auto max-w-[83.125rem] ">
    @include('utilities.heading', [
        'class' => 'md:max-w-[90%] mb-6',
        'sub_heading' => $sub_heading,
        'sub_heading_class' => 'mb-2 leading-none',
        'title' => $title,
        'title_class' => '',
        'content' => $content,
        'content_class' => '']
    )
  </div>

  @if($gallery)
    <div class="gallery-slider-container -mx-5">
      <div class="gallery">
        @foreach($gallery as $id => $slide)
          <div class="slide relative h-[425px] md:h-[600px] z-0">
            <div class="slide-image h-[425px] md:h-[600px] bg-chinese-black relative rounded-lg overflow-hidden">
              @include('utilities.bg', ['class' => 'z-0', 'image' => $slide])

              <div class="text absolute bottom-0 w-full rounded-b-lg p-8 bg-[linear-gradient(90deg,#000_-42.97%,rgba(0,0,0,0)_134.14%)] flex justify-between items-center">
                @include('utilities.text', ['tag' => 'h4', 'class' => 'text-white mb-0', 'text' => $slide['title']])
                @include('utilities.text', ['tag' => 'h4', 'class' => 'text-white mb-0', 'text' => ($id+1).'/'.count($gallery)])
              </div>

            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endif
</section>
