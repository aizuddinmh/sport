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
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>

<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main-indents">
    <div class="main">
        <!-- Header -->
        <header>
            <h1 class="logo"><a href="index.php">Diving Club</a></h1>
            <?php if($_SESSION['login']!=""){ include 'menu-ahli.php';} else{ include 'menu.php'; } ?>
            <div class="clear"></div>
        </header>
        <!-- Slider -->
        <?php include 'sliders.php'; ?>
<!-- Content -->
        <section id="content"><div class="ic"></div>
            <div class="container_12">
            	<article class="a2">
                	<div class="wrapper">
                    	<div class="col-9">
                        	
                            <div class="col-007">
                        	<h3>Register</h3>
                            <form id="reg-form" method="post" action="" name="register">
                                <fieldset>
                                
                                Nama : <input type="text" name="nama">
                                Alamat : <textarea name="alamat"></textarea>
                                No Telefon : <input name="phone" type="text" style="width:280px;">
                                Alamat Emel : <input name="email" type="text" style="width:280px;">
                                ID Pelajar : <input name="studentid" type="text" style="width:280px;">
                                Kata Laluan : <input name="password" type="password" style="width:280px;">
                                Kata Laluan (Pengesahan) : <input name="repass" type="password" style="width:280px;">
                                <br>
                                <input name="submit-reg" type="submit" value="Submit" class="btn-submit"> 
                                </fieldset>
                            </form>
                            <script  type="text/javascript">
								 var frmvalidator = new Validator("register");
									frmvalidator.addValidation("nama","req","Please Enter Your Name");
									frmvalidator.addValidation("alamat","req","Please Enter Your Address");
									frmvalidator.addValidation("phone","req","Please Enter Your Phone Number");
									frmvalidator.addValidation("email","req","Please Enter Your Email");
									frmvalidator.addValidation("email","email","Please Enter Valid Email");
									frmvalidator.addValidation("studentid","req","Please Enter Your Student ID");
									
									
									frmvalidator.addValidation("password","req","Please Enter Your Password");
									frmvalidator.addValidation("repass","req","Please Re-Type Your password");
									frmvalidator.addValidation("repass","eqelmnt=password","The confirmed password is not same as password");
									
							</script>
                        </div>
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

</body>
</html>
<?php
if (!empty($_POST['submit-reg'])) {
	extract($_REQUEST);
	
	include 'includes/connect.php'; 
	
	date_default_timezone_set("Asia/Kuala_Lumpur");
	$today = date("Y-m-d");
	

	$sql = "INSERT INTO users(username, student_id, password, name, address, phone, email, role, status)
	VALUES('$studentid', '$studentid', '$repass', '$nama', '$alamat', '$phone', '$email', 2, 1)";
	$res = mysql_query($sql);

	
	if($res){
		echo "<script type='text/javascript'>";
		echo "alert('TQ, Your Application Has Been Received')";
		echo "</script>";	
		echo "<meta http-equiv='refresh' content='0; url=register.php'>";
	}
}
?>