<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<style type="text/css">
<!--
.text {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-style: normal;
	color: #32322F;
	padding-right: 12px;
	padding-left: 12px;
}
.text_form {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-style: normal;
	color: #32322F;
	
}
.border {
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-top-color: #333333;
	border-right-color: #333333;
	border-bottom-color: #333333;
	border-left-color: #333333;
}

-->
</style>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">

<?php
if (isset($HTTP_GET_VARS['customers_id'])){
	$id=$HTTP_GET_VARS['customers_id'];
	}else{
	$id='';		
	}
?>

<br>
<form action="logas2.php" method="post">
  <table width="281" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
    <tr valign="bottom"> 
      <td width="65" height="40" class="text" >Cust_id</td>
      <td width="214" align="center" valign="bottom"> 
        <input type="text" name="customers_id" class="text_form" value="<?php echo $id ;?>"></td>
  </tr>
    <tr valign="bottom"> 
      <td height="25" class="text" >User</td>
      <td align="center" valign="bottom"> 
        <input type="text" name="login" class="text_form"></td>
  </tr>
  <tr align="center" valign="middle"> 
      <td height="60" colspan="2"> 
        <input type="submit" value="Log as Now">
      </td>    
  </tr>
</table>
</form>
</body>
</html>