<?php
session_start();
require ("db.php");
$conn = connect();

$email = $_POST["email"];
$pass = $_POST["pass"];

// 1. Tìm email xem có hay không

//  thông báo : Tài khoản hoặc mật khẩu không đúng
 $sql_check="select * from listaccount where email = '$email' limit 1";
 $result = $conn->query($sql_check);
 if ($result->num_rows == 0) {
     die ("Tài khoản hoặc mật khẩu không đúng");
 }
 $user = $result->fetch_assoc();
// 2. compare password

$verify = password_verify($pass,$user["pass"]);
if($verify){
    $_SESSION["auth"] = $user;
header("Location: login.php");
} else {
    die("Tài khoản hoặc mật khẩu không hợp lệ");
}

