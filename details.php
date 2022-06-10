<?php 
require_once('php/database/DB_driver.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Film Website</title>
<link rel="stylesheet" href="assets/css/thongtinfilm.css">
<link rel="stylesheet" href="assets/themify-icons/themify-icons.css">
</head>

<body>
<div class="wrapper">
<div class="Header">
 <div class="navBar">
     <div class="logo">
         <a href="webfilm.php"><img src="assets/img/logowebsite.png" alt="#"></a>
     </div>

     <div class="Search">
         <input type="text" placeholder="Nhập từ khóa" autofocus="false">
         <i class="ti-search"></i>
     </div>

     <div class="iconAction">
         <i class="ti-align-justify"></i>
         <i class="ti-timer"></i>
         <i class="ti-bookmark"></i>
         <a href="login.php"> <i class="ti-user"> </i></a>
     </div>

 </div>

 <div class="noticed">
     <p>Xin chào mọi người đã đến với Website của mình : <a href="fb.com/chiien"> fb.com/chiien</a></p>
 </div>
</div>
<div class="Content">
    <?php $db = new DB_driver();
        $result = $db->get_itemByid();
        foreach($result as $rs){
        


    ?>

    <div class="thongtinfilm">
            <div class="tenfilm">
                <span> <?php echo $rs["tenphim"] ?> </span>
            </div>
            <div class="boxThongtin">
                <div class="imgfilm">
                    <img src="<?php echo $rs["img"] ?> " alt="#">
                </div>
                <div class="tableThongtin">
                    <div class="wrapTable"><div class="row"><span>Tên khác </span> 
                    </div>
                    <div class="content_row"><span><?php echo $rs["tenphim"] ?> </span></div></div>


                    <div class="wrapTable"><div class="row"><span>Thể loại </span>
                    </div>
                    <div class="content_row"><span><?php echo $rs["theloai"] ?> </span></div></div>


                   <div class="wrapTable"> <div class="row"><span>Trạng Thái</span> 
                   </div>
                   <div class="content_row"><span><?=$rs["status"]==0 ? 'Đang tiến hành':'Đã hoàn thành' ?></span></div></div>

                   <div class="wrapTable">
                    <div class="row"><span>Điểm</span> 
                      </div>
                      <div class="content_row"> <span><?php echo $rs["danhgia"] ?> </span></div></div>

                    <div class="wrapTable">
                        <div class="row"><span>Phát hành</span> 
                        </div>
                        <div class="content_row">
                            <span>2022</span>
                        </div>
                    </div>
                    <div class="wrapTable">
                        <div class="row"><span>Thời lượng</span> 
                        </div>
                        <div class="content_row">
                        <span> <?php echo $rs["sotap"] ?> </span></div>
                        </div>
                    </div>
                    
                </div>
    </div>
    </div>

    <div class="action_user">
        <span class="playicon icon">Iconplay</span>
        <span class="gimicon icon">GimIcon</span>
        <span class="rateicon icon">rateIcon</span>
    </div>
    <div class="contentFilm">
        <div class="listfilm">
            <div class="wraplistfilm">
                <div class="tde tieude"><h3>Danh sách tập </h3></div>
            <div class="list">
                <?php for($i = 1 ; $i<=$rs["sotap"];$i++ ) {     ?>
                     <span><?php echo $i?></span>
                 <?php 
                
                } ?>
            </div>
            </div>
            
        </div>
        <div class="descripstionfilm">
          <div class="content_description">
            <div class="tde tieude"><h3>Nội dung</h3></div>
            <div class="descripstion">
                <p>
                <?php echo $rs["noidung"] ?> 
                </p>
            </div>
          </div>
        </div>
    </div>
    <?php    } ?>
    <div class="comment_user">

    </div>
</div>

<div class="footer">
    <div class="footerLogo">
     <div class="imgLogofooter">
         <img src="assets/img/logowebsite.png" alt="#">
     </div>
        
    </div>
    <div class="footerContact">
     <div class="imgContact">
     <h3>DevBy:Chien @2020</h3>
    </div>
    </div>
    
    </div>
    
<script src=""></script>
</body>

</html>