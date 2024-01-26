

<!-- Bao gồm Bootstrap JS và Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bao gồm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Form update </title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">update danh mục</h2>
        <form action="index.php?url=update-category&id=<?php echo $getCategorys['id'] ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $getCategorys['id'] ?>" name="id" id="id">
            <div class="mb-3">
                <label for="tenSanPham" class="form-label">Danh mục</label>
                <input type="text" class="form-control" value="<?php echo $getCategorys['category_name'] ?>"  id="category_name" name="category_name">
                <?php echo (!empty($_SESSION['error_mess']['category_name']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['category_name']['required'].'</span>': false ?>
                <?php echo (!empty($_SESSION['error_mess']['category_name']['lenght'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['category_name']['lenght'].'</span>': false ?>
            </div>
            <button type="submit" class="btn btn-primary" name="add">Lưu</button>
            <?php unset($_SESSION['error_mess']) ?>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>