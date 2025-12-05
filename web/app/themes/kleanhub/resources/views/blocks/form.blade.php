{{--
  Title: Form
  Description: Contact form with optional heading, image and Gravity Forms integration
  Category: blocks
  Mode: edit
  SupportsMode: false
  Preview: form
  Icon: feedback
--}}
<section id="{{ $block_id }}" class="block form js-modal relative px-5 pt-[36px] pb-[50px] md:py-[70px] {{ $block_class }}">
  <div class="container mx-auto max-w-[83.125rem]">

    <div class="grid grid-cols-1 lg:grid-cols-2 rounded-2xl rounded-bl-0 bg-anti-white-100 p-6 md:p-20">
      <div class="h-full">
        @include('utilities.heading', [
          'class' => 'md:max-w-[85%] mb-10',
          'sub_heading' => $sub_heading,
          'sub_heading_class' => 'mb-2 leading-none',
          'title' => $title,
          'title_class' => 'text-blue md:max-w-[85%]',
          'content' => $content,
          'content_class' => '']
        )

        @if($image)
          <div class="image w-full md:max-w-[85%] h-[235px] overflow-hidden rounded-lg rounded-bl-none relative bg-chinese-black">
            @include('utilities.bg', ['class' => '', 'image' => $image])
          </div>
        @endif

      </div>
      <div class="h-full mt-6 lg:mt-0">
        @if($form)
          <div class="form">
            {!! do_shortcode('[gravityform id="' . $form . '" title="false" description="false" ajax="true"]') !!}
          </div>
        @endif
      </div>
    </div>
  </div>
</section>
