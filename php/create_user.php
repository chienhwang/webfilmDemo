
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tài khoản</title>
    <link rel="stylesheet" href="../assets/css/create_user.css">
    <link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
</head>
<body>
    <div class="wrapper">
        <div class="Header">
            <div class="navBar">
                <div class="logo">
                   <a href="/php/admin.php"> <img src="/assets/img/logowebsite.png" alt="#"></a>
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
  <div class="content">

    <?php 

        $table = "`user` (`id`, `username`, `password`, `status`, `created_time`, `last_updated`)";
        $error =false;
        if(isset($_GET['action'] ) && $_GET['action']=='create'){
            if(isset($_POST['username']) && !empty($_POST['username']) 
            && isset($_POST['password']) && !empty($_POST['password']))
            {    include './database/connectDB.php';
                // Thêm bản ghi vào cơ sở dữ liệu
                $result = mysqli_query($con, "INSERT INTO `user` (`id`, `username`, `password`, `status`, `created_time`)
                 VALUES (NULL, '" . $_POST['username'] . "', MD5('" . $_POST['password'] . "'), 1, 1, " . time() . ");");
                if (!$result) {
                    if (strpos(mysqli_error($con), "Duplicate entry") !== FALSE) {
                        $error = "Tài khoản đã tồn tại. Bạn vui lòng chọn tài khoản khác.";
                    }
                }
                mysqli_close($con);
                if ($error !== false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h1>Thông báo</h1>
                        <h4><?= $error ?></h4>
                        <a href="./create_user.php">Tạo tài khoản khác</a>
                    </div>
                <?php } else { ?>
                    <div id="success-notify" class="box-content">
                        <h1>Chúc mừng</h1>
                        <h4>Bạn đã tạo thành công tài khoản <?= $_POST['username'] ?></h4>
                        <a href="./admin.php">Danh sách tài khoản</a>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } else { ?> 


    <form action="./create_user.php?action=create" autocomplete="off" method="post" class="form" id="form-1">
        <h1>Tạo mới tài khoản</h1>
        <div class="form-group">
            <label for="id" class="form-label">Tài khoản</label>
            <input type="text" id="id" placeholder="Tên tài khoản hoặc Email">
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" id="password" placeholder="Nhập mật khẩu">
            <span class="form-message"></span>
        </div>
       <div class="btn">
        <button class="create_button">Tạo tài khoản</button>
       </div>
    </form>
    
  </div>
  <?php } ?>
</body>

</html>