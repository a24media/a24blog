jQuery(document).ready(function($) {

    $('.widget_features_posts').owlCarousel({
        items: 1,
        loop: true,
        lazyLoad: true,
        margin: 0,
        smartSpeed: 800,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 10000,
        autoplayHoverPause: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    });


    /**
     * Popurlar/Comments/tags Tabs
    */
    if ( jQuery.isFunction(jQuery.fn.tabs) ) {
        jQuery( ".xmag-tabs-wdt" ).tabs();
    }
    
});