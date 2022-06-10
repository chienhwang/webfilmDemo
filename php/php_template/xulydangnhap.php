<?php
//Khai báo sử dụng session
session_start();
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
if (isset($_POST['login']))
{
   
//Kết nối tới database
include('./php/database/connectDB.php');
  
//Lấy dữ liệu nhập vào
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
  

if (!$username || !$password) {
echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. ";


exit;
}
  

$password = md5($password);
  
//Kiểm tra tên đăng nhập có tồn tại không
$query = "SELECT username, password FROM users WHERE username='$username'";

$result = mysqli_query($con, $query) or die( mysqli_error($con));

if (!$result) {
echo "Tên đăng nhập hoặc mật khẩu không đúng!";
} else {
echo "Đăng nhập thành công!";
}
  
//Lấy mật khẩu trong database ra
$row = mysqli_fetch_array($result);
  
//So sánh 
if ($password != $row['password']) {
echo "<script language='javascript'>alert('Bị trùng tên hoặc chưa nhập tên!') </script>. <a href='javascript: history.go(-1)'>Trở lại</a>";
exit;
}
  
//Lưu tên đăng nhập
$_SESSION['username'] = $username;
echo '<script language="javascript">alert("Đăng nhập thành công!"); window.location="webfilm.php";</script>';
die();
$connect->close();
}
?>