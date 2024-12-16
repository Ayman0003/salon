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

<style>
    .row {
  display: flex;
  flex-wrap: wrap;
  padding: 0 0px;
  margin: 0;
}

/* Create four equal columns that sits next to each other */
.column {
  flex: 25%;
  max-width: 25%;
  padding: 0 4px;
}

.column img {
height: 35rem;
  margin-top: 8px;
  vertical-align: middle;
  width: 100%;
}
.row1 {
  display: flex;
  flex-wrap: wrap;
  margin: 2rem;
}
.row1 video {
  margin: 0;
  vertical-align: middle;
  width: 30%;
  margin-left: 1.5rem;
  border-radius: 1rem;
  height: 80rem;
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column {
    flex: 50%;
    max-width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    flex: 100%;
    max-width: 100%;
  }
  
}
div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

/* Center the div using Flexbox */
.center-div {
    display: flex;
    justify-content: center; /* Horizontally center */
    align-items: center;     /* Vertically center */
    height: auto;
    margin-bottom: 3rem;           /* Ensure the div takes up full height of the viewport */
}

.responsive {
    /* Add a width or max-width if necessary */
    max-width: 400px; 
    width: 400px;
    margin: 0 auto; /* Horizontal centering */
}


@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}


.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

</style>
</head>

<body>
    <?php include_once('includes/header.php');?>
    
    <!-- body start nigga  !-->

<!-- Container that holds the responsive div -->

<div class="center-div">
    <div class="responsive">
        <div class="gallery">
            <img src="images/wlogo.png" alt="Cinque Terre">
            <div class="desc">Wassim Kashouh</div>
        </div>
    </div>
</div>

    <div class="row">

  <div class="column">
    <img src="images/w1.jpg">
    <img src="images/w2.jpg">
  </div>

  <div class="column">
    <img src="images/w3.jpg">
    <img src="images/w4.jpg">
  </div> 
  
   <div class="column">
    <img src="images/w5.jpg">
    <img src="images/w6.jpg">
  </div>  

  <div class="column">
    <img src="images/w7.jpg">
    <img src="images/w8.jpg">
  </div>

</div>
<div class="row1">
<video autoplay muted loop src="w1.mp4"></video>
<video autoplay muted loop src="w2.mp4"></video>
<video class="vidh1" autoplay muted loop src="w4.mp4"></video>


</div>



<div class="center-div">
    <div class="responsive">
        <div class="gallery">
            <img src="images/rlogo.png" alt="Cinque Terre">
            <div class="desc">Rawan Zaidan</div>
        </div>
    </div>
</div>

    <div class="row">

  <div class="column">
    <img src="images/post-img-1.jpg">
    <img src="images/recent-post-img.jpg">
  </div>

  <div class="column">
    <img src="images/post-img-2.jpg">
    <img src="images/recent-post-img-1.jpg">
  </div> 
  
   <div class="column">
    <img src="images/post-img-1.jpg">
    <img src="images/recent-post-img.jpg">
  </div>  

  <div class="column">
    <img src="images/post-img-1.jpg">
    <img src="images/recent-post-img.jpg">
  </div>

</div>
<div class="row1">
<video autoplay muted loop src="videos/VID-20241122-WA0313.mp4"></video>
<video autoplay muted loop src="videos/VID-20241122-WA0313.mp4"></video>
<video class="vidh1" autoplay muted loop src="videos/VID-20241122-WA0313.mp4"></video>


</div>



<div class="center-div">
    <div class="responsive">
        <div class="gallery">
            <img src="images/slogo.png" alt="Cinque Terre">
            <div class="desc">Sarah Ridah</div>
        </div>
    </div>
</div>

    <div class="row">

  <div class="column">
    <img src="images/s1.jpg">
    <img src="images/s3.jpg">
  </div>

  <div class="column">
    <img src="images/s2.jpg">
    <img src="images/s4.jpg">
  </div> 
  
   <div class="column">
    <img src="images/s5.jpg">
    <img src="images/s6.jpg">
  </div>  

  <div class="column">
    <img src="images/s7.jpg">
    <img src="images/s8.jpg">
  </div>

</div>
<div class="row1">
<video autoplay muted loop src="videos/VID-20241122-WA0313.mp4"></video>
<video autoplay muted loop src="videos/s2.mp4"></video>
<video class="vidh1" autoplay muted loop src="videos/VID-20241122-WA0313.mp4"></video>

</div>



<div class="center-div">
    <div class="responsive">
        <div class="gallery">
            <img src="images/user0.jpg" alt="Cinque Terre">
            <div class="desc">Ghiwa Fattouh</div>
        </div>
    </div>
</div>

    <div class="row">

  <div class="column">
    <img src="images/g1.jpg">
    <img src="images/g2.jpg">
  </div>

  <div class="column">
    <img src="images/g3.jpg">
    <img src="images/g4.jpg">
  </div> 
  
   <div class="column">
    <img src="images/g5.jpg">
    <img src="images/g6.jpg">
  </div>  

  <div class="column">
    <img src="images/g7.jpg">
    <img src="images/g8.jpg">
  </div>

</div>
<div class="row1">
<video autoplay muted loop src="videos/g1.mp4"></video>
<video autoplay muted loop src="videos/g2.mp4"></video>
<video class="vidh1" autoplay muted loop src="videos/g3.mp4"></video>


</div>

    
    <!-- body finish nigga  !-->


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
