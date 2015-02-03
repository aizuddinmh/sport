<form method="post" action="">
<table width="100%" border="0" cellspacing="2" cellpadding="2" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; width:500px; line-height: 25px">
  <tr>
    <td height="25" colspan="3"><strong><u>TAMBAH COURT</u></strong></td>
    </tr>
  <tr>
    <td width="25%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td width="70%">&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle"><strong>Court No.</strong></td>
    <td valign="middle">:</td>
    <td><input type="text" name="court" id="textfield" size="45" required /></td>
  </tr>
  <tr>
    <td><input type="hidden" name="act" value="add_court" /></td>
    <td><input type="hidden" name="fid" value="<?php echo $_GET['fid']; ?>" /></td>
    <td><input type="submit" name="submit" id="button" value="Submit" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>