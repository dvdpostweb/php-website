
<div class="main-holder">
<p>
<table width="764" align="center" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td  colspan="2" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
  <tr>
	<td width="396" align="center" valign="top">
		<?php
			$sql_quizz="select * from quizz_name where focus =1";	
			$quizz_values_tab= tep_db_cache($sql_quizz,14400);
			$quizz_values=$quizz_values_tab[0];
		  
			$quizzid=$quizz_values['quizz_name_id'];
			$quizztype=$quizz_values['quizz_type'];
			
			if($quizzid>35)
			{
				$links_flash="/quizz/quizz_viewer".$quizztype.$languages_id.".swf?quizz_id=".$quizzid."&lang=".$languages_id.$data;
			}
			else
			{	
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
			
			$info_text = TEXT_INFORMATION;
			if (!tep_session_is_registered('customer_id')||$customers_registration_step!=100) 
			{
				$link='catalog.php';				
			}
			else
			{
				$link='mydvdpost.php';
				$cust = tep_db_query("select *  from customers where customers_id =".$customer_id);  				
				$cust_values = tep_db_fetch_array($cust);
				$pseudo=$cust_values['customers_firstname'];
				$email=$cust_values['customers_email_address'];
				$data='&customerzz='.$customer_id.'&email='.$email.'&pseudo='.$pseudo;
			}
			
			$flash_link= HTTP_SERVER . $links_flash.$data;
			$flash_bgcolor='#FFFFFF';
			$info_text = str_replace('µµµlinkµµµ',  $link , $info_text);
			
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
			}
		// this script is used to hide the "click to activate and use this control" message   
		?>
		<script type="text/javascript" src="<?php  echo HTTP_SERVER ;?>/media/ieupdate.js"></script>
		</p>
	</td>
    <td width="325" align="left">
	<?php 	
	echo $info_text ;	
	?></td>
  </tr>
</table>
 <p>&nbsp;</p>
<span class="SLOGAN_ROUGE"><b>
	<table width="700" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
		<tr>
		     <td height="30" colspan="2" align="left" valign="top" class="SLOGAN_ROUGE"><b><?= TEXT_LAST_QUIZZ ?></b></td>
		   </tr>
		 <tr><td> <table border='0'>	
 <?php
$sql_quizz_all=" SELECT * FROM `quizz_name` q left join quizz_details qd on q.quizz_name_id=qd.quizz_id and language_id = ".$languages_id." and property ='title' where q.focus=2 order by q.quizz_name_id desc ";
$j=1;
#echo $sql_quizz_all;
$quizz_values_tab = tep_db_cache($sql_quizz_all,14400);
foreach($quizz_values_tab as $quizz_values){
	$quizzid=$quizz_values['quizz_name_id'];
	if(defined('QUIZZ'.$quizzid))
	{
		$title=constant('QUIZZ'.$quizzid);
	}	
	else
	{	
		if(!empty($quizz_values['value']))
			$title=$quizz_values['value'];
		else
			$title=$quizz_values['quizz_name'];
	}	
	if($j % 2 ==1 ){
		echo '<tr>';
	}
	echo '<td><table width="350"><tr>'; 
	echo '<td bgcolor="#990000" class="SLOGAN_ROUGE" valign="top" height="15" align="left" colspan="2">
				<img width="1" height="1" src="/images/www3/blank.gif"/>
			</td>';
	echo '</tr>';
	echo '<tr>
	     <td width="134" height="114" align="left" valign="middle" ><a href="quizz2_public.php?quizzid='.$quizzid.'"><img src="/images/www3/quizz/q'.$quizzid.'.jpg" width="114" height="94" border="0"></a></td>
	     <td width="466" align="left" valign="middle" class="SLOGAN_DETAIL"><a href="quizz2_public.php?quizzid='.$quizzid.'" class="basiclink"><b>'.$title.'</b></a></td>';
	  echo '</tr></table></td>';
	
	
$j++;	
	
}


 ?>
</table></td></tr></table>
</b></span>
 <br>
 
 </div>