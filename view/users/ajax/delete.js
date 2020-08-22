function deleteAjax(id) {

    if (confirm('are You sure?')) {

        $.ajax({

            type: 'post',
            url: 'controller/userController.php',
            data: {delete_id: id},
            success: function (data) {

                $('#delete' + id).hide('slow');

            }

        });

    }


}