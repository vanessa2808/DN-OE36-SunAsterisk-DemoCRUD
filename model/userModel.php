<?php

namespace model;

use config\ConnectDB;

include "config/ConnectDB.php";

Class userModel extends ConnectDB
{
    public function getUserPage()
    {
        $sql = "SELECT * FROM users";
        return mysqli_query($this->connect(), $sql);
    }

    public function getUsers($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($this->connect(), $sql);
        return $result->fetch_assoc();
    }

    public function deleteUsers($id)
    {
        $sql = "DELETE FROM users where id = $id";
        return mysqli_query($this->connect(), $sql);

    }

    public function addUsers($name, $email, $password, $address, $birthday, $avatar, $role_id, $created, $updated)
    {
        $role_id = 1;
        $sql = "INSERT INTO users (name,email, password, address,  birthday, avatar, role_id, created, updated) VALUES ('$name', '$email', '$password', '$address','$birthday', '$avatar','$role_id','$created', '$updated')";
        return mysqli_query($this->connect(), $sql);

    }

    public function editUsers($id, $name, $email, $password, $address, $birthday, $avatar, $role_id, $created, $updated)
    {
        $sql = "UPDATE users SET name = '$name', email = '$email', password = '$password', address = '$address', birthday = '$birthday', avatar = '$avatar', role_id = '$role_id',created = '$created', updated = '$created' WHERE id = $id";

        return mysqli_query($this->connect(), $sql);

    }
}
