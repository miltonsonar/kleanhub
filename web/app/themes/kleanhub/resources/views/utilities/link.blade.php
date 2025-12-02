@if($link)
  <a class="{{ ($class)?? '' }}" href="{{ $link['url'] }}" target="{{ $link['target'] }}">{{ $link['title'] }}</a>
@endif
