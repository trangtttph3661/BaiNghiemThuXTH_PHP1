
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="tong">
        <head>
            <h1>Đăng Ký</h1>
        </head>
        <main>
            <form action="index.php?url=/" method="post" enctype="multipart/form-data" >
                <div class="inp">
                    <label for="">Username:</label>
                    <input style="width: 220px; height: 20px; margin: 10px; border-radius: 10px; " type="text" name="username" id="username" >
                    <?php echo (!empty($_SESSION['error_mess']['username']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['username']['required'].'</span>': false ?>
                    <?php echo (!empty($_SESSION['error_mess']['username']['lenght'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['username']['lenght'].'</span>': false ?>
            
                </div>
                <div class="inp">
                    <label for="">Password:</label>
                    <input style="width: 220px; height: 20px;margin: 10px; border-radius: 10px;" type="password" name="password" id="password">
                    <?php echo (!empty($_SESSION['error_mess']['password']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['password']['required'].'</span>': false ?>
                    <?php echo (!empty($_SESSION['error_mess']['password']['lenght'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['password']['lenght'].'</span>': false ?>
            
                </div>
                <div class="inp">
                    <label for="">Email:</label>
                    <input style="width: 220px; height: 20px;margin: 10px; border-radius: 10px;" type="text" name="email" id="email" >
                    <?php echo (!empty($_SESSION['error_mess']['email']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['email']['required'].'</span>': false ?>
                    <?php echo (!empty($_SESSION['error_mess']['email']['invalid'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['email']['invalid'].'</span>': false ?>
            
                </div>
                <input style=" margin-left: 50px; " type="submit" name="dangky" value="Đăng ký">
            </form>
        
        </main>
    </div>
</body>

</html>