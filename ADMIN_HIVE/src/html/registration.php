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
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/HIVE-logo_Tbg.png" width="120" alt="">
                </a>
                <h1 style="font-weight:bold" class="text-center">HIVE</h1>
                <p class="text-center">Welcoming a new comrade!</p>
                <form method="post">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="admin_name">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="admin_email">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="admin_password">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="admin_passConfirm">
                  </div>
                  <button type="submit" name="signUpBtn" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                  <?php
                    if (isset($_POST['signUpBtn'])) {
                      $con = mysqli_connect("localhost", "root", "", "hive");

                      $admin_name = $_POST['admin_name'];
                      $admin_email = $_POST['admin_email'];
                      $admin_password = $_POST['admin_password'];
                      $admin_passConfirm = $_POST['admin_passConfirm'];

                      // Check if password and confirm password match
                      if ($admin_password !== $admin_passConfirm) {
                        echo '<script>alert("Password and Confirm Password do not match.");</script>';
                        exit; // Stop execution if passwords don't match
                      }elseif(($admin_name || $admin_email || $admin_password || $admin_passConfirm)== null){
                        echo '<script>alert("Blank entry!");</script>';
                        exit; // Stop execution if got any blank entry
                      }

                      // Generate auto-incremented admin ID
                      $query = "SELECT MAX(AdminID) AS max_id FROM admin";
                      $result = mysqli_query($con, $query);
                      $row = mysqli_fetch_assoc($result);
                      $max_id = $row['max_id'];
                      $admin_id = 'A' . str_pad((intval(substr($max_id, 1)) + 1), 2, '0', STR_PAD_LEFT);

                      $sql = "INSERT INTO admin (AdminID, Name, Email, Password) VALUES ('$admin_id','$admin_name','$admin_email','$admin_password')";

                      if (mysqli_query($con, $sql)) {
                        echo '<script>alert("Successfully signed up!");window.location.href="index.html";</script>';
                      } else {
                        echo "Error: " . mysqli_error($con);
                      }
                    }
                  ?>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="./authentication-login.html">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </script>
</body>

</html>