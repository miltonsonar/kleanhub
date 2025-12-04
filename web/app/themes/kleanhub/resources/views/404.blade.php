@extends('layouts.app')

@section('content')
  {{--  @include('partials.page-header')--}}

  @if (! have_posts())
    @include('blocks.home-banner', [
        'block_id' => '404',
        'block_class' => '404 bg-chinese-black',
        'image' => ['url' => 'https://plus.unsplash.com/premium_photo-1676810460522-bc963e5554d8?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8ZGlydHl8ZW58MHx8MHx8fDA%3D'],
        'sub_heading' => '404 Error',
        'title' => 'Page Not Found',
        'content_tag' => 'p',
        'content' => 'Sorry, but the page you are trying to view does not exist.',
        'cta_1' => [
                      'type' =>'link',
                      'style' => 'secondary',
                      'link' => ['title' => 'Go to Home', 'url' => get_home_url(), 'target' => '']
                    ],
        'cta_2' => ''
    ])
  @endif
@endsection
