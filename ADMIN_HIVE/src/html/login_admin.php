<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HIVE</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/HIVE-logo_Tbg.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/HIVE-logo_Tbg.png" width="120" alt="">
                </a>
                <h1 style="font-weight:bold" class="text-center">HIVE</h1>
                <p class="text-center">Here we go comrades!</p>
                <?php
                  if (isset($_POST['loginBtn'])) {
                    session_start();

                    $getAdminID = $_POST['adminID'];
                    $getPassword = $_POST['password'];

                    $con = mysqli_connect("localhost", "root", "", "hive");

                    $query = "SELECT AdminID, Password FROM admin WHERE AdminID = '$getAdminID'";

                    $result = mysqli_query($con, $query);

                    if ($row = mysqli_fetch_assoc($result)) {
                      $adminID = $row['AdminID'];
                      $password = $row['Password'];

                      if ($getAdminID == $adminID && md5($getPassword) === $password) {
                        $_SESSION['adminID'] = $adminID;
                        header("Location: admin-home.php");
                        exit();
                      } else {
                        echo '<p class="text-center text-danger">Invalid username or password. Please try again.</p>';
                      }
                    } else {
                      echo '<p class="text-center text-danger">Invalid username or password. Please try again.</p>';
                    }

                    mysqli_close($con);
                  }
                ?>
                <form method="post">
                  <div class="mb-3">
                    <label for="adminID" class="form-label">Admin ID</label>
                    <input type="text" class="form-control" id="adminID" aria-describedby="textHelp"
                      name="adminID">
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <button type="submit" name="loginBtn"
                    class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Log in</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
   
