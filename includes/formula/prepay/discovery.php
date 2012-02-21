<?
switch ($current_page_name) {
		   case 'subscription_change2.php':
			   $class= 'SLOGAN_DETAIL';
			   break ;	
		   default:
			   $class= 'formula_desc';
			   break;
	   }
?>
<table width="109" height="129" align="center" cellpadding="0" cellspacing="0" bgcolor="#E3E3E3" class="<? echo $class ;?>">
        <tr>
          <td width="109" height="32" align="center" valign="middle" bgcolor="#37758E" class="TYPO_BLANC_IT"><? echo TEXT_ABO_DISCOVERY;?></td>
        </tr>
        <tr>
          <td height="27" align="center" valign="middle" bgcolor="#37758E"><img src="<?php echo DIR_WS_IMAGES;?>prepay/three.gif" height="27"></td>
        </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="#37758E"><span class="TYPO_BLANC_IT">3 <?echo TEXT_DVD;?></span><br>
              <span  class="formula_desc_blanc"><? echo TEXT_ABO_EXPLAIN;?></span></td>
        </tr>
</table>
