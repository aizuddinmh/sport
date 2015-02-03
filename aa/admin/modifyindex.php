<?php
	include '../includes/connect.php'; 
	extract($_REQUEST);
	
	$det = mysql_query("select * from users where u_id = $id");
	$dev = mysql_fetch_array($det);
?>

<table width="100%" border="0" cellspacing="2" cellpadding="2" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; width:500px; line-height: 25px">
  <tr>
    <td height="25" colspan="3"><strong><u>MAKLUMAT PELAJAR</u></strong></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>User ID</strong></td>
    <td>:</td>
    <td><?php echo $dev['username']; ?></td>
  </tr>
  <tr>
    <td width="25%"><strong>Nama</strong></td>
    <td width="5%">:</td>
    <td width="70%"><?php echo $dev['name']; ?> (<?php echo $dev['student_id']; ?>)</td>
  </tr>
  <tr>
    <td valign="top"><strong>Alamat</strong></td>
    <td valign="top">:</td>
    <td><?php echo nl2br($dev['address']); ?></td>
  </tr>
  <tr>
    <td><strong>No Telefon</strong></td>
    <td>:</td>
    <td><?php echo $dev['phone']; ?></td>
  </tr>
  <tr>
    <td><strong>Emel</strong></td>
    <td>:</td>
    <td><?php echo $dev['email']; ?></td>
  </tr>
</table>
