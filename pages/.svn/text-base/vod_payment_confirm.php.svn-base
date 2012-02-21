


<style>

	#top_menu_vodx {
	
		padding-top:8px;
		padding-bottom:25px;
		}
	
</style> 

<div id="top_menu_vodx"></div>
<center>
<div class="vodx-round">
    <div class="top"><span></span></div>
    <div class="center-content">
		<?php
		echo '<div>'.TEXT_CONFIRMATION.'</div><br>' ;
		$droselia_code_checker = tep_db_query("SELECT count(*) as cpt FROM droselia_codes where customers_id ='".$customer_id."' AND used_date IS NULL ") ;
		$droselia_code_checker_values = tep_db_fetch_array($droselia_code_checker);
		
		$droselia_credit = str_replace('xxxcountxxx' ,  $droselia_code_checker_values['cpt'] ,TEXT_VOD_CREDIT);
		echo '<div>'.$droselia_credit.'</div><br>';		
		echo '<div>'.TEXT_VOD_CREDIT_EXPLAIN.'</div><br>';	
		echo '<a href="vodx.php"><img src="'.DIR_WS_IMAGES_LANGUAGES.$language.'/images/vodx/continue.gif" border="0"></a>';
		?>  
    </div>
    <div class="bottom"><span></span></div>
</div>

</center>


