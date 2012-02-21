<style type="text/css">
<!--
.NEW {
	color: red;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
}
-->
</style>
<table width="159" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <form name="quick_find2" action="advanced_search_result2.php" method="get" enctype="text/plain"  onsubmit="return search(quick_find2.keywords.value,'<?=TEXT_MOTOR?>')">
      <td width="115" height="23" valign="middle" bgcolor="#FFFFFF"><div align="center">
          <input name="keywords" type="text" class="TYPO_PROMO" value="<?php    echo TEXT_MOTOR ;?>" size="18" onclick="quick_find2.keywords.value='';">		  
      </div></td>
      <td width="44" valign="bottom" bgcolor="#FFFFFF"><input type="image" src="<?php    echo DIR_WS_IMAGES;?>button_go_version2.jpg" align="bottom"></td>
    </form>
  </tr>
</table>

<table width="159" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="115" height="2" valign="middle" bgcolor="#FFFFFF"><div align="center"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="1" height="2"></div></td>
  </tr>
  <tr>
   <td>
     <table width="100%"  border="0" align="right" cellpadding="0" cellspacing="0">
      	<tr valign="bottom">
	  		<td height="15" colspan="2" nowrap><img src="<?php    echo DIR_WS_IMAGES;?>menu_black_line.jpg" width="159" height="3"></td>
	 	</tr>
		<tr>
	         <td height="7" colspan="2" valign="top" nowrap background="<?php    echo DIR_WS_IMAGES;?>menu_background_link.jpg">
	             <table width="100%" height="23"  border="0" cellpadding="0" cellspacing="0" background="<?php    echo DIR_WS_IMAGES;?>menu_background_title.jpg">
	               <tr>
	                 <th width="18%"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></th>
	                 <th width="82%"><div align="left"><strong class="dvdpost_left_menu_title"><?php    echo TEXT_INCONTOURNABLES;?></strong></div></th>
	               </tr>
	             </table>
	         </td>
	       </tr>
	<tr>
		
		<?php 
		$top=array('1'=>array('menu=cult&list=1',TEXT_CULT_MOVIES),'stars'=>array('menu=5star&list=stars',TEXT_5STARS),'dvdpostchoice'=>array('list=dvdpostchoice',TEXT_DVDP_CHOICE),'awards'=> array('list=awards',TEXT_AWARDS),'bluray'=>array('list=bluray',TEXT_BLURAY,'dvdpost_left_menu_link_blu'));
		
		foreach($top as $key => $value)
		{
			if($key==$_GET['list'])
			{
				$strong_start='<b>';
				$strong_end='</b>';
			}
			else
			{
				$strong_start='';
				$strong_end='';
			}
		?>
		<tr><td height="15" valign="middle"> <table width="159"><tr>
		<td height="15" valign="middle" class="SLOGAN_MENU" ><div align="left"><a href="listing_category.php?<?= $value[0] ?>" class="<?= ((!empty($value[2]))?$value[2]:'dvdpost_left_menu_link1')?>"><?= $strong_start.$value[1].$strong_end ?></a></div></td>
	</tr></table></td><tr>	
	<?php } ?>
	<tr valign="bottom">
         <td height="15" colspan="2" nowrap><img src="<?php    echo DIR_WS_IMAGES;?>menu_black_line.jpg" width="159" height="3"></td>
       </tr>
       <tr>
         <td height="3" colspan="2" valign="top" nowrap>
		 <table width="100%" height="23"  border="0" cellpadding="0" cellspacing="0" background="<?php    echo DIR_WS_IMAGES;?>menu_background_title.jpg">
             <tr>
               <th width="18%"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></th>
               <th width="82%"><div align="left"><strong class="dvdpost_left_menu_title"><?php    echo TEXT_CATALOG; ?></strong></div></th>
             </tr>
          </table>
		  </td>
       </tr>
	<?php
		$top=array('new'=>array('list=new',TEXT_NEW),'next'=>array('list=next',TEXT_NEXT),'cinema'=>array('list=cinema',TEXT_CINEMA_NOW));
		
		foreach($top as $key => $value)
		{
			if($key==$_GET['list'])
			{
				$strong_start='<b>';
				$strong_end='</b>';
			}
			else
			{
				$strong_start='';
				$strong_end='';
			}
		?>
		<tr><td height="15" valign="middle"> <table width="159"><tr>
		<td height="15" valign="middle" class="SLOGAN_MENU" ><div align="left"><a href="listing_category.php?<?= $value[0] ?>" class="dvdpost_left_menu_link1"><?= $strong_start.$value[1].$strong_end ?></a></div></td>
	</tr></table></td><tr>	
	<?php }
	echo '<tr>
	         <td valign="top" nowrap="" height="11"><img width="134" height="11" src="/images/www3/greyline3.jpg"></td>
	       </tr>';
	?>	
			<?php 
	
$sql='SELECT c.categories_id,categories_name,display_group,parent_id FROM categories c join categories_description cd on c.categories_id = cd.categories_id where language_id ='.$languages_id .' and (display_group > 0 or parent_id!=0) and categories_type="DVD_NORM"  and product_type="movie" and show_home="YES" order by display_group, sort_order ';
$query=tep_db_query($sql);
	if(!empty($_GET['cPath']))
	{
		$sql_cpath='SELECT c.categories_id,display_group,parent_id FROM categories c where categories_id='.$_GET['cPath'];
		$query_cpath=tep_db_query($sql_cpath);
		$row_cpath=tep_db_fetch_array($query_cpath);
		if($row_cpath['parent_id']==0)
		{
			$menu_open=$_GET['cPath'];
		}
		else
		{
			$menu_open=$row_cpath['parent_id'];
		}
	}

while($row=tep_db_fetch_array($query))
{
	
	if($row['categories_id']==$menu_open || $row['categories_id']==$_GET['cPath'])
	{
		$strong_start='<b>';
		$strong_end='</b>';
	}
	else
	{
		$strong_start='';
		$strong_end='';
	}
	if(!empty($prev_group) && $prev_group!=$row['display_group'])
	 {
		echo '<tr>
		         <td valign="top" nowrap="" height="11"><img width="134" height="11" src="/images/www3/greyline3.jpg"></td>
		       </tr>';
	}
	if($row['parent_id']==0 )
	{
		echo '<tr><td height="15" valign="middle"> <table width="159"><tr>
		<td height="15" valign="middle" class="SLOGAN_MENU" ><div align="left"><a href="listing_category.php?cPath='.$row['categories_id'].'" class="dvdpost_left_menu_link1">'.$strong_start.$row['categories_name'].$strong_end.'</a></div></td>
	</tr></table></td><tr>';
	}
	
	if($row['parent_id']==$menu_open){
		echo '
		<tr>
			
	        <td  width="105" style="background: url('.DIR_WS_IMAGES.'rep2.gif) repeat-y;"  class="SLOGAN_MENU DISPLAY_MENU"><a href="listing_category.php?cPath='.$row['categories_id'].'" class="dvdpost_left_menu_link1">'.$strong_start.$row['categories_name'].$strong_end.'</a>
			</td>
	     </tr>';
	 
	}
	$prev_group=$row['display_group'];
}
echo '<tr>
         <td valign="top" nowrap="" height="11"><img width="134" height="11" src="/images/www3/greyline3.jpg"></td>
       </tr>';
	$top=array('7'=>array('list=7',TEXT_SMALL_PRODUCTION),'classic'=>array('list=classic',TEXT_OLDIES));
	
	foreach($top as $key => $value)
	{
		if($key==$_GET['list'])
		{
			$strong_start='<b>';
			$strong_end='</b>';
		}
		else
		{
			$strong_start='';
			$strong_end='';
		}
	?>
	<tr><td height="15" valign="middle"> <table width="159"><tr>
	<td height="15" valign="middle" class="SLOGAN_MENU" ><div align="left"><a href="listing_category.php?<?= $value[0] ?>" class="dvdpost_left_menu_link1"><?= $strong_start.$value[1].$strong_end ?></a></div></td>
</tr></table></td><tr>	
<?php } ?>
  <td height="70" colspan="2" nowrap><table width="133" border="0" align="left" cellpadding="0" cellspacing="0">
         <tr>
           <td height="29" background="<?php    echo DIR_WS_IMAGES;?>x_border.jpg"><a href="mydvdxpost.php" class="dvdpost_left_menu_title"><div align="center"><?php    echo TEXT_CATALOG_X ;?></span> </div></A></td>
         </tr>
       </table>
         <div align="right"></div></td>
   </tr>
     </table>
   </td>
  </tr>
</table>
