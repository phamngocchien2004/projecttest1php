<?php
$id = $_GET["id"];

$host = "localhost";
$dbuser = "root";
$dbpass= "";
$dbname ="registerphp";
$conn = new mysqli($host,$dbuser,$dbpass,$dbname);

$sql = "select * from listaccount where id = $id ";
$result = $conn->query($sql);
if($result ->num_rows >0){
    $new_fullname = $_POST["fullname"];
    $new_email = $_POST["email"];
    $new_pass= $_POST["pass"];

    $update_sql = "update listaccount set fullname = '$new_fullname' , email = '$new_email' , pass = '$new_pass' where id = $id";
    $conn->query($update_sql);
    header("Location: listaccount.php");
}
