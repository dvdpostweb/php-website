<?php 
//Fonction pour determiner si un products est ADULT ou NORM ou AUTRE


Function isAdult($products_id){
	$productsTypeQry = tep_db_query( "select products_type from products where products_id = " . $products_id );
	$productsTypeValue = tep_db_fetch_array($productsTypeQry);
	If ($productsTypeValue['products_type'] == "DVD_ADULT"){
		return true;
	}
	else{
		return false;
	} 
}
?>