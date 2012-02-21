<?php  
require('configure/application_top.php');


$email='';
$i=1;

define('CSV_SEPERATOR',';');
define('CSV_PATH','\\');
define('CSV_FILENAME','../../csv/test31.csv');
$records = array();
$row= array('email','name','civil');
array_push($records,$row);
$sql = "select * from customers where customers_newsletter=1 and is_email_valid=1 and (`customers_registration_step`=31 or `customers_registration_step`=32 or `customers_registration_step`=33) and customers_language = 1;";
$query = tep_db_query($sql);
while($value = tep_db_fetch_array($query))
{
	$row = insert_mail($value['customers_email_address'],$value['customers_firstname'],$value['customers_lastname'],$value['customers_gender']);
	array_push($records,$row);
}
$sql = "select * from prospect where unsubscribe=0 and is_email_valid=1 and customers_language = 1;";
$query = tep_db_query($sql);
while($value = tep_db_fetch_array($query))
{
	$row = insert_mail($value['customers_email_address'],$value['customers_firstname'],$value['customers_lastname'],$value['customers_gender']);
	array_push($records,$row);
}
function insert_mail($email,$firstname, $lastname,$gender)
{
	echo $email .' <font color="red">ok</font><br />';
	$name =ucwords($firstname).' '.ucwords($lastname);
	if($gender=="m")
	{
		$civil= 'Monsieur';
	}
	else
	{
		$civil= 'Madame';
	}
	return array($email,$name,$civil);
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
