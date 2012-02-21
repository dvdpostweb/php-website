<style type="text/css">
<!--
.Contest1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #752010;
	font-weight: bold;
	font-size: 17px;
}
.Contest2 {
	font-family: Arial, Helvetica, sans-serif;
	color: #272727;
	font-size: 13px;
	font-weight: bold;
}
.Contest2_non_bold {
	font-family: Arial, Helvetica, sans-serif;
	color: #272727;
	font-size: 13px;
} 
.Input1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #272727;
	font-size: 13px;  
	height:20px ;
	width:260px;
}
-->

</style>
<?php 

$jaquette='jaquette';

switch($languages_id){
	case 1:
		$active='active_fr';		
		break;
		
	case 2:
		$active='active_nl';
		break;
		
	case 3:
		$active='active_en';
		break;
}


//affiche un seul concours ... 
$contest = tep_db_query("select ".$jaquette." as jaquette from contest_name where ".$active."=1 and validity>now() order by validity ASC");  
$contest_values = tep_db_fetch_array($contest);

$img=DIR_WS_IMAGES.'languages/'.$language.'/images/'.$contest_values['jaquette'];


?>
<div class="main-holder">
<table width="<?php  echo SITE_WIDTH_PUBLIC; ?>" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td height="35" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="344" rowspan="3">
    	<table width="264" height="264" border="0" cellpadding="0" cellspacing="0">
        		<tr>
          			<td><img src="<?php echo $img; ?>"></td>
        		</tr>
		</table>
    </td>
    <td height="25" colspan="2" align="left" valign="top"><span class="Contest1">&nbsp;</span></td>
  </tr>
  <tr>
    <td width="859" colspan="2" align="center">
		<?php  echo TEXT_INFORMATION . '<br>' ;
		if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
			echo '<a href="catalog.php">'  . tep_image_button('button_continue_flix.gif', IMAGE_BUTTON_CONTINUE) . '</a>';
		}else{
			echo '<a href="mydvdpost.php">'  . tep_image_button('button_continue_flix.gif', IMAGE_BUTTON_CONTINUE) . '</a>';
		}
		 ?>
	</td>
  </tr>
</table>
<br>
</div>
