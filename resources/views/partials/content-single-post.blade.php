<article @php post_class() @endphp>
    <header class="bg-light" style="background-size: cover; background: url('{{get_the_post_thumbnail_url()}}') center;">
        <div class="layer px-5 pt-5">
            <div class="container-fluid mt-5 pb-3 text-white">
                <h1 class="entry-title">{!! get_the_title() !!}</h1>
                @include('partials/entry-meta')
            </div>
        </div>
    </header>
    <div class="entry-content container py-5">
        <div class="clear-fix overflow-auto">
            @php the_content() @endphp
        </div>
        <div id="wp_link" class="text-center">
            {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
        </div>
    </div>
    @php comments_template('/partials/comments.blade.php') @endphp
</article>
