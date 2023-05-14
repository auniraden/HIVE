<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos//HIVE-logo_Tbg.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
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
      <h1>Reports</h1>
        <div class="row">
          <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="report-card">
                <h6>Registered user monthly</h6>
                <div id="chart1"></div>
                <div class="report-description">
                  <p>This report shows how many users registered as HIVE's member monthly</p>
                  <a href="#" class="btn btn-primary">View</a>
                </div>
              </div>
            </div> 
          </div>
          </div>

          <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="report-card">
                <h6>Completed assesment</h6>
                <div id="chart2"></div>
                <div class="report-description">
                  <p>This report shows the completed assesment that have been done by  HIVE's members</p>
                  <a href="#" class="btn btn-primary">View</a>
                </div>
              </div>
            </div>
          </div>
          </div>

          <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="report-card">
                <h6>User Progress</h6>
                <div id="chart3"></div>
                <div class="report-description">
                  <p>This report indicates the current progress of user on their assesment</p>
                  <a href="#" class="btn btn-primary">View</a>
                </div>
              </div>
            </div>
          </div>
          </div>

          <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="report-card">
                <h6>Rating feedback</h6>
                <div id="chart4"></div>
                <div class="report-description">
                  <p>This report illustrates the rating feedback given by the user.</p>
                  <a href="#" class="btn btn-primary">View</a>
                </div>
              </div>
            </div>
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

    <?php
      $con = mysqli_connect("localhost", "root", "", "hive");

      
      $query = "SELECT MONTH(RegistrationDate) AS month, COUNT(*) AS total FROM member GROUP BY MONTH(RegistrationDate) order by month ASC";
      $result = mysqli_query($con, $query);

      
      $data = [];
      $monthNames = [
        1 => 'Jan',
        2 => 'Feb',
        3 => 'Mar',
        4 => 'Apr',
        5 => 'May',
        6 => 'Jun',
        7 => 'Jul',
        8 => 'Aug',
        9 => 'Sep',
        10 => 'Oct',
        11 => 'Nov',
        12 => 'Dec'
      ];
      while ($row = mysqli_fetch_assoc($result)) {
          $data[] = [
              'month' => $monthNames[$row['month']],
              'total' => $row['total']
          ];
      }

      // Generate the chart using ApexCharts library
      echo '<script>
        const data = ' . json_encode($data) . ';
        const options = {
          chart: {
            type: "bar",
          },
          series: [{
            name: "Total",
            data: data.map(item => item.total),
          }],
          xaxis: {
            categories: data.map(item => item.month),
          },
        };

        const chart1 = new ApexCharts(document.querySelector("#chart1"), options);
        chart1.render();
      </script>';
    ?>

</body>

</html>