<?php
session_start();
include('accessmentFunction.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $quizID = $_GET['quizID'];
    $sql = "SELECT * FROM quizquestion WHERE quizID='$quizID';";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    $question = $data['questionContent'];
    $option1 = $data['option1'];
    $option2 = $data['option2'];
    $option3 = $data['option3'];
    $option4 = $data['option4'];
    $answer = $data['answer'];

} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $score = 0;
        $quizID = $_POST['quizID'];
        $quizAnswer1 = $_POST['quizAnswer1'];
        $quizAnswer2 = $_POST['quizAnswer2'];
        $quizAnswer3 = $_POST['quizAnswer3'];
        $quizAnswer4 = $_POST['quizAnswer4'];
        $quizAnswer5 = $_POST['quizAnswer5'];
        $question1 = $_POST['quizQuestion1'];
        $question2 = $_POST['quizQuestion2'];
        $question3 = $_POST['quizQuestion3'];
        $question4 = $_POST['quizQuestion4'];
        $question5 = $_POST['quizQuestion5'];
        if ($question1 === $quizAnswer1) {
            $score += 2;
        }
        if ($question2 === $quizAnswer2) {
            $score += 2;
        }
        if ($question3 === $quizAnswer3) {
            $score += 2;
        }
        if ($question4 === $quizAnswer4) {
            $score += 2;
        }
        if ($question5 === $quizAnswer5) {
            $score += 2;
        }
        // TEST1
        // Generate a new TakeQuizID $nextID = 1; 
        // Default value if no previous records exist 
        if ($row = mysqli_fetch_assoc($result)) 
        { $max_id = $row['max_id']; $nextID = intval(substr($max_id, 2)) + 1;
        // Extract numeric portion and increment } $takequizID = 'TQ' . str_pad($nextID, 2, '0', STR_PAD_LEFT); 
        // Insert the quiz results $sql2 = "INSERT INTO membertakequiz(TakeQuizID, Score, MemberID, QuizID) VALUES ('$takequizID', '$score', '$memberID', '$quizID');"; $result2 = mysqli_query($conn, $sql2);
        $memberID = $_SESSION['memberID'];
        $query = "SELECT MAX(TakeQuizID) AS max_id FROM membertakequiz;";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $max_id = $row['max_id'];
        $nextID = intval(substr($max_id, 2)) + 1;
        $takequizID = 'TQ' . str_pad($nextID, 2, '0', STR_PAD_LEFT); 
        $sql2 = "INSERT INTO membertakequiz(TakeQuizID, Score, MemberID, QuizID) VALUES ('$takequizID', '$score', '$memberID', '$quizID');"; 
        $result2 = mysqli_query($conn, $sql2);
        

        // Check the result of mysqli_stmt_execute()
        if ($result2) {
            header('Location:memberPage.php');
            exit();
        } else {
            header('Location:quizPage.php?quizID=Q01');
            exit();
        }
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Quiz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
</head>

<body>
    <section class="p-5">
        <div class="container">
            <h1 class="mt-5">Quiz</h1>
            <form id="quizForm" method="post">
                <div class="mt-4">
                    <?php
                    include('accessmentFunction.php');
                    $sql = "SELECT * FROM quizquestion WHERE quizID='$quizID';";
                    $result = mysqli_query($conn, $sql);
                    $score = 0;
                    $ai = 1;
                    while ($data = mysqli_fetch_assoc($result)) {
                        $question = $data['questionContent'];
                        $option1 = $data['option1'];
                        $option2 = $data['option2'];
                        $option3 = $data['option3'];
                        $option4 = $data['option4'];
                        $answer = $data['answer'];
                        $quizID = $data['QuizID'];
                        $autoQuizAnswer = "quizAnswer" . $ai;
                        $autoQuizQuestion = "quizQuestion" . $ai;
                        echo '
                            <h2>
                            ' . $question . '
                            </h2>
                        
                        <div class="form-check">
                            <input type="hidden" name="' . $autoQuizAnswer . '" value="' . $answer . '">
                            <input type="hidden" name="quizID" value="' . $quizID . '">
                            <input class="form-check-input" type="radio" name="' . $autoQuizQuestion . '" value="' . $option1 . '"
                                id="q' . $ai . 'a">
                            <label class="form-check-label" for="q' . $ai . 'a">
                                ' . $option1 . ' 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="' . $autoQuizQuestion . '" value="' . $option2 . ' "
                                id="q' . $ai . 'b">
                            <label class="form-check-label" for="q' . $ai . 'b">
                                ' . $option2 . ' 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="' . $autoQuizQuestion . '" value="' . $option3 . '"
                                id="q' . $ai . 'c">
                            <label class="form-check-label" for="q' . $ai . 'c">
                                ' . $option3 . ' 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="' . $autoQuizQuestion . '" value="' . $option4 . '"
                                id="q' . $ai . 'd">
                            <label class="form-check-label" for="q' . $ai . 'd">
                                ' . $option4 . ' 
                            </label>
                        </div>
                            ';
                        $ai++;
                    }
                    ?>


                </div>

                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>