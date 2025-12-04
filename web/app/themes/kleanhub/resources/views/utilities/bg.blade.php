@if($image)
  <div class="bg-image absolute top-0 left-0 w-full h-full bg-cover bg-center bg-no-repeat z-0 bg-chinese-black {{ ($class)?? '' }}" style="background-image:url('{{ $image['url'] }}')"></div>
@endif
