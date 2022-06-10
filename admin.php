<?php
	session_start(); 
    include ("./php_template/permission.php"); 
 ?>
 
 
<?php require_once('./database/DB_driver.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
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
                <div class="tab_admin">
                    <ul>
                        <li>
                            <button class="tablinks"data-tab="qlphim" >Quản lý phim</button>
                        </li>
                        <li>
                            <button class="tablinks" data-tab="qlnguoidung">Quản lý người dùng</button>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="Content">
            
            
            <div class="tab_content" id="qlphim">
                <h1>Quản lý phim</h1>
                <table class="list" id="film-list">
                    <tr>
                        <td>Tên phim</td>
                        <td>Số tập</td>
                        <td>Tổng Tập</td>
                        <td>Nội dung</td>
                        <td>Thể loại</td>
                        <td>Trạng thái</td>
                        <td>Xóa</td>
                        <td>Thêm</td>
                    </tr>
                    <?php

                    $db = new DB_driver();
                    foreach ($result = $db->get_list() as $rs) {

                    ?>

                        <tr>
                       <!-- #date('d/m/Y', $rs["create_date"]) -->
                            <td><?= $rs["tenphim"] ?></td>
                            <td><?= $rs["sotap"] == 1 ? 'kích hoạt' : 'chưa kích hoạt' ?></td>
                            <td><?= $rs["tongtap"] ?></td>
                            <td><?= $rs["noidung"] ?></td>
                            <td><?= $rs["theloai"] ?></td>
                            <td><?= $rs["status"] == 0 ? 'Đang tiến hành' : 'Đã hoàn thành' ?></td>
                            <td><a href="">Sửa</a></td>
                            <td><a href="">Xóa</a></td>
                            <td><a href="./php_template/create_user.php">Thêm</a></td>
                        </tr>

                        <?php } ?>
                </table>    
            </div>
            <div class="tab_content" id="qlnguoidung">
                <h1>Quản lý người dùng</h1>
                <table id="user-list">
                    <tr>
                        <td>User</td>
                        <td>Trạng thái</td>
                        <td>Cập nhật lần cuối</td>
                        <td>Quyền</td>
                        <td>Sửa</td>
                        <td>Xóa</td>
                        <td>Thêm</td>
                    </tr>
                    <?php

                    $db = new DB_driver();
                    foreach ($result = $db->get_listUser() as $rs) {

                    ?>

                        <tr>
                       <!-- #date('d/m/Y', $rs["create_date"]) -->
                            <td><?= $rs["username"] ?></td>
                            <td><?= $rs["status"] == 1 ? 'kích hoạt' : 'chưa kích hoạt' ?></td>
                            <td><?= $rs["create_date"] ?></td>
                            <td><?= $rs["phanquyen"] == 1 ? 'user' : 'admin' ?></td>
                            <td><a href="">Sửa</a></td>
                            <td><a href="">Xóa</a></td>
                            <td><a href="./php_template/create_user.php">Thêm</a></td>
                        </tr>

                        <?php } ?>
                </table>
            </div>

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
    <script src="../assets/js/admin.js"></script>
</body>

</html>