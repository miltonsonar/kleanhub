{{--
  Modal Component

  Usage:
  @include('utilities.modal', [
    'id' => 'unique-modal-id',
    'content' => 'Modal content here (can include HTML)',
    'max_width' => 'max-w-2xl' (optional, defaults to max-w-2xl)
  ])

  Trigger button:
  <button data-modal-open="unique-modal-id">Open Modal</button>

  Don't forget to add class="js-modal" to the page/block to auto-initialize
--}}
<div data-modal="{{ $id }}" class="modal fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
  <div class="bg-anti-white-100 rounded-2xl rounded-bl-none shadow-xl {{ $max_width ?? 'max-w-2xl' }} w-full mx-4 min-h-[30vh] max-h-[90vh] overflow-y-auto relative">

    {{-- Close button --}}
    <button data-modal-close class="absolute top-4 right-4 !p-[10px] !bg-transparent !border-0 !text-blue hover:!text-dark-blue transition-colors z-10">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>

    {{-- Modal content --}}
    <div class="p-[24px] md:py-[32px] md:px-[40px] modal-content">
      @if($cta['modal_title'])
        @include('utilities.text', [
            'tag' => 'h2',
            'class' => 'text-blue max-w-[80%] mb-6',
            'text' => $cta['modal_title']
        ])
      @endif

      @if($cta['modal_content'])
        @include('utilities.text', [
          'tag' => 'div',
          'class' => '',
          'text' => $cta['modal_content']
      ])
      @endif

      @if($cta['modal_image'])
        <div class="image relative h-[120px] w-full rounded-lg rounded-bl-none z-0 overflow-hidden mb-6">
          @include('utilities.bg', [
              'image' => $cta['modal_image'],
              'class' => ''
          ])
        </div>
      @endif

      @if($cta['modal_form'])
        <div class="form">
          {!! do_shortcode('[gravityform id="' . $cta['modal_form'] . '" title="false" description="false" ajax="true"]') !!}
        </div>
      @endif

    </div>
  </div>
</div>
