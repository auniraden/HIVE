<?php
session_start();
include('accessmentFunction.php');

// 检查用户是否已登录
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // 用户已登录
  $memberID = $_SESSION['memberID'];
  $Name = $_SESSION['username'];
  $password = $_SESSION['password'];
  $email = $_SESSION['email'];

} else {
  // 用户未登录
  header("Location:loginPage.php");
}

?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>Hive | Member page</title>

  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png" />
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico" />
  <link rel="manifest" href="assets/img/favicons/manifest.json" />
  <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />

  <meta name="theme-color" content="#ffffff" />

  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link href="assets/css/theme.css" rel="stylesheet" />
</head>

<body>
  <main>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top py-3 d-block"
      data-navbar-on-scroll="data-navbar-on-scroll">
      <div style="margin-bottom:4%; height:10px;" class="container"><a class="navbar-brand" href="index.php"><img
            src="assets/img/gallery/HIVE-logo-updated-Guest.png" height="70" alt="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
            <li class="nav-item px-2"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
            <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="contribute.php">Contribute</a></li>
          </ul><a class="btn btn-primary order-1 order-lg-0" href="sign_up.php">Sign Up</a>
          <form class="d-flex my-3 d-block d-lg-none">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-primary" type="submit">Search</button>
          </form>
          <div class="dropdown d-none d-lg-block">
            <button class="btn btn-outline-light ms-2" id="dropdownMenuButton1" type="submit" data-bs-toggle="dropdown"
              aria-expanded="false"><i class="fas fa-search text-800"></i></button>
            <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton1" style="top:55px">
              <form>
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
              </form>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!--Main content-->
    <!--A Header Section show User Details-->
    <section class="text-white" style="background-color: rgb(124, 86, 67)">
      <div class="container my-lg-n8">
        <div class="row justify-content-center">
          <div class="col-lg-3 my-3 py-lg-3 align-self-center">
            <div class="text-center">
              <img src="assets/img/gallery/profile_picture.gif" alt="Profile Picture"
                class="img-thumbnail rounded-circle max-vh-25 max-vh-lg-100" />
            </div>
          </div>
          <div class="col-lg-3 my-lg-5 py-lg-5 text-center text-lg-start">
            <h1 class="text-white">
              <?php echo $Name; ?>
            </h1>
            <p>
              <?php echo $email; ?>
            </p>
          </div>
        </div>
      </div>
    </section>
    <!--Sub Menu Tab-->
    <div class="container-fluid">
      <ul class="nav nav-tabs justify-content-center mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
            role="tab" aria-controls="home" aria-selected="true">
            Home
          </button>
        </li>

        <li class="nav-item" role="presentation">
          <button class="nav-link" id="assessment-tab" data-bs-toggle="tab" data-bs-target="#assessment" type="button"
            role="tab" aria-controls="assessment" aria-selected="false">
            Learning
          </button>
        </li>

        <li class="nav-item" role="presentation">
          <button class="nav-link" id="cert-tab" data-bs-toggle="tab" data-bs-target="#cert" type="button" role="tab"
            aria-controls="cert" aria-selected="false">
            Certificate
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
            role="tab" aria-controls="profile" aria-selected="false">
            Profile
          </button>
        </li>
      </ul>
    </div>
    <!--Main content-->
    <!--Connect to content in each tab-->
    <div class="tab-content" id="myTabContent">
      <!--Member Home Page-->
      <?php
      $memberID = $_SESSION['memberID'];
      $sql = "SELECT * FROM membertakequiz WHERE quizID='$memberID';";
      $result = mysqli_query($conn, $sql);
      $data = mysqli_fetch_assoc($result);
      $sql2 = "SELECT COUNT(TakeQuizID) AS complete FROM membertakequiz WHERE MemberID='$memberID';";
      $result2 = mysqli_query($conn, $sql2);
      $complete = 0;
      $score = 0;
      if ($data !== null && isset($data['Score'])) {
        $score = intval($data['Score']);
      }
      // Check if the query was successful
      if ($result2) {
        // Fetch the count value
        $row = mysqli_fetch_assoc($result2);
        $complete = $row['complete'];
      } else {
        // Display an error message if the query failed
        echo "Error executing query: " . mysqli_error($conn);
      }
      $cert = $complete;

      ?>
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <section class="p-5 bg-200">
          <div class="container">
            <div class="row justify-content-center pb-5">
              <div class="text-center pb-4">
                <h1>Overview</h1>
              </div>
              <div class="col-lg-3">
                <div class="card border-0">
                  <div class="card-header border-0 bg-white">
                    <h5><i class="bi bi-check-circle pe-2"></i> Complete</h5>
                  </div>
                  <div class="card-body">
                    <h1 class="border-bottom border-success">
                      <?php echo $complete ?>
                    </h1>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card border-0">
                  <div class="card-header border-0 bg-white">
                    <h5>
                      <i class="bi bi-bookmark-star pe-2"></i> Certificate
                    </h5>
                  </div>
                  <div class="card-body">
                    <h1 class="border-bottom border-info">
                      <?php echo $cert ?>
                    </h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--Member Home Page End-->
      <!--Member Profile Start-->
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <section class="mt-n3">
          <div class="container pb-5">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">My Profile</h5>
                  </div>
                  <div class="card-body">
                    <form id="myForm" method="post" action="updateFunction.php">
                      <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $Name; ?>" />
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                          value="<?php echo $email; ?>" />
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="password" name="password"
                            value="<?php echo $password; ?>" />
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">
                        Save Changes
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <form class="d-flex justify-content-center pb-5" action="logout.php" method="POST">
          <a class="btn btn-danger" href="loginPage.php">LogOut</a>
        </form>
      </div>
      <!--Certificate Part-->
      <div class="tab-pane fade" id="cert" role="tabpanel" aria-labelledby="cert-tab">
        <div class="container pb-5">
          <h1 class="text-center my-4">Certificate of Completion</h1>
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="card-title">English Language Course</h5>
            </div>
            <div class="card-body">
              <?php
              $sql = "SELECT COUNT(QuizID) as id_count FROM membertakequiz WHERE MemberID='$memberID';";
              $result = mysqli_query($conn, $sql);
              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $idCount = $row['id_count'];

                // Check if the count is greater than or equal to 4
                if ($idCount >= 4) {
                  // Display the image
                  echo '<div id="qrcode-container"></div>';
                } else {
                  // Hide the image
                  echo '<div style="display: none;"></div>';
                }
              } else {
                // Error handling
                echo "Error: " . mysqli_error($connection);
              }
              ?>
              <p class="card-text">The certificates</p>

              <h3 class="text-center mb-4">
              </h3>
              <p class="card-text">
                For successfully completing the English Language Course with a
                score of 95%.
              </p>
              <p class="card-text">Date: January 1, 2023</p>
            </div>
          </div>
        </div>
      </div>

      <!--Learning Part-->
      <div class="tab-pane fade" id="assessment" role="tabpanel" aria-labelledby="assessment-tab">
        <div class="container pb-5">
          <h1 class="text-center my-4">Learning</h1>
          <div class="row">
            <?php
            $sql = "SELECT * FROM material;";
            $result = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_assoc($result)) {
              $materialName = $data['MaterialName'];
              $materialID = $data['MaterialID'];
              echo ' 
              <div class="col-md-6">
              <div class="card mb-4">
                <div class="card-header">
                  <h5 class="card-title">' . $materialName . '</h5>
                </div>
                <div class="card-body">
                  <form action="assessmentPage.php" method="post">
                    <button class="btn btn-primary" type="submit" name="materialID" value="' . $materialID . '">Start Learning</button>
                  </form>
                </div>
              </div>
            </div>
            ';
            }
            ?>

          </div>
        </div>
        <!--Score-->
        <div class="container pb-5">
          <h1 class="text-center my-4">Score</h1>
          <div class="row">
            <?php

            $sql = "SELECT * FROM membertakequiz WHERE MemberID='$memberID';";
            $result = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_assoc($result)) {
              $score = $data['Score'];
              $quizID = $data['QuizID'];
              if ($quizID == "Q01") {
                $quizTitle = "Quiz-1";
              }
              if ($quizID == "Q02") {
                $quizTitle = "Quiz-2";
              }
              if ($quizID == "Q03") {
                $quizTitle = "Quiz-3";
              }
              if ($quizID == "Q04") {
                $quizTitle = "Quiz-4";
              }
              echo ' 
              <div class="col-md-6">
              <div class="card mb-4">
                <div class="card-header">
                  <h5 class="card-title">' . $quizTitle . '</h5>
                </div>
                <div class="card-body">
                  <h3 class="">' . $score . ' / 10</h3>
                </div>
              </div>
            </div>
            ';
            }
            ?>

          </div>
        </div>
        <!--Quiz Part-->
        <div class="container pb-5">
          <h1 class="text-center my-4">Quiz</h1>
          <div class="row">
            <?php

            $sql = "SELECT * FROM quiz;";
            $result = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_assoc($result)) {
              $quizName = $data['QuizName'];
              $quizID = $data['QuizID'];

              echo ' 
              <div class="col-md-6">
              <div class="card mb-4">
                <div class="card-header">
                  <h5 class="card-title">' . $quizName . '</h5>
                </div>
                <div class="card-body">
                  <form action="quizPage.php" method="get">
                    <button class="btn btn-primary" type="submit" name="quizID" value="' . $quizID . '">Start Quiz</button>
                  </form>
                </div>
              </div>
            </div>
            ';
            }
            ?>

          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    <section class="bg-secondary">

      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-lg-6 mb-4 order-0 order-sm-0"><a class="text-decoration-none"
              href="index.php"><img src="assets/img/gallery/HIVE-logo_Tbg.png" height="150" /></a>
            <iframe style="margin-right: 70%;" class="text-light"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.1466274461595!2d101.7005614!3d3.0554056999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4abb795025d9%3A0x1c37182a714ba968!2sAsia%20Pacific%20University%20of%20Technology%20%26%20Innovation%20(APU)!5e0!3m2!1sen!2smy!4v1684836238184!5m2!1sen!2smy"
              width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              alt="Asia Pacific University of Innovation & Technology"></iframe>
            <p class="text-light"> <i class="fas fa-envelope me-3"> </i><a class="text-light"
                href="mailto:buzzbuzz.HIVE@gmail.com?subject=Hello&body=Good day%20HIVE,">buzzbuzz.HIVE@gmail.com</a>
            </p>
            <p class="text-light"> <i class="fas fa-phone-alt me-3"></i><a class="text-light"
                href="tel:1-800-800-2299">1-800-800-2299 <--Need support?</a></p>
          </div>
          <div style="margin-top:10%;" class="col-6 col-sm-4 col-lg-2 mb-3 order-2 order-sm-1">
            <h5 class="lh-lg fw-bold mb-4 text-light font-sans-serif">Product </h5>
            <ul class="list-unstyled mb-md-4 mb-lg-0">
              <li class="lh-lg"><a class="text-200" href="about-us.html">How HIVE works</a></li>
              <li class="lh-lg"><a class="text-200" href="contribute.php">Contribute</a></li>
              <li class="lh-lg"><a class="text-200" href="help-center.html">HELP center</a></li>
              <li class="lh-lg"><a class="text-200" href="loginPage.php">Sign in</a></li>
            </ul>
          </div>
          <div style="margin-top:10%;" class="col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2">
            <h5 class="lh-lg fw-bold text-light mb-4 font-sans-serif">Company</h5>
            <ul class="list-unstyled mb-md-4 mb-lg-0">
              <li class="lh-lg"><a class="text-200" href="about-us.html">About us</a></li>
              <li class="lh-lg"><a class="text-200" href="privacy-policy.html">Privacy policy</a></li>
              <li class="lh-lg"><a class="text-200" href="guest_feedback.php">Give Feedback</a></li>
            </ul>
          </div>
          <div style="margin-top:10%;" class="col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2">
            <h5 class="lh-lg fw-bold text-light mb-4 font-sans-serif">Contact us</h5>
            <ul class="list-unstyled mb-md-4 mb-lg-0">
              <li class="lh-lg"><a class="text-200"
                  href="mailto:buzzbuzz.HIVE@gmail.com?subject=Hello&body=Good day%20HIVE,">Email us</a></li>
              <li class="lh-lg"><a class="text-200" href="sign_up.php">Join the HIVE</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- end of .container-->

    </section>
  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->

  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->

  <script>
    document.getElementById("myForm").addEventListener("submit", function (event) {
      event.preventDefault(); // 阻止表单默认提交行为
      var result = confirm("Are you sure you want to make changes?");
      if (result) {
        // 用户点击了"Yes"按钮
        this.submit(); // 提交表单
      } else {
        // 用户点击了"No"按钮或者关闭了对话框
        // 执行相应的操作或者什么也不做
      }
    });
  </script>


  <script>
    // Create QR code when button is clicked
    document.getElementById("cert-tab").addEventListener("click", () => {
      // new QRCode(Target container, text to encode)
      var qrc = new QRCode(
        document.getElementById("qrcode-container"),
        "certificate.php?memberName=<?php echo $Name ?>"
      );
    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/qrcode@latest"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="jquery.qrcode.js"></script>

  <script src="vendors/@popperjs/popper.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/is/is.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="vendors/fontawesome/all.min.js"></script>
  <script src="assets/js/theme.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <link
    href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Rubik:wght@300;400;500;600;700;800&amp;display=swap"
    rel="stylesheet" />
</body>

</html>