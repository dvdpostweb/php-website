

<div class="main-holder">

<?php 
$show_code_form=0;
$count_products_query = tep_db_query("SELECT count(products_id) as count FROM products ");
$count_products = tep_db_fetch_array($count_products_query);
$cpt=round($count_products['count'], -3); 	

$intro4 = TEXT_INTRO4;

switch(WEB_SITE_ID)
  {
  case 3:
  	//msn  
    $trial_credit="4";
    $trial_DAYS="30";
    $intro = str_replace('µµµcreditµµµ',$trial_credit, TEXT_INTRO ); 
	$intro = str_replace('µµµcountµµµ',$cpt, $intro );
    $title=TEXT_TILTLE;    
    break;
  case 4:
  	//msn
    $trial_credit="4";
    $trial_DAYS="30";
    $intro = str_replace('µµµcreditµµµ',$trial_credit, TEXT_INTRO ); 
	$intro = str_replace('µµµcountµµµ',$cpt, $intro );
    $title=TEXT_TILTLE;
    break;
    
    case 16:
    //cinenews
    $trial_credit="4";
    $trial_DAYS="30";
    $intro = str_replace('µµµcreditµµµ',$trial_credit, TEXT_INTRO_CINENEWS ); 
	$intro = str_replace('µµµcountµµµ',$cpt, $intro );
    $title=TEXT_TILTLE_CINENEWS;
    break;

    
  case 25:
  	//lesoir
  	 $trial_credit="10"; 
  	 $trial_DAYS="30"; 	 
     $title=TEXT_TILTLE_LESOIR;
     $intro = str_replace('µµµcreditµµµ',$trial_credit, TEXT_INTRO_LESOIR ); 
	 $intro = str_replace('µµµcountµµµ',$cpt, $intro );
     $intro4 = TEXT_INTRO4_LESOIR;
 	 $promo=TEXT_PROMO_CODE_LESOIR;
     $show_code_form=1;
    break;
    
    
  case 26:
  	 //BELGIQUE LOISIRS
     //Belgique Loisirs ne doit pas pointer sur le freetrial
	 //proposition d'inserer un discount_code
  	 $trial_credit="4"; 
  	 $trial_DAYS="30"; 	 
     $title=TEXT_TILTLE_BL;
     $intro = str_replace('µµµcreditµµµ',$trial_credit, TEXT_INTRO_BL ); 
	 $intro = str_replace('µµµcountµµµ',$cpt, $intro );
     $intro4 = TEXT_INTRO4_BL;
 	 $promo=TEXT_PROMO_CODE;		 
     $show_code_form=1;
    break;
      
  case 32:
     $trial_credit="4";
     $trial_DAYS="30";
     $intro = str_replace('µµµcreditµµµ',$trial_credit, TEXT_INTRO ); 
	 $intro = str_replace('µµµcountµµµ',$cpt, $intro );
     $title=TEXT_TILTLE;
    break;
      
  case 33:
    $trial_credit="4";
    $trial_DAYS="30";
    $intro = str_replace('µµµcreditµµµ',$trial_credit, TEXT_INTRO ); 
	$intro = str_replace('µµµcountµµµ',$cpt, $intro );
    $title=TEXT_TILTLE;
    break; 
    
  case 34:
    $trial_credit="4";
    $trial_DAYS="30";
    $intro = str_replace('µµµcreditµµµ',$trial_credit, TEXT_INTRO_CINOPSIS ); 
	$intro = str_replace('µµµcountµµµ',$cpt, $intro );
    $title=TEXT_TILTLE_CINOPSIS;
    break;      
 
  default:
  	 $trial_credit="2";
	 $trial_DAYS="10";
  	 if (strlen($_COOKIE['activation_code']) >1){
		$credit_query = tep_db_query("select abo_dvd_credit, discount_abo_validityto_type, discount_abo_validityto_value from discount_code where discount_code='".$_COOKIE['activation_code']."'");
		if ($credit_values = tep_db_fetch_array($credit_query)){
			$trial_credit=$credit_values['abo_dvd_credit'];
	 		$trial_DAYS="30";			
		}
    }

	 $intro = str_replace('µµµcreditµµµ',$trial_credit, TEXT_INTRO ); 
	 $intro = str_replace('µµµcountµµµ',$cpt, $intro );
	 $intro = str_replace('µµµdaysµµµ',$trial_DAYS, $intro );
	 
	 $title=TEXT_TILTLE;
	break;
}
$intro2=TEXT_INTRO2;
if(!empty($_GET['activation_code'])){
 	$intro = str_replace('step1.php','step1.php?activation_code='.$_GET['activation_code'], $intro );
 	$intro2 = str_replace('step1.php','step1.php?activation_code='.$_GET['activation_code'], $intro2 );

}

?>
<div id="trial_info_page-content">

<h1><?php echo TITLE_FREE_TRIAL ;?></h1>


<div id="free_trial_<?= $language ;?>">
    <div id="trial_button_promo">
    <?php 
                if  ($show_code_form==0){
                    echo '<p align="right"><a href="'.$link_freetrial.((!empty($_GET['activation_code']))?'?activation_code='.$_GET['activation_code']:'').'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/bouton_freetrial.gif" border="0" align="right" /></a></p>';
                }else{
                    echo '<form name="form1" method="post" action="activation_code_confirm.php">';
                    echo '<p>'.$promo.'<br />';
                    echo '<input name="code" id="code" type="text" class="inputs" size="20" size="18"><input name="imageField" type="image" src="'.DIR_WS_IMAGES.'canvas/go.gif" align="absbottom" border="0"></p>';
                    echo'</p>';
                    echo '</form>';	
                }			
            ?>
    </div>
</div>
	<div id="trial_info_contenu_gauche">
	
		<p>
			<?php  				
				echo $intro;
			?>
		</p>
		
		<p><?php  echo $intro2;?></p>
        
		
	
	</div>

	<div id="trial_info_contenu_droit">
	
		<p><?php  
			$intro4 = str_replace('µµµDAYSµµµ',$trial_DAYS, $intro4 );
			echo $intro4;?></p>
		<p><?php  echo TEXT_INTRO5;?></p>
		<p align="center">&nbsp;
		</p>
		
	</div>
    
    <div style="clear:both">
    <p align="center"><a href="mailto:info@dvdpost.be"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language ;?>/images/freetrial/telephone.gif"></a></p>
        
    </div>


</div>

</div>