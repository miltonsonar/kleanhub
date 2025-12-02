<div class="heading {{ $class }}">
  @if($sub_heading)
    @include('utilities.text', ['tag' => ($sub_heading_tag)?? 'h6', 'class' => "text-blue $sub_heading_class", 'text' => $sub_heading])
  @endif
  @if($title)
      @include('utilities.text', ['tag' => ($title_tag)?? 'h2', 'class' => " $title_class", 'text' => $title])
  @endif
  @if($content)
      @include('utilities.text', ['tag' => ($content_tag)?? 'div', 'class' => " $content_class", 'text' => $content])
  @endif
</div>
