<script type="text/javascript" src="eda/jquery/js/jquery-1.4.2.js"></script>

<script>
	$(function() 
	{
		$('.tool').mouseover(function (){
			$('#id_parrain_popup').show()
		})
		$('.tool').mouseout(function (){
			$('#id_parrain_popup').hide()
		})
			$('.tool').click(function (){
				return false
			})
	}
	)
</script>
  <div class="cinefriends">
    <div class="container clearfix">
      <div class="offre_verslavenir">
        <p><img src="images/cinefriends/header_<?= $lang_short ?>.jpg" width="970" height="407" border="0" /></p>
        <div class="offre_friends">
        <form name="form1" method="post" action="activation_code_confirm.php" align="center">
          <table width="464" cellspacing="0" cellpadding="0" border="0" align="center">
            <tbody>
              <tr>
                <td width="151" valign="middle" height="35" align="right"><?= P_ID ?> :</td>
                <td width="3"></td>
              
              <td width="242" valign="middle" height="35" align="left">
									<input type="text" value="" size="30" class="inputs_codes" id="code" name="p_id"> </td>
              <td width="68" class="plusinfo"><a href="#" class="tool"><?= INFO_LINK ?></a></td>
              </tr>
              <tr>
                <td width="151" valign="middle" height="35" align="right"><?= PROMO_CODE ?> :</td>
                <td width="3"></td>
                <td height="35" align="left" valign="middle" colspan="2">
									<input name="code" id="code" type="text"  value="" size="30" class="inputs_codes">
								</td>
              </tr>
             
              <tr>
                <td align="center" colspan="4"><p>
                    <input type="submit" name="sent" value="<?= TRY_US ?>" class="button_cinefriends">
                  </p></td>
              </tr>
            </tbody>
          </table>
          </form>
        </div>
        
        <div class="tooltip" id="id_parrain_popup" style="display:none">
          
          <p><?= P_ID_LONG ?></p>
<p><img src="images/cinefriends/enveloppe_<?= $lang_short; ?>.jpg" /></p>
          

        </div>
      </div>
      <p align="center">
				<?= VOD_INFO ?>
			</p>
      <p></p>
    </div>
  </div>