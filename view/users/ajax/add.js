var currentSelectedUserId = undefined;

function addAjax()
{
    $('#add_user_form').on('click', function () {
        $('#add_user_form').attr("disable", "disable");
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var address = $('#address').val();
        var birthday = $('#birthday').val();
        var avatar = $('#avatar').val();
        if (name != "" && email != "" && password != "" && address != "" && birthday != "" && avatar != "") {
            $.ajax({
                url: "index.php?action=add_users",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    password: password,
                    address: address,
                    birthday: birthday,
                    avatar: avatar
                },
                cache: false,
                success: function (dataResult) {
                    console.log("add user id" + currentSelectedUserId)
                    $("#addEmployeeModal").modal('hide');
                    $('#add' + id).hide('slow');
                    currentSelectedUserId = undefined;
                    if (dataResult.statusCode == 200) {
                        $('#addEmployeeModal').modal('hide');
                        alert('Data updated successfully !');
                        location.reload();
                    } else if (dataResult.statusCode == 201) {
                        alert(dataResult);
                    }

                }
            });
        }

    })
}
function showAddModal() {
    $("#addEmployeeModal").modal();
    getUserInfoAddAjax()
}

function getUserInfoAddAjax() {
    $.ajax({
        success: (data) => {
            var styleWidth = document.getElementById('addEmployeeModal').innerHTML = " <div class=\"modal-content\">\n" +
                "                    <div class=\"alert alert-success alert-dismissible\" id=\"success\" style=\"display:none;\">\n" +
                "                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>\n" +
                "                    </div>\n" +
                "                    <form id=\"formId\" action=\"index.php?action=add_users\" method=\"post\" enctype=\"multipart/form-data\">\n" +
                "                        <div class=\"modal-header\">\n" +
                "                            <h4 class=\"modal-title\">Add User</h4>\n" +
                "                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\n" +
                "                        </div>\n" +
                "                        <div class=\"modal-body\">\n" +
                "                            <div class=\"form-group\">\n" +
                "                                <label>Name</label><span class=\"text-danger\">*</span></label>\n" +
                "                                <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" required><span id=\"namemessage\"></span>\n" +
                "\n" +
                "                            </div>\n" +
                "                            <div class=\"form-group\">\n" +
                "                                <label>Email</label><span class=\"text-danger\">*</span></label>\n" +
                "\n" +
                "                                <input type=\"email\" name=\"email\" id=\"email\" class=\"form-control\" required><span id=\"emailmessage\"></span>\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"form-group\">\n" +
                "                                <label>Password</label><span class=\"text-danger\">*</span></label>\n" +
                "\n" +
                "                                <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\" required><span\n" +
                "                                        id=\"passwordmessage\"></span>\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"form-group\">\n" +
                "                                <label>Address</label><span class=\"text-danger\">*</span></label>\n" +
                "\n" +
                "                                <textarea class=\"form-control\" name=\"address\" id=\"address\" required></textarea><span\n" +
                "                                        id=\"addressmessage\"></span>\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"form-group\">\n" +
                "                                <label>Birthday</label><span class=\"text-danger\">*</span></label>\n" +
                "\n" +
                "                                <input type=\"date\" name=\"birthday\" id=\"birthday\" class=\"form-control\" required><span\n" +
                "                                        id=\"birthdaymessage\"></span>\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"form-group\">\n" +
                "                                <label>avatar</label><span class=\"text-danger\">*</span></label>\n" +
                "\n" +
                "                                <input type=\"file\" name=\"avatar\" id=\"avatar\" class=\"form-control\" required><span id=\"avatarmessage\"></span>\n" +
                "                            </div>\n" +
                "                            <div class=\"modal-footer\">\n" +
                "                                <input type=\"hidden\" value=\"1\" name=\"type\">\n" +
                "\n" +
                "                                <input type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" value=\"Cancel\">\n" +
                "\n" +
                "                                <input onclick=\"addAjax()\" type=\"submit\" class=\"btn btn-success\" id=\"add\" name=\"add_user_form\" value=\"Add\">\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "\n" +
                "                    </form>\n" +
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