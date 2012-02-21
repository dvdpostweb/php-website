<?php 
	$cart = $_SESSION['cart'];
	$cart_box = $_SESSION['cart_box'];
	if($_GET['debug']==1)
	{
		echo 'cart<br>';
		var_dump($cart);
		echo 'cartbox<br>';
		var_dump($cart_box);
	}
	if (!$cart) {
		$quantity=0;
		$total_count=count($items);
		$price=0;
		
		if (!$cart_box) {
		$quantity_box=0;
		$total_count_box=count($items);
		$price_box=0;	
		
		$quantity +=$quantity_box;
		$total_count +=$total_count_box;
		$price +=$price_box;		
		}	
	}
	
	else {	
		
		
		// Parse the cart session variable
		$items = explode(',',$cart);
		$quantity=count($items);
		$total_count=count($items);
		
		if ($cart_box) {
			$items_box = explode(',',$cart_box);
			$quantity += count($items_box);
			$total_count += count($items_box);
			$contents_box = array();
			foreach ($items_box as $item) {
					$contents_box[$item] = (isset($contents_box[$item])) ? $contents_box[$item] + 1 : 1;
				}		
				foreach ($contents_box as $id=>$qty) {
					$sc_query = tep_db_query("select sb.sale_price from shopping_box sb where sb.shopping_box_id='".$id." ' ");
					$sc = tep_db_fetch_array($sc_query);
					$dectotprice += $sc['sale_price']*$qty;
				}
		}
		
		$contents = array();
		
		$dectotprice=0;
		
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}	
		foreach ($contents as $id=>$qty) {
			$sc_query = tep_db_query("select p.products_sale_price, pd.products_name from products p left join products_description pd on pd.products_id = p.products_id and pd.language_id='" . $languages_id . "' where p.products_type = 'DVD_NORM' and p.products_id ='".$id."'");
			$sc = tep_db_fetch_array($sc_query);
			$dectotprice += $sc['products_sale_price']*$qty;
		}		
		$price= $dectotprice;
	}
?>