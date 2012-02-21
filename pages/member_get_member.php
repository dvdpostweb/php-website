<? 
$mgm_points_query = tep_db_query("SELECT mgm_points FROM customers WHERE customers_id = '" . $customer_id . "' ");
$mgm_points_query_value = tep_db_fetch_array($mgm_points_query);


$mgm_query = tep_db_query("select count(*) as ced from mem_get_mem where customers_id = '" . $customer_id . "' ");
$mgm = tep_db_fetch_array($mgm_query);
$cpt_sponsor=$mgm['ced'];

?>


<div id="tool-wrap">
<?php
	if($_GET['card']==1)
	{
		echo '<h3 align="center"><div style="color:red">'.MESSAGE_OK.'</div></h3>';
	}
	?>
	
	<h2><?= SHARE ?></h2>
	<div id="points-wrap">
		<div id="points">
			<h3><?= YOUR_POINT ?> <span><strong><?= $mgm_points_query_value['mgm_points'] ?></strong> <?= strtoupper(TEXT_POINTS) ?></span></h3>
			<a href="member_get_member_gift.php" class="btn btn_<?= $lang_short?>"><?= CHANGE ?></a>
		</div>
		<div class="content">
			<p><strong><?= SLOGAN1 ?></strong></p>
			<p><?= SLOGAN2 ?></p>
			<p><?= SLOGAN3 ?></p>
			<p class="note"><?= SLOGAN4 ?></p>
		</div>
		<div id="special-offer">
			<h3><?= SUMMER_OFFER ?></h3>
			<p><?= SLOGAN_SUMMER?><a href="/member_get_member_plus_process.php" class="btn <?= "btn_".$lang_short ?>"><?= COMMAND ?></a></p>
		</div>
		<div class="clear"></div>		
	</div>
	<!--Tabs -->
		<ul id="tabs">
			<li><a href="#" class="current"><?= strtoupper(TEXT_BACK) ?></a></li>
			<li><a href="member_get_member_gift.php"><?= TEXT_GIFT ?></a></li>
			<li><a href="member_get_member_faq.php">FAQ</a></li>
		</ul>
		<!--Tabs content -->
		<div id="tab1" class="tab-content">
			<div class="content">
				<h2><?= REASON ?></h2>
				<h3>1. <?= SIMPLE ?></h3>
				<p><?= SIMPLE2 ?> &laquo;<?= SEND ?>&raquo;. </p>
				<p><?= FREE ?></p>
				<p><?= PLUS ?></p>
				<h3>2. <?= WIN ?><a href="member_get_member_points.php"><?= GIFT ?></a> !</h3>
				<p><?= SLOGAN_FINAL ?></p>				
			</div>
			<div id="invitation">
				<a href="/invitation.php?v=2" id="modal_invatation"><?= INVITATION ?></a>
				<a href="/invitation.php?v=2" id="modal_invatation2"><img src="images/invitation-thumb.jpg" alt="Voir l'invitation" /></a>
			</div>
			<div class="clear"></div>
			<h2 id ='form_tool'><?= TEXT_BACK ?></h2>
			<? if ($_GET['mailsent']==1){ ?>
			<p id="mail_send"><?= str_replace('[count]',  $cpt_sponsor , TEXT_MAIL_SENT); ?></p>
			<? } ?>
			<? if ($_GET['mailsent']==2){ ?>
			<p id="mail_not_send"><?= TEXT_MAIL_NOTSENT ?></p>
			<? } ?>
			
			<form method="post" id="inv-form" action="member_get_member_process.php">
			<a href="#" class="add_email" class="toggle"><img src="images/toggle+btn.gif" alt=""></a>	
				
				<input name="name1" type="text" value="<?= TEXT_NAME?>" id ="name" />
				<input name="surname1" type="text" value="<?= TEXT_SURNAME?>" id ="surname" />
				<input name="email1" type="text" value="<?= TEXT_EMAIL ?>" id ="email" />
				<input name="send" type="image" src="images/<?= $lang_short; ?>/envoyer-invitation-btn.png" alt="Envoyer l&rsquo;invitation" class="i-btn" />				
			</form>
			<div class="history">
				<h3> <?= HISTORIQUE ?></h3>
				<table border="0" cellspacing="0" cellpadding="4">
				<colgroup>
					<col class="col1" />
					<col class="col2" />
					<col class="col3" />
					<col class="col4" />
					<col class="col5" />
				</colgroup>
				  <tr>
					<th><?= TEXT_NAME?></th>
					<th><?= TEXT_SURNAME?></th>
					<th class="brdr"><?= DATE_INVITATION ?></th>
					<th class="brdr"><?= STATUS ?></th>
					<th class="brdr"><?= TEXT_POINTS ?></th>
				  </tr>
				  <?
			  		parrainage($customer_id,'payed');
				  	parrainage($customer_id,'free');
				  	parrainage($customer_id,'stop');
				  ?>
				</table>
			</div>
			<div class="history">
				<h3> <?= HISTORIQUE_GIFT ?></h3>
				<table border="0" cellspacing="0" cellpadding="4">
				<colgroup>
					<col class="col6" />
					<col class="col3" />
					<col class="col4" />
					<col class="col5" />
				</colgroup>
				  <tr>
					<th><?= GIFT_TYPE ?></th>
					<th class="brdr"><?= DATE_ECHANGE?></th>
					<th class="brdr"><?= STATUS ?></th>
					<th class="brdr"><?= TEXT_POINTS ?></th>
				  </tr>
				  <? 
						gift($customer_id,'payed',$lang_short,$languages_id);
						gift($customer_id,'free',$lang_short,$languages_id);
					?>
				</table>
			</div>
		</div>
</div>