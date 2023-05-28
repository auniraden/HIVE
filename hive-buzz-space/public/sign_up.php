<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>HIVE-Sign Up</title>


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
    <style>
        .error {
            color: red;
        }

        .success {
            color: #ffbe00;
        }
    </style>

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
    <?php
            // Check if the form is submitted and if there are error messages
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($errorMessages) && count($errorMessages) > 0) {
              echo "<div class='error'>";
              foreach ($errorMessages as $errorMessage) {
                echo "<p>$errorMessage</p>";
              }
              echo "</div>";
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($result)) {
              // Display success message
              if ($result) {
                echo "<div class='success'>Thank you for signing up!</div>";
              } else {
                echo "<div class='error'>Uh-oh! an error occured. Please try again!</div>";
              }
            }
            ?>
      <nav class="navbar navbar-expand-lg navbar-light sticky-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div style="margin-bottom:4%; height:10px;"class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/gallery/HIVE-logo-updated-Guest.png"  height="70" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link active" aria-current="page" href="index.html">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="contribute.html">Contribute</a></li>
            </ul><a class="btn btn-primary order-1 order-lg-0" href="#!">Sign Up</a>
            <form class="d-flex my-3 d-block d-lg-none">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
            <div class="dropdown d-none d-lg-block">
              <button class="btn btn-outline-light ms-2" id="dropdownMenuButton1" type="submit" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-search text-800"></i></button>
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
          <div class="row">
            <div class="col">
              <h6 class="font-sans-serif text-primary fw-bold">BUZZ! BUZZ! </h6>
              <h1 class="mb-6">Be part of the HIVE. Sign up to be one of the HIVE member!</h1>
              <form id="signup-form" method="POST">
                <div>
                  <label for="username">Username:</label>
                  <input type="text" id="username" name="username">
                </div>
                
                <div>
                  <label for="email">Email:</label>
                  <input type="email" id="email" name="email">
                </div>
                
                <div>
                  <label for="password">Password:</label>
                  <input type="password" id="password" name="password">
                </div>
                
                <div>
                  <label for="confirm-password">Confirm Password:</label>
                  <input type="password" id="confirm-password" name="confirm-password">
                </div>
                        
                <div>
                  <input type="submit" value="Sign Up">
                </div>
              </form>
              <?php
              
              // Check if the form is submitted
              if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                // Retrieve the form data
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                // Validate the form data 
                
                // If the form data is valid, proceed with database operations
                $servername = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $database = "hive";
                
                // Initialize the $connection variable
                $connection = new mysqli($servername, $dbUsername, $dbPassword, $database);
                
                // Check the database connection
                if ($connection->connect_error) {
                  die("Connection failed: " . $connection->connect_error);
                }
                
                // Generate the MemberID
                $memberID = generateMemberID($connection);
                
                // Insert the user information into the database
                $insertQuery = "INSERT INTO member (MemberID, Name, Email, Password, Status, CreatedDate)
                VALUES ('$memberID', '$username', '$email', '$password', 1, NOW())";
                
                // Execute the query
                $result = mysqli_query($connection, $insertQuery);

                // Check if the query was successful
                if ($result) {
                  // Display success message
                  echo "<div class='success'>Buzz, buzz! You're now a HIVE member.</div>";
                } else {
                  // Display error message
                  echo "<div class='error'>Uh-oh! An error occured. Please try again.</div>";
                }
                
                // Close the database connection
                mysqli_close($connection);
              }
              
              // Function to generate the MemberID
              function generateMemberID($connection) {
              // Retrieve the last inserted MemberID from the database (if any)
              $lastMemberIDQuery = "SELECT MemberID FROM member ORDER BY MemberID DESC LIMIT 1";
              $lastMemberIDResult = mysqli_query($connection, $lastMemberIDQuery);

              // Generate the new MemberID based on the last inserted one
              if ($lastMemberIDResult && mysqli_num_rows($lastMemberIDResult) > 0) {
                $lastMemberID = mysqli_fetch_assoc($lastMemberIDResult)['MemberID'];
                $memberNumber = intval(substr($lastMemberID, 1)) + 1;
              } else {
                // If no MemberID exists, start with M01
                $memberNumber = 1;
              }
              
              // Format the new MemberID
              $newMemberID = "M" . str_pad($memberNumber, 2, '0', STR_PAD_LEFT);
              return $newMemberID;
            }
            ?>
            </div>
          </div>
        </div>
        <!-- end of .container-->
      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->
    
      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-0">
        <div class="container">
          <div class="row h-100 align-items-center">
            <video src="assets/img/gallery/bee_boutus.mp4" autoplay>Your browser does not support the video tag.</video>
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
                <div class="col-12 col-sm-12 col-lg-6 mb-4 order-0 order-sm-0"><a class="text-decoration-none" href="index.html"><img src="assets/img/gallery/HIVE-logo_Tbg.png" height="150"/></a>
                <iframe style= "margin-right: 70%;" class= "text-light" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.1466274461595!2d101.7005614!3d3.0554056999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4abb795025d9%3A0x1c37182a714ba968!2sAsia%20Pacific%20University%20of%20Technology%20%26%20Innovation%20(APU)!5e0!3m2!1sen!2smy!4v1684836238184!5m2!1sen!2smy" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" alt="Asia Pacific University of Innovation & Technology"></iframe>
                <p class="text-light"> <i class="fas fa-envelope me-3"> </i><a class="text-light" href="mailto:buzzbuzz.HIVE@gmail.com?subject=Hello&body=Good day%20HIVE,">buzzbuzz.HIVE@gmail.com</a></p>
                <p class="text-light"> <i class="fas fa-phone-alt me-3"></i><a class="text-light" href="tel:1-800-800-2299">1-800-800-2299 <--Need support?</a></p>
            </div>
            <div style= "margin-top:10%;"class="col-6 col-sm-4 col-lg-2 mb-3 order-2 order-sm-1">
            <h5 class="lh-lg fw-bold mb-4 text-light font-sans-serif">Product </h5>
            <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="lh-lg"><a class="text-200" href="about-us.html">How HIVE works</a></li>
                <li class="lh-lg"><a class="text-200" href="contribute.html">Contribute</a></li>
                <li class="lh-lg"><a class="text-200" href="help-center.html">HELP center</a></li>
                <li class="lh-lg"><a class="text-200" href="#!">Sign in</a></li>
            </ul>
        </div>
        <div style= "margin-top:10%;" class="col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2">
        <h5 class="lh-lg fw-bold text-light mb-4 font-sans-serif">Company</h5>
        <ul class="list-unstyled mb-md-4 mb-lg-0">
            <li class="lh-lg"><a class="text-200" href="about-us.html">About us</a></li>
            <li class="lh-lg"><a class="text-200" href="privacy-policy.html">Privacy policy</a></li>
            <li class="lh-lg"><a class="text-200" href="guest_feedback.php">Give Feedback</a></li>
        </ul>
      </div>
      <div style= "margin-top:10%;" class="col-6 col-sm-4 col-lg-2 mb-3 order-3 order-sm-2">
      <h5 class="lh-lg fw-bold text-light mb-4 font-sans-serif">Contact us</h5>
      <ul class="list-unstyled mb-md-4 mb-lg-0">
        <li class="lh-lg"><a class="text-200" href="mailto:buzzbuzz.HIVE@gmail.com?subject=Hello&body=Good day%20HIVE,">Email us</a></li>
        <li class="lh-lg"><a class="text-200" href="#!">Join the HIVE</a></li>
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
    window.addEventListener('DOMContentLoaded', function() {
      const messagesSection = document.getElementById('signup-messages');
      if (messagesSection) {
        messagesSection.scrollIntoView();
      }
    });
    </script>
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Rubik:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
  </body>

</html>


