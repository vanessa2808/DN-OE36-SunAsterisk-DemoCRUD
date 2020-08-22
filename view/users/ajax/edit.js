$(document).on('click', '#update', function (e) {
    var data = $("#edit_users_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "index.php?action=edit_users/id",
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#editEmployeeModal').modal('hide');
                alert('Data updated successfully !');
                location.reload();
            } else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});