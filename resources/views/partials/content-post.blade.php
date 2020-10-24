<div class="card mb-3" @php post_class() @endphp>
    <article>
        <div class="card-header">
            <h5 class="entry-title card-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h5>
        </div>
        <div class="card-body">

            <div class="card-subtitle mb-2 text-muted">
                <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
                <p class="byline author vcard ">
                    {{ __('By', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn text-warning">
                        {{ get_the_author() }}
                    </a>
                </p>
            </div>
            <div class="entry-summary">
                @php the_excerpt() @endphp
            </div>
        </div>
    </article>
</div>