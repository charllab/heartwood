jQuery(function () {

    $(".owl-carousel").each(function () {
        let $carousel = $(this);
        $carousel.owlCarousel({
            loop: true,
            margin: 0,
            autoplaySpeed: 1500,
            autoplayTimeout: 9000,
            items: 1,
            nav: true,
            dots: true,
            navText: '',
            navContainer: $carousel.next(".owl-navigation").find(".owl-nav"),
            dotsContainer: $carousel.next(".owl-navigation").find(".owl-dots"),
        });
    });


    $(".post-carousel").each(function () {
        let $carousel = $(this);
        $carousel.owlCarousel({
            loop: true,
            margin: 16,
            autoplaySpeed: 1500,
            autoplayTimeout: 9000,
            nav: true,
            dots: true,
            navText: '',
            navContainer: $carousel.next(".owl-navigation").find(".owl-nav"),
            dotsContainer: $carousel.next(".owl-navigation").find(".owl-dots"),
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });

    $('.owl-carousel .owl-nav, .owl-carousel .owl-dots').wrapAll('<div class="owl-navigation"></div>');

    // Scrolling anchors
    jQuery('.scrollable-anchor').on('click', function (e) {
        e.preventDefault();

        jQuery('html,body').animate({
            scrollTop: jQuery(this.hash).offset().top
        }, 1000);
    });
});

var trackEvent = function (name, options) {
    trackGA(name, options);
    trackPixel(name, options);
};

var trackGA = function (name, options) {
    if (typeof gtag !== 'undefined') {
        gtag('event', name, {
            'event_category': options.category,
            'event_label': options.label,
            'value': options.value || 0
        });
    }
};

var trackPixel = function (name, options) {
    if (typeof gtag !== 'undefined') {
        fbq('track', 'Lead', {
            'event_category': options.category,
            'event_action': name,
            'value': options.value || 0,
            'currency': 'CAD'
        });
    }
};

var targetBlankExternalLinks = function () {
    var internalLinkRegex = new RegExp('^((((http:\\/\\/|https:\\/\\/)(www\\.)?)?'
        + window.location.hostname
        + ')|(localhost:\\d{4})|(\\/.*))(\\/.*)?$', '');

    jQuery('a').filter(function () {
        var href = jQuery(this).attr('href');
        return !internalLinkRegex.test(href);
    })
        .each(function () {
            jQuery(this).attr('target', '_blank');
        });
};