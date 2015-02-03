<?php 
ob_start();
session_start();
error_reporting(0); 
include('check_user.php');
include('../includes/functions.php');
date_default_timezone_set('Asia/Kuala_Lumpur'); 
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
        
        
        
        <!-- Content -->
        <section id="content"><div class="ic"></div>
            <div class="container_12">
            	<article class="a2">
                	<h2>RESERVATION (STEP 3)</h2>
                    <table width="100%" border="1">
                      <tr>
                        <td width="70%"><?php include 'calendar2.php'; ?></td>
                        <td width="30%" align="left" style="min-height:600px; height:650px; padding:6px; line-height:25px;" valign="top">
                        <a href="select_court.php" style="padding:6px;">
                        <strong>&#8592; Pilih Court Lain</strong></a><br />
                        <table width="100%" border="1">
                            <tr>
                              <td width="51%"><strong>Fasiliti</strong></td>
                              <td width="3%"><strong>:</strong></td>
                              <td width="46%"><?php echo getFasi($_SESSION['fid']); ?></td>
                            </tr>
                            <tr>
                              <td><strong>Court</strong></td>
                              <td><strong>:</strong></td>
                              <td><?php echo getDetail($_SESSION['did']); ?></td>
                            </tr>
                          </table>
                         <br />
                        <table width="100%" border="1">
                          <tr>
                            <td bgcolor="#A598DE">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;Tutup</td>
                          </tr>
                          <tr>
                            <td bgcolor="#FBCE7D">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;Sebahagian telah ditempah</td>
                          </tr>
                          <tr>
                            <td bgcolor="#DA0000">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;Tempahan ditutup (Penuh)</td>
                          </tr>
                          <tr>
                            <td bgcolor="#8EFF8D">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>&nbsp;Available</td>
                          </tr>
                        </table>

                        </td>
                      </tr>
                    </table>

                	
            	</article>
            </div>
        </section>
        <!-- Footer -->
        <footer>
            <?php include '../includes/inc-footer.php'; ?>

        </footer>
    </div>
</div>
</body>
</html>
<?php
	if($_GET['act']=="get"){
		$_SESSION['d'] = $_GET['day'];
		$_SESSION['m'] = $_GET['month'];
		$_SESSION['y'] = $_GET['year'];
		header("location:select_slots.php");
	}
?>