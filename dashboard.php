<?php
session_start();
error_reporting(0);
include('includes/config.php');

//Check if the user is logged in or not
if(strlen($_SESSION['alogin'])==0)
    {   
//User not logged in, now redirects him/her to the login page.
header('location:index.php');
}

//If user is already login, continue to dashboard

else{ 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/index.css">
    <link rel="stylesheet" href="lib/font-awesome/all.min.css">
    <title>Copy Ramp - User Dashboard</title>
</head>

<body>
    <div class="container-fluid clear-gutters">
        <div class="d-flex">
            <div class=" h-100 sidebar-wrap clear-gutters">
                <div class="sidebar">
                    <nav class="d-none navbar flex-column navbar-expand navbar-light navbar-collapsed">
                        <div class="d-flex logo-wrap">
                            <img class="logo" src="assets/img/logo.svg" alt="logo">

                        </div>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav flex-column">
                                <li class="nav-item active">
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
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-envelope"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <nav class="d-none navbar flex-column navbar-expand navbar-light nav-open show-flex">
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
                                <li class="nav-item active">
                                    <a class="nav-link active" href="dashboard.php"><i class="fas fa-columns dash"></i>
                                        <span class="home">Dashboard</span></a>
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
                                <li class="nav-item">
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
            <div class="flex-grow-1 column-2">
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
                        <div class="home">
                            USER DASHBOARD &#187;
                        </div>

                        <!--  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link mr-4" href="#">Account Setting
                                    <a class="nav-item nav-link" href="logout.php">Sign Out</a>
                            </div>
                        </div> -->
                    </nav>
                    <div class="container">
                        <div class="row mx-lg-3">
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <div class="user-stat">
                                        <div class="setion-title-wrap">
                                            <h3 class="title">
                                                Niche and Sales Letter Statistics
                                            </h3>
                                            <h6 class="text-muted sub-title">
                                                Total number of niche and saved letters.
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row stat mt-4">
                                            <div class="col-6 col-md-4">
                                                <!-- Check number of total niche from the database and echo the value -->
                                                <?php 
                                $sql ="SELECT id from niches";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $bg=$query->rowCount();
                                ?>
                                                <div class="box-num text-center rounded" data-toggle="tooltip"
                                                    data-placement="bottom" title="Total Numbers of Niches">
                                                    <?php echo htmlentities($bg);?> </div> Niches

                                            </div>
                                            <div class="col-6 col-md-4">
                                                <!-- Check number of total sales letters from the database and echo the value -->
                                                <?php 
                            
                                         $sql ="SELECT id from letters";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $bgs=$query->rowCount();
                                ?>
                                                <div class="box-num text-center rounded py-3 px-4" data-toggle="tooltip"
                                                    data-placement="bottom" title="Total number of Sales Letters">
                                                    <!-- <?php echo htmlentities($bgs);?> -->301</div>Sales Letters
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <!-- Check number of total saved  letters from the database and echo the value -->
                                                <?php 
                                $email = $_SESSION['alogin'];
                                $sql ="SELECT * from  favorite WHERE  email ='$email'";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $bgl=$query->rowCount();
                                ?>
                                                <div class="box-num text-center rounded py-3 px-4" data-toggle="tooltip"
                                                    data-placement="bottom" title="Your Saved Letters">
                                                    <?php echo htmlentities($bgl);?></div>Saved Letters
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="py-5">
                                                <div class="d-flex flex-column video-wrap text-center">
                                                    <h4 class="title mt-2">Quick Tour Video</h4>
                                                    <div class="embed-responsive embed-responsive-16by9 video mt-2">
                                                        <iframe width="980" height="551"
                                                            src="https://www.youtube.com/embed/XU9oyT7-s48"
                                                            frameborder="0"
                                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen></iframe>
                                                    </div>
                                                    <div class="mt-2 vid-body">
                                                        <h5>Need Help? Watch this quick tutorial video.</h5>
                                                        <h6>This short video will walk you through how Copy Ramp work.
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="top-niche">
                                    <div class="setion-title-wrap">
                                        <h3 class="title text-right">
                                            Top 6 Niches
                                        </h3>
                                        <h6 class="text-muted sub-title text-right">
                                            Here is the top 6 most viewed niches.
                                        </h6>
                                    </div>
                                    <div class="row top-niches">
                                        <div class="col-6 col-md-4 col-xl-4">
                                            <div
                                                class="niche-box text-center d-flex rounded flex-column justify-content-end">
                                                <span class="niche-icon">
                                                    <!--  <i class="fas fa-thumbtack pin"></i> -->
                                                </span>
                                                <div class="d-flex justify-content-between align-items-end">
                                                    <button class="navbar-toggler" id="btn-open-niche" type="button">
                                                        <!-- <i class="fas fa-bars"></i> -->
                                                    </button>
                                                    <span class="niche-title">
                                                        <a href="select-internet.php"
                                                            style="color: white; font-style: bold;"> Internet
                                                            Marketing
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-6 col-md-4 col-xl-4">
                                            <div
                                                class="niche-box text-center d-flex rounded flex-column justify-content-end">
                                                <span class="niche-icon">
                                                    <!-- <i class="fas fa-thumbtack pin"></i> -->
                                                </span>
                                                <div class="d-flex justify-content-between align-items-end">
                                                    <button class="navbar-toggler" id="btn-open-niche" type="button">
                                                        <!-- <i class="fas fa-bars"></i> -->
                                                    </button>
                                                    <span class="niche-title">
                                                        <a href="select-traffic.php"
                                                            style="color: white; font-style: bold;"> Traffic
                                                            Generation
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-4">
                                            <div
                                                class="niche-box text-center d-flex rounded flex-column justify-content-end">
                                                <span class="niche-icon">
                                                    <!--  <i class="fas fa-thumbtack pin"></i> -->
                                                </span>
                                                <div class="d-flex justify-content-between align-items-end">
                                                    <button class="navbar-toggler" id="btn-open-niche" type="button">
                                                        <!--  <i class="fas fa-bars"></i> -->
                                                    </button>
                                                    <span class="niche-title">
                                                        <a href="select-finance.php"
                                                            style="color: white; font-style: bold;"> Finance And
                                                            Insurance </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-4">
                                            <div
                                                class="niche-box text-center d-flex rounded flex-column justify-content-end">
                                                <span class="niche-icon">
                                                    <!-- <i class="fas fa-thumbtack pin"></i> -->
                                                </span>
                                                <div class="d-flex justify-content-between align-items-end">
                                                    <button class="navbar-toggler" id="btn-open-niche" type="button">
                                                        <!-- <i class="fas fa-bars"></i> -->
                                                    </button>
                                                    <span class="niche-title">
                                                        <a href="select-housing.php"
                                                            style="color: white; font-style: bold;"> Housing And
                                                            Real
                                                            Estate </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-4">
                                            <div
                                                class="niche-box text-center d-flex rounded flex-column justify-content-end">
                                                <span class="niche-icon">
                                                    <!--   <i class="fas fa-thumbtack pin"></i> -->
                                                </span>
                                                <div class="d-flex justify-content-between align-items-end">
                                                    <button class="navbar-toggler" id="btn-open-niche" type="button">
                                                        <!-- <i class="fas fa-bars"></i> -->
                                                    </button>
                                                    <span class="niche-title">
                                                        <a href="select-video-marketing.php"
                                                            style="color: white; font-style: bold;">Video Marketing
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-4">
                                            <div
                                                class="niche-box text-center d-flex rounded flex-column justify-content-end">
                                                <span class="niche-icon">
                                                    <!--  <i class="fas fa-thumbtack pin"></i> -->
                                                </span>
                                                <div class="d-flex justify-content-between align-items-end">
                                                    <button class="navbar-toggler" id="btn-open-niche" type="button">
                                                        <!-- <i class="fas fa-bars"></i> -->
                                                    </button>
                                                    <span class="niche-title">
                                                        <a href="select-copywritting.php"
                                                            style="color: white; font-style: bold;">Copywriting </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="dashboard-table py-5">
                                        <div class="table-title">
                                            <h2 class="title mb-0">
                                                Suggested Sales Letter
                                            </h2>
                                            <div class="sub-title text-muted">
                                                Have you taken a glance at this sales letter?
                                            </div>
                                        </div>
                                        <table class="table">
                                            <!-- <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                            </tr>
                                        </thead> -->
                                            <tbody>
                                                <tr>
                                                    <?php $sql = "SELECT * from  letter_internet ORDER BY RAND()
                                                    LIMIT 1";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {               ?>


                                                    <th scope="row"><i class="fas fa-check"></i></th>
                                                    <td class="note-desc"><a
                                                            href="view-internet.php?edit=<?php echo $result->id;?>"><?php echo htmlentities($result->title);?>
                                                        </a></td>
                                                    <td><a href="view-internet.php?edit=<?php echo $result->id;?>"> <i
                                                                class="far fa-eye view-icon"></i></a></td>
                                                    <td><a href=""><i class="far fa-trash-alt remove-icon"></i></a></td>
                                                </tr> <?php $cnt=$cnt+1; }} ?>




                                                <tr> <?php $sql = "SELECT * from  letter_makemoney ORDER BY RAND()
                                                    LIMIT 1";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {               ?>

                                                    <th scope="row"><i class="fas fa-check"></i></th>
                                                    <td class="note-desc"><a
                                                            href="view-make-money.php?edit=<?php echo $result->id;?>"><?php echo htmlentities($result->title);?>
                                                        </a></td>
                                                    <td><a href="view-make-money.php?edit=<?php echo $result->id;?>"> <i
                                                                class="far fa-eye view-icon"></i></a></td>
                                                    <td><a href=""><i class="far fa-trash-alt remove-icon"></i></a></td>
                                                </tr> <?php $cnt=$cnt+1; }} ?>


                                                <tr> <?php $sql = "SELECT * from  letter_coachingconsulting ORDER BY RAND()
                                                    LIMIT 1";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {               ?>
                                                    <th scope="row"><i class="fas fa-check"></i></th>
                                                    <td class="note-desc"><a
                                                            href="view-coach.php?edit=<?php echo $result->id;?>"><?php echo htmlentities($result->title);?>
                                                        </a></td>
                                                    <td><a href="view-coach.php?edit=<?php echo $result->id;?>"> <i
                                                                class="far fa-eye view-icon"></i></a></td>
                                                    <td><a href=""><i class="far fa-trash-alt remove-icon"></i></a></td>
                                                </tr> <?php $cnt=$cnt+1; }} ?>


                                                <tr> <?php $sql = "SELECT * from  letter_videomarketing ORDER BY RAND()
                                                    LIMIT 1";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {               ?>
                                                    <th scope="row"><i class="fas fa-check"></i></th>
                                                    <td class="note-desc"><a
                                                            href="view-video-marketing.php?edit=<?php echo $result->id;?>"><?php echo htmlentities($result->title);?>
                                                        </a></td>
                                                    <td><a
                                                            href="view-video-marketing.php?edit=<?php echo $result->id;?>">
                                                            <i class="far fa-eye view-icon"></i></a></td>
                                                    <td><a href=""><i class="far fa-trash-alt remove-icon"></i></a></td>
                                                </tr> <?php $cnt=$cnt+1; }} ?>



                                                <tr> <?php $sql = "SELECT * from  letter_healthfitness ORDER BY RAND()
                                                    LIMIT 2";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {               ?>
                                                    <th scope="row"><i class="fas fa-check"></i></th>
                                                    <td class="note-desc"><a
                                                            href="view-health-fitness.php?edit=<?php echo $result->id;?>"><?php echo htmlentities($result->title);?>
                                                        </a></td>
                                                    <td><a
                                                            href="view-health-fitness.php?edit=<?php echo $result->id;?>">
                                                            <i class="far fa-eye view-icon"></i></a></td>
                                                    <td><a href=""><i class="far fa-trash-alt remove-icon"></i></a></td>
                                                </tr> <?php $cnt=$cnt+1; }} ?>



                                                <tr> <?php $sql = "SELECT * from  letter_investment ORDER BY RAND()
                                                    LIMIT 3";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt=1;
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {               ?>
                                                    <th scope="row"><i class="fas fa-check"></i></th>
                                                    <td class="note-desc"><a
                                                            href="view-investment.php?edit=<?php echo $result->id;?>"><?php echo htmlentities($result->title);?>
                                                        </a></td>
                                                    <td><a href="view-investment.php?edit=<?php echo $result->id;?>"> <i
                                                                class="far fa-eye view-icon"></i></a></td>
                                                    <td><a href=""><i class="far fa-trash-alt remove-icon"></i></a></td>
                                                </tr> <?php $cnt=$cnt+1; }} ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-distributed py-5">
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
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>·
                        <li class="nav-item"><a class="nav-link" href="#">Blog</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>

                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>

                        <li class="nav-item"><a class="nav-link" href="#">Faq</a></li>

                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    </ul>

                    <p class="footer-company-name text-light pl-3">Company Name © 2019</p>
                </div>

                <div class="col-12 col-md-4 text-light py-4 pl-md-5">
                    <ul class="nav flex-column">
                        <li class="nav-item my-3">
                            <i class="fa fa-map-marker mr-3"></i>
                            <span>21 Revolution Street</span> Paris, France

                        </li>

                        <li class="nav-item my-3">
                            <i class="fa fa-phone mr-3"></i>
                            +1 555 123456
                        </li>

                        <li class="nav-item my-3">
                            <i class="fa fa-envelope mr-3"></i>
                            <a class="text-light" href="mailto:support@company.com">support@company.com</a>
                        </li>
                    </ul>

                </div>

                <div class="col-12 col-md-2">

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
                </div>
            </div>




    </footer>

    </div>

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="src/index.js"></script>
</body>

</html>

<?php } ?>