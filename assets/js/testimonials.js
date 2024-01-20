import Splide from '@splidejs/splide';

jQuery(document).ready(function ($) {
    const splide = new Splide('#testimonials-slider', {
        type: 'loop',
        focus: 'center',
        isNavigation: true,
        updateOnMove: true,
        perPage: 3,
        perMove: 1,
        breakpoints: {
            991: {
                perPage: 2,
            },
            767: {
                perPage: 1,
            },
        },
    });

    splide.mount();
});