<style type="text/css">
<!--
.Style3 {font-size: 20px;font-family: Arial, Helvetica, sans-serif;color: #FF0000;}
.Style3mini {font-size: 15px;font-family: Arial, Helvetica, sans-serif;color: #FF0000;}
.Style4 {font-family: Arial, Helvetica, sans-serif; color:#000000; font-size: 19px; font-weight:bold; padding:0 0 0 10px; border-bottom:#000000 solid 1px;}
.Style5 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.Style6 {font-family: Arial, Helvetica, sans-serif;	font-size: 12px;}
.contract {font-family: Arial, Helvetica, sans-serif;	font-size: 9px;}

a.big_link {	font-size: 25px;color: #2100AD;}
a:link.big_link {text-decoration: none;}
a:visited.big_link {text-decoration: none;	color: #2100AD;}
a:hover.big_link {text-decoration: underline;color: #2100AD;}
a:active.big_link {text-decoration: none;color: #2100AD;}

a.black_link {
color:#100f0f;
font-family:Arial, Helvetica, sans-serif;
font-size:12px;
text-decoration:underline;
}

.black_link {
color:#100f0f;
font-family:Arial, Helvetica, sans-serif;
font-size:12px;
text-decoration:none;
font-weight:bold;
}
table{
font-family:Arial, Helvetica, sans-serif;	
}

.dvd_title{
	margin : 5px 0 5px 0;
	font-size:12px;
}
-->
</style>
<?php 
function add_gift($my_point,$point,$id,$language)
{
	 if($my_point>=$point){
?>		
		<form method="post" action="member_get_member_points_process.php">
			<input type="hidden" name="mgmgift" value="<?= $id ?>">
			<input type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/gift/echanger.gif">
		</form>
<?php 
	}else{ 
?>
	<form method="post" action="member_get_member_points_process.php">
		<img src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/gift/echanger_gris.gif">
	</form>
<?php 
	} 
}
$mgm_points_query = tep_db_query("SELECT mgm_points FROM customers WHERE customers_id = '" . $customer_id . "' ");
$mgm_points_query_value = tep_db_fetch_array($mgm_points_query);
$gift_query =	tep_db_query("SELECT * FROM `mem_get_mem_gift` WHERE mem_get_mem_gift_id IN ( 35, 36, 37, 38 ) order by mem_get_mem_gift_id");
$dvd_gift=tep_db_query('SELECT * FROM `mem_get_mem_gift` m join products_description p on m.products_id = p.products_id where m.products_id >0 and status =1 and quantity > 1 and language_id ='. $languages_id.' order by rand() limit 5' );


?>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  
    <tr>
    <td height="18"></td>
    </tr>
      <tr align="center" valign="middle">
    <td height="50" colspan="3" align="right">
    	<a href="member_get_member.php" class="black_link "><?php  echo TEXT_BACK ;?></a>
    	<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
        <img src="<?php  echo DIR_WS_IMAGES;?>dvdpost_public/bg-top-nav-sep.gif" width="2" height="18" align="top">
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
		<a class="black_link " href="member_get_member_points.php"><u><?php  echo TEXT_USE_POINTS ;?></u></a> 
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
        <img src="<?php  echo DIR_WS_IMAGES;?>dvdpost_public/bg-top-nav-sep.gif" width="2" height="18" align="top">
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3">
        <span class="black_link"><?php  echo TEXT_GIFT ;?></span>
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
        <img src="<?php  echo DIR_WS_IMAGES;?>dvdpost_public/bg-top-nav-sep.gif" width="2" height="18" align="top">
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3">
        <a class="black_link " href="member_get_member_faq.php">FAQ</a>
         
    </td>
  </tr>
    
 
    <tr>
    <td  valign="middle" style="background-color:#100f0f; color:#FFFFFF; font-family:Arial, Helvetica, sans-serif; font-size:23px; margin:0 0 18px;
padding:0 0 0 10px; font-weight:normal; line-height:35px;"><?php  echo TEXT_WIN_POINTS2; ?></td>
  </tr>
</table>

<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
    <td height="18"></td>
    </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/gift/ticket.jpg"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/gift/ipodshuffle.jpg"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/gift/ipod.jpg"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/gift/bluray.jpg"></td>
    
  </tr>
  <tr>
    <td height="18" colspan="4"></td>
    </tr>
  <!-- bouton echange -->
  <tr align="center">
	
	<?php
	while($gift_query_value = tep_db_fetch_array($gift_query ))
	{
	?>
    <td>
		<?= add_gift($mgm_points_query_value['mgm_points'],$gift_query_value['points'],$gift_query_value['mem_get_mem_gift_id'],$language) ?>
	</td>
    <?php
	}
    ?>
    
  </tr>
  
  <tr>
    <td width="425">&nbsp;</td>
    <td align="right" class="Style6">&nbsp;</td>
  </tr>
</table>

<br>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="Style4"><?php  echo TEXT_ALSO ;?></td>
  </tr>
  
  <tr>
    <td height="18"></td>
    </tr>
  
  <tr>
	<td>
		<table width="764">
			<tr>
				<?php while($dvd_gift_value = tep_db_fetch_array($dvd_gift )){?>
					<td><table border="0" align="center" cellpadding="0" cellspacing="0" width="139">
					<tr>
					<td align="center" ><a href="/product_info_shop.php?products_id=<?= $dvd_gift_value['products_id']?>"target="_blank" ><img style="border:#333333 solid 1px" src="/images/<?= $dvd_gift_value['products_image_big']?>" height="152" width="100"  border="0" / ></a>
					</td>
					<tr>
					<td align="center"><div class='dvd_title'><?=substr($dvd_gift_value['products_name'],0,19); ?></div></td>
					</tr>
					<tr>
						<td align="center"><img src='images/www3/languages/<?= $language ?>/images/gift/points.gif' alt='point' /></td>
					</tr>
                    <tr>
                        <td height="18"></td>
                    </tr>
					<tr>
						<td align="center"><?= add_gift($mgm_points_query_value['mgm_points'],$dvd_gift_value['points'],$dvd_gift_value['mem_get_mem_gift_id'],$language) ?></td>
					</tr>
					</table></td>
				<?php } ?>
			</tr>
		</table>
  	</td>
  </tr>
  
  <tr>
    <td height="18"></td>
    </tr>
 
  <!--
  <tr>
    <td><table width="705"  border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
        <td height="250">
       
				<?php 
    			$listing_sql='SELECT mg.products_id , pd. products_name , p.products_language_fr , p.products_undertitle_nl, pd.products_image_big ';
				$listing_sql.=' FROM mem_get_mem_gift mg,  products p ,  products_description pd ';
				$listing_sql.=' WHERE mg.products_id > 0 AND mg.products_id=p.products_id and p.products_id=pd.products_id  AND mg. quantity>0 and mg.points=200 and pd.language_id=' . $languages_id ;
				switch ($languages_id){
					case 1:
						$listing_sql.= ' and p.products_language_fr >0 ';
						break;
					case 2:
						$listing_sql.= ' and p.products_undertitle_nl >0 ';
					break;
						case 3:
						$listing_sql.= ' and p.products_undertitle_nl >0 ';
					break;
				}
				$listing_sql.= ' and p.products_type = "DVD_NORM" '; //BEN001
				$listing_sql.=' ORDER BY mg.points ASC LIMIT 3';
				$listing = tep_db_query($listing_sql);
				while ($product_info_values = tep_db_fetch_array($listing)) {
					?>
                    
                  
					<table width="304"  border="0" cellspacing="0" cellpadding="0">
          				<tr>
							<td width="69" rowspan="2"><a href="http://www.dvdpost.be/product_info.php?products_id=<?php  echo $product_info_values['products_id'] ;?>"><img src="<?php  echo DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'] ;?>" border="0" width="60" height="90"></td>
							<td width="235" valign="top"><span class="Style5"><?php  echo $product_info_values['products_name'] ;?></span></td>
          				</tr>
          				<tr>
            				<td class="Style6">
            				<?php 
            				$actors_sql="SELECT a.actors_name, pa.actors_id FROM products_to_actors pa , actors a where pa.products_id ='". $product_info_values['products_id']. "' and pa.actors_id=a.actors_id";
            				$actors_listing = tep_db_query($actors_sql);
            				while ($actors_values = tep_db_fetch_array($actors_listing)) {
            					echo $actors_values['actors_name'].'<br>';
	            			}	
            				?></td>
          				</tr>
          				<tr>
            				<td colspan="2">&nbsp;</td>
          				</tr>
        			</table>
					<?php  } ?>

          </td>
        <td>&nbsp;</td>
        <td height="250">
				<?php 
    			$listing_sql='SELECT mg.products_id , pd. products_name , p.products_language_fr , p.products_undertitle_nl, pd.products_image_big ';
				$listing_sql.=' FROM mem_get_mem_gift mg,  products p ,  products_description pd ';
				$listing_sql.=' WHERE mg.products_id > 0 AND mg.products_id=p.products_id and p.products_id=pd.products_id  AND mg. quantity>0 and mg.points=300 and pd.language_id=' . $languages_id ;
				switch ($languages_id){
					case 1:
						$listing_sql.= ' and p.products_language_fr >0 ';
						break;
					case 2:
						$listing_sql.= ' and p.products_undertitle_nl >0 ';
					break;
						case 3:
						$listing_sql.= ' and p.products_undertitle_nl >0 ';
					break;
				}
				$listing_sql.= ' and p.products_type = "DVD_NORM" ' ; //BEN001
				$listing_sql.=' ORDER BY mg.points ASC LIMIT 3';
				$listing = tep_db_query($listing_sql);
				while ($product_info_values = tep_db_fetch_array($listing)) {
					?>
					<table width="304"  border="0" cellspacing="0" cellpadding="0">
          				<tr>
							<td width="69" rowspan="2"><a href="product_info.php?products_id=<?php  echo $product_info_values['products_id'] ;?>"><img src="<?php  echo DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'] ;?>" border="0" width="60" height="90"></td>
							<td width="235" valign="top"><span class="Style5"><?php  echo $product_info_values['products_name'] ;?></span></td>
          				</tr>
          				<tr>
            				<td class="Style6">
            				<?php 
            				$actors_sql="SELECT a.actors_name, pa.actors_id FROM products_to_actors pa , actors a where pa.products_id ='". $product_info_values['products_id']. "' and pa.actors_id=a.actors_id";
            				$actors_listing = tep_db_query($actors_sql);
            				while ($actors_values = tep_db_fetch_array($actors_listing)) {
            					echo $actors_values['actors_name'].'<br>';
	            			}	
            				?></td>
          				</tr>
          				<tr>
            				<td colspan="2">&nbsp;</td>
          				</tr>
        			</table>
					<?php  } ?>

          </td>
      </tr> 
    </table>
	</td>
  </tr> -->
  <tr>
	<td>
		<table width="764"  border="0" align="center" cellpadding="0" cellspacing="0">
			<tr valign="top">
				<td height="40" class="contract" valign="bottom">
					<?php  echo TEXT_EXDVD_RENTAL ;?> - <?php  echo TEXT_CONTRACT ;?>					
				</td>
			</tr>
		</table>
	</td>
  </tr>
  <tr align="center" valign="middle">
    <td height="50" colspan="3" align="right">
    	<a href="member_get_member.php" class="black_link "><?php  echo TEXT_BACK ;?></a>
    	<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
        <img src="<?php  echo DIR_WS_IMAGES;?>dvdpost_public/bg-top-nav-sep.gif" width="2" height="18" align="top">
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
		<a class="black_link " href="member_get_member_points.php"><u><?php  echo TEXT_USE_POINTS ;?></u></a> 
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
        <img src="<?php  echo DIR_WS_IMAGES;?>dvdpost_public/bg-top-nav-sep.gif" width="2" height="18" align="top">
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3">
        <span class="black_link"><?php  echo TEXT_GIFT ;?></span>
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"> 
        <img src="<?php  echo DIR_WS_IMAGES;?>dvdpost_public/bg-top-nav-sep.gif" width="2" height="18" align="top">
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3">
        <a class="black_link " href="member_get_member_faq.php">FAQ</a>
         
    </td>
  </tr>  
</table>