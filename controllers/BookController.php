<?php
require_once "models/Book.php";
require_once "models/Category.php";
// session_start();
class BookController {
    function listBook() {
        $listCategorys = new Category();
        $listCategory = $listCategorys->getAllCategory();

        $books = new Book();
        $book = $books->getAllBook();
        include "views/book/list.php";
    }

    function validate($name, $price, $image, $publisher, $author) {
        $error = [];

        // validate name 
        if(empty(trim($name))) {
            $error['name']['required'] = "Tên sách không được để trống";
        } else {
            if(strlen(trim($name)) < 5 ) {
                $error['name']['lenght'] = "Tên sách phải từ 5 ký tự";
            }
        }

        // validate price 
        if (empty(trim($price))) {
            $error['price']['required'] = 'giá không được để trống';
        } else {
            if (!filter_var(trim($_POST['price']), FILTER_VALIDATE_INT, [
                'options' => ['min_range' => 1]
            ])) {
                $error['price']['invaild'] = 'giá không hợp lệ';
            } 
        }

        // validate author
        if(empty(trim($author))) {
            $error['author']['required'] = "Tên tác giả không được để trống";
        } else {
            if(strlen(trim($author)) < 5 ) {
                $error['author']['lenght'] = "Tên tác giả phải từ 5 ký tự";
            }
        }

        return $error;

    }
    function AddBook(){
        $listCategorys = new Category();
        $listCategory = $listCategorys->getAllCategory();

        // var_dump($listCategory);
        // die();
        if(isset($_POST['Save'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_FILES['image'];
            $publisher = $_POST['publisher'];
            $author = $_POST['author'];
            $id_category = $_POST['id_category'];

            $validateError = $this->validate($name, $price, $image, $publisher, $author);

            if(!empty($validateError)) {
                $_SESSION['error_mess'] = $validateError;
            } else {
                $bookController = new BookController();
                $bookControllers = $bookController->addB($name, $price, $image, $publisher, $author, $id_category);
                echo "<script>window.location.href='index.php?url=list-book'</script>";
            }
         }
        include "views/book/add.php";
    }

    function addB($name, $price, $image, $publisher, $author, $id_category) {
        // echo "$name";
        $targetDir = "public/image/";
        $targetFile = $targetDir.$image['name'];
        if(move_uploaded_file($image['tmp_name'],$targetFile)) {
            $img_url = $targetFile;
        }
        $checkAdd = new Book();
        $check = $checkAdd->insertBook($name, $price, $img_url, $publisher, $author, $id_category);
        if(!$check) {
            echo '<script> alert("Thêm thành công") </script>';
        }
         echo "<script> window.location.href='index.php?url=list-book' </script>";
    }

    function viewUpdate() {
        $listCategorys = new Category();
        $listCategory = $listCategorys->getAllCategory();

        $id = $_GET['id'];
        $getBook = new Book();
        $book = $getBook->getBook($id);

        if(isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_FILES['image'];
            if($image['size'] != 0 ) {
                $targetDir = "public/image/";
                $targetFile = $targetDir.$image['name'];
                if(move_uploaded_file($image['tmp_name'],$targetFile)) {
                    $imgurl = $targetFile;
                }
            } else {
                $img_url = $book['image'];
            }
            $publisher = $_POST['publisher'];
            $author = $_POST['author'];
            $id_category = $_POST['id_category'];

            if(!empty($validateError)) {
                $_SESSION['error_mess'] = $validateError;
            } else {
                $listB = new Book();
                $lists = $listB->update($id, $name, $price, $imgurl, $publisher, $author, $id_category);
                echo '<script>window.location,href="index.php?url=list-book"</script>';
            }
        }
        include "views/book/update.php";
    }
    function updateBook($name, $price, $image, $publisher, $author, $id_category) {
        $id = $_GET['id'];
        $books = new Book();
        $book = $books->getBook($id);
        
        if($image['size'] != 0 ) {
            $targetDir = "public/image/";
            $targetFile = $targetDir.$image['name'];
            if(move_uploaded_file($image['tmp_name'],$targetFile)) {
                $imgurl = $targetFile;
            }
        } else {
            $img_url = $book['image'];
        }
        $updateBooks = new Book();
        $updateBook = $updateBooks->update($id, $name, $price, $img_url, $publisher, $author, $id_category);
        
        echo "<script>window.location.href='index.php?url=list-book'</script>";

    }
    function deleteBooks() {
        $id = $_GET['id'];
        $delete = new Book();
        $delete->deleteBook($id);
        echo "<script> window.location.href = 'index.php?url=list-book'; </script>";

    }
}

?>
