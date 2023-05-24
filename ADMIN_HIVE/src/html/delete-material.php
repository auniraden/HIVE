<?php
    include('config.php');
    if(isset($_POST['id'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM material WHERE MaterialID = '$id'";
        $result = mysqli_query($con, $sql);

        if($result) {
            echo "Deleted Successfully!";
        }
        else {
            echo "Failed to Delete!: " . mysqli_error($con);
        }
    }
    exit;
?>