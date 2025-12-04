{{--
  Title: Accordion Content
  Description: Content section with heading, image, CTA button and optional collapsible accordion items
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: accordion-content
  Icon: list-view
--}}
<section id="{{ $block_id }}" class="block accordion-content js-modal relative px-5 pt-[36px] pb-[50px] md:py-[70px] {{ $block_class }}">
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
