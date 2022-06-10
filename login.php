<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/themify-icons/themify-icons.css">
</head>

<body>
    <div class="wrapper">
        <div class="Header">
            <div class="navBar">
                <div class="logo">
                   <a href="webfilm.php"> <img src="./assets/img/logowebsite.png" alt="#"></a>
                </div>

                <div class="Search">
                    <input type="text" placeholder="Nhập từ khóa" autofocus="false">
                    <i class="ti-search"></i>
                </div>

                <div class="iconAction">
                    <i class="ti-align-justify"></i>
                    <i class="ti-timer"></i>
                    <i class="ti-bookmark"></i>
                    <i class="ti-user"></i>
                </div>

            </div>

            <div class="noticed">
                <p>Xin chào mọi người đã đến với Website của mình : <a href="fb.com/chiien"> fb.com/chiien</a></p>
            </div>
        </div>
        <div class="Content">
            <form action="login.php" method="post" class="form" id="form-1">
                <h1>Đăng nhập</h1>
                <div class="form-group">
                    <label for="username" class="form-label">Tài khoản</label>
                    <input type="text" name="username" placeholder="Tên tài khoản hoặc Email">
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" placeholder="Nhập mật khẩu">
                    <span class="form-message"></span>
                </div>
               <div class="btn">

                <button class="submit_button"><a style="text-decoration:none; color:inherit;" href="./php/register.php">Đăng kí</a></button>
                <button class="login_button" type="submit" name="login" >Đăng nhập</button>
               </div>
            </form>
        </div>

        <div class="footer">
            <div class="footerLogo">
                <div class="imgLogofooter">
                    <img src="./assets/img/logowebsite.png" alt="#">
                </div>

            </div>
            <div class="footerContact">
                <div class="imgContact">
                    <img src="./assets/img/logowebsite.png" alt="#">
                </div>
            </div>
        </div>

    </div>
    </div>
    <?php include './php/php_template/xulydangnhap.php';?>
<script src="./assets/js/resighter.js">
   
</script>
</body>

</html>