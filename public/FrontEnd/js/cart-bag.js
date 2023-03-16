function AddCart(id) {
    $.ajax({
        url: 'add-to-cart/' + id,
        type: 'GET',
    }).done(function (response) {
        RenderCart(response)
        alertify.success('Add product successful');
    });
}

$("#change-item-cart").on("click", ".cart-close button", function () {
    var id = $(this).attr("data-id");
    $.ajax({
        url: 'remove-item-cart/' + id,
        type: 'GET',
    }).done(function (response) {
        RenderCart(response);
        alertify.success('Product removed successful');
    });
});

function RenderCart(response) {
    $("#change-item-cart").empty();
    $("#change-item-cart").html(response);
    $("#quanty-show").text($("#quanty-cart").val());
}
