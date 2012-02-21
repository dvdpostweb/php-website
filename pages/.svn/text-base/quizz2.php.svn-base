<?php
$quizzid=intval($quizzid);
?>
<div class="main-holder">
<p>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor='#ffffff' >
  <tr>
    <td height="60" colspan="2" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
  <tr>
	<td width="396" align="center" valign="top">
		<?php  
			$quizz = tep_db_query("select quizz_type  from quizz_name where quizz_name_id =".$quizzid);  
			$quizz_values = tep_db_fetch_array($quizz);
			$quizztype=$quizz_values['quizz_type'];
			if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) {
				$link='catalog.php';
				$data='';
				}
			else{
				$link='mydvdpost.php';
				$cust = tep_db_query("select *  from customers where customers_id =".$customer_id);  
				$cust_values = tep_db_fetch_array($cust);
				$pseudo=$cust_values['customers_firstname'];
				$email=$cust_values['customers_email_address'];
				$data='&customerzz='.$customer_id.'&email='.$email.'&pseudo='.$pseudo;
				
				}
			if($quizzid>35)
			{
				$links_flash="/quizz/quizz_viewer".$quizztype.$languages_id.".swf?quizz_id=".$quizzid."&lang=".$languages_id;
			}
			else{	
				switch($languages_id){
				case 1:
					$links_flash="/media/quizz".$quizzid.".swf?";
				break;
				case 2:
					$links_flash= "/media/quizz".$quizzid."NL.swf?"; 
				break;
				case 3:
					$links_flash= "/media/quizz".$quizzid."EN.swf?"; 
				break;
				}
			}
			$flash_link= HTTP_SERVER . $links_flash.$data; 
			
			$flash_bgcolor='#FFFFFF';
		?>		 
		<p>
		<?php 		
		
		switch ($quizztype)	{
			
			case 1 :
				?>
				<object 
					classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" 
					codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" 
					id="progressbar" 
					align="middle" height="262" width="302"> 
					<param name="allowScriptAccess" value="sameDomain" /> 
					<param name="movie" value="<?php  echo $flash_link ;?>" /> 
					<param name="quality" value="high" /> 
					<param name="menu" value="false" />
					<param name="bgcolor" value="#FFFFFF" />
					<embed src="<?php  echo $flash_link ;?>" menu="false" quality="high" bgcolor="<?php  echo $flash_bgcolor ;?>" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" align="center" height="262" width="302"> 
				</object>
				<?php 
				break;
			
			case 2:
				?>
				<object 
						classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" 
						codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" 
						id="progressbar" 
						align="middle" height="370" width="335"> 
						<param name="allowScriptAccess" value="sameDomain" /> 
						<param name="movie" value="<?php  echo $flash_link ;?>" /> 
						<param name="quality" value="high" /> 
						<param name="menu" value="false" />
						<param name="bgcolor" value="#FFFFFF" />
						<embed src="<?php  echo $flash_link ;?>" menu="false" quality="high" bgcolor="<?php  echo $flash_bgcolor ;?>" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" align="center" height="370" width="335"> 
				</object>
				<?php
				break;
				
			case 3:		
				?>
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
				<?php 
				break; 
			case 4:
			?>
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
			<?
			}
		// this script is used to hide the "click to activate and use this control" message   
		?>		
		<script type="text/javascript" src="<?php  echo HTTP_SERVER ;?>/media/ieupdate.js"></script>
		</p>
	</td>
    <td width="325" align="left">
	<?php 
	$info_text = TEXT_INFORMATION;			
	
	$info_text = str_replace('µµµlinkµµµ',  $link , $info_text);
	echo $info_text ;	
	?></td>
  </tr>
</table>
 </p>
 <br>
</div>