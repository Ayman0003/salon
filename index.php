<?php 
include('includes/dbconnection.php');
session_start();
error_reporting(0);

// Handling Appointment Form Submission
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $services = $_POST['services'];
    $adate = $_POST['adate'];
    $atime = $_POST['atime'];
    $phone = $_POST['phone'];
    $aptnumber = mt_rand(100000000, 999999999);

    $query = mysqli_query($con, "INSERT INTO tblappointment (AptNumber, Name, Email, PhoneNumber, AptDate, AptTime, Services) VALUES ('$aptnumber', '$name', '$email', '$phone', '$adate', '$atime', '$services')");
    if ($query) {
        $ret = mysqli_query($con, "SELECT AptNumber FROM tblappointment WHERE Email='$email' AND PhoneNumber='$phone'");
        $result = mysqli_fetch_array($ret);
        $_SESSION['aptno'] = $result['AptNumber'];
        echo "<script>window.location.href='thank-you.php'</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}

// Handling Subscription Form Submission
if(isset($_POST['sub'])) {
    $email = $_POST['email'];

    // Ensure email is not empty and valid before inserting
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = mysqli_query($con, "INSERT INTO tblsubscriber (Email) VALUES ('$email')");
        if ($query) {
            echo "<script>alert('You have subscribed successfully!');</script>";
            echo "<script>window.location.href ='index.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    } else {
        echo "<script>alert('Please enter a valid email address.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Salon Wassim || Home Page </title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i%7cMontserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js "></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js "></script>
<![endif]-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body>
    <?php include_once('includes/header.php');?>
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                    <h1 class="hero-title">Salon Wassim</h1>
                    <p class="hero-text"><strong>Your Types. Your Style. Your Color.</strong> </p>
                    <a href="appointment.php" class="btn btn-default">Make an Appointment</a> </div>
            </div>
        </div>
    </div>
   
    <div class="space-medium bg-default">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12"><img src="images/1.jpg" alt="" class="img-responsive"></div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="well-block">
                        <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <h1><?php  echo $row['PageTitle'];?></h1>
                        <h5 class="small-title ">best experience ever</h5>
                        <p><?php  echo $row['PageDescription'];?></p><?php } ?>
                         </div>
                </div>
            </div>
        </div>
    </div>
   
   
    <div class="footer">
        <!-- footer-->
        <div class="container">
            <div class="footer-block">
                <!-- footer block -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget">
                            <h2 class="widget-title">Salon Address</h2>
                            <ul class="listnone contact">
                                <li><i class="fa fa-map-marker"></i> Souq l ghareb main road , Aley</li>
                                <li><i class="fa fa-phone"></i> +961 3986262</li>
                                <li><i class="fa fa-fax"></i> +961 5273262</li>
                                <li><i class="fa fa-envelope-o"></i> kashouhwassim@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-widget footer-social">
                            <!-- social block -->
                            <h2 class="widget-title">Social Feed</h2>
                            <ul class="listnone">
                            <li>
                                    <a href="https://www.facebook.com/profile.php?id=100057550925865&mibextid=LQQJ4d" target="_blank"> <i class="fab fa-facebook"></i> Facebook </a>
                                </li>
                              
                                <li><a href="https://www.instagram.com/salon_wissam" target="_blank" ><i class="fab fa-instagram"></i> Instagram</a></li>
                                <li><a href="https://www.tiktok.com/@wassimhairsalon?_t=8raoclT86FN&_r=1" target="_blank">
                                    <i class="fab fa-tiktok"></i>Tiktok</a></li>
                                    
                                <li><a href="https://wa.me/9613986262" target="_blank"><i class="fab fa-whatsapp"></i> Whatsapp</a></li>
                                <li>
                                    
                                </li>
                            </ul>
                        </div>
                        <!-- /.social block -->
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="footer-widget widget-newsletter">
                            <!-- newsletter block -->
                            <h2 class="widget-title">Newsletters</h2>
                            <p>Enter your email address to receive new patient information and other useful information right to your inbox.</p>
                            <form method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter your email address" name="email">
                                <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" value="submit" name="sub">Subscribe</button>
                            </span>
                            </div></form>
                            <!-- /input-group -->
                        </div>
                        <!-- newsletter block -->
                    </div>
                </div>
                <div class="tiny-footer">
                    <!-- tiny footer block -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright-content">
                                <p>© Salon Wassim | all rights reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tiny footer block -->
            </div>
            <!-- /.footer block -->
        </div>
    </div>    <!-- /.footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menumaker.js"></script>
    <!-- sticky header -->
    <script src="js/jquery.sticky.js"></script>
    <script src="js/sticky-header.js"></script>
</body>

</html>
