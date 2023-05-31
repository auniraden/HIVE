<?php
// 启动会话
session_start();

// 连接到数据库
$conn = mysqli_connect("localhost", "username", "password", "database");

if (!$conn) {
    die("数据库连接失败：" . mysqli_connect_error());
}

// 获取用户的memberID
$memberID = $_SESSION['memberID'];

// 获取用户提交的答案
$userAnswers = $_POST['quiz'];

// 计算得分
$score = 0;

foreach ($userAnswers as $quizID => $answer) {
    // 获取正确答案
    $sql = "SELECT answer FROM quizTable WHERE quizID = '$quizID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $correctAnswer = $row['answer'];

    // 检查答案是否正确
    if ($answer == $correctAnswer) {
        $score += 2; // 答对得两分
    }
}

// 显示得分
echo "你的得分是: " . $score;

// 关闭数据库连接
mysqli_close($conn);
?>