$(document).on("click", ".addtofav", function (e) {
    e.preventDefault();
    let that = $(this);
    $.ajax({
        url: "/add-favorite/" + $(this).attr("data-target"),
        type: "GET",
        success: function (data) {
            that.addClass("active");
            that.removeClass("addtofav");
            that.addClass("removefav");
        },
        error: function (e) {
            if (e.status == 401) {
                window.location.href = "/login";
            }
        },
    });
});

$(document).on("click", ".removefav", function (e) {
    e.preventDefault();
    let that = $(this);
    $.ajax({
        url: "/remove-favorite/" + $(this).attr("data-target"),
        type: "GET",
        success: function (data) {
            that.removeClass("active");
            that.removeClass("removefav");
            that.addClass("addtofav");
        },
        error: function (e) {
            if (e.status == 401) {
                window.location.href = "/login";
            }
        },
    });
});
