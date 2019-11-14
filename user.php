<?php
session_start();
error_reporting(1);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{


if(isset($_POST['submit']))
  {
    
  //  $file = $_FILES['image']['name'];
  // $file_loc = $_FILES['image']['tmp_name'];
  //   $folder="images/";
  //   $new_file_name = strtolower($file);
  //   $final_file=str_replace(' ','-',$new_file_name);


    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    //$password=md5($_POST['password']);
    $postal=$_POST['postal'];
    $username=$_POST['username'];
    $address=$_POST['address'];
    $about=$_POST['about'];
    $idedit=$_POST['idedit'];

    // if(move_uploaded_file($file_loc,$folder.$final_file))
    //   {
    //        $image=$final_file;
    //    }


    $sql="UPDATE users SET firstname=(:firstname), lastname=(:lastname), email=(:email), city=(:city), country=(:country), postal=(:postal), about=(:about), username=(:username), address=(:address) WHERE id=(:idedit)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query-> bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':city', $city, PDO::PARAM_STR);
    $query-> bindParam(':country', $country, PDO::PARAM_STR);
    $query-> bindParam(':postal', $postal, PDO::PARAM_STR);
    $query-> bindParam(':about', $about, PDO::PARAM_STR);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':address', $address, PDO::PARAM_STR);
    //$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> bindParam(':idedit', $idedit, PDO::PARAM_STR);
    if ($query->execute()) { 

    $msg="Profile information has been updated successfully!";

   } 
   else
   {
      $error="Failed to update profile information, please try again!";

   }
}    





// Code for change password 
if(isset($_GET['edit']))
    {
        $editid=$_GET['edit'];
    }


    
if(isset($_POST['change']))
  {
    
  

   $password = $_POST['password'];
   $password=md5($_POST['password']);
   $newpassword=md5($_POST['newpassword']);
   $idedit=$_POST['idedit'];

   $ckp = $dbh->prepare("SELECT * FROM `users` WHERE `id`=:idedit AND password=:password");
        $ckp->bindParam(':password',$password);
        $ckp->bindParam(':idedit',$idedit);
        $ckp->execute();
        if($ckp->rowCount() < 1){
    $error ="Failed! Your old password is incorrect!";
        }


   if(empty($error)){

    $sql="UPDATE users SET password=(:newpassword) WHERE id=(:idedit)";
    $query = $dbh->prepare($sql);
    $query-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $query-> bindParam(':idedit', $idedit, PDO::PARAM_STR);
    if ($query->execute()) { 

    $msg="Your password has been updated successfully!";

   } 
   else
   {
      $error="Sorry, there was an error while trying to update your password!\nPlease try again later.";

   }
} 
}   


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CopyRamp - Account Settings</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/index.css">
    <link rel="stylesheet" href="lib/font-awesome/all.min.css">



    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                alert("New password and confirm password field do not match!");
                document.chngpwd.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body>

    <!--  Fetch user from database and edit. -->
    <?php
        $email = $_SESSION['alogin'];
        $sql = "SELECT * from users where email = (:email);";
        $query = $dbh -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $result=$query->fetch(PDO::FETCH_OBJ);
        $cnt=1; 
?>


    <div class="container-fluid h-100">
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
                                <li class="nav-item active">
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
                                <li class="nav-item active">
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
                        <a class="text-dark" href="#">Account Setting</a>

                        <!-- <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link mr-4" href="dashboard.html">Dashboard</a>
                                <a class="nav-item nav-link" href="#">Sign Out</a>
                            </div>
                        </div> -->
                    </nav>

                    <div class="content-wrap">



                        <div class="container">
                            <div class="form-area">
                                <div>

                                    <form method="post" class="profileForm">
                                        <?php if($error){?><div class="errorWrap"><strong class="btn btn-danger">ERROR:
                                                <?php echo htmlentities($error); ?> </strong></div><?php } 
                else if($msg){?><div class="succWrap"><strong class="btn btn-success">SUCCESS:
                                                <?php echo htmlentities($msg); ?> </strong> </div><?php }?>
                                        <div class="content-title mb-5">
                                            <h3 class="title text-dark mb-0">
                                                Edit Profile
                                            </h3>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4 order-2 order-md-1">
                                                <label for="username" class="firstNameAccount">FIRST NAME</label>
                                                <input type="text" id="username" name="firstname" size="35"
                                                    class="c-field"
                                                    value="<?php echo htmlentities($result->firstname);?>">
                                            </div>
                                            <div class="form-group col-md-4 order-3 order-md-2">
                                                <label for="name" class="firstNameAccount">LAST NAME</label>
                                                <input type="text" id="name" name="lastname" class="c-field"
                                                    value="<?php echo htmlentities($result->lastname);?>">
                                            </div>
                                            <div class="form-group col-md-4 order-1 order-md-3">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <!-- <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg">
                                                        <label for="imageUpload">Upload</label> -->
                                                    </div>
                                                    <!--  <div class="avatar-preview">
                                                        <div id="imagePreview">
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4 order-4 order-md-4">
                                                <label for="email" class="firstNameAccount">USERNAME</label>
                                                <input type="text" id="email" name="username" class="c-field"
                                                    value="<?php echo htmlentities($result->username);?>" readonly>
                                            </div>
                                            <div class="form-group col-md-8 order-5 order-md-5">
                                                <label for="email" class="firstNameAccount">EMAIL ADDRESS</label>
                                                <input type="email" id="email" name="email" class="c-field" readonly
                                                    value="<?php echo htmlentities($result->email);?>">
                                            </div>
                                            <div class="form-group col-md-6 order-6 order-md-6">
                                                <label for="email" class="firstNameAccount">SHORT BIO</label>
                                                <input type="text" id="email" name="about" class="c-field"
                                                    value="<?php echo htmlentities($result->about);?>">
                                            </div>
                                            <div class="form-group col-md-6 order-7 order-md-7">
                                                <label for="email" class="firstNameAccount">ADDRESS</label>
                                                <input type="text" id="email" name="address" class="c-field"
                                                    value="<?php echo htmlentities($result->address);?>">
                                            </div>
                                            <div class="form-group col-md-4 order-8 order-md-8">
                                                <label for="email" class="firstNameAccount">CITY</label>
                                                <input type="text" id="email" name="city" class="c-field"
                                                    value="<?php echo htmlentities($result->city);?>">
                                            </div>
                                            <div class="form-group col-md-4 order-9 order-md-9">
                                                <label for="email" class="firstNameAccount">COUNTRY</label>
                                                <input type="text" id="email" name="country" class="c-field"
                                                    value="<?php echo htmlentities($result->country);?>">
                                            </div>
                                            <div class="form-group col-md-4 order-10 order-md-10">
                                                <label for="email" class="firstNameAccount">POSTAL CODE</label>
                                                <input type="number" id="email" name="postal" class="c-field"
                                                    value="<?php echo htmlentities($result->postal);?>">
                                            </div>
                                        </div>
                                        <div class="profbuttons mt-4 order-11 order-md-11">
                                            <div><a href="change-password.php?edit=<?php echo $result->id;?>"
                                                    class="btn btn-danger buttonPass" data-toggle="modal"
                                                    data-target="#exampleModalCenter">Change Password</a></div>
                                            <div>
                                                <input type="hidden" name="image"
                                                    value="<?php echo htmlentities($result->image);?>">
                                                <input type="hidden" name="idedit"
                                                    value="<?php echo htmlentities($result->id);?>">
                                                <input type="submit" name="submit" class="c-btn updateButton"
                                                    value="Update Profile">
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header border-0">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Update
                                                            Password
                                                        </h5>
                                                        <?php if($error){?><div class="btn btn-danger">
                                                            <strong>ERROR:</strong> <?php echo htmlentities($error); ?>
                                                        </div><?php } 
                else if($error){?><div class="btn btn-danger"><strong>FAILED:</strong>
                                                            <?php echo htmlentities($error); ?> </div><?php }

                else if($msg){?><div class="btn btn-success"><strong>SUCCESS:</strong>
                                                            <?php echo htmlentities($msg); ?> </div><?php }
                ?>
                                                        <button type="button" class="close mx-0" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span class="close-btn" aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body update-box">
                                                        <form method="post" name="chngpwd">
                                                            <div class="form-group">
                                                                <label for="old-password">Old Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="old-password" name="password"
                                                                    aria-describedby="passwordHelp" placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="new-password">Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="new-password" name="newpassword" placeholder="">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="new-password">Confirm Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="new-password" name="confirmpassword"
                                                                    placeholder="">
                                                            </div>

                                                            <input type="hidden" name="idedit"
                                                                value="<?php echo htmlentities($result->id);?>">

                                                            <div class="modal-footer border-0 text-right">
                                                                <button type="submit" name="change"
                                                                    class="btn btn-change-pwd">Update
                                                                    Password</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
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

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="src/index.js"></script>
</body>

</html>



<?php } ?>