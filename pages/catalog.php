<div class="main-holder">
<?php
switch (ENTITY_ID){
    case 38 :
        $try_banner='tryNL.gif';
        break;
       
    default :
        $try_banner='try.gif';
        break;   
}

?>


<table width="731" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td  width="170" valign="top" id="left_menu" class="limitedathome">
            <?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_public.php')); ?>
        </td>
        <td width="560" class="how_explain" valign="top">
            <div id="catalog_explain">
                <?php
                //echo round($cpt_catalog, -2).'<br>';
                $explain = str_replace('xxxcountxxx' ,  $cpt_catalog ,TEXT_EXPLAIN);
                echo $explain  ;
                ?>
            </div>
            <div id="catalog_button">
                <?php  
				switch (ENTITY_ID){
					case 38 : 
						$try_banner='bouton_freetrial_catalogue_nl.gif';
						break;
						
					default :
						$try_banner='bouton_freetrial_catalogue.gif';
						break;	
				}
				
				echo '<a href="'.$link_freetrial.((!empty($_GET['activation_code']))?'?activation_code='.$_GET['activation_code']:'').'" align="right"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/'.$try_banner.'" border="0"></a>';?>
            </div>               
            <div id="catalog_listing_top"></div>
            <div id="catalog_listing_container">
                <div align="center">               
                <?php
                    $restrict= ' 0 ';
                     $cat=1;
					 $sql="SELECT * FROM categories c join categories_description cd on c.categories_id=cd.categories_id where categories_type='DVD_NORM' and language_id = ".intval($languages_id)." and product_type='movie' and show_home='YES'";//
					 $res=tep_db_cache($sql,259200,3);
					 foreach($res as $category)
					 {
                    	$cat=$category['categories_id'];
						$cat_name=$category['categories_name'];
						include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/catalog/category_box.php'));
                     } 
                ?>
                </div>
            </div>
            <div id="catalog_listing_bottom"></div>
            <br />
            <table align="center">
            <tr>
                <?php
                $rand=rand(0,1);
				switch($rand)
				{
					case 0:
                ?>
				<td style="padding-right:10px;"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/contest_box.php')); ?></td>
				<?php
					break;
					case 1:
				?>
                <td style="padding-right:10px;"><?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/quizz_box.php')); ?></td>
            	<?php
            	}
            	?>
				<?
				$rand_box=rand(0,1);
				?>
				<td style="padding-right:10px;"><?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/rand_box.php'));?></td>
				
				<td style="padding-right:10px;"><?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/shoping_box2.php'));?></td>	
           </tr>
            </table>
        </td>
    </tr>
</table>
<map name="Map">
    <area shape="rect" coords="3,7,173,41" href="<?php  echo $link_freetrial ;?>">
</map>

</div>