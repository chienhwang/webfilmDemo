<?php

$conn = mysqli_connect('localhost', 'root', '', 'webfilm')
 or die ('Lỗi kết nối'); mysqli_set_charset($conn, "utf8");

// Dùng isset để kiểm tra Form
if(isset($_POST['reg'])){
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);


if (empty($username)) {
array_push($errors, "Username is required"); 
}
if (empty($email)) {
array_push($errors, "Email is required"); 
}
if (empty($password)) {
array_push($errors, "Two password do not match"); 
}

// Kiểm tra username hoặc email có bị trùng hay không
$sql1 = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";

// Thực thi câu truy vấn
$result = mysqli_query($conn, $sql1);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($result) > 0)
{
echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="register.php";</script>';

// Dừng chương trình
die ();
}
else {
    $time = date("d/m/Y");
$sql = "INSERT INTO `users` (`id`, `username`, `password`, `email`, `phanquyen`, `status`, `create_date`) VALUES (NULL, '$username', MD5('$password'), '$email', '1', '1','$time');";

if (mysqli_query($conn, $sql)){
    echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="login.php";</script>';
echo "Tên đăng nhập: ".$_POST['username']."<br/>";
echo "Mật khẩu: " .$_POST['password']."<br/>";
echo "Email đăng nhập: ".$_POST['email']."<br/>";

}
else {
echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="./register.php";</script>';
}
}
}
?>