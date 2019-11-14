<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
} 
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






    <title>CopyRamp - Saved Sales Letters</title>
</head>

<body>
    <div class="container-fluid h-100">
        <div class="d-flex">
            <div class="h-100 sidebar-wrap clear-gutters">
                <div class="sidebar">
                    <nav class="d-none navbar flex-column navbar-expand navbar-light navbar-collapsed">
                        <div class="d-flex logo-wrap">
                            <img class="logo" src="assets/img/logo.svg" alt="logo">

                        </div>
                        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                            <ul class="navbar-nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-columns"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="select.html"><i class="fas   fa-hand-point-up"></i>
                                    </a>
                                </li>
                                <li class="nav-item active">
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
                                <li class="nav-item">
                                    <a class="nav-link" href="dashboard.php"><i class="fas fa-columns dash"></i> <span
                                            class="home">Dashboard</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="select.php"><i class="fas   fa-hand-point-up point"></i>
                                        <span class="home">Select Your Niche</span></a>
                                </li>
                                <li class="nav-item active">
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

                        <!--  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link mr-4" href="#">Account Setting
                                    <a class="nav-item nav-link" href="#">Sign Out</a>
                            </div>
                        </div> -->
                    </nav>

                    <div class="content-wrap">
                        <div class="content-title">
                            <h3 class="title mb-0">
                                Your Saved Sales Letters
                            </h3>
                            <h6 class="text-muted sub-title">
                                Please note you can only edit and download your modified <strong>Sales letter</strong>
                                in
                                <u>DOC</u> format.
                            </h6>
                        </div>
                        <div class="content table-responsive table-full-width">

                            <div class="table-wrap border mt-4 p-3">


                                <table id="zctb" class="display table table-striped table-bordered table-hover"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <!-- <th>Niche</th> -->
                                            <th>Sales Letter Title</th>
                                            <th>Description</th>
                                            <!--   <th>Gender</th>
                                                <th>Phone</th>
                                                <th>Designation</th>
                                                <th>Account</th> -->
                                            <th>View Letter</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
$email = $_SESSION['alogin'];
//$sql = "SELECT * FROM favorite WHERE email = (:email);";
$sql = "SELECT * from  favorite WHERE email ='$email'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
//if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <!--  <td><?php echo htmlentities($result->niche);?></td> -->
                                            <td><?php echo htmlentities($result->title);?></td>
                                            <td><?php echo htmlentities($result->description);?></td>
                                            <!-- <td><?php echo htmlentities($result->gender);?></td>
                                            <td><?php echo htmlentities($result->mobile);?></td>
                                            <td><?php echo htmlentities($result->designation);?> 
                                            <td>  -->

                                            <!--   <?php if($result->status == 1)
                                                    {?>
                                                    <a href="userlist.php?confirm=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Un-Confirm the Account')">Confirmed <i class="fa fa-check-circle"></i></a> 
                                                    <?php } else {?>
                                                    <a href="userlist.php?unconfirm=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Confirm the Account')">Un-Confirmed <i class="fa fa-times-circle"></i></a>
                                                    <?php } ?>
</td>
                                            </td> -->

                                            <td>
                                                <a href="view-saved.php?edit=<?php echo $result->id;?>" rel="tooltip"
                                                    title="View">&nbsp; <i class="fa fa-eye"
                                                        style="color:rgb(42, 108, 187); font-size: 35px;"></i></a>&nbsp;&nbsp;
                                            </td>
                                        </tr>
                                        <?php $cnt=$cnt+1; }} ?>

                                    </tbody>
                                </table>


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

    <!-- Loading Scripts -->

    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>




    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="src/index.js"></script>
</body>

</html>


<?php } ?>