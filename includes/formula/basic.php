<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Document sans nom</title>
</head>

<body>
<table width="105" border="0" cellpadding="0" cellspacing="0" bgcolor="#E5E5E5">
  <tr>
    <td height="30" align="center" valign="bottom"><?php  echo TEXT_ABO_BASIC;?></td>
  </tr>
  <tr>
    <td height="36" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>dvd_one.jpg" width="21" height="22" align="top"></td>
  </tr>
  <tr>
    <td width="105" height="42" align="center" valign="top"class="TYPO_STD2_GREY"><?php  echo TEXT_ABO_BASIC_EXPLANATION;?> </td>
  </tr>
  	<?php 
		switch ($current_page_name) {
		   case 'insideman3w.php':
			   $show_abo_price= '<del>'. TEXT_ABO_BASIC_PRICE .'</del>';
			   break ; 
		   case 'summersales.php':
			   $show_abo_price= '<del>'. TEXT_ABO_BASIC_PRICE .'</del><br>5.98€';
			   break ;	
		   case 'dvd50foryou.php':
			   $show_abo_price= '<del>'. TEXT_ABO_BASIC_PRICE .'</del>';
			   break ; 
		   case 'subscription_info.php':
			   $show_abo_price='';	
			   break ;  
		   default:
			   $show_abo_price= TEXT_ABO_BASIC_PRICE;
			   break;
	   }
	   if ($show_abo_price!=NULL){
	   echo '<tr><td height="21" align="center" valign="top"class="TYPO_STD2_BLACK">'.$show_abo_price.'</td></tr>';	   
	   }	   
	?>	  
  
  <tr>
    <td height="21" align="center" valign="top"class="TYPO_STD2_BLACK"></td>
  </tr>
</table>
</body>
</html>
