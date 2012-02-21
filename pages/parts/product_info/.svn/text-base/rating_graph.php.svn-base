
<?php
include("./charts/includes/FusionCharts.php");
$imdb_query = tep_db_query("SELECT imdb_id FROM products WHERE products_id = '".$product_info_values['products_id']."' ");
$imdb_query_values = tep_db_fetch_array($imdb_query);
if ($imdb_query_values['imdb_id'] == 0){
	$rating_query = tep_db_query("SELECT count(*) as cpt , products_rating   FROM products_rating WHERE products_id = ".$product_info_values['products_id']." and products_rating in (1,2,3,4,5) group by products_rating order by products_rating desc");
	$reviews_count = tep_db_query("select count(*) as cpt, reviews_rating from " . TABLE_REVIEWS . " where products_id = '" . $product_info_values['products_id'] . "' and reviews_check=1 and reviews_rating in (1,2,3,4,5) group by reviews_rating order by reviews_rating desc ");	
}else{
	$rating_query = tep_db_query("SELECT count(*) as cpt , products_rating   FROM products_rating WHERE (products_id = ".$product_info_values['products_id']." or imdb_id = ".$imdb_query_values['imdb_id'].") and products_rating in (1,2,3,4,5) group by products_rating order by products_rating desc ");	
	$reviews_count = tep_db_query("select count(*) as cpt, reviews_rating from " . TABLE_REVIEWS . " r 
	join products p on r.products_id= p.products_id where p.imdb_id =" . $product_info_values['imdb_id'] . " and reviews_check=1 and reviews_rating in (1,2,3,4,5) group by reviews_rating order by reviews_rating desc");
}

$strXML  = "";
$strXML .= "<graph caption='' xAxisName='' yAxisName='' decimalPrecision='0' formatNumberScale='5' >";

while ($rating_query_completed = tep_db_fetch_array($rating_query)){
	$tab[$rating_query_completed['products_rating']]+=$rating_query_completed['cpt'];
}


while ($reviews_count_values = tep_db_fetch_array($reviews_count)){
	$tab[$reviews_count_values['reviews_rating']]+=$reviews_count_values['cpt'];
}



for ($i=5; $i>=1 ;$i--){
	switch ($i){
		case 1:
			$color="#AD3D3C";
			$star=TEXT_STAR;
			break;
		case 2:
			$color="#DB8D3B";
			$star=TEXT_STARS;
			break;
		case 3:
			$color="#E2D950";
			$star=TEXT_STARS;
			break;
		case 4:
			$color="#AFCD42";
			$star=TEXT_STARS;
			break;
		case 5:	
			$color="#90C63A";
			$star=TEXT_STARS;
			break;
	}			
	$strXML .= "<set name='".$i." ".$star."' value='".((empty($tab[$i]))? 0.000001 :$tab[$i])."' color='".$color."' />";
	//Create an XML data document in a string variable
}
$strXML .= "</graph>";
//Create the chart - Column 3D Chart with data from strXML variable using dataXML method
   


echo renderChartHTML("./charts/FusionCharts/FCF_Bar2D.swf", "", $strXML, "myNext", 365, 130);
?>
<br />
