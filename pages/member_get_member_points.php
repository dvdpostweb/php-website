<? 
$mgm_points_query = tep_db_query("SELECT mgm_points FROM customers WHERE customers_id = '" . $customer_id . "' ");
$mgm_points_query_value = tep_db_fetch_array($mgm_points_query);

function add_gift($my_point,$id,$language,$lang_short)
{
	$gift_query =	tep_db_query("SELECT * FROM `mem_get_mem_gift` WHERE mem_get_mem_gift_id = $id order by mem_get_mem_gift_id"); 
	$gift_value = tep_db_fetch_array($gift_query);
	
	if($my_point>=$gift_value['points']){
?>		
		<form method="post" action="member_get_member_points_process.php">
			<input type="hidden" name="mgmgift" value="<?= $id ?>">
			<input type='image' src='/images/<?= $lang_short ?>/echanger-btn.png' class="parrainner">
		</form>
<?php 
	}else{ 
?>
	<a href="member_get_member.php" class="btn parrainner parrainner_<?= $lang_short ?>">Parrainner plus d’amis</a>
<?php 
	} 
}
?>
<div id="tool-wrap">
	<h2><?= SHARE ?></h2>
	<div id="points-wrap">
		<div id="points">
			<h3><?= YOUR_POINT ?> <span><strong><?= $mgm_points_query_value['mgm_points'] ?></strong> <?= strtoupper(TEXT_POINTS) ?></span></h3>
			<a href="#" class="btn <?= "btn_".$lang_short ?>"><?= CHANGE ?></a>
		</div>
		<div class="content">
			<p><strong><?= SLOGAN1 ?></strong></p>
			<p><?= SLOGAN2 ?></p>
			<p><?= SLOGAN3 ?></p>
			<p class="note"><?= SLOGAN4 ?></p>
		</div>
		<div id="special-offer">
			<h3><?= SUMMER_OFFER ?></h3>
			<p><?= SLOGAN_SUMMER?><a href="member_get_member_plus_process.php" class="btn <?= "btn_".$lang_short ?>"><?= COMMAND ?></a></p>
		</div>
		<div class="clear"></div>		
	</div>
	<!--Tabs -->
	<ul id="tabs">
		<li><a href="member_get_member.php"><?= strtoupper(TEXT_BACK) ?></a></li>
		<li><a href="#" class="current"><?= TEXT_GIFT ?></a></li>
		<li><a href="member_get_member_faq.php">FAQ</a></li>
	</ul>
		<!--Tabs content -->
		<div id="tab1" class="tab-content">
			<ul id="gifts">
				<li>
					<span class="pic-wrap"><img src="images/<?= $lang_short?>/200pts.jpg" alt="2 tickets cinéma" /></span>
					<h3><?= TEXT_TICKET ?></h3>
						<?= add_gift($mgm_points_query_value['mgm_points'],35,$languages_id, $lang_short) ?>
					
				</li>
				<li>
					<span class="pic-wrap"><img src="images/<?= $lang_short?>/600pts.jpg" alt="1 ipod Shuffle" /></span>
					<h3><?= TEXT_SHUFFLE ?></h3>
					<?= add_gift($mgm_points_query_value['mgm_points'],36,$languages_id, $lang_short) ?>
				</li>
				<li>
					<span class="pic-wrap"><img src="images/<?= $lang_short?>/1000pts.jpg" alt="1 lecteur DVD PHILIPS portable" /></span>
					<h3><?= TEXT_PHILIPPS ?></h3>
					<?= add_gift($mgm_points_query_value['mgm_points'],54,$languages_id, $lang_short) ?>
				</li>
				<li>
					<span class="pic-wrap"><img src="images/<?= $lang_short?>/1600pts.jpg" alt="1 lecteur Blu-ray LG" /></span>
					<h3><?= TEXT_BLURAY ?></h3>
					<?= add_gift($mgm_points_query_value['mgm_points'],38,$languages_id, $lang_short) ?>
				</li>
				<li>
					<span class="pic-wrap"><img src="images/<?= $lang_short?>/2000pts.jpg" alt="1 ipod Nano" /></span>
					<h3><?= TEXT_NANO ?></h3>
					<?= add_gift($mgm_points_query_value['mgm_points'],37,$languages_id, $lang_short) ?>
				</li>
				<li>
					<span class="pic-wrap"><img src="images/<?= $lang_short?>/3000pts.jpg" alt="1 console Nintendo Wii" /></span>
					<h3><?= TEXT_WII ?></h3>
					<?= add_gift($mgm_points_query_value['mgm_points'],55,$languages_id, $lang_short) ?>
				</li>
			</ul>
			<div class="clear"></div>
		</div>
</div>