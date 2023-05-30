<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $materialID = $_POST['materialID'];
    include('accessmentFunction.php');
    $sql = "SELECT * FROM material WHERE MaterialID='$materialID'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    $materialContent = $data['MaterialContent'];
    $materialTitle = $data['MaterialName'];
    $courseID = $data['CourseID'];

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
            <div class="container">
                <a class="navbar-brand" href="index.html"><img src="assets/img/gallery/logo-n.png" height="45"
                        alt="logo" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"> </span>
                </button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
                        <li class="nav-item px-2">
                            <a class="nav-link" aria-current="page" href="pricing.html">Plan</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" aria-current="page" href="web-development.html">Learning</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" aria-current="page" href="user-research.html">About Us</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" aria-current="page" href="loginPage.php">Login</a>
                        </li>
                    </ul>
                    <a class="btn btn-primary order-1 order-lg-0" href="RegisterPage.php">Sign Up</a>
                    <form class="d-flex my-3 d-block d-lg-none">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-primary" type="submit">
                            Search
                        </button>
                    </form>
                    <div class="dropdown d-none d-lg-block">
                        <button class="btn btn-outline-light ms-2" id="dropdownMenuButton1" type="submit"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-search text-800"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton1"
                            style="top: 55px">
                            <form>
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>


        <div class="container-fluid grey-background">
            <section class="pb-5">
                <h1 style="font-family:Arial,Helvetica,sans-serif">
                    <?php echo $materialTitle; ?>
                </h1>
            </section>
            <div class="card">
                <div class="card-body" style="font-family:Arial,Helvetica,sans-serif">
                    <?php echo $materialContent; ?>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center p-5">
            <form action="quizPage.php" method="post">
                <input class="btn btn-primary" type="submit" name="courseID" value="<?php echo $courseID; ?>">
                </input>
                <label class="form-control border-0 bg-white" for="courseID">Quiz</label>
            </form>
        </div>
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