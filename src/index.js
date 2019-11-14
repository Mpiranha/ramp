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



    var header = jQuery(".top-nav");
    var headerScroll = "header-scrolled";

    jQuery('body').scroll(function () {
        if (jQuery(this).scrollTop() > 0) {

            header.addClass(headerScroll);

        } else {

            header.removeClass(headerScroll);
        }
    });

});