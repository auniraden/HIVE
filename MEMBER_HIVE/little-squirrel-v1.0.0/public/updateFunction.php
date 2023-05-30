<?php
session_start();

$newname = $_POST['name'];
$newemail = $_POST['email'];
$newpassword = $_POST['password'];

// 连接到数据库
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hive";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("fail connection to database " . $conn->connect_error);
}

// 执行更新操作
$sql = "UPDATE member SET email='$newemail', password='$newpassword' WHERE name='$newname'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['username'] = $newname;
    $_SESSION['email'] = $newemail;
    $_SESSION['password'] = $newpassword;
    header("Location:memberPage.php");
} else {
    echo "failed: " . $conn->error;
}

$conn->close();
?>