<?php
ob_start();
session_start();
error_reporting(0);

include 'includes/connect.php'; 

if($_POST['submit']){
	
	function returnheader($location){
		$returnheader = header("location: $location");
		return $returnheader;
	}
	$errors = array();
	
	if(isset($_POST["in-dex"])){
	
	$uname = trim(htmlentities($_POST['username']));
	$pass = trim(htmlentities($_POST['pass']));
	
	if(!$errors){

		$query = "SELECT * FROM users WHERE username = '".mysql_real_escape_string($uname)."' AND password = '".mysql_real_escape_string($pass)."' AND role = 1 AND status = 1";
		$result = mysql_query($query) OR die(mysql_error());
		$result_num = mysql_fetch_array($result);
		$rows = mysql_num_rows($result);
		
		$a_id = stripslashes($result_num["u_id"]);
		$a_username = stripslashes($result_num["username"]);
			
		if($rows == 1){
				
				$_SESSION['a_id'] = $a_id;
				$_SESSION['a_username'] = $a_username;
				$_SESSION['role'] = "Admin";
				
				returnheader("admin/index.php");
		}
		else {
			$errors[] = "Your username or password are incorrect!";
		}
	}
	} else {
		$uname = "";
	}
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Members Info - Zenith Team Official Website</title>
  	<meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/prettyPhoto.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.4.1.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
<script language="JavaScript" src="js/gen_validatorv4.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

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
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="main-indents">
    <div class="main">
        <!-- Header -->
        <header>
            <h1 class="logo"><a href="index.php">Diving Club</a></h1>
            <?php include 'menu.php'; ?>
            <div class="clear"></div>
        </header>
        <!-- Start Slider --><!-- End Slider -->
        <?php include 'sliders.php'; ?>
        <!-- Content -->
      <section id="content"><div class="ic"></div>
            <div class="container_12">
            	<article class="a2">
                	<div class="wrapper">
       	  <div class="col-10" style="padding-left:300px;">
                     <br /><br />
                            <h3>ADMINISTATOR Login</h3>
<span style="font-size:13px; font-style:italic; color:#FF0000;"><?php
									if(count($errors) > 0){
										foreach($errors as $error){
											echo $error . "<br />";
										}
									} else {
										echo "";
									}
								?>
                                </span>
                            <form method="POST" id="login-form" action="" name="login">
                              <span id="sprytextfield1">
                              <input type="text" name="username" placeholder="User ID" autocomplete="off" size="40">
                              <span class="textfieldRequiredMsg">Masukkan User ID Anda.</span></span>
                              
                              <span id="sprytextfield2">
                              <input type="password" name="pass" placeholder="Kata Laluan" autocomplete="off" size="40">
                              <input name="in-dex" type="hidden" value="1" />
                              <span class="textfieldRequiredMsg">Masukkan Kata Laluan Anda.</span></span>
                              <div class="wrapper">
                                    <div class="login-form-col-1" style="float:left;">
                                   <ul class="list-1" style="float:left;">
                            </ul> </div>
                                    <div class="login-form-col-2">
                                        <input name="submit" type="submit" value="Login" class="btn-submit">
                                    </div>
                                </div>
                          </form>
                         
                            
                      </div>
                    </div>
                </article>
                
            </div>
        </section>
        <!-- Footer -->
        <footer>
            <?php include 'includes/inc-footer.php'; ?>
            <ul class="social-list">
            	<li><a href="http://instagram.com/zenithteam"><img src="images/soc-icon-1.png" alt=""></a></li>
                <li><a href="https://www.facebook.com/groups/232109630283235/"><img src="images/soc-icon-2.png" alt=""></a></li>
                <li><a href="#"><img src="images/soc-icon-3.png" alt=""></a></li>
            </ul>
        </footer>
    </div>
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
</body>
</html>
