<?php
//Start session
session_start();
//Include the database configuration
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
} 


if(isset($_POST['login']))
{
$status='1';
$email=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT email,password FROM users WHERE email=:email and password=:password and status=(:status)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':status', $status, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];

//Login to dashboard if user details is correct
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{


// Send login error message
$error='<div class="alert alert-danger alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Login Failed! You may have provided wrong details or your account has been banned. <a href="contact-support.php"><span style="color:blue; font-size:17px;">Please Contact support</span></a></strong> 
</div>';
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CopyRamp - Login </title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,900|Source+Sans+Pro:300,400&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="src/index.css">
    <link rel="stylesheet" href="src/index.css">
    <link rel="stylesheet" href="lib/font-awesome/all.min.css">
</head>

<body>
	<section class="login-view">

		<div class="row no-gutters">

			<div class="col-12 col-lg-4 col-md-6">

				<div class="details">
					<div>
						<button class="navbar-toggler navbar-tog-custom" id="landing-btn" type="button"
							data-target="#collapsibleNavbar">
							<i class="fas fa-bars"></i>
						</button>
					</div>

					<div>
						<div class="container">
							<img src="assets/img/logo.svg" class="img-fluid" alt="Copyramp Logo">

						</div>
						<div class="mt-3">
							<h1 class="pl-2">COPYRAMP</h1>
							<p class="mt-2">everything salesletter</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-8 col-md-6">
				<nav class="login-nav pt-4">
					
					<div class="nav-extend">
						<!-- <a href="#">Features</a> -->
						<!-- <a href="https://www.copyramp.com" class="btn register">Home</a> -->
					</div>
				</nav> 
				<!-- <div class="profForm"> -->
				<div class="form-area form-login-wrap">
					<div>
						<h3>Account Login</h3>

						  <!-- Display the error message here. -->
                     <?php if (isset($error)) { echo $error; } ?> 
                     <!-- End display the error message here. -->
						<form method="post" class="mt-5">
							
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="email" id="email" name="username" class="c-field">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" id="password" name="password" size="35" class="c-field">
							</div>
							<div class="mt-5">
								<input type="submit" name="login" class="c-btn" value="LOG ME IN">
							</div>
						</form>
					</div>
				</div>
				<!-- </div> -->
			</div>
		</div>

	</section>
	
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
                        <li class="nav-item"><a class="nav-link" href="https://www.copyramp.com">Home</a></li>·
                        <li class="nav-item"><a class="nav-link" href="privacy.php">Privacy Policy</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="terms-use.php"> Terms of services</a></li>

                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact us</a></li>

                        <!-- <li class="nav-item"><a class="nav-link" href="#">Faq</a></li>

                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li> -->
                    </ul>

                    <p class="footer-company-name text-light pl-3">© 2019 <a href="https://www.copyramp.com" style="color: white;">CopyRamp</a> </p>
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
                            <a class="text-light" href="mailto:support@copyramp.com">support@copyramp.com</a>
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
	<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="src/index.js"></script>
</body>

</html>