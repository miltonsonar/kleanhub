@if($image)
  <img class="{{ ($class)?? '' }}" src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" width="{{ $image['width'] }}" height="{{ $image['height'] }}">
@endif
