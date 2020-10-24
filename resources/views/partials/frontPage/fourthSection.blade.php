@php
    $posts = (new App\Controllers\PostsGallery())->getAllPosts()
@endphp
<section id="fourthSection">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            @while ( $posts->have_posts() )
                @php($posts->the_post())
                @if(has_post_thumbnail())
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{get_permalink()}}">
                        <img class="img-fluid" src="{{the_post_thumbnail_url()}}" alt="">
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">
                                {{get_the_category($posts->ID)[0]->name}}
                            </div>
                            <div class="project-name">
                                {{the_title()}}
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            @endwhile
        </div>
    </div>
</section>