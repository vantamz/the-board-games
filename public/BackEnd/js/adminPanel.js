$('#userChoose').css('width', '100%');
$(document).ready(function() {
    $('#userChoose').select2({dropdownParent: $('#todoModal')});
});





function RenderListCart(response){
    $("#todoList").empty();
    $("#todoList").html(response);
}
