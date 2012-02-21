<tr> 
    
	<td width="12">&nbsp;</td>
    <td width="423" background="<?php  echo DIR_WS_IMAGES ;?>step/bckg_step2.gif" bgcolor="#FFFFFF"> 
      <table align="center" cellspacing="0" cellpadding="0" border="0" width="90%">        
          <tr> 
            <td height="120" class="infotitle" align="left">
            	<?php  
            	$text_mail = TEXT_START_HERE_NOW;
            	$text_mail = str_replace('µµµmailµµµ',$email_address,$text_mail);
            	echo $text_mail ;
            	?>
            	<br><br>
            	<div align="left"><a href="/step1.php?update=1" class="infolink"><?php echo TEXT_WRONG_EMAIL ;?></a></div>
            </td>            
          </tr>          
      </table>
    </td>
    <td width="12">&nbsp;</td>
</tr>