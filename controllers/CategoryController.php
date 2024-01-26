<?php
require_once "models/Category.php";
// session_start();
class CategoryController{

    function listCategory() {
        $listCategory = new Category();
        $listCategorys = $listCategory->getAllCategory();
        include "views/category/list.php";
    }
    function validate($category_name) {
        $error = [];

        // validate name 
        if(empty(trim($category_name))) {
            $error['category_name']['required'] = "Tên danh mục không được để trống";
        } else {
            if(strlen(trim($category_name)) < 5 ) {
                $error['category_name']['lenght'] = "Tên danh mục phải từ 5 ký tự";
            }
        }
        return $error;

    }

    function addCategory() {
        if(isset($_POST['add'])) {
            $category_name = $_POST['category_name'];

            $validateError = $this->validate($category_name);

            if(!empty($validateError)) {
                $_SESSION['error_mess'] = $validateError;
            } else {
                $categoryController = new CategoryController();
                $categoryController->addCa($category_name);
                echo "<script>window.location.href='index.php?url=list-category'</script>";
            }
            
        }
        include "views/category/add.php";
    }

    function addCa($category_name) {
        $add = new Category();
        $adds = $add->insertCategory($category_name);
        if(!$adds) {
            echo "<script> alert('Thêm thành công')</script>";
        }
        echo "<script>window.location.href='index.php?url=list-category'</script>";
    }

    function viewUpdate(){
        $id = $_GET['id'];
        $getCategory = new Category();
        $getCategorys  = $getCategory->getCategory($id);

        if(isset($_POST['add'])) {
            $id = $_POST['id'];
            $category_name = $_POST['category_name'];

            $validateError = $this->validate($category_name);

            if(!empty($validateError)) {
                $_SESSION['error_mess'] = $validateError;
            } else{
                $lists = new Category();
                $list = $lists->update($id, $category_name);
                 echo "<script>window.location.href='index.php?url=list-category'</script>";
    
            }

            
        }

        include "views/category/update.php";
    }

    function updateCategory($category_name) {
        $id = $_GET['id'];
        $category = new Category();
        $categorys = $category->getCategory($id);

        $updateCategory = new Category();
        $update = $updateCategory->update($id, $category_name);
        echo "<script>window.location.href='index.php?url=list-category'</script>";

    }

    function deleteCategory(){
        $id = $_GET['id'];
        $category = new Category();
        $categorys = $category->deleteCate($id);
        echo "<script>window.location.href='index.php?url=list-category'</script>";

    }


}


?>