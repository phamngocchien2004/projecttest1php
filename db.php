<?php
function connect() {
    $host = "127.0.0.1";
    $dbname = "registerphp";
    $dbuser = "root";
    $dbpass = "";
    $conn = new mysqli($host,$dbuser,$dbpass,$dbname);
    if ($conn->connect_error) {
        die("Connect refused");
    }
    return $conn;
}