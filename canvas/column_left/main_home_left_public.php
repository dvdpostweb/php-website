

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
				<form name="quick_find2" action="<?= $path ?>" method="get" enctype="text/plain" onsubmit="return search(quick_find2.keywords.value,'<?=TEXT_MOTOR?>')">
				<tr>
					<td height="20">&nbsp;</td>
				</tr>	
				<tr>			    
					<td height="35" valign="middle" align="center" class="search_bg" >
						<input name="keywords" size="15" class="search_text" type="text" value="<?php    echo TEXT_MOTOR ;?>" size="15" onclick="if(quick_find2.keywords.value=='<?=TEXT_MOTOR; ?>'){quick_find2.keywords.value='';	}" onblur="if(quick_find2.keywords.value==''){quick_find2.keywords.value='<?= TEXT_MOTOR; ?>';}"  >		  
					</td>
                    <td style="padding-left:6px; height:35px;">
						<input type="image" src="<?php    echo DIR_WS_IMAGES;?>bouton_go_search.png" >
					</td>	    
				</tr>
				<tr><td height="25">&nbsp;</td></tr>
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
								<td height="7" colspan="2" valign="top" nowrap >
									<table width="100%" height="23"  border="0" cellpadding="0" cellspacing="0" bgcolor="#201b1b">
										<tr>
											<td width="9%"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="7" height="3"></td>
											<td width="250" align="left">
												<strong class="dvdpost_left_menu_title"><?php    echo TEXT_INCONTOURNABLES;?></strong>
											</td>
										</tr>
									</table>
								</td>
							</tr>
                            <tr>
                                <td height="2">&nbsp;</td>
                            </tr>
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
									<tr><td height="15" valign="middle"> <table width="200"><tr>
									<td height="15" valign="middle" class="SLOGAN_MENU" ><div align="left" style="padding-left:30px"><a href="<?= get_cats(0,$key,$lang_short,$language_id) ?>" class="<?= ((!empty($value[2]))?$value[2]:'dvdpost_left_menu_link1')?>"><?= $strong_start.$value[1].$strong_end ?></a></div></td>
								</tr></table></td><tr>	
								<?php } ?>
								<tr><td><br /></td></tr>
							       	<tr>
										<td height="3" colspan="2" valign="top" nowrap>
											<table width="100%" height="23"  border="0" cellpadding="0" cellspacing="0" bgcolor="#1c1818">
												<tr>
													<td width="8%"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="6" height="1"></td>
													<td width="82%"><div align="left"><strong class="dvdpost_left_menu_title"><?php    echo TEXT_CATALOG; ?></strong></div></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td><br /></td></tr>
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
									<tr><td height="15" valign="middle"> <table width="200"><tr>
									<td height="15" valign="middle" class="SLOGAN_MENU" ><div align="left" style='padding-left:30px'><a href="<?= get_cats(0,$key,$lang_short,$language_id) ?>" class="dvdpost_left_menu_link1"><?= $strong_start.$value[1].$strong_end ?></a></div></td>
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
									echo '<tr><td height="15" valign="middle"> <table width="200"><tr>
									<td height="15" valign="middle" class="SLOGAN_MENU" ><div align="left"  style="padding-left:30px"><a href="'.get_cats($row['categories_id'],0,$lang_short,$language_id).'" class="dvdpost_left_menu_link1">'.$strong_start.$row['categories_name'].$strong_end.'</a></div></td>
								</tr></table></td><tr>';
								}

								if($row['parent_id']==$menu_open){
									echo '
									<tr>
										<td><table border="0" cellpadding="0" cellspacing="0"> <tr><td width="30"></td>
								        <td  width="150" style="background: url('.DIR_WS_IMAGES.'rep2.gif) repeat-y;"  class="SLOGAN_MENU DISPLAY_MENU"><a href="'.get_cats($row['categories_id'],0,$lang_short,$language_id).'" class="dvdpost_left_menu_link1"><div style="margin-left:20px;padding:2px;">'.$strong_start.$row['categories_name'].$strong_end.'</div></a>
										</td></tr></table>
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
								<tr><td height="15" valign="middle"> <table width="200"><tr>
								<td height="15" valign="middle" class="SLOGAN_MENU" ><div align="left" style="padding-left:30px"><a href="<?= get_cats(0,$key,$lang_short,$language_id) ?>" class="dvdpost_left_menu_link1"><?= $strong_start.$value[1].$strong_end ?></a></div></td>
							</tr></table></td><tr>	
							<?php } ?>
                            
                            <tr>
								<td height="1" colspan="2" valign="top" nowrap>
									<div align="left"><img src="<?php    echo DIR_WS_IMAGES;?>greyline3.jpg" width="180" height="11"></div>
								</td>
							</tr>
							<tr>
								
								<td height="29" width="200" >
									<a class="dvdpost_left_menu_title" href="/catalog_adult.php"><div style="font-weight:bold; color:#EB2C8C; font-size:13px;padding-left:30px">18+ MoviX</div></A>
								</td>
			
							</tr>
														
				        	
						</table>
					</td>
				   
			</table>
		</td>
	</tr>
</table>
