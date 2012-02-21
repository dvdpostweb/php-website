<style type="text/css">
body 
{
	background-color:#931964 !important;
}
</style>
<div class="main-holder">
<p>
<table width="<?php  echo SITE_WIDTH_PUBLIC; ?>" align="center" border="0" cellspacing="0" cellpadding="0"  bgcolor='#FFFFFF'>
  <tr>
    <td height="60" colspan="2" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo TEXT_SODEXO_TITLE; ?></td>
  </tr>
  <tr>
  <tr>
	<td width="396" align="center" valign="top">
		<?php  
			
			$quizz = tep_db_query("select quizz_type  from quizz_name where quizz_name_id =".$quizzid);  
			$quizz_values = tep_db_fetch_array($quizz);
		  	$quizztype=$quizz_values['quizz_type'];
		
			switch($languages_id){
			case 1:
				$flash_link= HTTP_SERVER . "/media/quizz".$quizzid.".swf?customerzz=$customer_id"; 
			break;
			case 2:
				$flash_link= HTTP_SERVER . "/media/quizz".$quizzid."NL.swf?customerzz=$customer_id"; 
			break;
			case 3:
				$flash_link= HTTP_SERVER . "/media/quizz".$quizzid."EN.swf?customerzz=$customer_id"; 
			break;
			}
			if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
				$link='catalog.php';
				}
			else{
				$link='mydvdpost.php';
				}	
			$flash_bgcolor='#FFFFFF';
		?>		 
		<p>

				<object 
					classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" 
					codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" 
					id="progressbar" 
					align="middle" height="430" width="335"> 
					<param name="allowScriptAccess" value="sameDomain" /> 
					<param name="movie" value="<?php  echo $flash_link ;?>" /> 
					<param name="quality" value="high" /> 
					<param name="menu" value="false" />
					<param name="bgcolor" value="#FFFFFF" />
					<embed src="<?php  echo $flash_link ;?>" menu="false" quality="high" bgcolor="<?php  echo $flash_bgcolor ;?>" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" align="center" height="430" width="335"> 
				</object>
		<script type="text/javascript" src="<?php  echo HTTP_SERVER ;?>/media/ieupdate.js"></script>
		</p>
	</td>
    <td width="325" align="left"  style="font-size:14px; font-family:Helvetica,Arial,Verdana,sans-serif;">
	<?php 
	echo TEXT_SODEXO_EXPLAIN ;	
	?></td>
  </tr>
</table>
 </p>
 <br>
</div>