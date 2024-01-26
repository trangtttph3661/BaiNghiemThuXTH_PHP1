<?php
require_once "db.php";

class Book extends DB{
    function getAllBook() {
        $sql = "SELECT b.id, b.name, b.price, b.image, b.publisher, b.author, ct.category_name
        FROM book AS b INNER JOIN category AS ct ON ct.id = b.id_category";
        return $this->getData($sql);
    }

    function insertBook($name, $price, $image, $publisher, $author, $id_category) {
        $sql = "INSERT INTO book(id, name, price, image, publisher, author, id_category)
        VALUES (null,'$name','$price','$image','$publisher','$author','$id_category')";
        return $this->getData($sql);
    }

    function getBook($id) {
        $sql = "SELECT b.id, b.name, b.price, b.image, b.publisher, b.author, ct.category_name
        FROM book AS b INNER JOIN category AS ct ON ct.id = b.id_category WHERE b.id = '$id' " ;
        return $this->getData($sql, false);
    }

    function update($id, $name, $price, $img_url, $publisher, $author, $id_category) {
        $sql = "UPDATE book SET name = '$name', price = '$price', image = '$img_url', publisher = '$publisher', author = '$author', id_category = '$id_category' WHERE id = '$id' ";
        echo var_dump($sql);
        return $this->getData($sql,false);
    }

    function deleteBook($id) {
        $sql = "DELETE FROM book WHERE id = '$id' ";
        return $this->getData($sql);
    }
}

?>