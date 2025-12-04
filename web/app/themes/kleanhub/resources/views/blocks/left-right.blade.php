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
</section>
