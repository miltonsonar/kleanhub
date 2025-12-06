<section class="block relative px-5 pt-[36px] pb-[50px] md:py-[70px]">
  <div class="container mx-auto max-w-[83.125rem]">
    <article @php(post_class())>
      <header>
        <h2 class="entry-title">
          <a href="{{ get_permalink() }}">
            {!! $title !!}
          </a>
        </h2>

        @include('partials.entry-meta')
      </header>

      <div class="entry-summary">
        @php(the_excerpt())
      </div>
    </article>
  </div>
</section>
