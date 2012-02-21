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
		<td colspan="2">
			<a href='<?php  echo $link_freetrial ;?>'><img src='/images/www3/languages/french/images/catalog_x/header_new.jpg'></a>
		</td>
	</tr>
    <tr>
        <td  width="170" valign="top" id="left_menu" class="limitedathome">
            <?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/column_left/main_home_left_public_adult.php')); ?>
        </td>
        <td width="560" class="how_explain" valign="top">
	
            <div id="catalog_listing_top"></div>
            <div id="catalog_listing_container">
				    <div class="catalog_adult_text">
				    <div class="catalog_adult_title"><?php  echo TITRE_CATALOGX ;?></div>


				                        <p><?php  echo str_replace('[count_x_location]',$count_x_location,str_replace('[count_vodx]',$count_droselia,TEXT_CATALOGX1 ));?></p>

				<p><?php  echo TITRE_CATALOGX2 ;?></p>
				<p align="center"><img src="/images/newsletters/movix10_08/logos.gif" width="693" height="98" border="0" align="top" /></p>
				<p><?php  echo TEXT_CATALOGX3 ;?></p>
				<p align="center"><img src="/images/newsletters/movix10_08/nana.jpg" width="675" height="173" border="0" align="top" /></p>
				</div>
				</div>
				<?php 
				if ($_COOKIE['adult_pwd_public']!=1) 
				{
				?>
				<div class="disclaimer_x2"><?php require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/login_adultpwd_public.php'));  ?></div>
                <?php
            	}
	            ?>
				
<div align="center">   
	            <?php
                    $restrict= ' 0 ';
                     $cat=1;
					 $sql="SELECT * FROM categories c join categories_description cd on c.categories_id=cd.categories_id where categories_type='DVD_ADULT' and language_id = ".$languages_id." and product_type='movie'";//
					 $res=tep_db_cache($sql,259200,3);
					 foreach($res as $category)
					 {
                    	$cat=$category['categories_id'];
						$cat_name=$category['categories_name'];
						include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/catalog_adult/category_box.php'));
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


</div>