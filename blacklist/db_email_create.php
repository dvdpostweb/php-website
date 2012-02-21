<?php  
require('../configure/application_top.php');


$email='';
$i=1;

define('CSV_SEPERATOR',';');
define('CSV_PATH','\\');
define('CSV_FILENAME','../../../csv/customers_fr.csv');
$records = array();
$row= array('email','lastname','firstname','fullname','gender','size','customer_id');
array_push($records,$row);
if(empty($_GET['language_id']))
{
	die('language_id empty');
}
$sql = "select c.customers_id as c_id,count(w.wl_id) as size,customers_email_address,customers_firstname,customers_lastname,customers_gender,customers_info_date_account_created from customers c
left join wishlist w on (w.customers_id = c.customers_id)
left join products p on p.products_id = w.product_id
where c.customers_abo = 1 and customers_registration_step = 100 and c.customers_abo_suspended = 0 
and (w.wishlist_type = 'dvd_norm' or w.wishlist_type is null)
and (p.products_status <>-1 or p.products_status is null ) and (p.products_next = 0 or p.products_next is null)
and c.`customers_abo_dvd_norm`>0 and  c.`customers_abo_dvd_adult`=0 and customers_language = ".$_GET['language_id']."
group by c.customers_id
having size=0
order by customers_info_date_account_created desc limit 30,100;";
$query = tep_db_query($sql);
while($value = tep_db_fetch_array($query))
{
	$row = insert_mail($value['customers_email_address'],$value['customers_firstname'],$value['customers_lastname'],$value['customers_gender'],$value['size'],$value['c_id']);
	array_push($records,$row);
}
/*$sql = "select * from prospect where unsubscribe=0 and is_email_valid=1 and customers_language = 1;";
$query = tep_db_query($sql);
while($value = tep_db_fetch_array($query))
{
	$row = insert_mail($value['customers_email_address'],$value['customers_firstname'],$value['customers_lastname'],$value['customers_gender']);
	array_push($records,$row);
}*/
function insert_mail($email,$firstname, $lastname,$gender,$size,$customer_id)
{
	echo $email .' <font color="red">ok</font><br />'.$gender;
	$firstname = ucwords($firstname);
	$lastname  = ucwords($lastname);
	$fullname  = ucwords($firstname).' '.ucwords($lastname);
	echo $gender.'<br />';
	switch($_GET['language_id'])
	{
		case 1:
			$civil = (($gender == 'f') ? 'Chère Madame': 'Cher Monsieur');
		break;
		case 2:
			$civil = (($gender == 'f') ? 'Beste Mevrouw': 'Beste Mijnheer');
		break;
		case 3:
			$civil = (($gender == 'f') ? 'Dear Madam': 'Dear Sir');
		break;
	}
	return array($email,$lastname,$firstname,$fullname,$civil,$size,$customer_id);
}
$fileName =  CSV_FILENAME; 
               
WriteCsv ($fileName,';',$records);
if (!function_exists('fputcsv'))
{
 $records = array();
  function fputcsv(&$handle, $fields = array(), $delimiter = ';', $enclosure = '"')
  {
    $str = '';
    $escape_char = '\\';
    foreach ($fields as $value)
    {
      if (strpos($value, $delimiter) !== false ||
          strpos($value, $enclosure) !== false ||
          strpos($value, "\n") !== false ||
          strpos($value, "\r") !== false ||
          strpos($value, "\t") !== false ||
          strpos($value, ' ') !== false)
      {
        $str2 = $enclosure;
        $escaped = 0;
        $len = strlen($value);
        for ($i=0;$i<$len;$i++)
        {
          if ($value[$i] == $escape_char)
            $escaped = 1;
          else if (!$escaped && $value[$i] == $enclosure)
            $str2 .= $enclosure;
          else
            $escaped = 0;
          $str2 .= $value[$i];
        }
        $str2 .= $enclosure;
        $str .= $str2.$delimiter;
      }
      else
        $str .= $value.$delimiter;
    }
    $str = substr($str,0,-1);
    $str .= "\n";
    return fwrite($handle, $str);
  }

}

function WriteCsv($fileName, $delimiter = ';', $records)
{

  $result = array();
  foreach($records as $key => $value)
  $results[] = implode($delimiter, $value);
  $fp = fopen($fileName, 'w+');
  foreach ($results as $result)
    fputcsv($fp, explode($delimiter, $result));
  fclose($fp);
}

# =================== test ====================




                
              




?>
