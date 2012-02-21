<?php 

require('configure/application_top.php');

if (!tep_session_is_registered('customer_id')) {
	$cart = $_SESSION['cart'];
	$cart_box = $_SESSION['cart_box'];
	//shopping_bag products_id	
	if ($cart) {
		$newcart = '';
		$items = explode(',',$cart);
	
		foreach ($items as $item) {		
		//delete shopping items
			if (!$HTTP_POST_VARS['del' . $item]) {

				if ($newcart != '') {
						$newcart .= ','.$item;
						
					} else {
						$newcart = $item;
					}			
			}
			
			$cart =$newcart;
			$_SESSION['cart'] = $cart;	
		}
		
		
		$newcart2 = '';
		$items2 = explode(',',$cart);
		$contents = array();
	
		foreach ($items2 as $item) {	
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}	
		foreach ($contents as $products_id=>$qantity) {
		//update shopping items	
				for ($i=1;$i<=$HTTP_POST_VARS['quantity' . $products_id];$i++) {
							if ($newcart2 != '') {
								$newcart2 .= ','.$products_id;
							} else {
								$newcart2 = $products_id;
							}
				}	
		}
		$cart = $newcart2;
		$_SESSION['cart'] = $cart;
		}	
		
	//shopping_bag box_id	
	if ($cart_box) {
		$newcart_box = '';
		$items_box = explode(',',$cart_box);
	
		foreach ($items_box as $item) {		
		//delete shopping items
			if (!$HTTP_POST_VARS['del' . $item]) {

				if ($newcart_box != '') {
						$newcart_box .= ','.$item;
						
					} else {
						$newcart_box = $item;
					}			
			}
			
			$cart_box =$newcart_box;
			$_SESSION['cart_box'] = $cart_box;	
		}
		
		
		$newcart2_box = '';
		$items2_box = explode(',',$cart_box);
		$contents_box = array();
	
		foreach ($items2_box as $item) {	
			$contents_box[$item] = (isset($contents_box[$item])) ? $contents_box[$item] + 1 : 1;
		}	
		foreach ($contents_box as $box_id=>$qantity) {
		//update shopping items	
				for ($i=1;$i<=$HTTP_POST_VARS['quantity' . $box_id];$i++) {
							if ($newcart2_box != '') {
								$newcart2_box .= ','.$box_id;
							} else {
								$newcart2_box = $box_id;
							}
				}	
		}
		$cart_box = $newcart2_box;
		$_SESSION['cart_box'] = $cart_box;
		}
		
		
}else{
	

$sc_query = tep_db_query('select * from shopping_cart where customers_id = \'' . $customer_id . '\' order by shopping_cart_id ');

	while ($sc = tep_db_fetch_array($sc_query)) {
		if ($HTTP_POST_VARS['del' . $sc['shopping_cart_id']] || $HTTP_POST_VARS['quantity' . $sc['shopping_cart_id']]==0  ) {
			tep_db_query('delete from shopping_cart where shopping_cart_id =  \'' . $sc['shopping_cart_id']  . '\'');
		}
		
		if($sc['products_id']>0){
			$quantity_query = tep_db_query("select * from products where products_id = '" . $sc['products_id'] . "' ");
			$quantity = tep_db_fetch_array($quantity_query);
		    tep_db_query('update shopping_cart set quantity = \'' . min($HTTP_POST_VARS['quantity' . $sc['shopping_cart_id']],$quantity['quantity_to_sale']) . '\' where shopping_cart_id =  \'' . $sc['shopping_cart_id']  . '\'');		
		}
		if($sc['shopping_box_id']>0){
			$quantity_query = tep_db_query("select * from shopping_box where shopping_box_id = '" . $sc['shopping_box_id'] . "' ");
			$quantity = tep_db_fetch_array($quantity_query);
		    tep_db_query('update shopping_cart set quantity = \'' . min($HTTP_POST_VARS['quantity' . $sc['shopping_cart_id']],$quantity['quantity_to_sale']) . '\' where shopping_cart_id =  \'' . $sc['shopping_cart_id']  . '\'');		
		}
	
		
		//tep_db_query('update shopping_cart set quantity = \'' . $HTTP_POST_VARS['quantity' . $sc['shopping_cart_id']] . '\' where shopping_cart_id =  \'' . $sc['shopping_cart_id']  . '\'');
	}
}

tep_redirect(tep_href_link('shopping_cart.php', '', 'SSL'));

?>