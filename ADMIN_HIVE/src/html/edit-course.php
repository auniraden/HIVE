<?php
    include("config.php");
    $id = 0;
    $courseName = "";

    $errorMsg = "";
    $successMsg = "";

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if(!isset($_GET["id"])) {
            header("location: course-management.php");
            exit;
        }
        $id = $_GET["id"];

        $sql = "SELECT * FROM course WHERE CourseID = '$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            header("location: course-management.php");
            exit;
        }

        $courseName = $row['CourseName'];
    }
    else {
        $id = $_POST['id'];
        $courseName = $_POST['name'];

        do {
            if (empty($id) || empty($courseName)) {
                $errorMsg = "All the Fields Are Required!";
                break;
            }

            $sql = "UPDATE course ".
                    "SET CourseName = '$courseName' WHERE CourseID = '$id'";

            $result = mysqli_query($con, $sql);

            if (!$result) {
                $errorMsg = "Query Error: " . mysqli_error($con);
                break;
            }
            $successMsg = "Course Updated Successfully!";

            header("location: course-management.php");
            exit;
        }while(false);
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
          <a href="./index.php" class="text-nowrap logo-img">
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
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
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
              <a class="sidebar-link" href="./registration.html" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Registration</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./userfeedback.html" aria-expanded="false">
                <span>
                  <i class="ti ti-message-dots"></i>
                </span>
                <span class="hide-menu">User Feedback</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./generatereport.html" aria-expanded="false">
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
                <i class="ti ti-book"></i>
                <span class="d-none d-lg-inline">Course Management</span>
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

      <div class="container-fluid grey-background">
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title fw-semibold mb-4">Edit Course</h5>
                </div>

                <?php
                    if (!empty($errorMsg)) {
                        echo'
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>' . $errorMsg . '</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        ';
                    }
                ?>

                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">ID</label>
                        <div class="col-sm-6 mt-2">
                            <b><?php echo $id; ?></b>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="name">Course Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" value="<?php echo $courseName; ?>">
                        </div>
                    </div>

                    <?php
                        if (!empty($successMsg)) {
                            echo'
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>' . $successMsg . '</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    ?>

                    <div class="row mb-3">
                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a class="btn btn-outline-primary" href="course-management.php" role="button">Cancel</a>
                        </div>
                    </div>
                </form>
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