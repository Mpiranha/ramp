<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/index.css">
    <link rel="stylesheet" href="lib/font-awesome/all.min.css">
    <title>CopyRamp - Contact Support</title>
</head>

<body>
    <div class="container-fluid clear-gutters">
        <div class="d-flex">
            <div class="h-100 sidebar-wrap-fix clear-gutters">
                <div class="sidebar">
                    <nav class="d-none navbar flex-column navbar-expand-sm navbar-light navbar-collapsed">
                        <div class="d-flex logo-wrap">
                            <img class="logo" src="assets/img/logo.svg" alt="logo">

                        </div>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-columns"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas   fa-hand-point-up"></i></a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-thumbtack"></i> </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-user"></i> </a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#"><i class="fas fa-envelope"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <nav class="d-none navbar flex-column navbar-expand-md navbar-light nav-open show-flex">
                        <div class="d-flex logo-wrap">
                            <img class="logo" src="assets/img/logo.svg" alt="logo">
                            <div class="navbar-brand">
                                COPYRAMP
                            </div>
                            <button class="d-none d-lg-block navbar-toggler navbar-tog-custom" id="btn-close-nav"
                                type="button" data-target="#collapsibleNavbar">
                                <i class="fas fa-bars"></i>
                            </button>
                            <button type="button" class="close-btn mx-0" aria-label="Close">
                                <span class="text-light" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="dashboard.php"><i class="fas fa-columns dash"></i> <span
                                            class="home">Dashboard</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="select.php"><i class="fas   fa-hand-point-up point"></i>
                                        <span class="home">Select Your Niche</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="saved-letters.php"><i class="fas fa-thumbtack pin"></i>
                                        <span class="home">Saved Letters</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="user.php"><i class="fas fa-user account"></i>
                                        <span class="home">Account Setting</span></a>
                                </li>
                                <li class="nav-item  active">
                                    <a class="nav-link" href="contact-support.php"><i
                                            class="fas fa-envelope support"></i> <span class="home">Support</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt sign"></i> <span
                                            class="home">Sign Out</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
            <div class="flex-grow-1">
                <div class="container">
                    <nav class="navbar navbar-expand-sm px-5 top-nav">
                        <button class="d-none navbar-toggler" id="btn-open-nav" type="button"
                            data-target="#collapsibleNavbar">
                            <i class="fas fa-bars text-dark"></i>
                        </button>
                        <button class="navbar-sm-toggler" id="btn-sm-open-nav" type="button"
                            data-target="#collapsibleNavbar">
                            <i class="fas fa-bars text-dark"></i>
                        </button>
                        <a class="text-dark" href="dashboard.html">Dashboard</a>

                        <!-- <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link mr-4" href="accountSetting.html">Account Setting</a>
                                <a class="nav-item nav-link" href="#">Sign Out</a>
                            </div>
                        </div> -->
                    </nav>

                    <div class="content-wrap">


                        <div class="container">
                            <div class="form-area">
                                <div>
                                    <form method="post" action="sendmail.php" class="profileForm">
                                        <div class="content-title">
                                            <h3 class="title text-dark mb-0">
                                                Welcome to the Support Page
                                            </h3>
                                            <h6 class="text-muted sub-title">Need help, having any issue or suggestions?
                                                Kindly use the form
                                                below.</h6>

                                        </div>
                                        <center>
                                            <p class="category">
                                                <h4 style="color:green; font-family: cursive;">Thank you for contacting
                                                    our support team! We'll get back to you shortly. </h4>
                                            </p>
                                        </center>
                                        <div class="row mt-5">

                                            <div class="form-group col-md-6">
                                                <label for="username" class="userAccount">Full Name</label>
                                                <input type="text" id="username" name="name" size="35" class="c-field">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="name" class="userAccount">EMAIL ADDRESS</label>
                                                <input type="email" id="name" name="email" class="c-field">
                                            </div>


                                            <div class="form-group col-md-12">
                                                <input type="text" class="c-field" name="subject" placeholder="Subject">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea class="c-field form-rounded" name="message" rows="5"
                                                    id="comment" placeholder="Message"></textarea>
                                            </div>

                                        </div>
                                        <div class="profbuttons mt-4">
                                            <!-- <div><a href="" class="btn btn-danger buttonPass">Check Knowledge</a></div> -->
                                            <div><input type="submit" name="send" class="c-btn updateButton"
                                                    value="Contact Support">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <footer class="footer-distributed py-5 mt-5">
                    <li class="container-fluid px-5">
                        <div class="row justify-content-around">
                            <div class="col-12 col-md-4">

                                <div class="d-flex logo-wrap">
                                    <img class="logo" src="assets/img/logo.svg" alt="logo">
                                    <div class="navbar-brand">
                                        COPYRAMP
                                    </div>
                                </div>

                                <ul class="nav py-4">
                                    <li class="nav-item"><a class="nav-link" href="https://www.copyramp.com">Home</a>
                                    </li>·
                                    <li class="nav-item"><a class="nav-link" href="privacy.php">Privacy Policy</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="terms-use.php"> Terms of services</a>
                                    </li>

                                    <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact us</a></li>

                                    <!-- <li class="nav-item"><a class="nav-link" href="#">Faq</a></li>
            
                                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li> -->
                                </ul>

                                <p class="footer-company-name text-light pl-3">© 2019 <a href="https://www.copyramp.com"
                                        style="color: white;">CopyRamp</a> </p>
                            </div>

                            <div class="col-12 col-md-4 text-light py-4 pl-md-5">
                                <ul class="nav flex-column">
                                    <li class="nav-item my-3">
                                        <!-- <i class="fa fa-map-marker mr-3"></i>
                                        <span>21 Revolution Street</span> Paris, France
            
                                    </li> -->

                                    <li class="nav-item my-3">
                                        <!--  <i class="fa fa-phone mr-3"></i> -->
                                        Support
                                    </li>

                                    <li class="nav-item my-3">
                                        <i class="fa fa-envelope mr-3"></i>
                                        <a class="text-light"
                                            href="mailto:support@copyramp.com">support@copyramp.com</a>
                                    </li>
                                </ul>

                            </div>

                            <!--  <div class="col-12 col-md-2">
            
                                <p class="footer-company-about text-light">
                                    <span>About the company</span>
                                    Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu
                                    auctor lacus
                                    vehicula sit amet.
            
            
                                    <ul class="nav">
            
                                        <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-linkedin"></i></a></li>
            
            
                                    </ul>
                                </p>
                            </div> -->
                        </div>




                </footer>
            </div>
        </div>

    </div>



    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="src/index.js"></script>
</body>

</html>
