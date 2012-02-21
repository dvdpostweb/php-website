<? 
$mgm_points_query = tep_db_query("SELECT mgm_points FROM customers WHERE customers_id = '" . $customer_id . "' ");
$mgm_points_query_value = tep_db_fetch_array($mgm_points_query);

function add_gift($my_point,$id,$language)
{
	$gift_query =	tep_db_query("SELECT * FROM `mem_get_mem_gift` WHERE mem_get_mem_gift_id = $id order by mem_get_mem_gift_id"); 
	$gift_value = tep_db_fetch_array($gift_query);
	
	if($my_point>=$gift_value['points']){
?>		
		<form method="post" action="member_get_member_points_process.php">
			<input type="hidden" name="mgmgift" value="<?= $id ?>">
			<input type='image' src='/images/echanger-btn.png'>
		</form>
<?php 
	}else{ 
?>
	<a href="member_get_member.php" class="btn parrainner">Parrainner plus d’amis</a>
<?php 
	} 
}
?>
<div id="tool-wrap">
	<h2><?= SHARE ?></h2>
	<div id="points-wrap">
		<div id="points">
			<h3><?= YOUR_POINT ?> <span><strong><?= $mgm_points_query_value['mgm_points'] ?></strong> <?= strtoupper(TEXT_POINTS) ?></span></h3>
			<a href="member_get_member_gift.php" class="btn <?= "btn_".$lang_short ?>"><?= CHANGE ?></a>
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
		<li><a href="member_get_member_gift.php"><?= TEXT_GIFT ?></a></li>
		<li><a href="#" class="current">FAQ</a></li>
	</ul>
		<!--Tabs content -->
		<div id="tab1" class="tab-content">
			
			<div id='contact-wrap'>
				<div id='faq'>
				<ul id='faq-nav'>
					<li>
						<ul>
							<li>
								<a href='#' id='q1' class="q"><?= Q1 ?></a>
							</li>
							<li>
								<a href='#' id='q2' class="q"><?= Q2 ?></a>
							</li>
							<li>
								<a href='#' id='q3' class="q"><?= Q3 ?></a>
							</li>
							<li>
								<a href='#' id='q4' class="q"><?= Q4 ?></a>
							</li>
							<li>
								<a href='#' id='q5' class="q"><?= Q5 ?></a>
							</li>
							<li>
								<a href='#' id='q6' class="q"><?= Q6 ?></a>
							</li>
							<li>
								<a href='#' id='q7' class="q"><?= Q7 ?>?</a>
							</li>
							<li>
								<a href='#' id='q8' class="q"><?= Q8 ?></a>
							</li>
						</ul>
					</li>
				</ul>
				<div style="" id="r1" class="faq-answer">
				  <h3><?= Q1 ?></h3>
				  <div class="box">
				   	<p> 
							<?= R1 ?>
				    </p>
					</div>
				</div>
				<div style="display:none" id="r2" class="faq-answer">
				  <h3><?= Q2 ?></h3>
				  <div class="box">
				   	<p> 
							<?= R2 ?>
				    </p>
					</div>
				</div>
				<div style="display:none" id="r3" class="faq-answer">
				  <h3><?= Q3 ?></h3>
				  <div class="box">
				   	<p> 
							<?= R3 ?>
				    </p>
					</div>
				</div>
				<div style="display:none" id="r4" class="faq-answer">
				  <h3><?= Q4 ?></h3>
				  <div class="box">
				   	<p> 
							<?= R4 ?>
				    </p>
					</div>
				</div>
				<div style="display:none" id="r5" class="faq-answer">
				  <h3><?= Q5 ?></h3>
				  <div class="box">
				   	<p> 
							<?= R5 ?>
				    </p>
					</div>
				</div>
				<div style="display:none" id="r6" class="faq-answer">
				  <h3><?= Q6 ?></h3>
				  <div class="box">
				   	<p> 
							<?= R6 ?>
				    </p>
					</div>
				</div>
				<div style="display:none" id="r7" class="faq-answer">
				  <h3><?= Q7 ?></h3>
				  <div class="box">
				   	<p> 
							<?= R7 ?>
				    </p>
					</div>
				</div>
				<div style="display:none" id="r8" class="faq-answer">
				  <h3><?= Q8 ?></h3>
				  <div class="box">
				   	<p> 
							<?= R8 ?>
				    </p>
					</div>
				</div>
				
					
			</div>
			
			<div class="clear"></div>
		</div>
</div>