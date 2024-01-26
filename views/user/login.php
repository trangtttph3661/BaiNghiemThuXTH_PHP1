
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
    <h1>Đăng nhập</h1>
    <a href="index.php?url=/">Tạo tài khoản mới?</a>
</head>
<main>
    <form action="index.php?url=login" method="post" enctype="multipart/form-data">
        <div class="inp">
            <label for="username">Username:</label>
            <input style="width: 220px; height: 20px; margin: 10px; border-radius: 10px;" type="text" name="username" id="username">
        </div>
        <div class="inp">
            <label for="password">Password:</label>
            <input style="width: 220px; height: 20px; margin: 10px; border-radius: 10px;" type="password" name="password" id="password">
        </div>
        <input type="submit" name="login" value="Login">
    </form>
</main>
    </div>
</body>

</html>