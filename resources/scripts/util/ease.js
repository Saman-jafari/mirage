// Smooth scrolling using jQuery easing
window.addEventListener('load', function() {
  jQuery('a.js-scroll-trigger[href*="#"]:not([href="#"])').on('click', function() {
    if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        jQuery('html, body').animate({
          scrollTop: (target.offset().top - 72),
        }, 1000, 'easeInOutExpo');
        return false;
      }
    }
  });
});
