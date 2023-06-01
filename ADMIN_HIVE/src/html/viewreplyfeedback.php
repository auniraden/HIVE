<?php
session_start();
$adminID = $_SESSION['adminID'];//logged in admin

// get the feedback id from feedback page (hyperlink "replied")
if (isset($_GET['feedbackID'])) {
  $feedbackID = $_GET['feedbackID'];

  $con = mysqli_connect("localhost", "root", "", "hive");

  $query = "SELECT ReplyFeedbackID, FeedbackID, MemberID, Name, FeedbackReplied, AdminID, DateReplied
  FROM reply_feedback
  WHERE FeedbackID = '$feedbackID' AND AdminID = '$adminID'";


  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);

  if($row){
    $replyfeedbackID = $row['ReplyFeedbackID'];
    $feedbackID = $row['FeedbackID'];
    $memberID = $row['MemberID'];
    $name = $row['Name'];
    $feedbackReplied = $row['FeedbackReplied'];
    $adminID = $row['AdminID'];
    $date = $row['DateReplied'];
    mysqli_close($con);
  }else{
    echo '<script type="text/javascript">
    alert("This feedback was replied by another admin. You are not allowed to view it.");
    window.location.href = "feedback.php";
    </script>';
    exit;
  }
  
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
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
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
              echo '<h2>Feedback Replied</h2>';
              echo '<br>';
              echo '<p class="mb-3">Reply Feedback ID: ' . $replyfeedbackID . '</p>';
              echo '<p class="mb-3">Feedback ID: ' . $feedbackID . '</p>';
              echo '<p class="mb-3">Member ID: ' . $memberID . '</p>';
              echo '<p class="mb-3">Name: ' . $name . '</p>';
              echo '<p class="mb-3">Feedback Replied: ' . $feedbackReplied . '</p>';
              echo '<p class="mb-3">Admin in charged: ' . $adminID . '</p>';
              echo '<p class="mb-3">Date Replied: ' . $date . '</p>';
              echo '<form method="post" action="replyfeedback.php">';
              echo '<input type="hidden" name="feedbackID" value="' . $feedbackID . '">';
            }       
            ?>
            <div class="mt-3">
              <a href="feedback.php" class="btn btn-primary">Back</a>
            </div>
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