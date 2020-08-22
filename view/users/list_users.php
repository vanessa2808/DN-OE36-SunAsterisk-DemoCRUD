<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRUD TABLE WITH PHP AND AJAX</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="cssjs/css/index.css">
    <link rel="stylesheet" type="text/css" href="cssjs/css/loader.css">
    <link rel="stylesheet" type="text/css" href="cssjs/css/scroll.css">
    <script>
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 500);
        }

        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
        }
    </script>
</head>
<body onload="myFunction()" style="margin:0;">

<header>
    <div class="container">
        <h2 class="text-center">CRUD USER USING PHP AJAX</h2>

        <div id="loader"></div>
        <div style="display:block; opacity: 1" id="myDiv" class="animate-bottom">


            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Manage <b>Users</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                                class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                                                class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                                    <a href="index.php?action=logout" class="btn btn-warning">Logout</></a>
                                </div>
                            </div>
                        </div>
                        <form action="">

                            <p>Search: <input name="users" type="text" id="users" onkeyup="showUser(this.value)"></p>

                        </form>

                        <div><b>Person info will be listed here...</b></div>
                        <div id="table-wrapper">
                            <div id="table-scroll">
                                <table class="table table-striped table-hover " id="txtHint">
                                    <thead>
                                    <tr>
                                        <th>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="selectAll">
                            <label for="selectAll"></label>
                        </span>
                                        </th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Birthday</th>
                                        <th>Avatar</th>
                                        <th>Role_id</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    if ($userList->num_rows > 0) {
                                        while ($row = $userList->fetch_assoc()) {
                                            $id = $row['id'];

                                            ?>
                                            <tr>
                                                <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="checkbox1" name="options[]" value="1">
                            <label for="checkbox1"></label>
                        </span>
                                                </td>

                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['address'] ?></td>
                                                <td><?php echo $row['birthday'] ?></td>
                                                <td><img src="webroot/uploads/users/<?php echo $row['avatar'] ?>"
                                                         alt="image" style="height: 50px"></td>
                                                <td><?php
                                                    if ($row['role_id'] == 0) {
                                                        echo 'Admin';
                                                    } else {
                                                        echo 'User';
                                                    }
                                                    ?></td>
                                                <td><?php echo $row['created'] ?></td>
                                                <td><?php echo $row['updated'] ?></td>
                                                <td>
                                                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i
                                                                class="material-icons" data-toggle="tooltip"
                                                                title="Edit">&#xE254;</i></a>
                                                    <a href="#deleteEmployeeModal" id="deleteBtn" class="delete"
                                                       data-toggle="modal"><i class="material-icons"
                                                                              data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                </td>
                                            </tr>

                                            <?php
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4">Khong co nguoi nao</td>
                                        </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--   pagination-->
                        <div class="clearfix">
                            <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                            <ul class="pagination">
                                <li class="page-item disabled"><a href="#">Previous</a></li>
                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                <li class="page-item"><a href="#" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Edit Modal HTML -->
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <?php

                    include "view/users/add_users.php";
                    ?>
                </div>
            </div>
        </div>
        <!-- Edit Modal HTML -->
        <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <?php
                    include "view/users/edit_users.php";

                    ?>

                </div>
            </div>
        </div>
        <!-- Delete Modal HTML -->
        <div id="deleteEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form action="index.php?action=delete_users&id=<?php echo $id ?>" method="POST">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Users</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_d" name="id" class="form-control">
                            <p>Are you sure you want to delete these Records?</p>
                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input onclick="deleteAjax(<?php echo $result['id']; ?>)" type="submit"
                                   class="btn btn-danger" id="delete" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script src="view/users/ajax/search.js"></script>
        <script src="view/users/ajax/delete.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

        <script src="view/users/ajax/add.js"></script>
        <script src="view/users/ajax/delete.js"></script>
        <script src="cssjs/js/index.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"
                integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg=="
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
                crossorigin="anonymous"></script>
</body>

</html>


