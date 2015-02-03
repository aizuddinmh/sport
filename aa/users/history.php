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
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">  
        $(document).ready(function(){
            $("#report tr:odd").addClass("odd");
            $("#report tr:not(.odd)").hide();
            $("#report tr:first-child").show();
            
            $("#report tr.odd").click(function(){
                $(this).next("tr").toggle();
                $(this).find(".arrow").toggleClass("up");
            });
            //$("#report").jExpand();
        });
    </script>
    <style type="text/css">
        body { font-family:Arial, Helvetica, Sans-Serif; font-size:0.8em;}
        #report { border-collapse:collapse;}
        #report h4 { margin:0px; padding:0px;}
        #report img { float:right;}
        #report ul { margin:10px 0 10px 40px; padding:0px;}
        #report th { background:#7CB8E2; color:#000; padding:7px 15px; text-align:left;}
        #report td { background:#fff; color:#000; padding:7px 15px; }
        #report tr.odd td { background:#fff; cursor:pointer; }
        #report div.arrow { background:#fff url(arrows.png) no-repeat scroll 0px -16px; width:16px; height:16px; display:block;}
        #report div.up { background-position:0px 0px;}
    </style>
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
                	<h2>HISTORY</h2>
                    
                            <table width='100%' border='0' cellpadding='2' cellspacing='2' id="report">
                              <tr>
                                  <th width='13%' align='left'>Booking ID</th>
                                  <th width='16%' align='left'>Tarikh</th>
                                  <th width='64%' align='left'>Fasiliti</th>
                                  <th width='7%' align='left'>&nbsp;</th>			
                              </tr>
                                <?php 

								$sql = mysql_query("SELECT * FROM history WHERE u_id = '".$_SESSION['u_id']."' GROUP BY booking_id");
								if(mysql_num_rows($sql) > 0){
									while($res = mysql_fetch_array($sql)){
								?>
                                <tr>
                                	<td><?php echo $res['booking_id']; ?></td>
                                	<td><?php echo date('d-m-Y', strtotime($res['date'])); ?></td>
                                	<td width='64%'><?php echo getFasi($res['f_id']); ?></td>
                                    <td width='7%' align='center'><div class="arrow"></div></td>
           			  			</tr>
                                <tr>
                                	<td colspan="4" align="left" style="padding-left:60px;">
                                    		<div class="Table">
                                                <div class="Title">
                                                </div>
                                                <div class="Heading">
                                                    <div class="Cell">
                                                        Court No.
                                                    </div>
                                                    <div class="Cell">
                                                        Date
                                                    </div>
                                                    <div class="Cell">
                                                        Time
                                                    </div>
                                                    <div class="Cell">
                                                        Status
                                                    </div>
                                                    <div class="Cell">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                                <?php 
                                                    $sql2 = mysql_query("SELECT * FROM history WHERE booking_id = '".$res['booking_id']."'");
													$a = 1;
                                                    while($res2 = mysql_fetch_array($sql2)){ ?>
                                                        <div class="Row">
                                                            <div class="Cell">
                                                                <?php echo getDetail($res2['c_id']); ?>
                                                            </div>
                                                            <div class="Cell">
                                                                <?php echo date('d-m-Y', strtotime($res2['date'])); ?>
                                                            </div>
                                                            <div class="Cell">
                                                                <?php echo $res2['start']; ?>
                                                            </div>
                                                            <div class="Cell">
                                                                <?php echo getStatus($res2['status']); ?>
                                                            </div>
                                                            <div class="Cell">
                                                                <?php if($res2['status']!=3){ ?><a href="history.php?act=cancel&bid=<?php echo $res2['b_id']; ?>&hid=<?php echo $res2['id_history']; ?>">[ Cancel Booking ]</a><?php } ?>
                                                            </div>
                                                        </div>
                                                	<?php } ?>
                                            		</div>
                                                      
                                    
                                    </td>
                               	</tr>
                               
                                <?php }}else{ ?>
                                <tr>
                                  <td colspan="4" align="center">Record Not Found</td>
                                </tr>
                                <?php } ?>
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
	if($_GET['act']=="cancel"){
		$sql = mysql_query("UPDATE history SET status = 3 WHERE id_history = '".$_GET['hid']."'");
		$del = mysql_query("DELETE FROM bookings WHERE id = '".$_GET['bid']."'");
		if($sql){
			header("location:history.php");
		}
	}
?>