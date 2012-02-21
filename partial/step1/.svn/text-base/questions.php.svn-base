<div class="navcontainer">
	<div id="dvdpost_guide"><?= GUIDE ?></div>
	<div id='left-menu'>
	<?php
	if(empty($select_question))
	{
		$select_question = 1;
	}
	for($i = 1 ; $i <= 9; $i++)
	{
		 	$class= (($i==$select_question)?'nav_select':'nav');
			$id= (($i==$select_question)?'select':'');
			$class_description= (($i==$select_question)?'class="text_select"':'');
		 	$display= (($i==$select_question)?'block': 'none');

			echo '<div class="question  '.$class.'" id ="question'.$i.'"><div class="arrow"></div><div class="text">'.ucfirst(strtolower((constant('QUESTION'.$i)))).'</div><div style="clear:both"></div></div>';
			$response = constant('RESPONSE'.$i);
			$response = str_replace('{{url}}',contact_public.php,$response);
			echo '<div '.$class_description.' id ="response_color'.$i.'"><div class="text_guide" id ="response'.$i.'" style="display:'.$display.'">'.$response.'</div></div>';
	}
	?>
	</div>
</div>