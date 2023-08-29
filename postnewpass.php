<?php
require ("db.php");
session_start();
$conn = connect();
$user = isset($_SESSION["auth"])?$_SESSION["auth"]:null;

$email = $user["email"];
$pass = $_POST["pass"];
$newpass = $_POST["newpass"];

$sql = "select * from listaccount where email = '$email' ";
$result = $conn->query($sql);
if ($result->num_rows >0) {
    if ( $verify = password_verify($pass,$user["pass"])
    ) {
        $new_pass = password_hash($newpass,PASSWORD_BCRYPT);
        $update_pass = "update listaccount set  pass = '$new_pass' where email = '$email'";
        $conn->query($update_pass);
        header("Location: login.php");
    } else {
        die("password k chính xác");
    }
}