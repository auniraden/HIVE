<?php
session_start();
$adminID = $_SESSION['adminID'];
// Delete
if (isset($_POST['delete'])) {
    $feedbackID = $_POST['feedbackID'];

    $con = mysqli_connect("localhost", "root", "", "hive");
    $sql = "DELETE FROM feedback WHERE FeedbackID = '$feedbackID'";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo'Successfully deleted!';

    header("Location: feedback.php");
    exit();
}

// get the feedback id from feedback page
if (isset($_GET['feedbackID'])) {
    $feedbackID = $_GET['feedbackID'];

    $con = mysqli_connect("localhost", "root", "", "hive");

    $query = "SELECT m.MemberID, m.Name, f.Feedback, f.Date, m.Email, f.Rating
    FROM feedback f INNER JOIN member m ON f.MemberID = m.MemberID
    WHERE f.FeedbackID = '$feedbackID'";


    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    $memberID = $row['MemberID'];
    $name = $row['Name'];
    $feedback = $row['Feedback'];
    $date = $row['Date'];
    $email = $row['Email'];
    $rating = $row['Rating'];
    mysqli_close($con);
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HIVE</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos//HIVE-logo_Tbg.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script>
        function showWindowMessage(message, redirectURL) {
            alert(message);
            window.location.href = redirectURL;
        }
    </script>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between mb-5 pt-3">
          <a href="./admin-home.php" class="text-nowrap logo-img">
            <img src="../assets/images/logos/HIVE-logo_Tbg.png" width="70" alt="Hive Logo" />
            <span style="color:gold; font-weight:bold;">HIVE</span>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link" href="./admin-home.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./member-management.php" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Member Management</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./course-management.php" aria-expanded="false">
                <span>
                  <i class="ti ti-book"></i>
                </span>
                <span class="hide-menu">Course Management</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./registration.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Registration</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./feedback.php" aria-expanded="false">
                <span>
                  <i class="ti ti-message-dots"></i>
                </span>
                <span class="hide-menu">User Feedback</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./reports.php" aria-expanded="false">
                <span>
                  <i class="ti ti-clipboard-data"></i>
                </span>
                <span class="hide-menu">Generate Report</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <!-- Icon That Toggle Side Menu When Clicked in Small Screen -->
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item nav-item-pageTitle">
              <a class="nav-link" href="#">
                <i class="ti ti-message-dots"></i>
                <span class="d-none d-lg-inline">Reply Feedback</span>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <div class="container">
            <?php

            if (isset($feedbackID)) {
              echo '<h2>Reply to Feedback</h2>';
              echo '<br>';
              echo '<p class="mb-3">Member ID: ' . $memberID . '</p>';
              echo '<p class="mb-3">Name: ' . $name . '</p>';
              echo '<p class="mb-3">Email: ' . $email . '</p>';
              echo '<p class="mb-3">Feedback: ' . $feedback . '</p>';
              echo '<p class="mb-3">Rating: ' . $rating . '</p>';
              echo '<p class="mb-3">Date: ' . $date . '</p>';
              echo '<form method="post" action="replyfeedback.php">';
              echo '<input type="hidden" name="feedbackID" value="' . $feedbackID . '">';
              echo '<div class="mb-3">
                      <label for="replyMessage" class="form-label">Reply Message:</label>
                      <textarea id="replyMessage" name="replyMessage" class="form-control" rows="4" placeholder="Enter your reply"></textarea>
                    </div>';
              echo '<button type="submit" name="reply" class="btn btn-primary mr-2">Reply</button>';
              echo '<button type="reset" class="btn btn-secondary">Reset</button>';
              echo '</form>';
            } elseif (isset($_POST['reply'])) {
              $feedbackID = $_POST['feedbackID'];
              $replyMessage = $_POST['replyMessage'];
              $message = 'Feedback has been successfully replied!';
              $redirectURL = 'feedback.php';
              
              //update status
              $con = mysqli_connect("localhost", "root", "", "hive");
              $query = "UPDATE `feedback` SET `Status`='Replied' WHERE FeedbackID = '$feedbackID'";
              mysqli_query($con, $query);
              mysqli_close($con);


              // Current date
              $dateReplied = date("Y-m-d");

              // Generate auto-incremented ReplyFeedbackID
              $con = mysqli_connect("localhost", "root", "", "hive");
              $query = "SELECT MAX(ReplyFeedbackID) AS max_id FROM reply_feedback";
              $result = mysqli_query($con, $query);
              $row = mysqli_fetch_assoc($result);
              $max_id = $row['max_id'];
              $rf_id = 'RF' . str_pad((intval(substr($max_id, 2)) + 1), 2, '0', STR_PAD_LEFT);


              //get memberID and name 
              $query = "SELECT m.MemberID, m.Name FROM feedback f INNER JOIN member m ON f.MemberID = m.MemberID
                        WHERE f.FeedbackID = '$feedbackID'";

              $result = mysqli_query($con, $query);
              $row = mysqli_fetch_assoc($result);
              $memberID = $row['MemberID'];
              $name = $row['Name'];

              // Update reply_feedback table
              $query = "INSERT INTO reply_feedback VALUES ('$rf_id', '$feedbackID', '$memberID', '$name', '$replyMessage', '$adminID', '$dateReplied')"; // Added comma after $rf_id
              mysqli_query($con, $query);
              mysqli_close($con);
              echo '<script>showWindowMessage("' . $message . '", "' . $redirectURL . '");</script>';
             }
  

            ?>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>


</body>

</html>