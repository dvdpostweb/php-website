<?php 
// Changing language without los var parameter in the url.
function split_pages($x , $limit, $count , $manufacturers_id ) {
		if ($x==0){echo '&nbsp';
		}else { 
			$num=$x-$limit;
			echo '<a class="basiclink" href="'.$self.'?x='.$num.'&manufacturers_id='.$manufacturers_id.'">'. PREVNEXT_BUTTON_PREV .'</a>&nbsp&nbsp';} 	
			
		$actual_page=($x+$limit)/$limit;
		if ($count % $limit ==0){$page_numbers=$count/$limit;}
		else {$page_numbers=($count/$limit)+1;}
		for ($i=0; $i<= $page_numbers-1;$i++){
			$num=$i*$limit;
			$page=$i+1;
			if ($page==$actual_page){echo'<b>'.$page .'</b>&nbsp&nbsp';}
			else {echo '<a class="basiclink" href="'.$self.'?x='.$num.'&manufacturers_id='.$manufacturers_id.'">'. $page .'</a>&nbsp&nbsp';}
		}
		
		if ($count > $x+$limit){
			$num=$x+$limit;
			echo '<a class="basiclink" href="'.$self.'?x='.$num.'&manufacturers_id='.$manufacturers_id.'">'.PREVNEXT_BUTTON_NEXT.'</a>';
		}else{echo '&nbsp';}
}   
?> 