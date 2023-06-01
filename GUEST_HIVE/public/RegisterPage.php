<?php
session_start();

if (isset($_SESSION['username'])) {
  session_unset();
  session_destroy();
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
  <title>Hive Member Page</title>

  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png" />
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico" />
  <link rel="manifest" href="assets/img/favicons/manifest.json" />
  <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png" />
  <meta name="theme-color" content="#ffffff" />

  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link href="assets/css/theme.css" rel="stylesheet" />
</head>

<body>
  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
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
          </ul><a class="btn btn-primary order-1 order-lg-0" href="RegisterPage.php">Sign Up</a>
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

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="bg-600">
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-10 col-xl-11">
            <div class="card shadow-sm text-black" style="border-radius: 25px">
              <div class="card-body p-1 pb-md-7 p-md-3">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <p class="card-title h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 text-center">
                      Sign Up
                    </p>
                    <form class="mx-1 mx-md-4" method="post" action="SingUpfunction.php">
                      <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                          <label for="name" class="form-label">Name:</label>
                          <input type="text" class="form-control" id="name" name="name" required />
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                          <label for="email" class="form-label">Email:</label>
                          <input type="email" class="form-control" id="email" name="email" required />
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                          <label for="password" class="form-label">Password:</label>
                          <input type="password" class="form-control" id="password" name="password" required />
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                          <label for="confirmPassword" class="form-label">Confirm Password:</label>
                          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                            required oninput="checkPasswordMatch()" />
                          <span id="passwordError" style="color: red"></span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-center mx-0 mt-5">
                        <input class="btn btn-warning btn-lg text-black px-4" type="submit" value="Submit" />
                      </div>
                      <div class="d-flex justify-content-center mx-0 mt-5">
                        <a href="loginPage.php">Already have an account? Log in</a>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                    <img src="assets/img/gallery/signUpImage.png" class="img-fluid" alt="Sample image" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <!-- ============================================-->
    <!-- <section> begin ============================-->
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
    <!-- <section> close ============================-->
    <!-- ============================================-->
  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->

  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script>
    function checkPasswordMatch() {
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirmPassword").value;
      var passwordError = document.getElementById("passwordError");

      if (password !== confirmPassword) {
        passwordError.textContent = "Passwords do not match.";
      } else {
        passwordError.textContent = "";
      }
    }
  </script>

  <script src="vendors/@popperjs/popper.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/is/is.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="vendors/fontawesome/all.min.js"></script>
  <script src="assets/js/theme.js"></script>

  <link
    href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Rubik:wght@300;400;500;600;700;800&amp;display=swap"
    rel="stylesheet" />
</body>

</html>