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
<!-- Masthead -->
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase text-white font-weight-bold">{{ get_theme_mod('showcase_heading', 'YOUR FAVORITE SOURCE OF FREE BOOTSTRAP THEMES')  }}</h1>
                <hr class="divider my-4">
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 font-weight-light mb-5">{{ get_theme_mod('showcase_text', 'Start Bootstrap can help you build better websites using the Bootstrap framework! Just download a theme and start customizing, no strings attached!') }}</p>
                <a class="btn btn-primary btn-xl js-scroll-trigger"
                   href="{{ get_theme_mod('showcase_btn_href', '#about') }}">{{ get_theme_mod('showcase_btn', 'Find Out More') }}</a>
            </div>
        </div>
    </div>
</header>