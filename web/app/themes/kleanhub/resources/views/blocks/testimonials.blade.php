{{--
  Title: Testimonials
  Description: Display customer testimonials with quotes and author information
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: testimonials
  Icon: testimonial
--}}
<section id="{{ $block_id }}" class="block testimonials js-modal relative px-5 pt-[36px] pb-[50px] md:py-[70px] {{ $block_class }}">
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
