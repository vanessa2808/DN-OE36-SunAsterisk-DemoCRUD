$(document).ready(function () {

    $("#add_user_form").submit(function () {
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var address = $("#address").val();
        var birthday = $("#birthday").val();
        var avatar = $("#avatar").val();
        var role_id = $("#role_id").val();
        var created = $("#created").val();
        var updated = $("#updated").val();

        $.ajax({
            type: "POST",
            url: "index.php?action=add_users.php",
            data: "name=" + name + "&email" + email + "&password=" + password + "&address" + address + "&birthday" + birthday + "&avatar" + avatar + "&role_id" + role_id + "&created" + created + "&updated" + updated,
            success: function (data) {
                alert("success");
                document.getElementById("txtHint").style.display = 'table';
            }
        });

    });
});