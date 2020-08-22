<?php

namespace controller;

use libs\functionCommon;
use model\userModel;

include 'model/userModel.php';
include 'libs/functionCommon.php';

class UserController
{

    public function handleRequest()
    {
        $model = new userModel();
        $functionCommon = new FunctionCommon();
        $action = isset($_GET['action']) ? $_GET['action'] : 'list_users';
        switch ($action) {
            case 'fetch.php':
                include 'view/users/fetch.php';
                break;
            case 'list_users':
                $userList = $model->getUserPage();
                include 'view/users/list_users.php';
                break;

            case 'delete_users':
                $id = $_GET['id'];
                if ($model->deleteUsers($id) == true) {
                    $functionCommon->redirectPage('index.php?action=list_users');
                }
                break;
            case 'add_users':
                if (isset($_POST['add_user_form'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $address = $_POST['address'];
                    $birthday = date('Y-m-d');
                    $avatar = 'default.jpg';
                    $pathUpload = 'webroot/uploads/users/';

                    if ($_FILES['avatar']['error'] == true) {
                        move_uploaded_file($_FILES['avatar']['tmp_name'], $pathUpload . $_FILES['avatar']['name']);
                        $avatar = $_FILES['avatar']['name'];
                    }
                    $role_id = 1;
                    $created = date('Y-m-d h:i:s');
                    $updated = date('Y-m-d h:i:s');
                    if ($model->addUsers($name, $email, $password, $address, $birthday, $avatar, $role_id, $created, $updated) == true) {
                        $functionCommon->redirectPage('index.php?action=list_users');
                    }
                }
                include 'view/users/add_users.php';
                break;
            case 'edit_users':
                $id = $_GET['id'];
                $model = new userModel();
                $editUsers = $model->getUsers($id);
                if (isset($_POST['edit_users_form'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $address = $_POST['address'];
                    $birthday = date('Y-m-d');
                    $avatar = 'default.jpg';
                    $pathUpload = 'webroot/uploads/users/';

                    if ($_FILES['avatar']['error'] == true) {
                        move_uploaded_file($_FILES['avatar']['tmp_name'], $pathUpload . $_FILES['avatar']['name']);
                        $avatar = $_FILES['avatar']['name'];
                    }
                    $role_id = 1;
                    $created = date('Y-m-d h:i:s');
                    $updated = date('Y-m-d h:i:s');
                    if ($model->editUsers($id, $name, $email, $password, $address, $birthday, $avatar, $role_id, $created, $updated) === true) {
                        $functionCommon->redirectPage('index.php?action=list_users');
                    }
                }
                include 'view/users/edit_users.php';
                include "index.php";
                break;
            default:
                # code...
                break;
        }
    }
}


