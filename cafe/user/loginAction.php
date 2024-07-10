<?php
include 'config.php';
session_start();

if (isset($_POST['login'])) {
    $l_email = $_POST['l_email'];
    $l_pass = $_POST['l_pass'];


    if (isset($_GET['verification'])) {
        $verificationCode = mysqli_real_escape_string($conn, $_GET['verification']);

        $query = mysqli_query($conn, "SELECT * FROM register WHERE code='$verificationCode'");

        if (mysqli_num_rows($query) > 0) {
            $queryUpdate = mysqli_query($conn, "UPDATE register SET code='' WHERE code='$verificationCode'");

            if ($queryUpdate) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
            }
        } else {
            header("Location: loginAction.php");
        }
    }

    if (isset($_POST['login'])) {
        // Check if email and password are provided
        if (!empty($_POST['l_email']) && !empty($_POST['l_pass'])) {
            $email = mysqli_real_escape_string($conn, $_POST['l_email']);
            $password = mysqli_real_escape_string($conn, $_POST['l_pass']);

            $sql = "SELECT * FROM register WHERE db_email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();

                if (password_verify($password, $row['db_password'])) {
                    if (empty($row['code'])) {
                        $_SESSION['SESSION_EMAIL'] = $email;
                        header("Location:index.php");
                        exit(); // Always exit after a header redirect
                    } else {
                        $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
                    }
                } else {
                    $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Please provide both email and password.</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login Page</title>
    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/vendors/flat-icon/flaticon.css" rel="stylesheet" />
    <!-- Rev slider css -->
    <link href="assets/vendors/revolution/css/settings.css" rel="stylesheet" />
    <link href="assets/vendors/revolution/css/layers.css" rel="stylesheet" />
    <link href="assets/vendors/revolution/css/navigation.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <link rel="shortcut icon" href="assets/images/logo-02.png" type="image/x-icon" />
    <link rel="icon" href="assets/images/logo-02.png" type="image/x-icon" />
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&amp;family=Open+Sans:wght@400;600;700;800&amp;family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,700&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-4/assets/css/login-4.css">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
</head>

<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader"></div>

        <header class="main-header">
            <!--Header Top-->
            <div class="header-top" style="background-color: #f2e39c; color: black">
                <div class="auto-container clearfix">
                    <div class="top-left">
                        <!-- Info List -->
                        <ul class="info-list">
                            <li>
                                <a href="" style="color: black"><span class="icon far fa-envelope"></span> abc.con</a>
                            </li>
                        </ul>
                    </div>
                    <div class="top-right clearfix">
                        <!--Social Box-->
                        <ul class="social-box">
                            <li>
                                <a href="#" style="color: black"><span class="fa fa-user-alt"></span></a>
                            </li>
                        </ul>
                        <div class="option-list">
                            <!-- Cart Button -->
                            <div class="cart-btn">
                                <a href="shoping-cart.html" class="icon flaticon-shopping-cart"
                                    style="color: black"><span class="total-cart"
                                        style="background-color: #a40301; color: white">3</span></a>
                            </div>
                            <!-- Search Btn -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header Top -->

            <!-- Header Upper -->
            <div class="header-upper">
                <div class="inner-container">
                    <div class="auto-container clearfix">
                        <!--Info-->
                        <div class="logo-outer">
                            <div class="logo" style="margin-top: -20px">
                                <a href="index.php"><img src="assets/images/logo-02.png" alt="" title="" /></a>
                            </div>
                        </div>

                        <!--Nav Box-->
                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="icon flaticon-menu"></span>
                                    </button>
                                </div>

                                <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li class="dropdown">
                                            <a href="#">User</a>
                                            <ul>
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="registration.html">Register</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->

                            <div class="outer-box">
                                <div class="order">
                                    Order Now
                                    <span><a href="tel:1800-123-4567">+88 01725291718</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header Upper-->

            <!--Sticky Header-->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <!--Logo-->
                    <div class="logo pull-left">
                        <a href="index-2.html" class="img-responsive"><img src="assets/images/logo-02.png" alt=""
                                title="" height="90" width="90" style="margin-top: -10px" /></a>
                    </div>

                    <!--Right Col-->
                    <div class="right-col pull-right">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                                <ul class="navigation clearfix">
                                    <li class="current dropdown">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li class="dropdown">
                                        <a href="#">User</a>
                                        <ul>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="registration.html">Register</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                    </div>
                </div>
            </div>
            <!--End Sticky Header-->
        </header>
        <!-- End Main Header -->

        <!-- Page Title -->
        <section class="page-title" style="background-image: url(assets/images/background/11.jpg)">
            <div class="auto-container">
                <h1>Login</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- Login 4 - Bootstrap Brain Component -->
        <section class="p-3 p-md-4 p-xl-5">
            <div class="container">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                src="./assets/images/background/7.jpg" alt="BootstrapBrain Logo">
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-5">
                                            <h3>Log in</h3>
                                        </div>
                                    </div>
                                </div>

                                <form action=" " method="post">

                                    <div class="row gy-3 gy-md-4">

                                        <div class="col-12">
                                            <label for="email" class="form-label">Email <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="l_email" id="email"
                                                placeholder="name@example.com" required>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="l_pass" id="password"
                                                placeholder="Enter Your Password" required>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="remember_me" id="remember_me">
                                                <label class="form-check-label text-secondary" for="remember_me">
                                                    Keep me logged in
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit" name="login">Log
                                                    in</button>
                                            </div>
                                        </div>

                                    </div>

                                </form>




                                <div class="row">
                                    <div class="col-12">
                                        <hr class="mt-5 mb-4 border-secondary-subtle">
                                        <div
                                            class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                            <a href="registration.html"
                                                class="link-secondary text-decoration-none">Create new account</a>
                                            <!-- <a href="#!" class="link-secondary text-decoration-none">Forgot password</a> -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



    </div>

    <!--Main Footer-->

    <footer class="main-footer" style="background-color: red">

        <div class="auto-container">

            <!-- Widgets Section -->
            <div class="widgets-section">
                <div class="row clearfix">

                    <!-- Footer Column -->
                    <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                        <!-- Info Widget -->
                        <div class="footer-widget info-widget">
                            <h4>Contact Info</h4>
                            <a class="number" href="#">+88 01725291718</a>
                            <ul class="email-list">
                                <li><a href="#">lu-food-hub@gmail.com</a></li>
                            </ul>
                        </div>
                        <div class="text">
                            <br> Leading University Cafe<br> Ragib Nagar, KamalBazer, Sylhet
                        </div>
                    </div>

                    <!-- Footer Column -->

                    <!-- Footer Column -->
                    <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                        <!-- Info Widget -->
                        <div class="footer-widget timing-widget">
                            <h4>Opening Hour</h4>
                            <ul class="timing-list">
                                <li>Saturday- Thursday <span>9 AM – 4 PM</span></li>
                                <li>Friday <span>Off</span></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer Bottom -->
        </div>

        <div class="footer-bottom text-center" style="background-color: white">
            <div class="clearfix text-center">
                <div class="text-center">
                    <div class="copyright text-center" style="color: black">&copy; Copyright 2024. All right
                        reserved By LU FOOD HUB.
                    </div>
                </div>
            </div>
        </div>

    </footer>
    </div>


    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>



    <!--Scroll to top-->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/parallax.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Rev slider js -->
    <script src="assets/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>

    <script src="assets/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script src="assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="assets/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>

    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/script.js"></script>


</body>

</html>