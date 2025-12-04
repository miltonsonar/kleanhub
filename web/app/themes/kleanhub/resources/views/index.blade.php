@extends('layouts.app')

@section('content')
  @if (! have_posts())
    @include('blocks.home-banner', [
        'block_id' => '404',
        'block_class' => '404 bg-blue',
        'image' => '',
        'sub_heading' => '',
        'title' => 'Not Found',
        'content_tag' => 'p',
        'content' => 'Sorry, no results were found.',
        'cta_1' => [
                      'type' =>'link',
                      'style' => 'secondary',
                      'link' => ['title' => 'Go to Home', 'url' => get_home_url(), 'target' => '']
                    ],
        'cta_2' => ''
    ])
  @endif

  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
  @endwhile

  <section class="block post-navigation js-modal relative px-5 pt-[36px] pb-[50px] md:py-[70px]">
    <div class="container mx-auto max-w-[83.125rem]">
      {!! get_the_posts_navigation() !!}
    </div>
  </section>

@endsection
