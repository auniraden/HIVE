<?php
// Connect to your database (adjust the connection details accordingly)
$host = "localhost";
$username = "root";
$password = "";
$database = "hive";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Execute the SQL query to insert the visit
$sql = "INSERT INTO guest_visit (VisitId, VisitDate) VALUES (NULL, CURRENT_TIMESTAMP)";
mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>HIVE</title>


  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-hive.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32-hive.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16-hive.png">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon-HIVE.ico">
  <link rel="manifest" href="assets/img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150-HIVE.png">
  <meta name="theme-color" content="#ffffff">


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
    <section class="pt-6 bg-600" id="home">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100"
              src="assets/img/gallery/hive-buzz-header.png" width="470" alt="hero-header" /></div>
          <div class="col-md-7 col-lg-6 text-md-start text-center py-6">
            <h4 class="fw-bold font-sans-serif">Fun space to learn English</h4>
            <h1 class="fs-6 fs-xl-7 mb-5">An interactive English language learning space</h1><a
              class="btn btn-outline-secondary" href="index.php#go-to-courses" role="button">Explore</a>
          </div>
        </div>
      </div>
    </section>


    <!-- ============================================-->

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section id="go-to-courses">

      <div class="container">
        <div class="row">
          <h1 class="text-center mb-5"> Top Featured Courses</h1>
          <div class="col-md-4 mb-4">
            <div class="card h-100"><img class="card-img-top w-100" src="assets/img/gallery/Beginner.png"
                alt="courses" />
              <div class="card-body">
                <h5 class="font-sans-serif fw-bold fs-md-0 fs-lg-1">Beginner</h5><a
                  class="text-muted fs--1 stretched-link text-decoration-none" href="beginner.html">Introduction to
                  English Language</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100"><img class="card-img-top w-100" src="assets/img/gallery/Intermediate.png"
                alt="courses" />
              <div class="card-body">
                <h5 class="font-sans-serif fw-bold fs-md-0 fs-lg-1">Intermediate</h5><a
                  class="text-muted fs--1 stretched-link text-decoration-none" href="intermediate.html">Building Fluency
                  in English Language</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100"><img class="card-img-top w-100" src="assets/img/gallery/Advanced.png"
                alt="courses" />
              <div class="card-body">
                <h5 class="font-sans-serif fw-bold fs-md-0 fs-lg-1">Advanced</h5><a
                  class="text-muted fs--1 stretched-link text-decoration-none" href="advanced.html">Refining Proficiency
                  in English Language</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <!-- <section> begin ============================-->

    <section>
      <div class="bg-holder"
        style="background-image:url(assets/img/gallery/BG_better.jpg);background-position:center;background-size:cover;">
      </div>
      <!--/.bg-holder-->

      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-lg-3 text-center mb-5"><img src="assets/img/gallery/personalized learning.png"
              height="200" alt="..." />
            <h1 class="my-2">::</h1>
            <p class="text-info fw-bold">PERSONALIZED LESSONS</p>
          </div>
          <div class="col-sm-6 col-lg-3 text-center mb-5"><img src="assets/img/gallery/track progress.png" height="200"
              alt="..." />
            <h1 class="my-2">::</h1>
            <p class="text-info fw-bold">TRACK YOUR PROGRESS</p>
          </div>
          <div class="col-sm-6 col-lg-3 text-center mb-5"><img src="assets/img/gallery/Reward.png" height="200"
              alt="..." />
            <h1 class="my-2">::</h1>
            <p class="text-info fw-bold">LEVEL COMPLETION REWARD</p>
          </div>
          <div class="col-sm-6 col-lg-3 text-center mb-5"><img src="assets/img/gallery/certification.png" height="200"
              alt="..." />
            <h1 class="my-2">::</h1>
            <p class="text-info fw-bold">COURSE COMPLETION CERTIFICATE</p>
          </div>
        </div>
      </div>
    </section>

    <!-- <section> close ============================-->
    <!-- ============================================-->

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 col-lg-4 mb-5"><img src="assets/img/gallery/SIGN UP!.png" width="280" alt="cta" /></div>
          <div class="col-md-6 col-lg-5">
            <h5 class="fs-6 fs-xl-7 mb-5">Join now & be part of the HIVE.</h5>
            <div class="col-auto">
              <a class="btn btn-primary order-1 order-lg-0" href="sign_up.php" role="button">Sign Up</a>
            </div>
          </div>
        </div>
      </div>
      <!-- end of .container-->

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
  <script src="vendors/@popperjs/popper.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/is/is.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="vendors/fontawesome/all.min.js"></script>
  <script src="assets/js/theme.js"></script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <link
    href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Rubik:wght@300;400;500;600;700;800&amp;display=swap"
    rel="stylesheet">
</body>

</html>