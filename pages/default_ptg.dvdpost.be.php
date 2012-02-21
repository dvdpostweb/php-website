<link href="./stylesheet/playthegame.css" media="all" rel="stylesheet" type="text/css" />
   <p><img src="./images/relance012012/header_<?= $lang_short ?>.jpg" width="970" height="388" border="0" /></p>
  <div class="offre_ptg">
  <p align="center" ><img src="./images/ptg/title_<?= $lang_short ?>.jpg" width="969" height="115" border="0" /></p>
     <form name="form1" method="post" action="activation_code_confirm.php">
          <table width="464" cellspacing="0" cellpadding="0" border="0" align="center">
            <tbody>
              
              <tr>
                <td width="151" valign="middle" height="35" align="right">Code VOD :</td>
                <td width="3"></td>
                <td height="35" align="left" valign="middle" colspan="2"><input type="text" size="30" class="inputs_codes" id="code" value="" maxlength="40" name="code"></td>
              </tr>
             
             </tbody>
             </table>
    <p align="center"><input type="submit" class="button_ptg" value="<?= TRY_US ?>" name="sent"></p></form>
    <p align="center"><?= VOD_INFO ?></p>
   </div>
  </div>

  
  </div>
</div>
</div>