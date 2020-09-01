var currentSelectedUserId = undefined;
var xhttp = new XMLHttpRequest();

function editAjax(id) {
    var data = $("#edit").serialize();
    $.ajax({
        type: 'post',
        url: 'index.php?action=edit_users&id=' + currentSelectedUserId,
        data: {
            id: $('#id_modal').val(),
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            address: $('#address').val(),
            birthday: $('#birthday').val(),
            avatar: $('#avatar').val(),

        },
        success: (data) => {
            console.log("edit user id" + currentSelectedUserId)
            $("#editEmployeeModal").modal('hide');
            $('#edit' + id).hide('slow');
            currentSelectedUserId = undefined;
        },
        error: (err) => {
            console.log(err)
        }
    });
};
function showEditModal(id) {
    $("#editEmployeeModal").modal();
    getUserInfoEditAjax(id)
}

function getUserInfoEditAjax(id) {
    currentSelectedUserId = id;
    $.ajax({
        success: (data) => {
            var styleWidth = document.getElementById('editEmployeeModal').innerHTML = "<div class=\"modal-content\">\n" +
                "                    <form action=\"index.php?action=edit_users&id=<?php echo $id ?>\" method=\"post\" enctype=\"multipart/form-data\">\n" +
                "                        <div class=\"modal-header\">\n" +
                "                            <h4 class=\"modal-title\">Edit User</h4>\n" +
                "                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\n" +
                "                        </div>\n" +
                "                        <div class=\"modal-body\">\n" +
                "                            <div class=\"form-group\">\n" +
                "                                <label>Name</label>\n" +
                "                                <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" \"\n" +
                "                                       required>\n" +
                "                            </div>\n" +
                "                            <div class=\"form-group\">\n" +
                "                                <label>Email</label>\n" +
                "                                <input type=\"email\" name=\"email\" id=\"email\" class=\"form-control\" required>\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"form-group\">\n" +
                "                                <label>Password</label>\n" +
                "                                <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\" required>\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"form-group\">\n" +
                "                                <label>Address</label>\n" +
                "                                <textarea class=\"form-control\" name=\"address\" id=\"address\" required></textarea>\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"form-group\">\n" +
                "                                <label>Birthday</label>\n" +
                "                                <input type=\"date\" name=\"birthday\" id=\"birthday\" class=\"form-control\" required>\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"form-group\">\n" +
                "                                <label>avatar</label>\n" +
                "                                <input type=\"file\" name=\"avatar\" id=\"avatar\" class=\"form-control\" required>\n" +
                "                            </div>\n" +
                "                            <div class=\"modal-footer\">\n" +
                "                                <input type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" value=\"Cancel\">\n" +
                "                                <input onclick=\"editAjax()\" type=\"submit\" name=\"edit_users_form\" id=\"edit\" class=\"btn btn-info\" value=\"Save\">\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                    </form>\n" +
                "\n" +
                "\n" +
                "                </div>"
            if (data == "YES") {
                currentSelectedUserId.fadeOut().remove();
            } else {
                return;
            }
        }
    });
}

