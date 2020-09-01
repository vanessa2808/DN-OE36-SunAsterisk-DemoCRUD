var currentSelectedUserId = undefined;
var xhttp = new XMLHttpRequest();

function deleteAjax(id) {
    $.ajax({
        type: 'post',
        url: 'index.php?action=delete_users&id=' + currentSelectedUserId,
        success: (data) => {
            console.log("deleted user id" + currentSelectedUserId)
            $("#deleteEmployeeModal").modal('hide');
            $('#delete' + id).hide('slow');
            currentSelectedUserId = undefined;
        },
        error: (err) => {
            console.log(err)
        }
    });
};

function showDeleteModal(id) {
    $("#deleteEmployeeModal").modal();
    getUserInfoToDeleteAjax(id)
}

function getUserInfoToDeleteAjax(id) {
    currentSelectedUserId = id;
    $.ajax({
        success: (data) => {
            var styleWidth = document.getElementById('deleteEmployeeModal').innerHTML =
                "                <div class=\"modal-content\"><div class=\"modal-content\">\n" +
                "                    <form >\n" +
                "                        <div class=\"modal-header\">\n" +
                "                            <h4 class=\"modal-title\">Delete Users</h4>\n" +
                "                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\n" +
                "                        </div>\n" +
                "                        <div class=\"modal-body\">\n" +
                "                            <input type=\"hidden\" id=\"id_d\" name=\"id\" class=\"form-control\">\n" +
                "                            <p>Are you sure you want to delete these Records?</p>\n" +
                "                            <p class=\"text-warning\"><small>This action cannot be undone.</small></p>\n" +
                "                        </div>\n" +
                "                        <div class=\"modal-footer\">\n" +
                "                            <input type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" value=\"Cancel\">\n" +
                "                            <input onclick=\"deleteAjax()\"\n" +
                "                                   class=\"btn btn-danger\" id=\"delete\" value=\"Delete\">\n" +
                "                        </div>\n" +
                "                    </form>\n" +
                "                </div>"
            "</div>"
            if (data == "YES") {
                currentSelectedUserId.fadeOut().remove();
            } else {
                return;
            }
        }
    });
}

