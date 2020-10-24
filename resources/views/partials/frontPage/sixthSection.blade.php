<section class="page-section sixth-section" id="sixthSection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center header-section">
                <h2 class="mt-0">{{ get_theme_mod('sixthSection_heading', 'Let\'s Get In Touch!')}}</h2>
                <hr class="divider my-4">
                <p class="text-muted mb-5">{{ get_theme_mod('sixthSection_text', 'Ready to start your next project with us? Give us a call or send us an
                email and we will get back to you as soon
                    as possible!')}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0 first-col">
                <i class="{{ get_theme_mod('sixthSection_first_icon', 'fas fa-phone fa-3x')}} mb-3 text-muted"></i>
                <div>{{ get_theme_mod('sixthSection_first_icon_text', '+1 (202) 555-0149')}}</div>
            </div>
            <div class="col-lg-4 mr-auto text-center second-col">
                <i class="{{ get_theme_mod('sixthSection_second_icon', 'fas fa-envelope fa-3x')}} mb-3 text-muted"></i>
                <!-- Make sure to change the email address in anchor text AND the link below! -->
                <a class="d-block"
                   href="{{ get_theme_mod('sixthSection_btn_href', 'mailto:contact@yourwebsite.com')}}">
                    {{ get_theme_mod('sixthSection_second_icon_text', 'contact@yourwebsite.com')
                }}</a>
            </div>
        </div>
    </div>
</section>