<style type="text/css">
<!--
.Contest1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #b82e2f;
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

.footer_contest p{
width:600px;

}
.margin_span{
	margin:10px 0 0 10px;
}
.red{
	color:#990000;
}
-->

</style>
<?php 

$jaquette='jaquette';

switch($languages_id){
	case 1:
		$title='title_fr';
		$question='question_fr';
		$choice='choice_fr';
		$active='active_fr';		
		break;
		
	case 2:
		$title='title_nl';
		$question='question_nl';
		$choice='choice_nl';
		$active='active_nl';
		break;
		
	case 3:
		$title='title_en';
		$question='question_en';
		$choice='choice_en';
		$active='active_en';
		break;
}


$sql="select  contest_name_id, ".$title." as title, ".$jaquette." as jaquette, ".$question." as question, ".$choice." as choice, validity,banner  from contest_name where ".$active."=1 and validity>now() order by validity asc limit 1 ";
$contest_values_tab = tep_db_cache($sql,14400);
$contest_values=$contest_values_tab[0];

$exploded_choice=explode("_", $contest_values['choice']);

$img=DIR_WS_IMAGES.'languages/'.$language.'/images/'.$contest_values['jaquette'];

?>

<div class="main-holder">

<table width="731" align="center" border="0" cellspacing="0" cellpadding="0">
	<form name="form1" method="post" action="contest_process_public.php">
    <tr>
    	<td height="35" colspan="2">&nbsp;</td>
    </tr>
    <tr>
    	<td width="276" valign="top">
			<table width="264" height="264" border="0" cellpadding="0" cellspacing="0">
        		<tr>
          			<td><img src="<?php  echo $img; ?>"></td>
        		</tr>
			</table>
		</td>
      	<td width="455" align="left" valign="top">
			<table width="455" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="455" height="25" align="left" valign="top"><span class="Contest1"><?php  echo TEXT_WIN_DVD ; ?></span></td>
				</tr>
				<tr>
					<td width="455" height="25" align="left" valign="top" class="Contest1"><?php  echo $contest_values['title'] ; ?></td>
				</tr>
				
				<?php  
				if ($customer_id > 0)
				{
					$count = tep_db_query("select count(customers_id) as cpt  from  contest where contest_name_id =".$contest_values['contest_name_id']." AND customers_id= '". $customer_id ."' ");  
					$count_values = tep_db_fetch_array($count);
					if ((tep_session_is_registered('customer_id') && $count_values['cpt'] > 0 ) || $_GET['error']=='duplicate'){
						$showbutton=0;
						echo '<tr>';
						echo '<td width="859" colspan="2" align="center">';
						echo '<p class="Contest2"><br><br>'.TEXT_ALREADY_PLAYED .'<br><br></p><br>';
						echo '<a href="mydvdpost.php">'  . tep_image_button('button_continue_flix.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; 
						echo '</td> </tr>';
					}
					else 
					{
						$showbutton=1;
					}
				}
				else
				{
					$showbutton = 1;
				}
				if ($showbutton == 1)
				{
				?>
				<tr>
					<td width="455">
						<table>
						  <tr>
							<td height="25" colspan="2">&nbsp;</td>
						  </tr>
						  <tr>
							<td colspan="2" class="Contest2"><?php  echo TEXT_QUESTION_ANSWERS ;?></td>
						  </tr>
						  <tr>
							<td colspan="2">&nbsp;</td>
						  </tr>
						  <tr>
							<td colspan="2" class="Contest2"><b><?php  echo $contest_values['question'] ;?></b></td>
						  </tr>
					    </table>
                        <table>
                          <tr>
                            <td width="26" height="20" align="left" valign="middle" class="Contest2"><input type="radio" name="Q1" value="1"></td>
                            <td width="859" align="left" valign="middle" class="Contest2"><?php echo $exploded_choice[0] ;?></td>
                          </tr>
                          <tr>
                            <td height="20" align="left" valign="middle" class="Contest2"><input type="radio" name="Q1" value="2"></td>
                            <td align="left" valign="middle" class="Contest2"><?php echo $exploded_choice[1] ;?></td>
                          </tr>
                          <tr>
                            <td height="20" align="left" valign="middle" class="Contest2"><input type="radio" name="Q1" value="3"></td>
                            <td align="left" valign="middle" class="Contest2"><?php echo $exploded_choice[2] ;?></td>
                          </tr>
                          <tr>
                            <td height="20" align="left" valign="middle" class="Contest2"><input type="radio" name="Q1" value="4"></td>
                            <td align="left" valign="middle" class="Contest2"><?php echo $exploded_choice[3] ;?></td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                        </table>				
					</td>
				</tr>          
				<?php  } ?>
		  	</table>
		</td>
	</tr>
    <tr>
    	<td colspan="2" valign="top">
	  		<table border="0" align="center" cellpadding="0" cellspacing="0">
        		<tr>
          			<td height="30">&nbsp;</td>
        		    <td height="30">&nbsp;</td>
        		</tr>
				<?php  if (!tep_session_is_registered('customer_id') && $_GET['error']!='duplicate') { ?>
					
				<tr>
					<td width="277" align="right" class="Contest2"><?php  echo TEXT_YOUR_NAME ?><img src="<?php  echo DIR_WS_IMAGES;?>contest/blank.gif" width="10" height="8"> </td>
					<td width="454" height="35" align="left"><img src="<?php  echo DIR_WS_IMAGES;?>contest/blank.gif" width="10" height="8">
						<input name="name" type="text" id="name" class="Input1">
					</td>
				</tr>
				<tr>
					<td align="right" valign="middle" class="Contest2"><?php  echo TEXT_YOUR_EMAIL ?><img src="<?php  echo DIR_WS_IMAGES;?>contest/blank.gif" width="10" height="8"></td>
					<td height="35" align="left" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>contest/blank.gif" width="10" height="8">
						<input name="email" type="text" id="email" class="Input1">
					</td>
				</tr>
				<?php
				if($_GET['error']=='email'){
				?>
				<tr>
					<td align="right" valign="middle" class="Contest2"></td>
					<td height="35" align="left" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>contest/blank.gif" width="10" height="8">
						<div class='red'><?= TEXT_EMAIL_INCORRECT ?></div>		
					</td>
				</tr>
				<?
				}
				?>
				<tr>
					<td></td>
					<td height="35" align="left" valign="middle">
					<div class='margin_span'>	<input type='checkbox' name="marketing" type="text" class="" checked='checked' value='YES'>
					<?php  echo TEXT_MARKETING_OK ?>
					</div></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				    <td>&nbsp;</td>
				</tr>
				<?php  } else
				{
					echo '<tr><td><input type="hidden" name="marketing" id="marketing" value="YES" /></td></tr>';
				}
				?>
				<?php  if ($showbutton==1){ ?>
					<?php
					if($_GET['error']=='empty'){
					?>
					<tr>
						<td align="right" valign="middle" class="Contest2"></td>
						<td height="35" align="left" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>contest/blank.gif" width="10" height="8">
							<div class='red'><?= TEXT_FIELD_EMPTY ?></div>		
						</td>
					</tr>
					<?
					}
					?>	
				<tr>
					<td align="center">&nbsp;</td>
			        <td align="left"><img src="<?php  echo DIR_WS_IMAGES;?>contest/blank.gif" width="10" height="8">
		           
					<input name="imageField" type="image" src="<?php  echo DIR_WS_IMAGES;?>languages/<?php  echo $language ;?>/images/buttons/button_send_style2.gif" border="0"></td>
				</tr>
				<?php  } ?>
				
			</table>
		</td>
	</tr>			
  </form>
</table>
<p class="footer_contest">
<?php  
$contest_validity=$contest_values['validity'];
$contest_name = str_replace('µµµdateµµµ',  $contest_validity , TEXT_CONTEST_VALIDITY);
echo $contest_name ;
//echo TEXT_CONTEST_FOOTER ;?>
</p>

</div>
