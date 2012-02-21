<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Document sans nom</title>
<style type="text/css">
<!--
.query_style {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.Query_title {
	font-family: Arial, Helvetica, sans-serif;
	color:#FFFFFF;
	font-size: 13px;
}
.comment_style {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
.input {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px; height:20px;
	width:350px; background-color:#E8E8E8;
}

.input2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px; height:20px;
	width:350px; background-color:#EEEEEE;
}

.checkbox {
	height:14px;
	width:14px; background-color:#E8E8E8;
}

.border_left
{
	BORDER-LEFT: #d10000 1px solid;
}
.border_right
{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	BORDER-RIGHT: #d10000 1px solid;
}
.Style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 18px;
}
-->
</style>
</head>

<body><br>
<p align="center" class="Style1"><?php  echo TEXT_CONSO ;?></p>
<form name="form1" method="post" action="Survey_customers_process.php">
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td width="19" height="25" background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_GO_TO_THEATRE ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input name="Q1" type="radio" value="0" checked></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_NEVER ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q1" value="1"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q1_1 ;?></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q1" value="2"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q1_2 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q1" value="3"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q1_3 ;?></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q1" value="4"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q1_4 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q1" value="5"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q1_5 ;?></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q1" value="6"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q1_6 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table><br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q2Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input name="Q2" type="radio" value="1" checked></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_YES ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q2" value="0"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_NO ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table>
  <br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q3Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" height="25" class="border_left">&nbsp;</td>
      <td width="28" height="25" align="center" valign="middle"><input name="Q3" type="radio" value="0" checked></td>
      <td width="553" height="25" valign="middle" class="border_right">0</td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="25" class="border_left">&nbsp;</td>
      <td width="28" height="25" align="center" valign="middle"><input type="radio" name="Q3" value="1"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q3_1 ;?></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" height="25" class="border_left">&nbsp;</td>
      <td height="25" align="center" valign="middle"><input type="radio" name="Q3" value="2"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q3_2 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="25" class="border_left">&nbsp;</td>
      <td height="25" align="center" valign="middle"><input type="radio" name="Q3" value="3"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q3_3 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table>
  <br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q4Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input name="Q4_a" type="checkbox" class="checkbox" id="Q4_a" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q4_1 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q4_b" type="checkbox" class="checkbox" id="Q4_b" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q4_2 ;?></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q4_c" type="checkbox" class="checkbox" id="Q4_c" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q4_3 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q4_d" type="checkbox" class="checkbox" id="Q4_d" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q4_4 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table><br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q5Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input name="Q5" type="radio" value="1" checked></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_YES ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q5" value="0"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_NO ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table>
  <br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
	  <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q6Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input name="Q6_a" type="checkbox" class="checkbox" id="Q6_a" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q6_1 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q6_b" type="checkbox" class="checkbox" id="Q6_b" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q6_2 ;?> </td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q6_c" type="checkbox" class="checkbox" id="Q6_c" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q6_3 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q6_d" type="checkbox" class="checkbox" id="Q6_d" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q6_4 ;?> </td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><p>
        <input name="Q6_e" type="checkbox" class="checkbox" id="Q6_e" value="check">
      </p></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q6_5 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q6_f" type="checkbox" class="checkbox" id="Q6_f" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q6_6 ;?>
      <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="30" height="2"><input name="Specify_Q6" type="text" class="input" id="Specify_Q6"></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table><br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q7Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input name="Q7_a" type="checkbox" id="Q7_a" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q7_1 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q7_b" type="checkbox" id="Q7_b" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q7_2 ;?> </td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
<p align="center" class="Style1"><?php  echo TEXT_RECEP ;?></p>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q8Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input name="Q8" type="radio" value="1" checked></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_YES ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q8" value="0"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_NO ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table><br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td width="19" height="25" background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg">&nbsp;</td>
      <td height="35" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q9Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="30" align="center" valign="middle"><input name="Q9" type="radio" value="1" checked></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_YES ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="30" align="center" valign="middle"><input type="radio" name="Q9" value="0"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_NO ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table><br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q10Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" height="25" class="border_left">&nbsp;</td>
      <td width="28" height="25" align="center" valign="middle"><input name="Q10_a" type="checkbox" id="Q10_a" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q10_1 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="25" class="border_left">&nbsp;</td>
      <td width="28" height="25" align="center" valign="middle"><input name="Q10_b" type="checkbox" id="Q10_b" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q10_2 ;?></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" height="25" class="border_left">&nbsp;</td>
      <td height="25" align="center" valign="middle"><input name="Q10_c" type="checkbox" id="Q10_c" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q10_3 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p align="center" class="Style1"><?php  echo TEXT_4_FUT ;?></p>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td width="19" height="25" background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg">&nbsp;</td>
      <td height="55" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q11Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="30" align="center" valign="middle">      <input name="Q11_a" type="checkbox" id="Q11_a" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q11Q_1 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="30" align="center" valign="middle"><input name="Q11_b" type="checkbox" id="Q11_b" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q11Q_2 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table><br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td width="19" height="25" background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q12Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="30" align="center" valign="middle"><input name="Q12_a" type="checkbox" id="Q12_a" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q12Q_1 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="30" align="center" valign="middle"><input name="Q12_b" type="checkbox" id="Q12_b" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q12Q_2 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table><br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td width="19" height="25" background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q13Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="30" align="center" valign="middle"><input name="Q13" type="radio" value="1" checked></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q13Q_1 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="30" align="center" valign="middle"><input type="radio" name="Q13" value="2"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q13Q_2 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table><br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="35" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q14Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input type="radio" name="Q14" value="2"></td>
      <td width="553" height="25" valign="middle" class="border_right">2 euros </td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q14" type="radio" value="3" checked></td>
      <td width="553" height="25" valign="middle" class="border_right">3 euros </td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q14" value="4"></td>
      <td width="553" height="25" valign="middle" class="border_right">4 euros </td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q14" value="5"></td>
      <td width="553" height="25" valign="middle" class="border_right">5 euros </td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p align="center"> <span class="Style1"><?php  echo TEXT_CONNEX;?></span></p>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q15Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" height="25" class="border_left">&nbsp;</td>
      <td width="28" height="25" align="center" valign="middle">      <input name="Q15" type="radio" value="1" checked></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q15Q_1 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="25" class="border_left">&nbsp;</td>
      <td width="28" height="25" align="center" valign="middle"><input type="radio" name="Q15" value="2"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q15Q_2 ;?></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" height="25" class="border_left">&nbsp;</td>
      <td height="25" align="center" valign="middle"><input type="radio" name="Q15" value="3"></td>
      <td width="553" height="25" valign="middle" class="border_right">ISDN</td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table><br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q16Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input name="Q16_a" type="checkbox" class="checkbox" id="Q16_a" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q16Q_1 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q16_b" type="checkbox" class="checkbox" id="Q16_b" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q16Q_2 ;?></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q16_c" type="checkbox" class="checkbox" id="Q16_c" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q16Q_3 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q16_d" type="checkbox" class="checkbox" id="Q16_d" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q16Q_4 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table>
  <p align="center"><br>
    <span class="Style1"><?php  echo TEXT_ADULT_MOVIES ;?></span></p>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q17Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input name="Q17" type="radio" value="1" checked></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_YES ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q17" value="0"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_NO ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table><br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q18Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input name="Q18" type="radio" value="1" checked></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_YES ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q18" value="0"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_NO ;?>, <?php  echo TEXT_EXP ;?><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="30" height="2">
        <input name="Specify_Q18" type="text" class="input2" id="Specify_Q18"></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table><br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q19Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input name="Q19" type="radio" value="1" checked></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_YES ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q19" value="0"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_NO ;?>, <?php  echo TEXT_EXP ;?><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="30" height="2">
        <input name="Specify_Q19" type="text" class="input2" id="Specify_Q19"></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table>
  <p align="center">&nbsp;</p>
  <p align="center"><span class="Style1"><?php  echo TEXT_OTHERS ;?></span>
  </p>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q20Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" height="25" class="border_left">&nbsp;</td>
      <td width="28" height="25" align="center" valign="middle"><input name="Q20_a" type="checkbox" id="Q20_a" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q20Q_1 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="25" class="border_left">&nbsp;</td>
      <td width="28" height="25" align="center" valign="middle"><input name="Q20_b" type="checkbox" id="Q20_b" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q20Q_2 ;?></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" height="25" class="border_left">&nbsp;</td>
      <td height="25" align="center" valign="middle"><input name="Q20_c" type="checkbox" id="Q20_c" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q20Q_3 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table><br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="35" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q21Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input name="Q21" type="radio" value="1" checked></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_YES ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input type="radio" name="Q21" value="0"></td>
      <td width="553" height="25" valign="middle" bgcolor="#EEEEEE" class="border_right"><?php  echo TEXT_NO ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table><br>
  <table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr >
      <td background="<?php  echo DIR_WS_IMAGES;?>survey/survey_top_left.jpg" height="25" width="19">&nbsp;</td>
      <td height="25" colspan="3" bgcolor="#d10000" class="Query_title"><b><?php  echo TEXT_Q22Q ;?></b></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td width="28" align="center" valign="middle"><input name="Q22_a" type="checkbox" class="checkbox" id="Q22_a" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q22Q_1 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q22_b" type="checkbox" class="checkbox" id="Q22_b" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q22Q_2 ;?></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q22_c" type="checkbox" class="checkbox" id="Q22_c" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q22Q_3 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q22_d" type="checkbox" class="checkbox" id="Q6_d" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q22Q_4 ;?></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><p>
          <input name="Q22_e" type="checkbox" class="checkbox" id="Q22_e" value="check">
      </p></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q22Q_5 ;?></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q22_f" type="checkbox" class="checkbox" id="Q6_e" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q22Q_6 ;?></td>
    </tr>
    <tr bgcolor="#E5E5E5">
      <td width="19" class="border_left">&nbsp;</td>
      <td align="center" valign="middle"><input name="Q22_g" type="checkbox" class="checkbox" id="Q6_f" value="check"></td>
      <td width="553" height="25" valign="middle" class="border_right"><?php  echo TEXT_Q22Q_7 ;?><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="30" height="2">
          <input name="Specify_Q22" type="text" class="input2" id="Specify_Q22"></td>
    </tr>
    <tr bgcolor="#EEEEEE">
      <td height="1" colspan="3" bgcolor="#D10000" class="border_left"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div align="center"><input name="imageField" type="image" src="<?php  echo DIR_WS_IMAGES;?>languages/<?php  echo $language ;?>/images/buttons/button_confirm_update.gif" border="0"></div>
</form>
</body>
</html>
