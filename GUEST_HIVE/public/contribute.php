<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>HIVE-Contribute</title>


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
    <?php
    // Check if a file was uploaded
    if (isset($_FILES['file'])) {
      $file = $_FILES['file'];
      // Establish a database connection
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "hive";

      // Initialize the $stmt variable
      $stmt = null;
      $conn = new mysqli($servername, $username, $password, $database);

      // Check the database connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      // Retrieve the current maximum contributeID from the database
      $result = $conn->query("SELECT MAX(CONTRIBUTEID) FROM `guest-contribute`");
      $row = $result->fetch_assoc();
      $maxContributeID = $row['MAX(CONTRIBUTEID)'];

      // Increment the contributeID
      $contributeID = $maxContributeID ? 'CON' . str_pad((int) substr($maxContributeID, 3) + 1, 2, '0', STR_PAD_LEFT) : 'CON01';

      // Prepare and execute the database query
      $stmt = $conn->prepare("INSERT INTO `guest-contribute` (contributeID, ContentTitle, ContentType, CourseID) VALUES (?, ?, ?, ?)");

      if (!$stmt) {
        die("Error: " . $conn->error); // Display error message
      }

      // Get other form values
      $contentTitle = $_POST['contentTitle'];
      $contentType = $_POST['contentType'];
      $courseID = $_POST['courseID'];

      $stmt->bind_param("ssss", $contributeID, $contentTitle, $contentType, $courseID);
      $stmt->execute();

      // Check for execution errors
      if ($stmt->error) {
        die("Execution failed: " . $stmt->error); // Display error message
      }

      // Close the database connection
      $stmt->close();
      $conn->close();

      // Send a response to the client
      echo 'File uploaded successfully.';
    }
    ?>
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="bg-600">

      <div class="container">
        <div class="row">
          <div class="col">
            <h6 class="font-sans-serif text-primary fw-bold">Be a contributor </h6>
            <h1 class="mb-6">Drop some honey, let the others taste its gold.</h1>
            <form method="POST" enctype="multipart/form-data">
              <input type="text" name="contentTitle" placeholder="Title" required><br>
              <input type="text" name="contentType" placeholder="Content Type (e.g: Grammar)" required><br>
              <input type="text" name="courseID" placeholder="English Level:(1 or 2 or 3)" required><br>
              <input type="file" name="file">
              <button type="submit">Upload</button>
            </form>
          </div>
        </div>
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
    <section>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 col-lg-4 mb-5"><img src="assets/img/gallery/SIGN UP!.png" width="280" alt="cta" /></div>
          <div class="col-md-6 col-lg-5">
            <h5 class="fs-6 fs-xl-7 mb-5">Join now & be part of the HIVE.</h5>
            <div class="col-auto">
              <a class="btn btn-primary order-1 order-lg-0" href="RegisterPage.php" role="button">Sign Up</a>
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

    <link
      href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Rubik:wght@300;400;500;600;700;800&amp;display=swap"
      rel="stylesheet">
</body>

</html>