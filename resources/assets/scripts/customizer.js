import $ from 'jquery';

const cleanValidateClassInputs = (classNames, to) => {
    let classListIcons = $(classNames)[0].className.split(' ');
    let validateInput = to.split(' ').filter(e => e.includes('fa'));
    classListIcons = classListIcons.filter(e => !e.includes('fa'));
    classListIcons = [...classListIcons, ...validateInput];
    classListIcons = classListIcons.join(' ');
    $(classNames)[0].className = classListIcons;
};
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
wp.customize('thirdSection_heading', (value) => {
    value.bind(to => $('.third-section h2').text(to));
});
wp.customize('thirdSection_first_icon', (value) => {
    value.bind(to => {
        cleanValidateClassInputs('.third-section .first-col i', to);
    });
});
wp.customize('thirdSection_first_heading', (value) => {
    value.bind(to => $('.third-section .first-col h3').text(to));
});
wp.customize('thirdSection_first_text', (value) => {
    value.bind(to => $('.third-section .first-col p').text(to));
});
wp.customize('thirdSection_second_icon', (value) => {
    value.bind(to => {
        cleanValidateClassInputs('.third-section .second-col i', to);
    });
});
wp.customize('thirdSection_second_heading', (value) => {
    value.bind(to => $('.third-section .second-col h3').text(to));
});
wp.customize('thirdSection_second_text', (value) => {
    value.bind(to => $('.third-section .second-col p').text(to));
});
wp.customize('thirdSection_third_icon', (value) => {
    value.bind(to => {
        cleanValidateClassInputs('.third-section .third-col i', to);
    });
});
wp.customize('thirdSection_third_heading', (value) => {
    value.bind(to => $('.third-section .third-col h3').text(to));
});
wp.customize('thirdSection_third_text', (value) => {
    value.bind(to => $('.third-section .third-col p').text(to));
});
wp.customize('thirdSection_fourth_icon', (value) => {
    value.bind(to => {
        cleanValidateClassInputs('.third-section .fourth-col i', to);
    });
});
wp.customize('thirdSection_fourth_heading', (value) => {
    value.bind(to => $('.third-section .fourth-col h3').text(to));
});
wp.customize('thirdSection_fourth_text', (value) => {
    value.bind(to => $('.third-section .fourth-col p').text(to));
});
wp.customize('fifthSection_heading', (value) => {
    value.bind(to => $('.fifth-section h2').text(to));
});
wp.customize('fifthSection_text', (value) => {
    value.bind(to => $('.fifth-section p').text(to));
});
wp.customize('fifthSection_btn', (value) => {
    value.bind(to => {
        $('.fifth-section a').text(to);
    });
});

wp.customize('sixthSection_heading', (value) => {
    value.bind(to => $('.sixth-section h2').text(to));
});
wp.customize('sixthSection_text', (value) => {
    value.bind(to => $('.sixth-section .header-section p').text(to));
});
wp.customize('sixthSection_first_icon_text', (value) => {
    value.bind(to => $('.sixth-section .first-col div').text(to));
});
wp.customize('sixthSection_first_icon', (value) => {
    value.bind(
        to => {
            cleanValidateClassInputs('.sixth-section .first-col i', to);
        });
});
wp.customize('sixthSection_second_icon_text', (value) => {
    value.bind(to => $('.sixth-section .second-col a').text(to));
});
wp.customize('sixthSection_second_icon', (value) => {
    value.bind(to => {
        cleanValidateClassInputs('.sixth-section .second-col i', to);
    });
});
// wp.customize('sixthSection_btn', (value) => {
//     value.bind(to => {
//         $('.sixth-section a').text(to);
//     });
// });