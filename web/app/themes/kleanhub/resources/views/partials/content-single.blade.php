<section class="block relative px-5 pt-[36px] pb-[50px] md:py-[70px]">
  <div class="container mx-auto max-w-[83.125rem]">
    <article @php(post_class('h-entry'))>
      <header>
        <h1 class="p-name">
          {!! $title !!}
        </h1>

        @include('partials.entry-meta')
      </header>

      <div class="e-content">
        @php(the_content())
      </div>

      @if ($pagination())
        <footer>
          <nav class="page-nav" aria-label="Page">
            {!! $pagination !!}
          </nav>
        </footer>
      @endif

      @php(comments_template())
    </article>

  </div>
</section>

