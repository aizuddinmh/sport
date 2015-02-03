<?php 
ob_start();
session_start();
error_reporting(0);
include('check_user.php');
include('../includes/connect.php');
include('../includes/functions.php');
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
    <script type="text/javascript" src="js/gen_validatorv4.js"></script>
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
                	<h2>RESERVATION (STEP 4)</h2>
                    <table width="100%" border="1">
                      <tr>
                        <td width="70%">
                        	<form method="post" action="" name="book" />
							<table width='100%' border='0' cellpadding='2' cellspacing='2' id='booking' class="hovertable">
                                <tr>
                                    <th width='45%' align='left'>Start</th>
                                    <th width='45%' align='left'>End</th>
                                    <th width='10%' align='left'>Book</th>			
                                </tr>
                                <?php 
							
								$datebook = $_SESSION['y'] . '-' . $_SESSION['m'] . '-' . $_SESSION['d'];
								$cid = $_SESSION['cid'];
								$sql = mysql_query("SELECT * FROM slots p WHERE  NOT EXISTS (SELECT * FROM bookings od WHERE  p.start = od.start AND od.date = '$datebook' AND od.c_id = $cid)");
								if(mysql_num_rows($sql) > 0){
									while($res = mysql_fetch_array($sql)){
								?>
                                <tr>
                                	<td><?php echo $res['start']; ?></td>
                                	<td><?php echo $res['end']; ?></td>
                                	<td width='10%' align="center">
                                    <input name="slot[]" value="<?php echo $res['id']; ?>" type='checkbox'>
                                    <input name="date_book" value="<?php echo $datebook; ?>" type='hidden'></td>
                                </tr>
                                <?php }}else{ ?>
                                <tr>
                                  <td colspan="3" align="center">Not Available</td>
                                </tr>
                                <?php } ?>
                            </table>
                            <br />
                            <input name="term" type="checkbox" value="">Saya bersetuju dengan syarat dan terma.
                            <br />
                            <div align="right">
                       		  <input type='submit' class='classname' name="book" value='Submit Booking >>'>
                        	</div>
                            </form>
                            <script  type="text/javascript">
								var frmvalidator = new Validator("book");
								frmvalidator.addValidation("term","shouldselchk=on","Sila klik pada terma dan syarat.");
							</script>
                        </td>
                        <td width="30%" valign="top" align="left" style="padding:6px; line-height:25px;">
                          <a href="calendar.php"><strong>&#8592; Pilih Tarikh Lain</strong></a><br />
                          
                          <table width="100%" border="1">
                            <tr>
                              <td width="51%"><strong>Tarikh</strong></td>
                              <td width="3%"><strong>:</strong></td>
                              <td width="46%"><?php echo $_SESSION['d'] . '-' . $_SESSION['m'] . '-' . $_SESSION['y']; ?></td>
                            </tr>
                            <tr>
                              <td><strong>Fasiliti</strong></td>
                              <td><strong>:</strong></td>
                              <td><?php echo getFasi($_SESSION['fid']); ?></td>
                            </tr>
                            <tr>
                              <td><strong>Court</strong></td>
                              <td><strong>:</strong></td>
                              <td><?php echo getDetail($_SESSION['cid']); ?></td>
                            </tr>
                          </table>                          
                        <p>&nbsp;</p></td>
                      </tr>
                    </table>
                    <br />
                        
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
	extract($_REQUEST);
	if($book){
		$booking_id = time();
		
		for($i=0; $i < count($slot); $i++){
			$query = mysql_query("SELECT start FROM slots WHERE id = $slot[$i]");
			$result = mysql_fetch_array($query);
			
			$sql = mysql_query("INSERT INTO bookings SET booking_id = '$booking_id', date = '$date_book', start = '".$result['start']."', u_id = '".$_SESSION['u_id']."', f_id = '".$_SESSION['fid']."', c_id = '".$_SESSION['cid']."'");
		}
		
		$query = mysql_query("SELECT * FROM bookings WHERE booking_id = '$booking_id'");
		while($myrows = mysql_fetch_array($query)){
		extract($myrows);
			$myquery = mysql_query("INSERT INTO history SET b_id = '$id', booking_id = '$booking_id', u_id = '".$_SESSION['u_id']."', c_id = $c_id, f_id = $f_id, `date` = '$date',	start = '$start'");
		}
		
		if($sql){
			unset($_SESSION['d']);
			unset($_SESSION['m']);
			unset($_SESSION['y']);
			unset($_SESSION['fid']);
			unset($_SESSION['cid']);
			
			header("location:history.php");
		}
	}
?>