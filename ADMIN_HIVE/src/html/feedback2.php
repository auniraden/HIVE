<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HIVE</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos//HIVE-logo_Tbg.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
                <span class="d-none d-lg-inline">User Feedback</span>
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
              <h1>FEEDBACK</h1>
              
              <div class="feedback-statistics">
                <h2>Feedback Statistics</h2>
                <div class="row">
                    <?php    
                    $con = mysqli_connect("localhost", "root", "", "hive");
                    
                    $sql = "SELECT COUNT(*) AS Total FROM `guest-feedback`";
                    $query = "SELECT ROUND(AVG(Rating), 1) AS AvgRating FROM `guest-feedback`";
                    
                    $result = mysqli_query($con, $sql);
                    $data = mysqli_fetch_assoc($result);
                    $total = $data['Total'];
                    
                    $result = mysqli_query($con, $query);
                    $data = mysqli_fetch_assoc($result);
                    $avgRating = $data['AvgRating'];

                    echo '<div class="col-md-6">';
                    echo '    <div class="card">';
                    echo '        <div class="card-body">';
                    echo '            <h3>Total Feedbacks</h3>';
                    echo '            <p>' .$total. '</p>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                    
                    echo '<div class="col-md-6">';
                    echo '    <div class="card">';
                    echo '        <div class="card-body">';
                    echo '            <h3>Average Rating</h3>';
                    echo '            <p>'.$avgRating.'</p>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                    ?>
                </div>
            </div>


              <!-- Manage feedback -->
          
              <div class="feedback-management">
                  <h2>Non-Member's Feedback</h2>
                  <div class="mb-3">
                    <label for="feedbackType" class="form-label">Feedback Type:</label>
                    <select class="form-select" id="feedbackType" onchange="location.href = this.value;">
                        <option value="feedback2.php">Non-Member Feedback</option>
                        <option value="feedback.php">Member Feedback</option>
                    </select>
                  </div>
                  <table class="table table-striped" id="feedbackTable">
                  <thead>
                    <tr>
                      <th><a href="?sort=feedbackID">Feedback ID</a></th>
                      <th><a href="?sort=feedback">Feedback</a></th>
                      <th><a href="?sort=date">Date</a></th>
                      <th><a href="?sort=rating">Rating</a></th>
                    </tr>
                  </thead>
                    <tbody>
                      <?php
                      $con = mysqli_connect("localhost", "root", "", "hive");
                      // Get the sort parameter from the query string, by default it goes with empty string.
                      $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

                      // Construct the SQL query with the sorting condition
                      $sql = "SELECT guestFeedbackID, Feedback, Date, Rating FROM `guest-feedback`";

                      //append the sql query following what clicked by user 
                      if ($sort == 'feedbackID') {
                          $sql .= " ORDER BY FeedbackID ASC";
                      } elseif ($sort == 'feedback') {
                          $sql .= " ORDER BY Feedback ASC";
                      } elseif ($sort == 'date') {
                          $sql .= " ORDER BY Date ASC";
                      }elseif ($sort == 'rating') {
                        $sql .= " ORDER BY Rating ASC";
                     }

                      $result = mysqli_query($con, $sql);

                      while ($row = mysqli_fetch_array($result)) {                     
                            echo '<tr>';
                            echo '<td>'.$row['guestFeedbackID'].'</td>';
                            echo '<td>'.$row['Feedback'].'</td>';
                            echo '<td>'.$row['Date'].'</td>';
                            echo '<td>'.$row['Rating'].'</td>';
                            echo '</tr>';
                      }
                      ?>
                    </tbody>
                  </table>
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