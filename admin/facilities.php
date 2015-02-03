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
    <script src="js/jquery-1.2.1.pack.js" type="text/javascript"></script>
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="js/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'images/loading.gif',
        closeImage   : 'images/closelabel.png'
      })
    })
</script>
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
                	<h2>FACILITY</h2>
                    
                            <table width='100%' border='0' cellpadding='2' cellspacing='2' id="report">
                              <tr>
                                  <th width='6%' align='left'>#</th>
                                <th width="69%" align='left'>Facility</th>
                                <th width='20%' align='left'><a rel="facebox" href="add_facility.php">Add New Facility</a></th>
                                  <th width='5%' align='left'>&nbsp;</th>			
                              </tr>
                                <?php 

								$sql = mysql_query("SELECT * FROM facilities WHERE sts_del = 0");
								$no = 1;
								if(mysql_num_rows($sql) > 0){
									while($res = mysql_fetch_array($sql)){
								?>
                                <tr>
                                	<td><?php echo $no++; ?></td>
                                	<td><?php echo $res['name']; ?>&nbsp;&nbsp;<a href="facilities.php?act=fdel&id=<?php echo $res['id_facilities']; ?>"><img src="images/icon_delete16.png"></a></td>
                                	<td width='20%' align='left'><a rel="facebox" href="add_court.php?fid=<?php echo $res['id_facilities']; ?>">Add Court</a></td>
                                    <td width='5%' align='center'><div class="arrow"></div></td>
           			  			</tr>
                                <tr>
                                	<td colspan="4" align="left" style="padding-left:60px;">
                                    		<div class="Table">
                                                <div class="Title">                                                </div>
                                                
                                                <?php 
                                                    $sql2 = mysql_query("SELECT * FROM detail_facilities WHERE id_facilities = '".$res['id_facilities']."' AND sts_del = 0");
													$a = 1;
                                                    while($res2 = mysql_fetch_array($sql2)){ ?>
                                                        <div class="Row">
                                                            <div class="Cell"><?php echo $res2['type']; ?></div>
                                                            <div class="Cell"><a href="facilities.php?act=cdel&id=<?php echo $res2['id_detail']; ?>"><img src="images/icon_delete16.png"></a>
                                                        </div>
                                                        </div>
                                                	<?php } ?>
                                            		</div>                                    </td>
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
	if($_GET['act']=="fdel"){
		$sql = mysql_query("UPDATE facilities SET sts_del = 1 WHERE id_facilities = '".$_GET['id']."'");
		$sql2 = mysql_query("UPDATE detail_facilities SET sts_del = 1 WHERE id_facilities = '".$_GET['id']."'");
		
		if($sql){
			header("location:facilities.php");
		}
	}
	
	if($_GET['act']=="cdel"){
		$sql = mysql_query("UPDATE detail_facilities SET sts_del = 1 WHERE id_detail = '".$_GET['id']."'");
		
		if($sql){
			header("location:facilities.php");
		}
	}
	
	if($_POST['act']=="add_fasiliti"){
		$sql = mysql_query("INSERT INTO facilities SET name = '".$_POST['fasiliti']."', bg = ''"); 
		
		if($sql){
			echo "<script type='text/javascript'>";
			echo "alert('Rekod Fasiliti Berjaya Ditambah')";
			echo "</script>";
			echo "<meta http-equiv='refresh' content='0; url=facilities.php'>";
		}
	}
	
	if($_POST['act']=="add_court"){
		$sql = mysql_query("INSERT INTO detail_facilities SET type = '".$_POST['court']."', id_facilities = '".$_POST['fid']."', bg = ''"); 
		
		if($sql){
			echo "<script type='text/javascript'>";
			echo "alert('Rekod Berjaya Ditambah')";
			echo "</script>";
			echo "<meta http-equiv='refresh' content='0; url=facilities.php'>";
		}
	}
?>