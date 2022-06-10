<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="../assets/css/register.css">
    <link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
</head>

<body>
    <div class="wrapper">
        <div class="Header">
            <div class="navBar">
                <div class="logo">
                    <a href="webfilm.php"> <img src="../assets/img/logowebsite.png" alt="#"></a>
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
            <form action="register.php" method="post" class="form" id="form-1">
                <h1>Đăng kí thành viên</h1>
                <div class="form-group">
                    <label for="fullname" class="form-label">UserName</label>
                    <input type="text" id="fullname" name="username" placeholder="vd:Hoàng Minh Chiến">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" placeholder="Nhập email ex:123@gmail.com">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" placeholder="Nhập mật khẩu">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="password_confirm " class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" name="password_confirm" placeholder="Nhập lại mật khẩu">
                    <span class="form-message"></span>
                </div>
               <div class="btn">
                <button type="submit" class="submit_button" name="reg" value="reg">Đăng ký</button>
                <button class="login_button"><a 
                style="text-decoration:none; color:inherit;"
                href="login.php" >Đăng nhập</a></button>
               </div>
               <?php require './php_template/xulydangky.php';?>
            </form>

          
        </div>
          
        <div class="footer">
            <div class="footerLogo">
                <div class="imgLogofooter">
                    <img src="../assets/img/logowebsite.png" alt="#">
                </div>

            </div>
            <div class="footerContact">
                <div class="imgContact">
                    <img src="../assets/img/logowebsite.png" alt="#">
                </div>
            </div>
        </div>

    </div>
    </div>
<script src="../assets/js/validator.js">
   
</script>
</body>

</html>