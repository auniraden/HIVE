<?php
    include('config.php');
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $role = $_POST['role'];

        if($role == 'member') {
            $sql = "DELETE FROM member WHERE MemberID = '$id'";
            $result = mysqli_query($con, $sql);
        }
        else if($role == 'admin') {
            $sql = "DELETE FROM admin WHERE AdminID = '$id'";
            $result = mysqli_query($con, $sql);
        }

        if($result) {
            echo "Deleted Successfully!";
        }
        else {
            echo "Failed to Delete!: " . mysqli_error($con);
        }
    }

    header("location: member-management.php");
    exit;
?>