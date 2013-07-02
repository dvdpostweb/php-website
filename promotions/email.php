<?
require('../configure/application_top.php');
$sql_check = 'select * from customers where customers_email_address ="'.$_POST['email'].'" and customers_abo=1';
$query = tep_db_query($sql_check);
$data=tep_db_fetch_array($query);
if($data['customers_id']>0)
{
  echo 'error1';
}
else
{
  $sql_check2 = 'select * from vod_free where email ="'.$_POST['email'].'"';
  $query2 = tep_db_query($sql_check2);
  $data2=tep_db_fetch_array($query2);
  if($data2['id']>0)
  {
    if($data2['blacklisted']==1)
    {
      echo 'error2';
    }
    else
    {
      $sql ="update vod_free set login_counter= login_counter+1, updated_at =now() where id = ". $data2['id'];
      tep_db_query($sql);
      setcookie('email_vod_free', $_POST['email'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
      echo 'ok';
    }
  }
  else
  {
    $sql ="insert into vod_free values (null,'".$_POST['email']."','".$_POST['source']."',1,".$_POST['imdb_id'].",0,now(),now())";
    tep_db_query($sql);
    setcookie('email_vod_free', $_POST['email'] , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
    echo 'ok';
  }
}
?>
