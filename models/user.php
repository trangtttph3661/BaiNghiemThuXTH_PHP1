<?php
require_once "db.php";

class User extends DB {

    function getAllUser() {
        $sql = "SELECT * FROM user";
        return $this->getData($sql);
    }
    function insertUser($username, $password, $email) {
        $sql = "INSERT INTO user(id, username, password, email) VALUES (null,'$username', '$password', '$email') ";
        return $this->getData($sql);
    }

    function getUser($id) {
        $sql = "SELECT * FROM user WHERE id = '$id'";
        return $this->getData($sql, false);
    }

    // đăng nhập 
    function dangNhap($username, $password) {
        $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
        return $this->getData($sql);
    }

    function checkUser($username, $password) {
        $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
        return $this->getData($sql);
    }

    function updateUser($id, $username, $password, $email) {
        $sql = "UPDATE user SET username = '$username', password = '$password', email = '$email' WHERE id = '$id' ";
        return $this->getData($sql);
    }

    function deleteUser($id) {
        $sql = "DELETE FROM user WHERE id = '$id'";
        return $this->getData($sql);
    }
}

?>