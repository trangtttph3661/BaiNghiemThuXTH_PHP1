

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
    <title>Form Thêm </title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Thêm Sách</h2>
        <form action="index.php?url=add-book" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="tenSanPham" class="form-label">Tên sách</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập mã tên sách">
                <?php echo (!empty($_SESSION['error_mess']['name']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['name']['required'].'</span>': false ?>
                <?php echo (!empty($_SESSION['error_mess']['name']['lenght'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['name']['lenght'].'</span>': false ?>
            </div>

            <div class="mb-3">
                <label for="tenSanPham" class="form-label">Giá sách</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá sách ">
                <?php echo (!empty($_SESSION['error_mess']['price']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['price']['required'].'</span>': false ?>
                <?php echo (!empty($_SESSION['error_mess']['price']['invaild'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['price']['invaild'].'</span>': false ?>
            
                </div>

            <div class="mb-3">
                <label for="gia" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" id="image" name="image">
                <?php echo (!empty($_SESSION['error_mess']['image']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['image']['required'].'</span>': false ?>
                <?php echo (!empty($_SESSION['error_mess']['image']['invaild'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['image']['invaild'].'</span>': false ?>
            
                </div>

            <div class="mb-3">
                <label for="congviec" class="form-label">Năm xuất bản</label>
                <input type="date" class="form-control" name="publisher" id="publisher" placeholder="nhập năm xuất bản" >
                <?php echo (!empty($_SESSION['error_mess']['publisher']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['publisher']['required'].'</span>': false ?>
                <?php echo (!empty($_SESSION['error_mess']['publisher']['invaild'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['publisher']['invaild'].'</span>': false ?>
            
            </div>
            <div class="mb-3">
                <label for="congviec" class="form-label">Tác giả</label>
                <input type="text" class="form-control" name="author" id="author" placeholder="nhập tên tác giả" >
                <?php echo (!empty($_SESSION['error_mess']['author']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['author']['required'].'</span>': false ?>
                <?php echo (!empty($_SESSION['error_mess']['author']['lenght'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['author']['lenght'].'</span>': false ?>
            
            </div>
            <div class="mb-3">
                <label for="congviec" class="form-label">Danh mục</label>
                <select class="form-select" name="id_category" id="id_category">
                    <?php foreach($listCategory as $value) { ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['category_name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="Save">Lưu</button>
            <?php unset($_SESSION['error_mess']) ?>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>