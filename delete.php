<?php
$id = $_GET["id"];
$host = "127.0.0.1";
$dbname = "registerphp";
$dbuser = "root";
$dbpass = "";
$conn = new mysqli($host,$dbuser,$dbpass,$dbname);
if ($conn->connect_error) {
    die("Connect refused");
}
$sql = "delete from listaccount where id= $id";// 0 | 1
$result = $conn->query($sql);
header("Location: listaccount.php");