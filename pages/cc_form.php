<style type="text/css">
<!--
.Style1 {font-weight: bold}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
		<br>
       <?php  echo TEXT_INFORMATION; ?>
        <p>&nbsp;</p>
        <form action='cc_process.php' method='post' name='cc'>
            <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_left_recom.gif" width="14" height="14"></td>
                <td width="156" background="<?php  echo DIR_WS_IMAGES;?>img_recom/top_line_recom.gif" class="SLOGAN_GRIS_13px"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="14"></td>
                <td width="10"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/top_right_recom.gif" width="14" height="14"></td>
              </tr>
              <tr>
                <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
                <td align="center"><table width="460">
                <tr><td>&nbsp;</td></tr  
				<tr>
                    <td width="120" class="SLOGAN_DETAIL"><?php  echo TEXT_CARDNUM; ?>: </td>
                    <td width="355" class="SLOGAN_DETAIL"><input type ='text' name='ccnum1' id='ccnum1' size='4' maxLength='4' value ='<?= $_GET['ccnum1']?>'>
                        <input type ='text' name='ccnum2' id='ccnum2' size='4' maxLength='4' value ='<?= $_GET['ccnum2']?>'>
                        <input type ='text' name='ccnum3' id='ccnum3' size='4' maxLength='4' value ='<?= $_GET['ccnum3']?>'>
                        <input type ='text' name='ccnum4' id='ccnum4' size='4' maxLength='4' value ='<?= $_GET['ccnum4']?>'>
      (1234 1234 1234 1234)
      <?php 
				        if($HTTP_GET_VARS['error']==1){
				            echo '   <font color=red><b>' . TEXT_ERROR1 . '</b></font>';
				        }
				        ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="SLOGAN_DETAIL"><?php  echo TEXT_EXPDATE; ?>: </td>
                    <td class="SLOGAN_DETAIL">
                    	<SELECT name="cc_months" >	
							<?php 
							$cc_month=1;
							while ($cc_month<13){
								if ($cc_month<10){$cc_m='0'.$cc_month; }else{$cc_m=$cc_month;}
								echo '<OPTION VALUE="'.$cc_m.'">'.$cc_m.'</OPTION>';	
								$cc_month++;
							} 
							?>                    		
						</SELECT>
                    	<SELECT name="cc_years" >	
							<?php 
							$cc_year=date("y")-1;
							$cc_year_end=date("y")+12;
							$cc_year++;
							while ($cc_year<$cc_year_end){
								if ($cc_year<10){$cc_y='0'.$cc_year; }else{$cc_y=$cc_year;}
								echo '<OPTION VALUE="'.$cc_y.'">'.$cc_y.'</OPTION>';	
								$cc_year++;
							}
							?>                    		
						</SELECT>(MMYY)
        <?php 
				        if($HTTP_GET_VARS['error']==2){
				            echo '   <font color=red><b>' . TEXT_ERROR2 . '</b></font>';
				        }
				        ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="SLOGAN_DETAIL"><?php  echo TEXT_OWNER; ?>:</td>
                    <td class="SLOGAN_DETAIL"><input type='text' name='ccowner' id='ccowner'>
                        <?php 
				        if($HTTP_GET_VARS['error']==3){
				            echo '   <font color=red><b>' . TEXT_ERROR3 . '</b></font>';
				        }
				        ?>
                    </td>
                  </tr>
                  <tr align="center">
                    <td colspan=2 class="SLOGAN_DETAIL"><input type='submit' onClick="MM_validateForm('ccnum1','','RisNum','ccnum2','','RisNum','ccnum3','','RisNum','ccnum4','','RisNum','ccexpdate','','RisNum');return document.MM_returnValue" value='<?php  echo TEXT_BTNCONTINUE; ?>'>
                    </td>
                  </tr>
                </table></td>
                <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
              </tr>
              <tr>
                <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
                <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
                <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
              </tr>
          </table>
        </form>
 </td>
  </tr>
</table>