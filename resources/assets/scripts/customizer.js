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
    $('.masthead a').text(to);
  });
});