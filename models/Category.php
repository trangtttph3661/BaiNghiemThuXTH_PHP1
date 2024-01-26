<?php
require_once "db.php";

class Category extends DB {
    function getAllCategory() {
        $sql = "SELECT * FROM category";
        return $this->getData($sql);
    }

    function insertCategory($category_name){
        $sql = "INSERT INTO category(id, category_name) VALUES (null, '$category_name') ";
        return $this->getData($sql);
    }
    function getCategory($id) {
        $sql = "SELECT * FROM category WHERE id = '$id'";
        return $this->getData($sql, false);
}
    
    function update($id, $category_name) {
        $sql = "UPDATE category SET category_name = '$category_name' WHERE id = '$id'";
        return $this->getData($sql);
    }

    function deleteCate($id) {
        $sql = "DELETE FROM category WHERE id = '$id'";
        return $this->getData($sql);
    }

}

?>