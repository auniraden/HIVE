<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos//HIVE-logo_Tbg.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
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
          <a href="./index.html" class="text-nowrap logo-img">
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
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./member-management.html" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Member Management</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./course-management.html" aria-expanded="false">
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
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
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
              
              <!-- NEED TO WORK ON FEEDBACK TABLE -->
              <div class="feedback-statistics">
                  <h2>Feedback Statistics</h2>
                  <div class="row">
                  <div class="col-md-6">
                      <div class="card">
                      <div class="card-body">
                          <h3>Total Feedbacks</h3>
                          <p>100</p>
                      </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="card">
                      <div class="card-body">
                          <h3>Average Rating</h3>
                          <p>4.5</p>
                      </div>
                      </div>
                  </div>
                  </div>
              </div>
          

              <!-- Manage feedback -->
          
              <div class="feedback-management">
                  <h2>Manage Feedback</h2>
                  <table class="table table-striped">
                  <thead>
                    <tr>
                      <th><a href="?sort=feedbackID">Feedback ID</a></th>
                      <th><a href="?sort=feedback">Feedback</a></th>
                      <th><a href="?sort=date">Date</a></th>
                      <th><a href="?sort=memberID">Member ID</a></th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <tbody>
                      <?php
                      $con = mysqli_connect("localhost", "root", "", "hive");
                      // Get the sort parameter from the query string, by default it goes with empty string.
                      $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

                      // Construct the SQL query with the sorting condition
                      $sql = "SELECT FeedbackID, Feedback, Date, MemberID FROM feedback";

                      //append the sql query following what clicked by user 
                      if ($sort == 'feedbackID') {
                          $sql .= " ORDER BY FeedbackID ASC";
                      } elseif ($sort == 'feedback') {
                          $sql .= " ORDER BY Feedback ASC";
                      } elseif ($sort == 'date') {
                          $sql .= " ORDER BY Date ASC";
                      }elseif ($sort == 'memberID') {
                          $sql .= " ORDER BY MemberID ASC";
                      }

                      $result = mysqli_query($con, $sql);

                      while ($row = mysqli_fetch_array($result)) {
                          echo '<tr>';
                          echo '<td>'.$row['FeedbackID'].'</td>';
                          echo '<td>'.$row['Feedback'].'</td>';
                          echo '<td>'.$row['Date'].'</td>';
                          echo '<td>'.$row['MemberID'].'</td>';
                          echo '<td>';
                          echo '<button class="btn btn-primary btn-sm">Edit</button>';
                          echo '<button class="btn btn-danger btn-sm">Delete</button>';
                          echo '</td>';
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