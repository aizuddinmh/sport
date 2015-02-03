<?php 
ob_start();
session_start();
error_reporting(0);
include('check_user.php');
include('../includes/connect.php');
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
                	<h2>RESERVATION (STEP 1)</h2>
                    <table width="100%" border="1">
                      <tr>
                        <td width="70%">
						<?php
							
							$pic = mysql_query("SELECT * FROM facilities");
							$i = 1;
							echo "<table width='100%' align='center'><tr>";
						
								while($row = mysql_fetch_array($pic)){
								$name = $row['name'];
								$id_facilities = $row['id_facilities'];
								$bg = $row['bg'];
								
								echo "<td align='center' width='33%' bgcolor='$bg' height='200' style='font-size:18px; font-weight:bold; text-align: center; color:#000; line-height: 200px;border-radius: 25px; border: 4px solid #fff;'>"; 
									echo "<a href='select_facilities.php?id=$id_facilities&act=get'>".$name."</a>"; 
								echo "</td>";
							if ($i && $i%3 == 0) echo '</tr><tr>';
							  $i++;
							}
							echo "</table>";
						?>
                        </td>
                        <td width="30%" valign="top" align="left" style="padding:6px; line-height:25px;">
                        
                        * Sila pilih fasiliti untuk tempahan</td>
                      </tr>
                    </table>

                	<br /><br />
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
		$_SESSION['fid'] = $_GET['id'];
		header("location:select_court.php");
	}
?>