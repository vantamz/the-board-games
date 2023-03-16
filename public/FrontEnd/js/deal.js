//Deal
$('.owl-product-deal').owlCarousel({
    loop: true,
    autoplay: false,
    navSpeed: 1750,
    dots: false,
    margin: 10,
    center: false,
    autoplaySpeed: 1750,
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
})
var owl_1 = $('.owl-product-deal');
owl_1.owlCarousel();
// Go to the next item
$('.btn-right-deal').click(function () {
    owl_1.trigger('next.owl.carousel', [1750]);
})
// Go to the previous item
$('.btn-left-deal').click(function () {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl_1.trigger('prev.owl.carousel', [1750]);
})
