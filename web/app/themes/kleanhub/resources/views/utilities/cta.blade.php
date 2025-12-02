@if($cta)
  @if($cta['type'] == 'link')
    @include('utilities.link', [
        'link' => $cta['link'],
        'class' => ($cta['style'])? (($class)?? '').' btn-'.$cta['style']: ''
    ])
  @else
    @include('utilities.button', [
        'id' => $id,
        'class' => ($cta['style'])? (($class)?? '').' btn-'.$cta['style']: '',
        'button' => $cta['label']
    ])
    @include('utilities.modal', [
      'id' => $id,
      'cta' => $cta
    ])
  @endif
@endif
