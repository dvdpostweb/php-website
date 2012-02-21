<style>

a.black_link {
color:#100f0f;
font-family:Arial, Helvetica, sans-serif;
font-size:12px;
text-decoration:underline;
}

.black_link {
color:#100f0f;
font-family:Arial, Helvetica, sans-serif;
font-size:12px;
text-decoration:none;
font-weight:bold;
}

</style>

<?php 
$name_query = tep_db_query("select customers_firstname, customers_lastname from customers where customers_id='" . $customer_id . "' ");
$gift = tep_db_fetch_array($name_query);

$check_logo_query = tep_db_query("select * from site where site_id = '" . WEB_SITE_ID . "'");
$check_log_values = tep_db_fetch_array($check_logo_query);
$logo = $check_log_values['logo'];
$link = $check_log_values['site_link'];

$email_text = TEXT_INFORMATION;
$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);
$email_text = str_replace('µµµlink_dvdpostµµµ', $link , $email_text);
$email_text = str_replace('µµµlinkµµµ', $link , $email_text);			
$email_text = str_replace('µµµcustomers_nameµµµ', $gift['customers_firstname'] . ' ' . $gift['customers_lastname'], $email_text);
$email_text = str_replace('µµµstrMailIDµµµ', $mem_get_mem_id, $email_text);
?>




<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td height="18"></td>
    </tr>
    
    <tr align="center" valign="middle">
    <td height="50" colspan="3" align="right">
    	<a class="black_link" href="member_get_member.php"><?php  echo TEXT_BACK ;?></a>
    	<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
        <img src="<?php  echo DIR_WS_IMAGES;?>dvdpost_public/bg-top-nav-sep.gif" width="2" height="18" align="top">
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
		<a class="black_link " href="member_get_member_points.php"><u><?php  echo TEXT_USE_POINTS ;?></u></a> 
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
        <img src="<?php  echo DIR_WS_IMAGES;?>dvdpost_public/bg-top-nav-sep.gif" width="2" height="18" align="top">
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3">
        <a class="black_link " href="member_get_member_gift.php"><?php  echo TEXT_GIFT ;?></a>
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
        <img src="<?php  echo DIR_WS_IMAGES;?>dvdpost_public/bg-top-nav-sep.gif" width="2" height="18" align="top">
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3">
        <a class="black_link " href="member_get_member_faq.php">FAQ</a>
         
    </td>
  </tr>	
	<tr>
		<td valign="middle" style="background-color:#100f0f; color:#FFFFFF; font-family:Arial, Helvetica, sans-serif; font-size:23px; margin:0 0 18px;
padding:0 0 0 10px; font-weight:normal; line-height:35px;"><?php  echo HEADING_TITLE; ?></td>
	</tr>
    
    <tr>
    <td height="18"></td>
    </tr>
	
	<tr>
		<td colspan="2" ><?php  echo str_replace("µµµcustomers_nameµµµ", $gift['customers_firstname'].' '.$gift['customers_lastname'], $email_text)  ;?></td>
	</tr>
    
    <tr align="center" valign="middle">
    <td height="50" colspan="3" align="right">
    	<a class="black_link" href="member_get_member.php"><?php  echo TEXT_BACK ;?></a>
    	<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
        <img src="<?php  echo DIR_WS_IMAGES;?>dvdpost_public/bg-top-nav-sep.gif" width="2" height="18" align="top">
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
		<a class="black_link " href="member_get_member_points.php"><u><?php  echo TEXT_USE_POINTS ;?></u></a> 
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
        <img src="<?php  echo DIR_WS_IMAGES;?>dvdpost_public/bg-top-nav-sep.gif" width="2" height="18" align="top">
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3">
        <a class="black_link " href="member_get_member_gift.php"><?php  echo TEXT_GIFT ;?></a>
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
        <img src="<?php  echo DIR_WS_IMAGES;?>dvdpost_public/bg-top-nav-sep.gif" width="2" height="18" align="top">
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3">
        <a class="black_link " href="member_get_member_faq.php">FAQ</a>
         
    </td>
  </tr>	
</table>