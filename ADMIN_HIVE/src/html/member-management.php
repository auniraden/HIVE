<?php
  session_start();
  $adminID = $_SESSION['adminID'];
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HIVE ADMIN</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/HIVE-logo_Tbg.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="../assets/css/jquery-ui.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<!-- Delete Confirmation Pop-up Modal -->
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

      <div class="container-fluid">
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="card w-100" id="tabs">
            <ul>
              <li><a href="#tab1">Member</a></li>
              <li><a href="#tab2">Admin</a></li>
            </ul>
            <div class="card-body p-4" id="tab1">
              <div class="d-flex justify-content-between">
                <h5 class="card-title fw-semibold mb-4">Members</h5>
                <h6>Search for Member : <input type="text" id="search-member" autocomplete="off"></h6>
              </div>
              <div class="table-responsive" id="showMembers">
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
                        <h6 class="fw-semibold mb-0">Status</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Action</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="member-table">
                  <?php
                    include("config.php");
                    $sql = "SELECT * FROM member";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    if (!$result) {
                      die("Query Error: " . mysqli_error($con));
                    }
                    if (!$row) {
                      echo '
                        <tr>
                          <td class="border-bottom-0"><h6 class="fw-semibold mb-0">-</h6></td>
                          <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1">-</h6>
                          </td>
                          <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">-</p>
                          </td>
                          <td class="border-bottom-0">
                            <div class="d-flex align-items-center gap-2">
                              -
                            </div>
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
                        $memberStatus = $row["Status"];
                        $memberStatusCode;
                        if($memberStatus) {
                          $memberStatusCode = '<span class="badge bg-primary rounded-3 fw-semibold">Active</span>';
                        }
                        else {
                          $memberStatusCode = '<span class="badge bg-danger rounded-3 fw-semibold">Inactive</span>';
                        }

                        echo '
                          <tr>
                            <td class="border-bottom-0"><h6 class="fw-semibold mb-0">' . $row["MemberID"] . '</h6></td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">' . $row["Name"] . '</h6>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">' . $row["Email"] . '</p>
                            </td>
                            <td class="border-bottom-0">
                              <div class="d-flex align-items-center gap-2">
                                ' . $memberStatusCode . '
                              </div>
                            </td>
                            <td>
                              <a href="edit-member.php?id=' . $row["MemberID"] . '">
                                <i class="ti ti-ballpen admin-to-user-action-icon" data-bs-toggle="tooltip" title="Edit"></i>
                              </a>
                              <a href="#" class="member-delete" data-id="' . $row["MemberID"] . '" data-bs-toggle="modal" data-bs-target="#delete-modal">
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
            <div class="card-body p-4" id="tab2">
              <div class="d-flex justify-content-between">
                <h5 class="card-title fw-semibold mb-4">Admins</h5>
              </div>
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
                        <h6 class="fw-semibold mb-0">Action</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include("config.php");
                    $sql = "SELECT * FROM admin";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    if (!$result) {
                      die("Query Error: " . mysqli_error($con));
                    }
                    if (!$row) {
                      echo '
                        <tr>
                          <td class="border-bottom-0"><h6 class="fw-semibold mb-0">-</h6></td>
                          <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1">-</h6>
                          </td>
                          <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">-</p>
                          </td>
                          <td class="border-bottom-0">
                            <div class="d-flex align-items-center gap-2">
                              -
                            </div>
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
                            <td class="border-bottom-0"><h6 class="fw-semibold mb-0">' . $row["AdminID"] . '</h6></td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">' . $row["Name"] . '</h6>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">' . $row["Email"] . '</p>
                            </td>
                        ';
                        if ($row["AdminID"] == $adminID) {
                          echo '
                            <td>
                              <i class="ti ti-trash admin-to-user-action-icon" data-bs-toggle="tooltip" title="You Cannot Delete Your Own Account!"></i>
                            </td>
                          </tr>
                          ';
                        }
                        else {
                          echo '
                            <td>
                              <a href="#" class="admin-delete" data-id="' . $row["AdminID"] . '" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                <i class="ti ti-trash admin-to-user-action-icon" data-bs-toggle="tooltip" title="Delete"></i>
                              </a>
                            </td>
                          </tr>
                          ';
                        }
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
  <script src="../assets/libs/jquery/dist/jquery-ui.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>

  <script>
    $(document).ready(function() {
      $("#tabs").tabs();

      //When Member Delete Button / Icon is Clicked
      $('.member-delete').on('click', function() {
        var item = this;
        var deleteID = $(this).data('id');
        //When Member Delete Confirmation Button is Clicked
        $('.delete-confirm').on('click', function(e) {
          $.ajax({
            url: 'delete-member.php',
            type: 'POST',
            data: {
              'id': deleteID,
              'role': "member"
            },
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

      //When Admin Delete Button / Icon is Clicked
      $('.admin-delete').on('click', function() {
        var item = this;
        var deleteID = $(this).data('id');
        //When Admin Delete Confirmation Button is Clicked
        $('.delete-confirm').on('click', function(e) {
          $.ajax({
            url: 'delete-member.php',
            type: 'POST',
            data: {
              'id': deleteID,
              'role': "admin"
            },
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

      //When Admin Use the Search Box
      $('#search-member').on("keyup", function() {
        var searchInput = $(this).val();
        $.ajax({
          url: 'search-member.php',
          method: 'GET',
          data: {'search': searchInput},
          success: function(response) {
            $('#member-table').html(response);
          }
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