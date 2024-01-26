<?php
require_once "models/user.php";
session_start();

class UserController {
    function listUsser() {
        $listUser = new user();
        $lists = $listUser->getAllUser();
        include_once "views/user/list.php";
    }

    function validate($username, $password, $email) {
        $error = [];

        // validate name 
        if(empty(trim($username))) {
            $error['username']['required'] = "Tên tài khoản không được để trống";
        } else {
            if(strlen(trim($username)) < 3 ) {
                $error['username']['lenght'] = "Tên tài khoản phải từ 3 ký tự";
            }
        }

        // validate password
        if(empty(trim($password))) {
            $error['password']['required'] = "Password không được để trống";
        } else {
            if(strlen(trim($password)) < 3 ) {
                $error['password']['lenght'] = "Password phải từ 3 ký tự";
            }
        }

        // validate email
        if (empty(trim($email))) {
            $error['email']['required'] = "Email không được để trống";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email']['invalid'] = "Email không hợp lệ";
            }
        }

        return $error;

    }

    function addUser() {
        if (isset($_POST['dangky'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $validateError = $this->validate($username, $password, $email);

            if(!empty($validateError)) {
                $_SESSION['error_mess'] = $validateError;
            } else {
                $userController = new UserController();
                $userController->addUs($username, $password, $email);
                echo "<script>window.location.href='index.php?url=list-user'</script>";
            }
           
        }
        include_once "views/user/add.php";
    }

    function addUs($username, $password, $email)
    {
        $add = new User();
        $check = $add->insertUser($username, $password, $email);
        if (!$check) {
            echo "<script>Thêm tài khoản thành công</script>";
        }
        echo "<script>window.location.href='index.php?url=login'</script>";
    }

    function login()
{
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new User();
        $users = $user->checkUser($username, $password);

        if ($users !== false && is_array($users) && count($users) > 0) {
            $_SESSION['s_user'] = $users;
            header("Location: index.php?url=admin");
            exit();
        } else {
            echo "<p style='color:red'>Tài khoản không tồn tại</p>";
        }
    }
    include_once "views/user/login.php";
}

    function viewUpdate()
    {
        $id = $_GET['id'];
        $getUser = new User();
        $users = $getUser->getUser($id);

        if (isset($_POST['update'])) {
            $id = $_GET['id'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            
            $validateError = $this->validate($username, $password, $email);

            if(!empty($validateError)) {
                $_SESSION['error_mess'] = $validateError;
            } else {
                $update = new User();
                $updateUser = $update->updateUser($id, $username, $password, $email);
                echo "<script>window.location.href='index.php?url=list-user'</script>";
            }   
        }
        include "views/user/update.php";
    }

    function updateU($username, $password, $email)
    {
        $id = $_GET['id'];
        $users = new User();
        $user = $users->getUser($id);

        $updateUsers = new User();
        $updateUser = $updateUsers->updateUser($id, $username, $password, $email);

        // echo "<script>window.location.href = 'index.php?url=list-user'</script>"; 
    }

    function delete()
    {
        $id = $_GET['id'];
        $users = new User();
        $user = $users->deleteUser($id);
        echo "<script>window.location.href = 'index.php?url=list-user'</script>";
    }
}
