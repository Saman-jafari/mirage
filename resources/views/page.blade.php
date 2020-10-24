@extends('layouts.app')

@section('content')
    <div id="post_page_body">
        @while(have_posts()) @php the_post() @endphp
        @include('partials.page-header')
        @include('partials.content-page')
        @endwhile
    </div>
@endsection
