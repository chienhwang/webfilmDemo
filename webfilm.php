<?php 
           require_once('php/database/DB_driver.php');
           $db = new DB_driver();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Website</title>
    <link rel="stylesheet" href="assets/css/webfilm.css">
    <link rel="stylesheet" href="assets/themify-icons/themify-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="wrapper">
        <div class="Header">
            <div class="navBar">
                <div class="logo">
                    <img src="assets/img/logowebsite.png" alt="#">
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
            <div class="headerBanner">
                <img src="assets/img/headerbanner2.png" alt="#">
            </div>
        </div>
        <div class="Content">
            <div class="filmDecu">
                <div class="tag">
                    <span>Phim đề cử</span>
                </div>

                <div class="slideBar responsive"> 
                    <?php 
                     foreach ( $kq = $db->get_list_bySL() as $rs) {
                    ?>
                         <div class="contentDeCu">
                        <div class="tagTap"> <span><?php echo $rs["sotap"] ?></span></div>
                        <div class="imgFilm"> 
                        <a href="details.php?id=<?php echo $rs["id"]?>">    
                        <img src="<?php echo $rs["img"] ?>" alt="#">
                     </a>
                    </div>
                        <div class="tenfilm">
                            <h3><?php echo $rs["tenphim"] ?></h3>
                        </div>
                        </div>

                    <?php 
                     }
                    ?>
                   
                </div>
            </div>

            <div class="filmMoicapnhat">
                <div class="tagCapNhat"> <Span>Mới cập nhật</Span></div>
                <div class="contentCapNhat">
                    <?php
                     $itemPerPage = !empty($_GET['per_page']) ? $_GET['per_page'] :6;
                     $current = !empty($_GET['page']) ? $_GET['page'] :2;
                    foreach ( $result = $db->get_list_page($itemPerPage,$current) as $rs) {
                    ?>
                        <div class="itemCapnhat">
                            
                        <div class="TagRate"><span><?php echo $rs["danhgia"]?></span></div>
                        <div class="TagTap2"><?php echo $rs["sotap"]?> / <?php echo $rs["tongtap"]?></div>
                        <div class="imgCapNhat">
                             <a href="details.php?id=<?php echo $rs["id"]?>">
                             <img src="<?php echo $rs["img"]?>" alt="#">
                            </a>
                        </div>
                        <div class="tenFilmCapnhat">
                            <h3><?php echo $rs["tenphim"]?></h3>
                        </div>
                </div>
                   
            <?php
                    }
            ?>
            </div>
        </div>
        <div class="listNumpage">
        <?php 
       
        $numFilm = $db->list_Onetime()->num_rows;
        $totalPage = ceil($numFilm /$itemPerPage);
            for($num = 1; $num<= $totalPage;$num++){
                    ?>
            <?php if($num !== $current){ ?>
     
        <div class="numPage">
            <a href="?per_page=<?=$itemPerPage?>&page=<?=$num?>"><?=$num?></a>
        </div>
     
            <?php } else {?> 

                <strong><?= $num ?></strong>
                <?php }?>
        <?php  } ?>
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



    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/webfilm.js"></script>
</body>

</html>