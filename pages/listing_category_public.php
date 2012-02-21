<style type="text/css">
<!--
.DVDp_catalog1 {
	font-family: Arial, Helvetica, sans-serif;
	Color: #333333;
	font-size: 14px;
	font-weight: bold;
}
.DVDp_catalog2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.DVDp_catalog3 {
	color: #CC0000;
	font-weight: bold;
}

a.DVDp_catalog_link {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
a:link.DVDp_catalog_link {
	text-decoration: none;
	color: #000000;
}
a:visited.DVDp_catalog_link {
	text-decoration: none;
	color: #000000;
}
a:hover.DVDp_catalog_link {
	text-decoration: none;
	color: #000000;
	text-decoration:underline
}
a:active.DVDp_catalog_link {
	text-decoration: none;
	color: #000000;
}

-->
</style>


<div class="main-holder">
<table width="731" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr> 
		<td  width="170" valign="top" id="left_menu" class="limitedathome" rowspan="3"> 
			<?php   
			if(SITE_TYPE=='DVD_ADULT')
				include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_public_adult.php')); 
			else
				include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_public.php')); 
			
			?>
		</td>
		
		<td width="560" class="how_explain" valign="top">
			
			<?php 			
			if(SITE_TYPE=='DVD_ADULT'){	
				if ($_COOKIE['adult_pwd_public']!=1) 
				{
				echo '<div class="disclaimer_x"><div style="margin-top:200px">';
				require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/login_adultpwd_public.php'));  
				echo '</div></div>';
				}
				echo '<div id="catalog_explain"><div class="catalog_adult_text2">
			    <div class="catalog_adult_title2">'.TITRE_CATALOGX.'</div>
                <p>'.str_replace('[count_x_location]',$count_x_location,str_replace('[count_vodx]',$count_droselia,TEXT_CATALOGX1 )).'</p>
                <p>'.TITRE_CATALOGX2.'</p>
				</div>';
			}
			else
			{
				
				$explain = str_replace('xxxcountxxx' ,  $cpt_catalog ,TEXT_EXPLAIN);
			    
				echo '<div id="catalog_explain">'.$explain.'</div>';
			}
			?>
			</div>
            
            <div id="catalog_button">
                <?php  
				switch (ENTITY_ID){
					case 38 : 
						$try_banner='bouton_freetrial_catalogue'.((SITE_TYPE=='DVD_ADULT')?'x':'').'_nl.gif';
						break;
						
					default :
						$try_banner='bouton_freetrial_catalogue'.((SITE_TYPE=='DVD_ADULT')?'x':'').'.gif';
						break;	
				}
				
				echo '<a href="'.$link_freetrial.((!empty($_GET['activation_code']))?'?activation_code='.$_GET['activation_code']:'').'" align="right"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/'.$try_banner.'" border="0"></a>';?>
            </div>  			
			<div id="catalog_listing_top"></div>
			<div id="catalog_listing_container">				
				<table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
        			<td width="100" height="30" valign="middle" align="left" class="category_name">
						<?php 
						if ($cPath){
							include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_public/category.php'));
							}
					
						else{include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_public/theme.php'));
						}
				    	?>
    				</td>
					<td height="30" valign="middle">
						<?php 
						// include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_public/menu_subdirectory.php'));
						?>
					</td>
				</tr>          
    			<tr>
        			<td colspan="2"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common_public/' . FILENAME_PRODUCT_LISTING));?></td>
    			</tr>
				</table>
			</div>
			<div id="catalog_listing_bottom"></div>
			<br />
			
			</TD>
		</TR>
	</table>

</div>