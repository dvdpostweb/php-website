<table width="220"  border="0" cellpadding="0" cellspacing="0"  bgcolor="#FFFFFF" >
	<tr>
		<td align="left" id="search_box">	
				
			<table width="200" border="0" cellpadding="0" cellspacing="0" height="85">
				<?php 
					if(SITE_TYPE=='DVD_ADULT') 
						$path='/advanced_search_result2_public_adult.php';
					  else
						$path='/advanced_search_result2_public.php';
				?>
				<form name="quick_find2" action="<?= $path ?>" method="get" enctype="text/plain" onsubmit="return search(quick_find2.keywords.value,'<?=TEXT_MOTOR_X?>')">
				<tr>			    
					<td height="60" valign="middle" align="center" class="search_bg" >
						<input name="keywords" size="15" class="search_text" type="text" value="<?php    echo TEXT_MOTOR_X ;?>" size="15" onclick="if(quick_find2.keywords.value=='<?=TEXT_MOTOR_X; ?>'){quick_find2.keywords.value='';	}" onblur="if(quick_find2.keywords.value==''){quick_find2.keywords.value='<?= TEXT_MOTOR_X; ?>';						}">		  
					</td>
                    <td style="padding-left:15px; height:42px;">
						<input type="image" src="<?php    echo DIR_WS_IMAGES;?>bouton_go_search.png" >
					</td>	    
				</tr>
				</form>
			</table>
			
            
            
			<table width="235" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
				<tr>
					<td width="250" align="center" height="2" valign="middle" bgcolor="#FFFFFF">
						<img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="1" height="2">
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%"  border="0" align="right" cellpadding="0" cellspacing="0">
							
							
							
							<tr>
								<td height="3" colspan="2" valign="top" nowrap>
									<table width="100%" height="23"  border="0" cellpadding="0" cellspacing="0" bgcolor="#201b1b">
										<tr>
											<td width="8%"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
											<td width="82%"><div align="left"><strong class="dvdpost_left_menu_title"><?php    echo TEXT_CATALOG; ?></strong></div></td>
										</tr>
									</table>
								</td>
							</tr>
                           <tr>
                    		<td height="2">&nbsp;</td>
                			</tr>
							<?php
							$sql="SELECT * FROM categories c join categories_description cd on c.categories_id=cd.categories_id where categories_type='DVD_ADULT' and language_id = ".$languages_id." and product_type='movie'";
							$res=tep_db_cache($sql,259200);
							 foreach($res as $category)
							 {
		                    	$cat=$category['categories_id'];
								$cat_name=$category['categories_name'];
		                     ?>
							<tr>
								<td valign="top" nowrap> <img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="3" height="15"></td>
								<td height="15" valign="middle">
									<a class="dvdpost_left_menu_link1" href='<?php    echo get_cats($cat,'',$lang_short,'DVD_ADULT') ?>' /><?= $cat_name ?></a>
								</td>
							</tr>
							<?
							}
							?>
							<tr>
						         <td height="7" colspan="2" valign="top" nowrap ><br />
						             <table width="100%" height="23"  border="0" cellpadding="0" cellspacing="0" bgcolor="#201b1b">
						               <tr>
						                 <th width="8%"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></th>
						                 <th width="92%"><div align="left"><strong class="dvdpost_left_menu_title"><?php   echo TEXT_STUDIOS;?></strong></div></th>
						               </tr>
						             </table>
						         </td>
						       </tr>							
				        	<tr>
								<td  colspan="2" height="15" colspan="2" valign="middle">
									<br /><?php  
									    include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/boxes/studio.php'));
									?>
								</td>
							</tr>
							<tr>
						         <td height="7" colspan="2" valign="top" nowrap ><br />
						             <table width="100%" height="23"  border="0" cellpadding="0" cellspacing="0" bgcolor="#201b1b">
						               <tr>
						                 <th width="8%"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></th>
						                 <th width="92%"><div align="left"><strong class="dvdpost_left_menu_title"><?php   echo TEXT_THEME;?></strong></div></th>
						               </tr>
						             </table>
						         </td>
						       </tr>
							   <tr>
						         <td valign="top" nowrap ><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="6" height="15"></td>
						         <td height="15" valign="middle"><br />
								 	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/boxes/themes_adult.php'));?>	
								</td>
						       </tr>	
						</table>
					</td>
				   
			</table>
		</td>
	</tr>
</table>
