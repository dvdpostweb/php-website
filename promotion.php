<?
require('configure/application_top.php');
$current_page_name = 'default.php';
include(DIR_WS_INCLUDES . 'translation.php');
?>
  <div id="promo_area2">
    <p class="text_promo" ><?php echo TEXT_PROMO_TITLE ;?></p>
		<p style="margin:0">
			<form name="form1" method="post" action="activation_code_confirm.php">
    		<input name="code" id="code" class="inputs_codes" value="" size="20" type="text">
				<? $btn = ($_GET['jacob']==1) ? 'http://www.dvdpost.be/images/jb/button_go.gif' : DIR_WS_IMAGES.'button_go.gif' ?>
    		<input class="no_border_button" name="imageField" src="<?= $btn ?>" type="image" align="absmiddle" border="0" >
			</form>
		</p>
  </div>
