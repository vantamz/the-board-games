/*<!--slide Banner-->*/

//slide
$('.owl-banner').owlCarousel({
    loop: true,
    autoplay: true,
    navSpeed: 1750,
    dots: false,
    margin: 10,
    center: true,
    center: true,
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


/* <!--slide Banner-->
<!--slide Exclusive--> */

//slide
$('.owl-exclusive').owlCarousel({
    loop: true,
    autoplay: false,
    navSpeed: 1750,
    dots: false,
    margin: 10,
    autoplayTimeout: 6500,
    center: true,
    center: true,
    navText: ["<img src={{ asset('FrontEnd/img/prev.png') }}>",
        "<img src={{ asset('FrontEnd.img.next.png') }}>"
    ],
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
var owl = $('.owl-exclusive');
owl.owlCarousel();
// Go to the next item
$('.btn-right-exclusive').click(function () {
    owl.trigger('next.owl.carousel', [1750]);
})
// Go to the previous item
$('.btn-left-exclusive').click(function () {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [1750]);
})


/* <!--slide Exclusive--> */


//slide
$('.owl-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    navSpeed: 1750,
    dots: false,
    nav: false,
    margin: 10,
    center: true,
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

//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


/* <!--Count Down Watch Start--> */

// Set the date we're counting down to
var countDownDate = new Date("December 14, 2021 00:00:00").getTime();

var nowLater = new Date().getTime();
// Update the count down every 1 second
var x = setInterval(function () {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    /*  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
     + minutes + "m " + seconds + "s "; */
    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;

    // If the count down is over, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("notice").innerHTML = "EXPIRED";
    }
}, 1000);


/* <!--Count Down Watch End--> */
