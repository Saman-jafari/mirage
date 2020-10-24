<div class="container py-5">
    <div class="clear-fix overflow-auto">
        @php the_content() @endphp
    </div>
    <div id="wp_link" class="text-center">
        {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
    </div>
    @if (comments_open())
        @php comments_template('/partials/comments.blade.php') @endphp
    @endif
</div>
