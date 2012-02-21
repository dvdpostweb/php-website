<?php  
//RALPH-005 $cpt_gay_movies = tep_db_query("select COUNT(o.orders_id) as cpt from products_to_categories_adult pc, orders o LEFT JOIN orders_products op ON o.orders_id=op.orders_id where pc.categories_id=14 AND o.customers_id=". $customer_id ." AND pc.products_id=op.products_id ");
$cpt_gay_movies = tep_db_query("select COUNT(o.orders_id) as cpt from products_to_categories pc, orders o LEFT JOIN orders_products op ON o.orders_id=op.orders_id where pc.categories_id=76 AND o.customers_id=". $customer_id ." AND pc.products_id=op.products_id "); //RALPH-005
$cpt_gay_movies_values = tep_db_fetch_array($cpt_gay_movies);

$sql='SELECT * FROM droselia_catalog_stream d where trash="NO" order by catalog_id desc limit 50';
$x_query = tep_db_cache($sql,14400,20);
$i=0;
  $x = $x_query[0];
?>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4"  class="SLOGAN_DETAIL">
    	<br>
    </td>
  </tr>
  <tr>
    <td align="center" valign="top">
		<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdxpost/user_box.php'));?><br>
		<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdxpost/gift.php'));?><br>
    <?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdxpost/new_xxx_box.php'));?>	</td>
    
    <td align="left" valign="top">

    <a href='<?= "vodx_detail.php?id=".$x['catalog_id']?>' id='slideshow_link'><div id ='slide'>
		<img src='/images/blank.gif' id='chart_slideshow_b'>
		<img src='<?= $x['directory_thumbs'].'250/5.jpg'; ?>' id='chart_slideshow_a' >
		<div id='slogan_back'></div>
		<div id='slogan_vodx'>
			<div id ='vodx_title'><?= $x['name'].'</div><div>'.TEXT_DOWNLOAD_VODX ?></div>
		</div>
	</div></a><br>
    <?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdxpost/big_recom.php'));?>
    </td>
    <td align="center" valign="top"><?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdxpost/right_menu.php'));?></td>
  </tr>
    <tr><td colspan="3"></tr>
</table>
