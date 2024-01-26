<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bao gồm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title></title>
</head>
<body>

<div class="container mt-5">
    <!-- <h2 class="mb-4"><a href="index.php?url=list-category">Xem danh sách </a></h2> -->

    <form action="index.php?url=list-book">
        <!-- Nút Thêm -->
    <a href="index.php?url=add-book" class="btn btn-primary mb-3">Thêm</a>
    <a href="index.php?url=admin" class="btn btn-primary mb-3" >Addmin</a>
<!-- Bảng Bootstrap -->
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">name</th>
        <th scope="col">price</th>
        <th scope="col">image</th>
        <th scope="col">publisher</th>
        <th scope="col">author</th>
        <th scope="col">category</th>
        <th scope="col">Thao tac</th>

    </tr>
    </thead>
    <tbody>
      
    <?php foreach ($book as $key => $value) { ?>
        <tr>
        <td><?php echo $value['id'] ?></td>
        <td><?php echo $value['name'] ?></td>
        <td><?php echo number_format($value['price'], 3, '.', ',') ?></td>
        <td><img src="<?php echo $value['image'] ?>" alt="img" width="150" ></td>
        <td><?php echo $value['publisher'] ?></td>
        <td><?php echo $value['author'] ?></td>
        <td><?php echo $value['category_name'] ?></td>
        <td>
            <a class="btn btn-warning" href="index.php?url=update-Book&id=<?php echo $value['id'] ?>">Sửa</a>
            <a class="btn btn-danger" href="index.php?url=delete-Book&id=<?php echo $value['id'] ?>" onclick="return confirm('Xóa nhé?')">Xóa</a>
        </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
    </form>
    
    <!-- Kết thúc Bảng Bootstrap -->
</div>