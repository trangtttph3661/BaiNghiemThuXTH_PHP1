
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="tong">
        <head>
            <h1>update user</h1>
        </head>
        <main>
            <form action="index.php?url=update-user&id=<?php echo $users['id'] ?>" method="post" enctype="multipart/form-data" >
                <div class="inp">
                    <label for="">Username:</label>
                    <input value="<?php echo $users['username'] ?>"  style="width: 220px; height: 20px; margin: 10px; border-radius: 10px; " type="text" name="username" id="username" >
                    <?php echo (!empty($_SESSION['error_mess']['username']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['username']['required'].'</span>': false ?>
                    <?php echo (!empty($_SESSION['error_mess']['username']['lenght'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['username']['lenght'].'</span>': false ?>
            
                </div>
                <div class="inp">
                    <label for="">Password:</label>
                    <input value="<?php echo $users['password'] ?>" style="width: 220px; height: 20px;margin: 10px; border-radius: 10px;" type="password" name="password" id="password">
                    <?php echo (!empty($_SESSION['error_mess']['password']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['password']['required'].'</span>': false ?>
                    <?php echo (!empty($_SESSION['error_mess']['password']['lenght'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['password']['lenght'].'</span>': false ?>
            
                </div>
                <div class="inp">
                    <label for="">Email:</label>
                    <input value="<?php echo $users['email'] ?>" style="width: 220px; height: 20px;margin: 10px; border-radius: 10px;" type="text" name="email" id="email" >
                    <?php echo (!empty($_SESSION['error_mess']['email']['required'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['email']['required'].'</span>': false ?>
                    <?php echo (!empty($_SESSION['error_mess']['email']['invalid'])) ? '<span style="color:red" >'.$_SESSION['error_mess']['email']['invalid'].'</span>': false ?>
            
                </div>
                <button type="submit" class="btn btn-primary" name="update">Lưu</button>
                <?php unset($_SESSION['error_mess']) ?>
            </form>
        
        </main>
    </div>
</body>

</html>