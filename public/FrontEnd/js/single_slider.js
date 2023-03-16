//slide
$('.owl-product-more').owlCarousel({
    loop: true,
    autoplay: true,
    navSpeed: 1750,
    dots: false,
    loop:false,
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
            items: 4
        }
    }
})
var owl = $('.owl-product-more');
owl.owlCarousel();
// Go to the next item
$('.btn-right-related').click(function () {
    owl.trigger('next.owl.carousel', [1750]);
})
// Go to the previous item
$('.btn-left-related').click(function () {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [1750]);
})

$('.owl-single').owlCarousel({
    loop: true,
    autoplay: true,
    navSpeed: 1750,
    dots: false,
    center: true,
    margin: 10,
    lazyLoad: true,
    autoplaySpeed: 1750,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
})


$(document).ready(function () {
    var comment_value = $("#message");
    var $rateYo = $("#rateYo").rateYo();

    $("#addComment").click(function () {
        var rating = $rateYo.rateYo("rating");
        var id = $(this).attr("data-id");
        $.ajax({
            url: '/comment-store/' + id,
            type: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
                comment: comment_value.val(),
                rating: rating,
            }
        }).done(function (response) {
            $("#review_list").empty();
            $("#review_list").html(response);
            RatingBlank();
            RenderComment(response);
            $("#message").val('');
        });
    });
});
function RatingBlank() {

    $("#rateYo").rateYo({
      rating: 3.6
    });

  };
  $(function () {

    $("#rateYo").rateYo({
      rating: 3.6
    });

  });
function RenderComment(response) {
    $("#review_list").empty();
    $("#review_list").html(response);
}

//start
$(function () {
    var $rateYo = $("#rateYo").rateYo();
    $("#rateYo").click(function () {

        /* get rating */
        var rating = $rateYo.rateYo("rating");
        $("#result").text("Rating "+rating);
    });
});



