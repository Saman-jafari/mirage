import $ from 'jquery';

wp.customize('blogname', (value) => {
  value.bind(to => $('.navbar-brand').text(to));
});
wp.customize('showcase_heading', (value) => {
  value.bind(to => $('.masthead h1').text(to));
});
wp.customize('showcase_text', (value) => {
  value.bind(to => $('.masthead p').text(to));
});
wp.customize('showcase_btn', (value) => {
  value.bind(to => {
    $('.second-section a').text(to);
  });
});
wp.customize('secSection_heading', (value) => {
  value.bind(to => $('.second-section h2').text(to));
});
wp.customize('secSection_text', (value) => {
  value.bind(to => $('.second-section p').text(to));
});
wp.customize('secSection_btn', (value) => {
  value.bind(to => {
    $('.second-section a').text(to);
  });
});