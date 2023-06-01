<?php
session_start();

$conn = mysqli_connect("localhost", "username", "password", "database");

if (!$conn) {
    die("Failed connected to db" . mysqli_connect_error());
}

$memberID = $_SESSION['memberID'];

$userAnswers = $_POST['quiz'];

$score = 0;

foreach ($userAnswers as $quizID => $answer) {
    $sql = "SELECT answer FROM quizTable WHERE quizID = '$quizID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $correctAnswer = $row['answer'];

    if ($answer == $correctAnswer) {
        $score += 2;
    }
}

echo "score: " . $score;

mysqli_close($conn);
?>