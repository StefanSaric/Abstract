var id;
var confirmQuestion = $('#confirmQuestion').val();

$(".editUser").click(function () {
    id = $(this).parent().parent().attr('id');
    $("input[name^=_method]").val("GET");
    $("#userForm").attr("action", window.location +  "/" + id + "/edit");
    $("#userButton").click();
});

$(".deleteUser").click(function () {
    var r = confirm(confirmQuestion);
    if (r == true) {
        id = $(this).parent().parent().attr('id');
        $("input[name^=_method]").val("DELETE");
        $("#userForm").attr("action", window.location + "/delete/" + id);
        $("#userButton").click();
    }
});


