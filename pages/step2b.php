<!-- debut du CONTAINER -->

<?php 
		echo '<link rel="stylesheet" type="text/css" href="'.getBestMatchToIncludeAny('stylesheet/prices_belgique.css','.css').'">';
		if(empty($_GET['dvd'])){
			$nb_dvd=8;
			$produt_id=20;
		}	
		else{
			$nb_dvd=$_GET['dvd'];
			switch($nb_dvd)
			{
				case 2:
					$produt_id=17;	
				break;
				case 4:
					$produt_id=18;
				break;
				case 8:
					$produt_id=20;
				break;
				case 12:
					$produt_id=22;
				break;
				case 16:
					$produt_id=24;
				break;
				default:
					$produt_id=20;

			}
		}

	$code = tep_db_query("SELECT activation_discount_code_id, activation_discount_code_type  from customers WHERE customers_id ='".$customers_id."'");
	$code_values = tep_db_fetch_array($code);
	if ($code_values['activation_discount_code_id']=='298'){
	 $show_discount_form=1;
  	}

  	if ($code_values['activation_discount_code_type']=='D'){
  		$code_explain = tep_db_query("SELECT  banner,footer,  discount_validityto from discount_code WHERE discount_code_id ='".$code_values['activation_discount_code_id']."'");
  		$code_explain_values = tep_db_fetch_array($code_explain);
	  	$disc_explain='';
	  	switch ($code_explain_values['footer']){
		 	case 'FREETRIAL':
		 	$promo_footer=TEXT_FOOTER_EXPLAIN;
		 	break;	
		  	
		 	case 'PERCENT':		 	
		 	$promo_footer=str_replace("µµµdateµµµ",$code_explain_values['discount_validityto'],TEXT_FOOTER_PERCENT);
		 	break;
		  	
		 	case 'VALID_TILL':
		 	$promo_footer=str_replace("µµµdateµµµ",$code_explain_values['discount_validityto'],TEXT_FOOTER_TILL);
		 	break;		  	
		 }
  	}else{
	$activation_explain = tep_db_query("SELECT  ac.banner from activation_code ac WHERE  ac.activation_id ='".$code_values['activation_discount_code_id']."'");
  	if ($activation_explain_values = tep_db_fetch_array($activation_explain)){
	$disc_explain='';
		 	$promo_footer=TEXT_FOOTER_ACTIVATION;
  
		}	  
  	}
?>
<div class="main-holder">
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<td>
<div id="step_container">
	<!-- debut PROMO -->
		
	<!-- debut SUBSCRIPTION -->
	<div id="step_subscription_container">
		<h1><?php echo CHOOSE_FORMULA;?></h1>
		<div id="step2_promo_container">
			<div>
				<div id='step2_text'>
				<?php 
	          	if ($show_discount_form==1 ||$activation_code=='FREETEST2' ){      
	         		echo '<span class="step_hello">'.TEXT_FREE_TRIAL_TITLE.'</span><br /><br />';
					echo '<span class="step_intro">'.TEXT_2_FIRST .'<br />';
					echo TEXT_STOP_BEFORE_RECONDUCTION.'</span>';       	
	          	?>
				</div>
				
				<div id="step2_pastille" align="right">
						<img src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/canvas/pastille_freetrial_step.gif">
				</div>				
				
			<?php 
			}else{	
				echo $disc_explain;			
			} 
	        ?> 
			</div>
	  </div>
      
      <br />
	  <!-- fin PROMO -->		
	  
	  		
	  			<form name="step2" method="post" action="step2b.php">
          		<input  TYPE="hidden" VALUE="3" NAME="step">
          		<input  TYPE="hidden" VALUE="<?php echo $code_values['activation_discount_code_id'];?>" NAME="discount_code_id">   
								<?php 
								    // pansement -- PROMO STUDENT ---
									/*if ($_COOKIE['activation_code']=='PROMOSTUDENT'){
										$abo_passive ='SELECT pa.products_id, p.products_price, pa.qty_credit, pa.qty_at_home, pa.most_popular_group FROM products p ';
										$abo_passive .="LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_type = 'ABO' AND pa.allowed_public_group LIKE '2' order by pa.qty_credit ASC" ;
										$abo_passive_query = tep_db_query($abo_passive);		
										$colspan=0;
										while ($abo_passive_values = tep_db_fetch_array($abo_passive_query)){
											echo '<td align="center">';
											include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_abo_public.php'));
											echo '</td>';											  
										}		
									}else{
										$abo_passive ='SELECT pa.products_id, p.products_price, pa.qty_credit, pa.qty_at_home, pa.most_popular_group FROM products p ';
										$abo_passive .="LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_type = 'ABO' AND pa.allowed_public_group LIKE '%".GROUP_ID."%' order by pa.qty_credit ASC" ;
										echo 'abo'.$abo_passive;
										$abo_passive_query = tep_db_query($abo_passive);		
										$colspan=0;
										while ($abo_passive_values = tep_db_fetch_array($abo_passive_query)){
											echo '<td align="center">';
											include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_abo_public.php'));
											echo '</td>';											  
										}									
									}
								
									*/	
									$dvd=array(2,4,8,12,16);
									switch($language){
										case 'french':
											$lang='fr';
										break;
										case 'english':
											$lang='en';
										break;
										case 'dutch':
											$lang='nl';
										break;

									}
									echo "<div id='step2' align='center'><ul>";
									for($i=0;$i<count($dvd);++$i)
									{

									echo "<li id='dvd".$dvd[$i]."_".$lang.(($nb_dvd==$dvd[$i])?'_hover':'')."' ".(($nb_dvd==$dvd[$i])?'class="hover"':'')." ><a href='step2b.php?dvd=".$dvd[$i]."'><img src='/images/blank.gif' height='101' width='891' border='0' /></a></li>";

									}
									echo "</ul></div>";
									echo "<input type='hidden' name='products_id' value='".$produt_id."' />";
								  ?>
																
						<p align="center"><?php    echo TEXT_FRAIS_PORT ;?></p>
                         <table align="center" width="891">
                        
                         <tr>
                         	<td><a href="mailto:info@info@dvdpost.be"><img src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/telephone<?php echo ((WEBSITE==101)?'_nl':'')?>.gif" border="0" /></a></td>
                            <td valign="bottom" class="step_title_button" align="right"><input name="submit" type="image" align="center" src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/buttons/canvas/button_step_confirm.gif" border="0" value="submit"></td>
                            <td><img width="10" height="3" src="/images/blank.gif"/>
                                <img width="2" height="18" align="top" src="images/dvdpost_public/bg-top-nav-sep.gif"/>
                                <img width="10" height="3" src="/images/blank.gif"/>
                                <a class="sub_black_link" href="logoff.php"><?php  echo TEXT_CANCEL ;?></a>
								
				</form>
                
		  </td>
          </tr>
          </table>
	

		
	<!-- fin SUBSCRIPTION -->
	
</div>
<!-- fin du CONTAINER -->

</td>
</tr>
</table>
</div>
