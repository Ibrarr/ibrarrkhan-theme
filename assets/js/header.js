jQuery(document).ready(function ($) {
    const hamburgerMenu = $(".hamburger-menu");
    hamburgerMenu.on("click", function (e) {
        e.stopPropagation();
        hamburgerMenu.toggleClass("active");
        $("header#header nav").slideToggle(300);
        $(".overlay").fadeToggle(300);

        if (hamburgerMenu.hasClass("active")) {
            $("body").css("overflow", "hidden");
        } else {
            $("body").css("overflow", "auto");
        }
    });

    $(document).on("click", function (e) {
        if ($(window).width() < 768 && !$(e.target).closest("header#header").length) {
            closeMenu();
        }
    });

    $("header#header").on("click", function (e) {
        e.stopPropagation();
    });

    $("header#header a").on("click", function () {
        if ($(window).width() < 768) {
            closeMenu();
            $("body").css("overflow", "auto");
        }
    });

    function closeMenu() {
        hamburgerMenu.removeClass("active");
        $("header#header nav").slideUp(300);
        $(".overlay").fadeOut(300);
    }

    function scrollFunction() {
        const header = $('header');
        if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
            header.addClass('header-scrolling');
        } else {
            header.removeClass('header-scrolling');
        }
    }

    window.onscroll = function() {
        scrollFunction()
    };

    $(".menu-item a, #site-logo a, .anchor-button").on("click", function (e) {
        const href = $(this).attr('href');
        if (href.startsWith('#')) {
            const target = $(href);
            if (target.length) {
                e.preventDefault();
                target[0].scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    });

    $(document).on('workContentLoaded', function() {
        console.log('workContentLoaded event was triggered');
    });

});