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
        <h2 class="mb-4">update Sách</h2>
        <?php if($book) { ?>
            <form action="index.php?url=update-Book&id=<?php echo $book['id'] ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $book['id'] ?>" class="form-control" name="id">
            <div class="mb-3">
                <label for="tenSanPham" class="form-label">Tên</label>
                <input type="text" value="<?php echo $book['name'] ?>" class="form-control" id="name" name="name">
                <?php echo (!empty($_SESSION['error_mess']['name']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['name']['required'].'</span>': false ?>
                <?php echo (!empty($_SESSION['error_mess']['name']['lenght'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['name']['lenght'].'</span>': false ?>
            
            </div>

            <div class="mb-3">
                <label for="tenSanPham" class="form-label">giá</label>
                <input type="text" value="<?php echo $book['price'] ?>" class="form-control" id="price" name="price">
                <?php echo (!empty($_SESSION['error_mess']['price']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['price']['required'].'</span>': false ?>
                <?php echo (!empty($_SESSION['error_mess']['price']['invaild'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['price']['invaild'].'</span>': false ?>
            
                </div>

            <div class="mb-3">
                <img src="<?php echo $book['image'] ?>" alt="img" style="padding: 10px;" width="150" >
                <input type="file" class="form-control" id="image" name="image">
                <?php echo (!empty($_SESSION['error_mess']['image']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['image']['required'].'</span>': false ?>
                <?php echo (!empty($_SESSION['error_mess']['image']['invaild'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['image']['invaild'].'</span>': false ?>
            
                </div>

            <div class="mb-3">
                <label for="gia" class="form-label">năm xuất bản </label>
                <input type="date" value="<?php echo $book['publisher'] ?>" class="form-control" id="publisher" name="publisher">
                <?php echo (!empty($_SESSION['error_mess']['publisher']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['publisher']['required'].'</span>': false ?>
                <?php echo (!empty($_SESSION['error_mess']['publisher']['invaild'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['publisher']['invaild'].'</span>': false ?>
            
            </div>


            <div class="mb-3">
                <label for="congviec" class="form-label">tác giả</label>
                <input type="text" value="<?php echo $book['author'] ?>" class="form-control" id="author" name="author">
                <?php echo (!empty($_SESSION['error_mess']['author']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['author']['required'].'</span>': false ?>
                <?php echo (!empty($_SESSION['error_mess']['author']['lenght'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['author']['lenght'].'</span>': false ?>
   
            </div>
            <div class="mb-3">
                <label for="congviec" class="form-label">Danh mục</label>
                <select class="form-select" name="id_category" id="id_category">
                    <?php foreach($listCategory as $value) { ?>
                        <option <?php if($value['category_name'] == $book['category_name']) echo 'selected' ?> value="<?php echo $value['id'] ?>" ><?php echo $value['category_name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="update">update</button>
            
        </form>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>