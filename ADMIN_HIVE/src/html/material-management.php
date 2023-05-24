<?php
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if(!isset($_GET["id"]) || !isset($_GET["name"])) {
            header("location: course-management.php");
            exit;
        }
        $courseID = $_GET["id"];
        $courseName = $_GET["name"];
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

<!-- Delete Pop-up Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Do you really want to delete this item?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary delete-confirm">Confirm Delete</button>
      </div>
    </div>
  </div>
</div>

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
                <i class="ti ti-book"></i>
                <span class="d-none d-lg-inline">Material Management</span>
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
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="card w-100">
            <div class="card-body p-4">
              <div class="d-flex justify-content-between">
                <h5 class="card-title fw-semibold mb-4">Materials of <?php echo $courseName ?></h5>
                <a href="add-material.php?id=<?php echo $courseID ?>&name=<?php echo $courseName ?>" class="btn btn-primary btn-lg">Add Material</a>
              </div>
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">ID</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Material Name</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Action</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include("config.php");
                    $sql = "SELECT * FROM material WHERE CourseID = '$courseID'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    if (!$row) {
                        echo '
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">-</h6></td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">-</h6>
                                </td>
                                <td>
                                    -
                                </td>
                            </tr>
                        ';
                    }
                    else {
                        do
                        {
                        echo '
                            <tr>
                                <td class="border-bottom-0"><h6 class="fw-semibold mb-0">' . $row["MaterialID"] . '</h6></td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">' . $row["MaterialName"] . '</h6>
                                </td>
                                <td>
                                    <a href="edit-material.php?id=' . $row["MaterialID"] . '">
                                      <i class="ti ti-ballpen admin-to-user-action-icon" data-bs-toggle="tooltip" title="Edit"></i>
                                    </a>
                                    <a href="show-chapter.php?id=' . $row["MaterialID"] . '">
                                      <i class="ti ti-eye admin-to-user-action-icon" data-bs-toggle="tooltip" title="View Material Page"></i>
                                    </a>
                                    <a href="#" class="mat-delete" data-id="' . $row["MaterialID"] . '" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                      <i class="ti ti-trash admin-to-user-action-icon" data-bs-toggle="tooltip" title="Delete"></i>
                                    </a>
                                </td>
                            </tr>
                        ';
                        } while ($row = mysqli_fetch_assoc($result));
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
  <script>
    $(document).ready(function() {
      $('.mat-delete').on('click', function() {
        var item = this;
        var deleteID = $(this).data('id');
        $('.delete-confirm').on('click', function(e) {
          $.ajax({
            url: 'delete-material.php',
            type: 'POST',
            data: {'id': deleteID,},
            success: function(response) {
              $(item).closest('tr').css('background', 'tomato');
              $(item).closest('tr').fadeOut(800, function(){
                $(this).remove();
              });
            }
          });
          $('#delete-modal').modal('hide');
        });
      });
    });
  </script>
  <script>
    // For Tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  </script>
</body>

</html>