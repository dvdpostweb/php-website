<?php
		require('configure/application_top.php');
		$current_page_name = 'vod_download.php';

		include(DIR_WS_INCLUDES . 'translation.php');
		
		function build_download_url($api_key, $private_key, $video_file_name, $download_server = 'http://dls.smartmovies.net/') { 
			/* $transaction_id peut être n'importe quelle chaine de caractères mais doit 
			impérativement être unique */ 
			$transaction_id = md5(microtime()); 
			/* Timestamp de création de l'url (heure de Paris) */ 
			$creation_time = time(); 
			/* Clé de vérification */ 
			$checksum = md5( 
			$private_key. 
			$transaction_id. 
			$creation_time. 
			$video_file_name 
			); 
			/* Préparation des éléments de l'URL */ 
			$params = array(); 
			$params[] = $api_key; 
			$params[] = $checksum; 
			$params[] = $transaction_id; 
			$params[] = $creation_time; 
			$params[] = $video_file_name; 
			/* Construction de l'URL */ 
			return $download_server . implode('/', $params);
		}
		
		$id=$_GET['id'];
		$code=strtoupper($_GET['code']);
		$type=strtolower($_GET['type']);
		$droselia_code_checker = tep_db_query("SELECT count(*) as cpt FROM droselia_codes where droselia_codes ='".$code."' AND customers_id ='".$customer_id."' AND used_date IS NULL ") ;
		$droselia_code_checker_values = tep_db_fetch_array($droselia_code_checker);
		
		if ($droselia_code_checker_values['cpt']==1 ){
			$droselia_video = tep_db_query("SELECT file_avi,file_mpg,file_m4v,file_flv,name FROM droselia_catalog_stream where catalog_id ='".$id."'") ;
			$droselia_video_values = tep_db_fetch_array($droselia_video);
			$title=' '.TEXT_TITLE.' : '.$droselia_video_values['name'];
			$affiliateid = 3;
			//$sharedkey ="jf%klpo5*65@\$jhbjnds(pp54fg";
			
			$api_key='d75fb5e4c53c50550eb7a961e6409132f25bda35';
			$private_key='jf%klpo5*65@$jhbjnds(pp54fg';
			switch($type)
			{
			case 'avi':
				$url = build_download_url($api_key, $private_key , $droselia_video_values['file_avi']);
			break;
			case 'mpg':
				$url = build_download_url($api_key, $private_key , $droselia_video_values['file_mpg']);
			break;
			case 'm4v':
				$url = build_download_url($api_key, $private_key , $droselia_video_values['file_m4v']);
			break;
				//$url = build_download_url($api_key, $private_key , $droselia_video_values['file_flv']);
		    }
			tep_db_query("update droselia_codes set used_date = now() ,catalog_id = ".$id.",url_link = '".$url."'  where customers_id = '" . $customer_id . "' AND droselia_codes = '".$code."'");
		
			$email_text = TEXT_MAIL;
		
			$check_logo_query = tep_db_query("select logo , site_link  from site where site_id = '" . WEB_SITE_ID . "'");
		    $check_log_values = tep_db_fetch_array($check_logo_query);
    		$sql="select customers_firstname , customers_lastname , customers_email_address from customers where customers_id = " . $customer_id ;
		    $customers_query = tep_db_query($sql);
		    $customers_query_values = tep_db_fetch_array($customers_query);
		    $email_address=$customers_query_values['customers_email_address'];
		    $name=$customers_query_values['customers_firstname'].' '.$customers_query_values['customers_lastname'];
			  $logo = $check_log_values['logo'];
			  $site_link=$check_log_values['site_link'];
			  $email_text = str_replace('[link_dvdpost]', $site_link , $email_text);
		    $email_text = str_replace('[name]', $name , $email_text);
		    $email_text = str_replace('[vodx]', $url , $email_text);
		    $email_text = str_replace('[title]', $title , $email_text);

		    tep_mail($email_address, $email_address, EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);

				
		  		  	
			header('Location: '.$url);
			//echo $url;
		}
		else 
		{ 
			//echo $erreur;
			header('Location: /vodx.php');
		}
		
		?>