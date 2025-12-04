{{--
  Title: Image Banner
  Description: Full-width image banner for visual impact
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: image-banner
  Icon: format-image
--}}
<section id="{{ $block_id }}" class="block relative image-banner min-h-[500px] bg-chinese-black {{ $block_class }}">
  @include('utilities.bg', ['class' => 'h-full bg-left md:bg-center', 'image' => $image])
</section>
