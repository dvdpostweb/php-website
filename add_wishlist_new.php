<?php
	require('configure/application_top.php');
	if(!empty($_GET['nexturl']))
		$next=str_replace('[php]','.php',$_GET['nexturl']);
	else		
		$next=$_SERVER['HTTP_REFERER'];
?>
<div id="addwishlist_explain">
<?php
	switch ($languages_id){
		case 1:
			echo "<br />choisissez la priorit&eacute; du film dans votre wishlist<br /><br />";
			$lang='french';
			break;
		case 2:
			echo "<br />Kies de voorrang  van uw film in uw wenslijst<br /><br />";
			$lang='dutch';
			break;
		case 3:
			echo "<br />Select the wishlist priority for this movie<br /><br />";
			$lang='english';
			break;
	}
?>
</div>
<form action="add_wishlist_new_process.php" method="post" name="form_wishlist" target="_self">
<table cellspacing="0" cellpadding="0" border="0" align="center"  width="250">
	
	<tr>
		<td width="50" align="center" height="50"><img src="<?php echo DIR_WS_IMAGES ;?>/high_w.gif"></td>
		<td width="50" align="center" height="50"><img src="<?php echo DIR_WS_IMAGES ;?>/med_w.gif"></td>
		<td width="50" align="center" height="50"><img src="<?php echo DIR_WS_IMAGES ;?>/low_w.gif"></td>
	</tr>
	<tr>
		<td align="center" valign="middle" height="30"><input name="priority" type="radio" value="1" /></td>
		<td align="center" valign="middle" height="30"><input name="priority" type="radio" value="2" checked /></td>
		<td align="center" valign="middle" height="30"><input name="priority" type="radio" value="3" /></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<input type="hidden" name="products_id" value="<?php echo $products_id ;?>" >
			<input type="hidden" name="nexturl" value="<?= $next;?>" >
			<input src="<?php echo DIR_WS_IMAGES_LANGUAGES.'/'.$lang ;?>/images/buttons/add_wishlist_new.gif" type="image">
		</td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
<table>
</form>
<?php
if (!empty($_GET['date'])){
?>
<div class="disclaimer_not_available disclaimer_not_available_<?= $lang_short?>">
	
	<div class="disclaimer_not_available_img"></div>
		<div class="disclaimer_not_available_text">
<?php	
	echo TEXT_NOT_AVAILABLE_ADD.' '.$_GET['date'];
 ?>
</div></div></div>
<?php
}
require('configure/application_bottom.php');
?>

