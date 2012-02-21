<?php 
require('configure/application_top.php');
$current_page_name = 'member_get_member.php';
include(DIR_WS_INCLUDES . 'translation.php');
$sql="SELECT sum(number) as nb ,customers_id FROM additional_card a where customers_id = '".$customer_id."' and campaign='summer2010' group by customers_id";
$query = tep_db_query($sql);

$value = tep_db_fetch_array($query);
if(!empty($_POST['card']))
{
	$sql="insert into additional_card (customers_id , campaign, number, status, create_at, modify_at) values (".$customer_id.",'summer2010',".$_POST['card'].",'create',now(),now())";
	$query = tep_db_query($sql);
	tep_redirect(tep_href_link('member_get_member.php?card=1', '', 'NOSSL'));
	die();
}

echo "<div id='body'>";
if($value['nb']>=5)
{
	echo MESSAGE_SORRY;
	die();
}
?>
<p align="center">
	<?= TITLE_HOW ?>
</p>
<form method="post" action ="member_get_member_plus_process.php">
	<p>
	<table align='center'><tr>
<?php
$total=(5-$value['nb']);
for($i =1;$i<=$total;$i++)
{
	echo '<td align="center"><input type="radio" name="card" value="'.$i.'" /></td>';
}
?>
</tr><tr>
<?php
for($i =1;$i<=$total;$i++)
{
	echo '<td align="center">'.$i.'</td>';
}

?>
</tr></table></p>
<p align="center"><input type="image" src="/images/<?= $lang_short ?>/confirm-btn.gif"></p>
</form>
</div>
