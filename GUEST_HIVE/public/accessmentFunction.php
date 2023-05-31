<?php

// 连接数据库
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hive";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Fail connection to database " . $conn->connect_error);
}

?>