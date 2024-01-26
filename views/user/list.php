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
    
    <form action="index.php?url=list-user" method="post" enctype="multipart/form-data" >
    
    <a href="index.php?url=admin" class="btn btn-primary mb-3">Thoát</a>

    <!-- Bảng Bootstrap -->
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">username</th>
            <th scope="col">password</th>
            <th scope="col">email</th>
            <th scope="col">Thao tác</th>


        </tr>
        </thead>
        <tbody>
        <?php foreach ($lists as $key => $value) { ?>
            <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['username'] ?></td>
            <td><?php echo $value['password'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td>
                <a class="btn btn-warning" href="index.php?url=update-user&id=<?php echo $value['id'] ?>">Sửa</a>
                <a class="btn btn-danger" href="index.php?url=delete-user&id=<?php echo $value['id'] ?>" onclick="return confirm('Xóa nhé?')">Xóa</a>
            </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </form>
    <!-- Kết thúc Bảng Bootstrap -->
</div>