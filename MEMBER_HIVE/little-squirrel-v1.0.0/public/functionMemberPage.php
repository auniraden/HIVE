<?php
session_start();

// 连接数据库
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hive";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("failed connection to database " . $conn->connect_error);
}

// 处理登录请求
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["name"];
    $password = $_POST["password"];

    // 查询数据库中的用户
    $sql = "SELECT * FROM member WHERE Name = '$username' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // 验证成功，登录用户
        $user = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['memberID'] = $user['MemberID'];
        $_SESSION['username'] = $user['Name'];
        $_SESSION['email'] = $user['Email'];
        $_SESSION['password'] = $user['Password'];


        // 重定向到会员页面
        header("Location: memberPage.php");
        exit();
    } else {
        header("Location: loginPage.php");
        exit();
    }
}

// 关闭数据库连接
$conn->close();
?>