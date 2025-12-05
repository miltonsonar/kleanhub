{{--
  Title: Contact
  Description: Contact section with heading and form integration
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: contact
  Icon: email
--}}
<section id="{{ $block_id }}" class="block contact js-modal relative px-5 pt-[36px] pb-[50px] md:py-[70px] {{ $block_class }}">
  <div class="container mx-auto max-w-[83.125rem]">
    <div class="grid grid-cols-1 md:grid-cols-2">
      <div class="h-full">
        @include('utilities.heading', [
            'class' => 'md:max-w-[90%] mb-6',
            'sub_heading' => $sub_heading,
            'sub_heading_class' => 'mb-2 leading-none',
            'title' => $title,
            'title_class' => 'text-blue',
            'content' => $content,
            'content_class' => '']
        )

        @if($form)
          <div class="form md:max-w-[90%]">
            {!! do_shortcode('[gravityform id="' . $form . '" title="false" description="false" ajax="true"]') !!}
          </div>
        @endif

      </div>
      <div class="h-full mt-6 md:mt-0 md:flex md:justify-end">
        @if($image)
          <div class="image w-full md:max-w-[558px] h-[425px] md:h-[603px] overflow-hidden rounded-lg rounded-bl-none relative bg-chinese-black">
            @include('utilities.bg', ['class' => '', 'image' => $image])
          </div>
        @endif
      </div>
    </div>
  </div>
</section>
