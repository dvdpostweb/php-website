<?
if(empty($news_id))
{
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
  	<title>news hebdo</title>
  </head>
  <body  bgcolor="#2c3841">
<?
}
?>
<div style='background:white;padding:10px;margin:0px'>
<form action='newsletters.php' method="post">
	news_id* <input type ='text' name="news_id" value = "<?= $news_id?>"><br />
	coup de coeur* :
	<select name="choice">
		<option value="1" <?= $choice == '1' ? 'selected="selected"' : '' ?>>oui</option>
		<option value="0" <?= $choice == '0' ? 'selected="selected"' : '' ?>>non</option>
	</select><br />
	language* :
	<select name="locale">
		<option value="1" <?= $locale == 'fr' ? 'selected="selected"' : '' ?>>fr</option>
		<option value="2" <?= $locale == 'nl' ? 'selected="selected"' : '' ?>>nl</option>
		<option value="3" <?= $locale == 'en' ? 'selected="selected"' : '' ?>>en</option>
	</select><br />
	preview* :<select name="preview">
	<option value="1">preview</option>
		<option value="0">generate</option>
	</select><br />
	
	products_id* : <input type='text' name="product_id" value = "<?= $product_id?>"><br />
	streaming : <select name="streaming">
		<option value="1" <?= $streaming == '1' ? 'selected="selected"' : '' ?>>oui</option>
		<option value="0" <?= $streaming == '0' ? 'selected="selected"' : '' ?>>non</option>
		</select><br />
	description : <textarea rows="10" cols="80" name='desc'><?= $desc_init?></textarea><br />
	
	focus1_product_id : <input type='text' name="focus1_product_id" value = "<?= $focus1_product_id?>"><br />
	focus1_steaming : <select name="focus1_streaming">
		<option value="1" <?= $focus_streaming[1] == '1' ? 'selected="selected"' : '' ?>>oui</option>
		<option value="0" <?= $focus_streaming[1] == '0' ? 'selected="selected"' : '' ?>>non</option>
		</select><br />
	description1 : <textarea rows="10" cols="80" name='focus_desc1'><?= $focus_desc[1]?></textarea><br />
	<select name="focus_rating1">
		<option value="30" <?= $focus_rating[1] == '30' ? 'selected="selected"' : '' ?>>3.0</option>
		<option value="35" <?= $focus_rating[1] == '35' ? 'selected="selected"' : '' ?>>3.5</option>
		<option value="40" <?= $focus_rating[1] == '40' ? 'selected="selected"' : '' ?>>4.0</option>
		<option value="45" <?= $focus_rating[1] == '45' ? 'selected="selected"' : '' ?>>4.5</option>
		<option value="50" <?= $focus_rating[1] == '50' ? 'selected="selected"' : '' ?>>5</option>
	</select><br />
	focus2_product_id : <input type='text' name="focus2_product_id" value = "<?= $focus2_product_id?>"><br />
	focus2_steaming : <select name="focus2_streaming">
		<option value="1" <?= $focus_streaming[2] == '1' ? 'selected="selected"' : '' ?>>oui</option>
		<option value="0" <?= $focus_streaming[2] == '0' ? 'selected="selected"' : '' ?>>non</option>
		</select><br />
	
	description2 : <textarea rows="10" cols="80" name='focus_desc2'><?= $focus_desc[2]?></textarea><br />
	<select name="focus_rating2">
		<option value="30" <?= $focus_rating[2] == '30' ? 'selected="selected"' : '' ?>>3.0</option>
		<option value="35" <?= $focus_rating[2] == '35' ? 'selected="selected"' : '' ?>>3.5</option>
		<option value="40" <?= $focus_rating[2] == '40' ? 'selected="selected"' : '' ?>>4.0</option>
		<option value="45" <?= $focus_rating[2] == '45' ? 'selected="selected"' : '' ?>>4.5</option>
		<option value="50" <?= $focus_rating[2] == '50' ? 'selected="selected"' : '' ?>>5</option>
	</select><br />
	
	focus1_details : <input type='text' name="focus1_details" value = "<?= $focus1_details?>"><br />
	focus2_details : <input type='text' name="focus2_details" value = "<?= $focus2_details?>"><br />
	thumbs1_products_id : <input type='text' name="thumbs1_products_id" value = "<?= $thumbs1_products_id?>"><br />
	thumbs2_products_id : <input type='text' name="thumbs2_products_id" value = "<?= $thumbs2_products_id?>"><br />
	thumbs3_products_id : <input type='text' name="thumbs3_products_id" value = "<?= $thumbs3_products_id?>"><br />
	thumbs4_products_id : <input type='text' name="thumbs4_products_id" value = "<?= $thumbs4_products_id?>"><br />
	thumbs5_products_id : <input type='text' name="thumbs5_products_id" value = "<?= $thumbs5_products_id?>"><br />
	thumbs6_products_id : <input type='text' name="thumbs6_products_id" value = "<?= $thumbs6_products_id?>"><br />
	thumbs7_products_id : <input type='text' name="thumbs7_products_id" value = "<?= $thumbs7_products_id?>"><br />
	thumbs8_products_id : <input type='text' name="thumbs8_products_id" value = "<?= $thumbs8_products_id?>"><br />
	
	top1_products_id : <input type='text' name="top1_id" value = "<?= $top1_id?>"><br />
	top2_products_id : <input type='text' name="top2_id" value = "<?= $top2_id?>"><br />
	top3_products_id : <input type='text' name="top3_id" value = "<?= $top3_id?>"><br />
	top4_products_id : <input type='text' name="top4_id" value = "<?= $top4_id?>"><br />
	top5_products_id : <input type='text' name="top5_id" value = "<?= $top5_id?>"><br />
	top6_products_id : <input type='text' name="top6_id" value = "<?= $top6_id?>"><br />
	top7_products_id : <input type='text' name="top7_id" value = "<?= $top7_id?>"><br />
	top8_products_id : <input type='text' name="top8_id" value = "<?= $top8_id?>"><br />
	top9_products_id : <input type='text' name="top9_id" value = "<?= $top9_id?>"><br />
  top10_products_id : <input type='text' name="top10_id" value = "<?= $top10_id?>"><br />
  link : <input type='text' name="link" value = "<?= $link?>"><br />
	<input type="submit" value ="go">
</form>
<?
if(empty($news_id))
{
  ?>
</body>
</html>
<?
}
?>
