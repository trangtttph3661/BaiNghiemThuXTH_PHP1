<?php
 require_once "controllers/BookController.php";
 require_once "controllers/CategoryController.php";
 require_once "controllers/UserController.php";

$url = isset($_GET['url']) ? $_GET['url'] : '/';
switch($url) {
    case '/':
        $userController = new UserController();
        $userController->addUser();
        break;
    case 'login':
        $userController = new UserController();
        $userController->login();
        break;
    case 'list-user':
        $userController = new UserController();
        $userController->listUsser();
        break;
    case 'update-user':
        $userController = new UserController();
        $userController->viewUpdate();
        break;
    case 'delete-user':
        $userController = new UserController();
        $userController->delete();
    case 'admin':
        include "views/addmin/list.php";
        break;
    
// book 
    case 'list-book':
       $bookController = new BookController();
       $bookController->listBook();
        break;
    case 'add-book':
        $bookController = new BookController();
        $bookController->AddBook();
        break;
    case 'update-Book':
        $bookController = new BookController();
        $bookController->viewUpdate();
        break;
    case 'delete-Book':
        $bookController = new BookController();
        $bookController->deleteBooks();
        break;

// category
    case 'list-category':
        $categoryController = new CategoryController();
        $categoryController->listCategory();
        break;
    case 'add-category':
        $categoryController = new CategoryController();
        $categoryController->addCategory();
        break;
    case 'update-category':
        $categoryController = new CategoryController();
        $categoryController->viewUpdate();
        break;
    case 'delete-category':
        $categoryController = new CategoryController();
        $categoryController->deleteCategory();
        break;

    default:
}

?>