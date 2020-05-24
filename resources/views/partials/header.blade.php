<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">

        <a class="navbar-brand js-scroll-trigger" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu([
            'walker' => new \App\Controllers\Navigations\PrimaryNavigation(),
            'theme_location' => 'primary_navigation',
            'menu_class' => 'navbar-nav ml-auto my-2 my-lg-0',
            'menu_id' => '',
            'container'       => 'div',
		    'container_class' => 'collapse navbar-collapse',
		    'container_id'    => 'navbarResponsive',
             ]) !!}
        @endif
    </div>
</nav>