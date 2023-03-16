var slider = document.getElementById('slider');

noUiSlider.create(slider, {
    start: [1750],
    connect: true,
    range: {
        'min': 0,
        'max': 1750
    }
});

var rangeSliderValueElement = document.getElementById('slider-range-value');
var test = document.getElementById('abc');
var a = 0;
var delay = 500;
slider.noUiSlider.on('update', function (values, handle) {
    rangeSliderValueElement.innerHTML = values.join(' - ');
    test.innerHTML = values[handle];
    /* $.ajax({
        url: '/category-render/'+values[handle],
        type: 'GET',
        data: {
            "_token": "{{ csrf_token() }}",
        }
    }).done(function (response) {
        setTimeout(function(){
        $("#productCategory").empty();
        $("#productCategory").html(response);
    }, delay);
    }); */
});
$(document).ready(function(){
    var $price1=0;
    var $price2=200;
    $("#Price1").click(function(){
        $.ajax({
            url: '/category-price-render/' + $price1+'/'+$price2,
            type: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
            }
        }).done(function (response) {
            $("#productCategory").empty();
            $("#productCategory").html(response);
        });
    })
});
$(document).ready(function(){
    var $price1=0;
    var $price2=200;
    $("#Price1").click(function(){
        $.ajax({
            url: '/category-price-render/' + $price1+'/'+$price2,
            type: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
            }
        }).done(function (response) {
            $("#productCategory").empty();
            $("#productCategory").html(response);
        });
    })
});
$(document).ready(function(){
    var $price1=200;
    var $price2=400;
    $("#Price2").click(function(){
        $.ajax({
            url: '/category-price-render/' + $price1+'/'+$price2,
            type: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
            }
        }).done(function (response) {
            $("#productCategory").empty();
            $("#productCategory").html(response);
        });
    })
});
$(document).ready(function(){
    var $price1=400;
    var $price2=1000;
    $("#Price3").click(function(){
        $.ajax({
            url: '/category-price-render/' + $price1+'/'+$price2,
            type: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
            }
        }).done(function (response) {
            $("#productCategory").empty();
            $("#productCategory").html(response);
        });
    })
});
$(document).ready(function(){
    var $price1=1000;
    var $price2=1500;
    $("#Price4").click(function(){
        $.ajax({
            url: '/category-price-render/' + $price1+'/'+$price2,
            type: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
            }
        }).done(function (response) {
            $("#productCategory").empty();
            $("#productCategory").html(response);
        });
    })
});
$(document).ready(function(){
    var $price1=1500;
    var $price2=2000;
    $("#Price4").click(function(){
        $.ajax({
            url: '/category-price-render/' + $price1+'/'+$price2,
            type: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
            }
        }).done(function (response) {
            $("#productCategory").empty();
            $("#productCategory").html(response);
        });
    })
});
$(document).ready(function () {
    var priceValue = $("#abc");
    $("#priceSubmit").click(function () {
        $.ajax({
            url: '/category-render/' + priceValue.text(),
            type: 'GET',
            data: {
                "_token": "{{ csrf_token() }}",
            }
        }).done(function (response) {
            $("#productCategory").empty();
            $("#productCategory").html(response);
        });
    });
});

$(document).ready(function () {
    var priceValue = $("#abc");
    var categorySort = $("#sortCategory");
    $("#sortCategory").change(function () {
        var url = $(this).val(); // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
    });
});

window.onscroll = function () {
    myFunction()
};

var navbar = document.getElementById("navBar");
var sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}
