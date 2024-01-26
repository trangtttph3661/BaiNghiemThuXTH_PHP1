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
    <form action="index.php?url=list-category" method="post" enctype="multipart/form-data" >
    <!-- <h2 class="mb-4"><a href="index.php?url=/">Xem danh sách</a> </h2> -->
    
    <!-- Nút Thêm -->
    <a href="index.php?url=add-category" class="btn btn-primary mb-3">Thêm</a>
    <a href="index.php?url=admin" class="btn btn-primary mb-3" >Addmin</a>
    <!-- Bảng Bootstrap -->
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">name</th>
            <th scope="col">Thao tac</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($listCategorys as $key => $value) { ?>
            <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['category_name'] ?></td>
            <td>
                <a class="btn btn-warning" href="index.php?url=update-category&id=<?php echo $value['id'] ?>">Sửa</a>
                <a class="btn btn-danger" href="index.php?url=delete-category&id=<?php echo $value['id'] ?>" onclick="return confirm('Xóa nhé?')">Xóa</a>
            </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </form>
    <!-- Kết thúc Bảng Bootstrap -->
</div>