<?php
    include('config.php');
    if(isset($_POST['id'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM course WHERE CourseID = '$id'";
        $result = mysqli_query($con, $sql);

        if($result) {
            echo "Deleted Successfully!";
        }
        else {
            echo "Failed to Delete!: " . mysqli_error($con);
        }
    }

    header("location: course-management.php");
    exit;
?>