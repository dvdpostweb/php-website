<script language='javascript' src="includes/javascript/popcalendar_week.js?v=3"></script>
<script type="text/javascript" src="js/prototype-1.6.0.3.js"></script>

<div class="main-holder">
<?php
  	//echo  TEXT_PHONE_PROBLEM;
?>


<span class="title_contact">

<h1><?php  echo TEXT_CONTACT_TITLE ;?> </h1></span>
<table>
<tr>
<td valign="top">
<!-- contact area -->
<div class="contact_left">
<table>
    <tr>
     <td><img src="<?php echo DIR_WS_IMAGES ;?>/contact/icontel.gif" /></td>
     <td width="10"></td>
     <td class="textright"><span class="contact_text_input_description"><?php  echo TEXT_BY_PHONE ;?></span><br /><?php  echo TEXT_PHONE_INFO ;?></td>
     </tr>
     <tr>
 <tr>
    <td><img src="<?php echo DIR_WS_IMAGES ;?>/contact/iconemail.gif" /></td>
    <td width="10"></td>
    <td  class="text">
	<?php if (!tep_session_is_registered('customer_id')) {?>
	<span class="contact_text_input_description"><?php  echo TEXT_BY_EMAIL ;?></span><br /><?php  echo TEXT_EMAIL_INFO ;?>
	<?php }else{?>
		<span class="contact_text_input_description"><?php  echo TEXT_BY_EMAIL_PRIVATE ;?></span><br />
	<?php  } ?>
	</td>
 </tr>
  
  <tr>
    <td><img src="<?php echo DIR_WS_IMAGES ;?>/contact/iconfax.gif" /></td>
    <td width="10"></td>
    <td class="text"><span class="contact_text_input_description"><?php  echo TEXT_BY_FAX ;?></span><br /><?php  echo TEXT_FAX_INFO ;?></td>
   </tr>
   
   <tr>  
    <td><img src="<?php echo DIR_WS_IMAGES ;?>/contact/iconmail.gif" /></td>
    <td width="10"></td>
    <td class="text"><span class="contact_text_input_description"><?php  echo TEXT_BY_MAIL ;?></span><br /><?php  echo TEXT_MAIL_INFO ;?></td>
   </tr>
   
   <tr>
   <td height="20"></td>
   
   </tr>
   
    <tr>
        <td colspan="3" align="center">
            <table>
            <tr>
                <td align="center"><a href="http://insidedvdpost.blogspot.com/" target="_blank"><img src="<?php echo DIR_WS_IMAGES ;?>/contact/iconblog.gif" border="0" /></a></td>
                <td width="10"></td>
                <td><a href="http://www.facebook.com/s.php?q=20460859834&sid=4587e86f26b471cb22ab4b18b3ec5047#/group.php?sid=4587e86f26b471cb22ab4b18b3ec5047&gid=20460859834" target="_blank"><img src="<?php echo DIR_WS_IMAGES ;?>/contact/iconfacebook.gif" border="0" /></a></td>
                <td width="10"></td>
                  <td align="center"><a href="http://twitter.com/dvdpost" target="_blank"><img src="<?php echo DIR_WS_IMAGES ;?>/contact/icontwitter.gif" border="0"/></a></td>
                  <td width="10"></td>
                  <td align="center"><a href="http://vimeo.com/5199678" target="_blank"><img src="<?php echo DIR_WS_IMAGES ;?>/contact/iconvimeo.gif" border="0"/></a></td>
                  
                  
            </tr>
            
            <tr>
                 <td class="text" align="center"><span class="contact_text_input_description"><a href="http://insidedvdpost.blogspot.com/" target="_blank"><strong>Blog</strong></a></span></td>
                <td width="10" align="center"></td>
                <td class="text" align="center"><span class="contact_text_input_description"><a href="http://www.facebook.com/s.php?q=20460859834&sid=4587e86f26b471cb22ab4b18b3ec5047#/group.php?sid=4587e86f26b471cb22ab4b18b3ec5047&gid=20460859834" target="_blank"><strong>Facebook</strong></a></span></td>
                <td width="10" align="center"></td>
                  <td class="text" align="center"><span class="contact_text_input_description"><a href="http://twitter.com/dvdpost" target="_blank"><strong>Twitter</strong></a></span></td>
                  <td width="10" align="center"></td>
                  <td class="text" align="center"><span class="contact_text_input_description"><a href="http://vimeo.com/5199678" target="_blank"><strong>Vimeo</strong></a></span></td>
            </tr>
            </table>
        </td>
    </tr>
    <?php if($lang_short =='fr' || $lang_short=='nl'){ ?>
    <tr>
		<td><a id="open_bdwidget" href="#">feedback</a>
	<script src="http://www.brandialog.com/<?= $lang_short; ?>/DVDPost/widget.js" type="text/javascript"></script>
		</td>
	</tr>
    <?php } ?>
    </table>


</div>

<!-- END contact area -->
</td>



<td>
<!-- form box -->
<div class="contact_right">
<?php  if($_GET['sent']=='2'){
	?>
	<br />
	<table align="center" cellspacing="0" cellpadding="0" border="0">
		<tr>
		<td class="form_height">
			<?php  
				$cpt=1;
				$hour=9;
				while ($hour<17){			
					$hours_tab[$cpt]=$hour.TEXT_H;
					$cpt++;
					$hours_tab[$cpt]=$hour.TEXT_H.'30';
					$cpt++;
					$hour++;
				}
				$hours=$hours_tab[$_GET['creneau']];
				
				$days_tab[1]=TEXT_MONDAY;
				$days_tab[2]=TEXT_TUESDAY;
				$days_tab[3]=TEXT_WEDNESDAY;
				$days_tab[4]=TEXT_THURSDAY;
				$days_tab[5]=TEXT_FRIDAY;
				
				$days=$_GET['day'];
				
				
				$request= TEXT_REQUEST_SENT ;
				$request = str_replace('µµµHOURµµµ',  $hours , $request);
				$d=explode('-',$days);
				$request = str_replace('µµµDATEµµµ',  $d[2].'/'.$d[1].'/'.$d[0] , $request);
				echo $request  ;				
			?>
		</td>
		</tr>
	</table>
	
	<?php 
}else{
?>
<div id="contact_formulaire">
<p class="contact_rappel"><strong><?php  echo TEXT_CALLBACK1; ?></strong><br />
<?php  echo TEXT_CALLBACK2 ;?></p>

<form name="submit_callback" method="post"  action="callback.php"> 

<?php 
	if ($_GET['error_cpt']>0){
		echo '<p><font color="red">'.TEXT_ERROR_FORM.'</font></p>';
	}
?>

<p class="form_height"><?php  echo TEXT_NAME ;?></p>

<p class="form_height"><INPUT type=text name="name" class="contact_text_input" value="<?php  echo $_GET['name'] ; ?>"></p>



<p class="form_height"><?php  echo TEXT_PHONE ;?></p>

<p class="form_height"><INPUT type=text name="phone" class="contact_text_input" value="<?php  echo $_GET['phone'] ; ?>"></p>
<p style="display:none"><imput type='text' name='lastname' /></p>

<p class="form_height"><?php  echo TEXT_REASON ;?></p>

<p class="form_height">
	<SELECT name="reason" class="contact_list_input">	
		<OPTION VALUE="1" <?php  if($_GET['reason']==1){echo 'selected="selected"';}?> > <?php  echo TEXT_REASON1 ;?></OPTION>
		<OPTION VALUE="2" <?php  if($_GET['reason']==2){echo 'selected="selected"';}?> ><?php  echo TEXT_REASON2 ;?></OPTION>
		<OPTION VALUE="3" <?php  if($_GET['reason']==3){echo 'selected="selected"';}?> ><?php  echo TEXT_REASON3 ;?></OPTION>
		<OPTION VALUE="4" <?php  if($_GET['reason']==4){echo 'selected="selected"';}?> ><?php  echo TEXT_REASON4 ;?></OPTION>
		<OPTION VALUE="5" <?php  if($_GET['reason']==5){echo 'selected="selected"';}?> ><?php  echo TEXT_REASON5 ;?></OPTION>
		<OPTION VALUE="6" <?php  if($_GET['reason']==6){echo 'selected="selected"';}?> ><?php  echo TEXT_REASON6 ;?></OPTION>
	</SELECT>	
</p>

<p class="form_height"><?php  echo TEXT_WEEK_DAY ;?></p>

<p class="form_height">
	<input type='radio' name='day' value='all' /> <?= TEXT_ALL_DAY ?><br /><br />
	<input type='radio' name='day' value='cal' checked="checked" /> <input type="text" name="whendate" id ='button_calendar' /><input type="button"  style="font-size: 11px;" value="Calendrier" onclick='popUpCalendar(this, form.whendate, "yyyy-mm-dd")'/>
</p>

<p class="form_height"><?php  echo TEXT_TIME_CRENELS ;?></p>

<p class="form_height">
<SELECT name="creneau" class="contact_list_input">
	<?php 
	$cpt=1;
		$hours=9;
		while ($hours<17){
			if($_GET['creneau']==$cpt){$selected='selected="selected"';}else{$selected='';}
			echo '<OPTION VALUE="'.$cpt.'" '.$selected.' >'.$hours.TEXT_H.'00 - '.$hours.TEXT_H.'30</OPTION>';
			$cpt++;
			$h2=$hours+1;
			echo '<OPTION VALUE="'.$cpt.'" '.$selected.'>'.$hours.TEXT_H.'30 - '.$h2.TEXT_H.'00</OPTION>';
			$cpt++;
			$hours++;
		}
	?>		
	</SELECT>
</p>

	<p align="left" height="30" style="padding-left:15px;"><input name="submit" type="image" src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/buttons/submit_contact.gif" border="0" value="submit"></p>

</FORM>
</div>
<!-- END form box -->
</div>

</div>



<?php 
}
?>

</td>
</tr>
</table>
</div>
