$(function () {
    const btnNavClose = $('#btn-close-nav');
    const btnNavOpen = $('#btn-open-nav');
    const navCollapse = $('.navbar-collapsed');
    const navOpen = $('.nav-open');
    const sideBarWrap = $('.sidebar-wrap, .sidebar-wrap-fix');
    const btnSmNavOpen = $('.navbar-sm-toggler');
    const closeSmBtn = $('.close-btn');

    btnNavClose.on('click', function () {
        btnNavOpen.toggleClass('show');
        navCollapse.toggleClass('show-flex');
        navOpen.toggleClass('show-flex');
        sideBarWrap.toggleClass('collapsed');

    });

    btnNavOpen.on('click', function () {
        $(this).toggleClass('show');
        navOpen.toggleClass('show-flex');
        navCollapse.toggleClass('show-flex');
        sideBarWrap.toggleClass('collapsed');
    });

    btnSmNavOpen.on('click', function () {
        sideBarWrap.toggleClass('show-flex');
        sideBarWrap.css('z-index', '999');
    });

    closeSmBtn.on('click', function () {
        sideBarWrap.toggleClass('show-flex');
    });


    const closeNav = () => {


    };

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });



    // $(window).on('scroll', function () {
    //     var margin = $('.flex-grow-1 .container').height() - $('.top-nav').height();
    //     if ($('body').scrollTop() >= margin) {
    //         $(".top-nav").css({
    //             'background-color': '#ffffff',
    //             'box-shadow': '-1px 0px 9px -2px #808080e5'
    //         });
    //     } else {
    //         $(".top-nav").css('background-color', 'transparent');
    //     }

    //     console.log(margin);
    // });

});