<?php 
session_start();
error_reporting(0); 
include('check_user.php');
include '../includes/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Home - Zenith Team Official Website</title>
  	<meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.4.1.js"></script>
    <script src="js/slider.js"></script>
<!--[if lt IE 8]>
   <div style=' clear: both; text-align:center; position: relative;'>
     <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
    </a>
  </div>
<![endif]-->
<!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<link rel="stylesheet" href="css/ie.css"> 
<![endif]-->
</head>
<body>
<div class="main-indents">
    <div class="main">
        <!-- Header -->
        <header>
            <h1 class="logo"><a href="index.php">WSCPUKM</a></h1>
            <?php include 'menu.php'; ?>
            <div class="clear"></div>
        </header>
        <!-- Start Slider -->
        <?php include 'sliders.php'; ?>
        <!-- End Slider -->
        
        
        <!-- Content -->
        <section id="content"><div class="ic"></div>
            <div class="container_12">
            	
                <article class="a2">
                	<div class="wrapper">
                    	<div class="col-9">
                        	
                            <div class="col-007">
                        	<h3>Pengumuman</h3><br />
                            <?php
								$kk = mysql_query("SELECT * FROM announcement ORDER BY id DESC");
								$jj = mysql_fetch_array($kk);
								if(mysql_num_rows($kk)>0){
									echo "<strong>".$jj['title']."</strong><br /><br />".$jj['text']."<br /><br /><a href='announcement.php'>Lihat Pengumuman Lain</a>";
								}
								else{	
									echo "Tiada Pengumuman Dibuat";
								}
							?>
                        </div>
                      </div>
                        <div class="col-10">
                     
                            &nbsp;
                         
                            
                      </div>
                    </div>
                </article>
                <article class="a1">
                	<div class="wrapper" style="background-color:#000000; padding-left:10px;">
							<div class="extra-wrap">
                            <h3 style="color:#FFFFFF">
                                <span class="welcome" style="color:#fffd7f">Selamat Datang</span>
                                ke UNITEN ONLINE SPORT FACILITIES BOOKING SYSTEM</h3>
<p class="p1" style="color:#FFFFFF">
                                <!--<a href="about.php">Click here</a> for more info about this club.--> </p>
                      </div> 
                    </div>
              </article>
            </div>
        </section>
        <!-- Footer -->
        <footer>
            <?php include 'includes/inc-footer.php'; ?>

        </footer>
    </div>
</div>
</body>
</html>