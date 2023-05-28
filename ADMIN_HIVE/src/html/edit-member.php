<?php
    include("config.php");
    $id = 0;
    $name = "";
    $email = "";
    $password = "";
    $status = 1;

    $errorMsg = "";
    $successMsg = "";

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if(!isset($_GET["id"])) {
            header("location: member-management.php");
            exit;
        }
        $id = $_GET["id"];

        $sql = "SELECT * FROM member WHERE MemberID = '$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            header("location: member-management.php");
            exit;
        }

        $name = $row['Name'];
        $email = $row['Email'];
        $password = $row['Password'];
        $status = $row['Status'];
    }
    else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $status = $_POST['status'];

        do {
            //If Submission has Empty Field,
            //Show Error Message Box
            if (empty($id) || empty($name) || empty($email) || empty($password)) {
                $errorMsg = "All the Fields Are Required!";
                break;
            }

            $sql = "UPDATE member ".
                    "SET Name = '$name', Email = '$email', Password = '$password' ,status = $status " .
                    "WHERE MemberID = '$id'";
            $result = mysqli_query($con, $sql);
            //If Database / Query Error,
            //Show Error Message Box
            if (!$result) {
                $errorMsg = "Query Error: " . mysqli_error($con);
                break;
            }
            //If Member Edited Successfully,
            //Show Success Message Box
            $successMsg = "Member Updated Successfully!";

            header("location: member-management.php");
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
                <i class="ti ti-users"></i>
                <span class="d-none d-lg-inline">Member Management</span>
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
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="card w-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title fw-semibold mb-4">Edit Member</h5>
                </div>

                <?php
                    //Error Message Box
                    if (!empty($errorMsg)) {
                        echo'
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>' . $errorMsg . '</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        ';
                    }
                    //Success Message Box
                    if (!empty($successMsg)) {
                      echo'
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>' . $successMsg . '</strong>
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
                        <label class="col-sm-3 col-form-label" for="name">Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="name">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="password">Password</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="status">Status</label>
                        <div class="col-sm-6 mt-2">
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="status" value="1" <?php echo $status==1?'checked':''; ?>>
                                <label for="1">Active</label><br>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" name="status" value="0" <?php echo $status==0?'checked':''; ?>>
                                <label for="0">Inactive</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a class="btn btn-outline-primary" href="member-management.php" role="button">Cancel</a>
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