window.addEventListener('load', function() {
  jQuery('.js-scroll-trigger').click(function() {
    jQuery('.navbar-collapse').collapse('hide');
  });

  jQuery('body').scrollspy({
    target: '#mainNav',
    offset: 75,
  });

  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  jQuery(window).scroll(navbarCollapse);
});
// Collapse Navbar
const navbarCollapse = function() {
  if (jQuery('#mainNav').offset().top > 100) {
    jQuery('#mainNav').addClass('navbar-scrolled');
  } else {
    jQuery('#mainNav').removeClass('navbar-scrolled');
  }
};

jQuery('.dropdown-menu a.dropdown-toggle').on('click', function() {
    if (!jQuery(this).next().hasClass('show')) {
        jQuery(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
    }
    let subMenu = jQuery(this).next('.dropdown-menu');
    subMenu.toggleClass('show');


    jQuery(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function() {
        jQuery('.dropdown .show').removeClass('show');
    });


    return false;
});