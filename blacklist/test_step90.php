<?php  
require('configure/application_top.php');


$fichier = "../../csv/step90.csv";
$fic = fopen($fichier, 'rb');

$email='';
$i=1;

define('CSV_SEPERATOR',';');
define('CSV_PATH','\\');
define('CSV_FILENAME','../../csv/test.csv');
$records = array();
$row= array('email','lastname','firstname','fullname','gender');
array_push($records,$row);
for ($ligne = fgetcsv($fic, 1024); !feof($fic); $ligne = fgetcsv($fic, 1024)) 
{
	$email = $ligne[5];
	if(!empty($email) and strpos($email,'@')!==false)
	{
		$email= str_replace('@brutele.be','@voo.be',$email);
		$sql ="select * from customers where customers_email_address = '".$email."' and customers_language = ".$_GET['language_id'];
		$query = tep_db_query($sql);
		if($value = tep_db_fetch_array($query))
		{
			if($value['customers_newsletter']==0 or $value['is_email_valid']==0)
			{	
				//echo $value['customers_email_address'] .' <font color="green">backlisted</font><br />';
			}
			else
			{		
				echo $value['customers_email_address'] .' <font color="red">ok</font><br />';
				$firstname = ucwords($value['customers_firstname']);
				$lastname  = ucwords($value['customers_lastname']);
				$fullname  = ucwords($value['customers_firstname']).' '.ucwords($value['customers_lastname']);
				$gender = $value['customers_gender'];
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
				$row= array($email,$lastname,$firstname,$fullname,$civil);
				array_push($records,$row);
			}
		}
		else
		{
			//echo $email.' <font color="red">not found</font><br />';
		}
		//$i++;
	 //if ($i==2)
	//	break;
	}
	
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
var_dump($records);
  foreach($records as $key => $value)
    $results[] = implode($delimiter, $value);
  $fp = fopen($fileName, 'w');
  foreach ($results as $result)
    fputcsv($fp, explode($delimiter, $result));
  fclose($fp);
}

# =================== test ====================




                
              




?>
