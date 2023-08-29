<?php
require "db.php";
$fullname = $_POST["fullname"];
$email = $_POST["email"];
$pass = $_POST["pass"];

$conn= connect();

// 1. Kiểm tra tk email đã có hay chưa
$sql_check = "select *  from listaccount where  email = '$email'   ";

if ($conn->query($sql_check)->num_rows>0){
    die("Email is existed!");
}
// 2. Nếu email chưa đki thì hash password
$hashed_password = password_hash($pass,PASSWORD_BCRYPT);

$sql = "insert into listaccount(fullname,email,pass) values ('$fullname','$email','$hashed_password')";
$conn->query($sql);



header("Location: listaccount.php");