<?php
  //passing adminID (loggedin)
  session_start();
  if(isset($_SESSION['adminID'])) {
    $adminID = $_SESSION['adminID'];
    include("config.php");
    //Find Total Number of Members
    $sql = "SELECT COUNT(*) AS MemberCount FROM member";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $memberCount = $data['MemberCount'];

    //Find Total Number of Admins
    $sql = "SELECT COUNT(*) AS AdminCount FROM admin";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $adminCount = $data['AdminCount'];

    //Find Number of Members Registered Last Week
    $sql = "SELECT COUNT(*) AS MemRegLstWkCount FROM member WHERE
            CreatedDate BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 6 DAY) AND
            DATE_SUB(CURRENT_DATE(), INTERVAL -1 DAY)";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $memberRegLstWkCount = $data['MemRegLstWkCount'];

    //Find Number of Guests Visited Last Week
    $sql = "SELECT COUNT(*) AS GuestVisitCount FROM guest_visit WHERE
            VisitDate BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 6 DAY) AND
            DATE_SUB(CURRENT_DATE(), INTERVAL -1 DAY)";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $guestVisitCount = $data['GuestVisitCount'];
  }
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HIVE ADMIN</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/HIVE-logo_Tbg.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body class="grey-background">
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
              <a class="sidebar-link" href="./admin-home.php.php" aria-expanded="false">
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
                <i class="ti ti-layout-dashboard"></i>
                <span class="d-none d-lg-inline">Dashboard</span>
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

      <div class="container-fluid grey-background">
        <!--  Row 1 -->
        <!-- Four Boxes of Information about Members & Admin -->
        <div class="row g-4 mb-1">
          <div class="col-md-3">
            <div class="card">
              <div class="card-body dashboardcard">
                <i class="bi bi-people-fill card-body-icon"></i>
                <?php echo "<h1>$memberCount</h1>" ?>
                <h5 class="card-title">Number of Members</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body dashboardcard">
                <i class="bi bi-person-bounding-box card-body-icon"></i>
                <?php echo "<h1>$adminCount</h1>" ?>
                <h5 class="card-title">Number of Admins</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body dashboardcard">
                <i class="bi bi-box-arrow-right card-body-icon"></i>
                <?php echo "<h1>$guestVisitCount</h1>" ?>
                <h5 class="card-title">Guests Visited <br>Last Week</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body dashboardcard">
                <i class="bi bi-person-plus-fill card-body-icon"></i>
                <?php echo "<h1>$memberRegLstWkCount</h1>" ?>
                <h5 class="card-title">Members Registered <br>Last Week</h5>
              </div>
            </div>
          </div>
        </div>
        <!-- Row 2 -->
        <!-- Line Graph for Number of Visitor Over Time -->
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Number of Visitors Over Time</h5>
                  </div>
                </div>
                <div id="visitChart"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Row 3 -->
        <!-- Information about New Members -->
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <div class="mb-4">
                  <h5 class="card-title fw-semibold">New Users</h5>
                </div>
                <ul class="timeline-widget mb-0 position-relative mb-n5">
                  <?php
                    //Select 5 Latest Created Members
                    $sql = "SELECT * FROM member ORDER BY CreatedDate DESC LIMIT 5";
                    $result = mysqli_query($con, $sql);
                    if (!$result) {
                      die("Query Error: " . mysqli_error($con));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                      $createdDateTime = $row['CreatedDate'];
                      $createdDate = date('Y-m-d', strtotime($createdDateTime));
                      $createdTime = date('H:i:s', strtotime($createdDateTime));
                      $userName = $row['Name'];

                      echo '
                        <li class="timeline-item d-flex position-relative overflow-hidden">
                          <div class="timeline-time text-dark flex-shrink-0 text-end">' . $createdDate . '</div>
                          <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                            <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                          </div>
                          <div class="timeline-desc fs-3 text-dark mt-n1">' . $userName . '</div>
                        </li>
                      ';
                    }
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-2">New Users Details</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">ID</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Email</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Role</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        //Select 5 Latest Created Members
                        $sql = "SELECT * FROM member ORDER BY CreatedDate DESC LIMIT 5";
                        $result = mysqli_query($con, $sql);
                        if (!$result) {
                          die("Query Error: " . mysqli_error($con));
                        }

                        while ($row = mysqli_fetch_assoc($result)) {
                          $userID = $row['MemberID'];
                          $userName = $row['Name'];
                          $userEmail = $row['Email'];

                          echo '
                            <tr>
                              <td class="border-bottom-0"><h6 class="fw-semibold mb-0">' . $userID . '</h6></td>
                              <td class="border-bottom-0">
                                  <h6 class="fw-semibold mb-1">' . $userName . '</h6>
                              </td>
                              <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">' . $userEmail . '</p>
                              </td>
                              <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                  <span class="badge bg-hive rounded-3 fw-semibold">Member</span>
                                </div>
                              </td>
                            </tr>
                          ';
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
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
  <script>
    $(document).ready(function() {
      var dates = [];
      var counts = [];

      //Fetch the Dates and Visitor Counts for Each Date
      $.ajax({
        url: 'fetch-visit-data.php',
        type: "get",
        dataType: "json",
        success: function(response) {
          for(var i = 0; i < response.length; i++) {
            dates.push(response[i].visitDate);
            counts.push(response[i].visitCount);
          }
          showGraph(dates, counts);
        }
      })

      //Generate & Show Line Graph
      function showGraph(dates, counts) {
        var options = {
          chart:{
            type: 'line',
            height: 400
          },
          noData: {
              text: 'Loading...'
          },
          series: [{
            data: counts
          }],
          xaxis: {
            categories: dates
          }
        }

        var chart = new ApexCharts(document.querySelector("#visitChart"), options);
        chart.render();
      }
    });
  </script>
</body>

</html>