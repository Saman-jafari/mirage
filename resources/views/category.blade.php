@extends('layouts.app')

@section('content')
    <div id="post_page_body">
        @include('partials.page-category-header')
        <div class="container py-5 overflow-auto">
            @if (!have_posts())
                <div class="alert alert-warning">
                    {{ __('Sorry, no results were found.', 'sage') }}
                </div>
                {!! get_search_form(false) !!}
            @endif
            @while (have_posts()) @php the_post() @endphp
            @include('partials.content-'.get_post_type())
            @endwhile
            {!! get_the_posts_navigation() !!}
        </div>
    </div>
@endsection
