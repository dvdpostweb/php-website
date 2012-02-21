<div id="step_descrition">
	<table>
		<tr>
			<td width="230"><h3><?= TITLE_STEP ?></h3></td>
			<td align="right">
				<table border="0" cellpadding="0" cellspacing="0">
					<tr><td colspan="7" align="center"><div class="step <?= $step ?>"></div></td></tr>
					<tr>
						<td width="39"></td>
						<td width="67" align="center" class="<?= (($step=='step1')?'action_step':'futur_step') ?>"><span class="big_title"><?= STEP1 ?></td>
						<td width="99"></td>
						<td width="170" align="center" class="<?= (($step=='step2')?'action_step':'futur_step') ?>"><span class="big_title"><?= STEP2 ?></td>
						<td width="34"></td>
						<td width="150" align="center"  class="<?= (($step=='step3')?'action_step':'futur_step') ?>"><span class="big_title"><?= STEP3 ?></td>
						<td width="34"></td>
					</tr>
				</table>                
			</td>
		</tr>
	</table>
</div>