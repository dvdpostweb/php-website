<?php
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
		
		if ($droselia_code_checker_values['cpt']==1 || !empty($_GET['url'])){
			$droselia_video = tep_db_query("SELECT file_avi,file_mpg,file_m4v,file_flv,name FROM droselia_catalog_stream where catalog_id ='".$id."'") ;
			$droselia_video_values = tep_db_fetch_array($droselia_video);
			$title=' '.TEXT_TITLE.' : '.$droselia_video_values['name'];
			
			$affiliateid = 3;
			//$sharedkey ="jf%klpo5*65@\$jhbjnds(pp54fg";
			
			$api_key='d75fb5e4c53c50550eb7a961e6409132f25bda35';
			$private_key='jf%klpo5*65@$jhbjnds(pp54fg';
			if(!empty($_GET['url']))
				$url=$_GET['url'];
			else
			{
				$url = build_download_url($api_key, $private_key , $droselia_video_values['file_flv']);
				tep_db_query("update droselia_codes set used_date = now() ,catalog_id = ".$id.",url_link = '".$url."'  where customers_id = '" . $customer_id . "' AND droselia_codes = '".$code."'");
			}
		    $direct_link='http://'.$_SERVER["SERVER_NAME"].'/vod_stream.php?url='.$url.'&id='.$id;
			
			if(empty($_GET['url']))
			{
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
			  $email_text = str_replace('[vodx]', $direct_link , $email_text);
				$email_text = str_replace('[title]', $title , $email_text);
			    //tep_mail($email_address, $email_address, EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
			
			
			
					$recipient = $email_address;
					$mail = new PHPmailer();
					$mail->IsSMTP();
					$mail->IsHTML(true);
					$mail->Host='192.168.100.11';
					$mail->From='dvdpost@dvdpost.be';
					$mail->FromName='DVDPost';
					$mail->AddAddress($recipient);
					$mail->AddReplyTo('dvdpost@dvdpost.be');	
					$mail->Subject= EMAIL_SUBJECT;
					$mail->Body=$email_text;

					if(!$mail->Send()){ //Teste si le return code est ok.
					  echo $mail->ErrorInfo; //Affiche le message d'erreur (ATTENTION:voir section 7)
					}
					$mail->SmtpClose();
					unset($mail);
			}
			$sql='select * from droselia_catalog_stream where catalog_id ='.$id;
			$query=tep_db_query($sql);
			$droselia_video_values=tep_db_fetch_array($query);
?>

<style>
	
	
	#top_menu_vodx img{
	
		
		padding-right:5px;
		border:0;
	
	
	}
	
	#top_menu_vodx {
	
		padding-top:8px;
		padding-bottom:25px;
	
	
	}
	
	.foother_buy_codes {
		
		font-size: 12px;
		padding-top:20px;
		text-align: right;
		
		}
	
	
</style>

<div id="top_menu_vodx" align="right"><a href="/vodx.php"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/vodx/nouveaute_bouton.gif' ;?>" /></a><a href="/vodx_faq.php"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/vodx/aide_bouton.gif' ;?>" /></a></div>

<center>
<div class="vodx-round">
    <div class="top"><span></span></div>
    <div class="center-content">
		<div class='titre_head2'><?= $droselia_video_values['name'] ?></div>
		<div style='text-align:center; margin-top:20px'>
		    <script type="text/javascript" src="/js/flowplayer-3.1.4.min.js"></script>
			
			<script type="text/javascript">
				function selection(){
				document.getElementById("link_vod").focus();
				document.getElementById("link_vod").select();
			}
			</script>
			<div style='margin: 0 50px;'>
			<a  
				 href="<?= $url ?>"  
				 style="display:block;width:600px;height:400px"  
				 id="player"> 
			</a> 

			<!-- this will install flowplayer inside previous A- tag. -->
			<script>
				flowplayer("player", "/includes/player_flv/flowplayer-3.1.4.swf",{ 
				    

					playlist: [ 

					    // show album cover 
					    {url: '<?= $droselia_video_values['directory_thumbs'] ;?>500/2.jpg', scaling: 'orig'}, 

					    // our MP3 does not start automatically 
					    {url: '<?= $url ?>', autoPlay: false} 

					],
						
					plugins: {
					   controls: {
					      backgroundColor: '#222222',
					      tooltipTextColor: '#ffffff',
					      backgroundGradient: [0.6,0.3,0,0,0],
					      progressGradient: 'medium',
					      sliderColor: '#000000',
					      buttonOverColor: '#666666',
					      volumeSliderGradient: 'none',
					      bufferColor: '#445566',
					      tooltipColor: '#5F747C',
					      borderRadius: '0px',
					      progressColor: '#112233',
					      timeColor: '#ffffff',
					      volumeSliderColor: '#000000',
					      sliderGradient: 'none',
					      timeBgColor: '#555555',
					      bufferGradient: 'none',
					      buttonColor: '#333333',
					      durationColor: '#d246c6',
					      height: 24,
					      opacity: 1.0
					   }
					}
				});
			</script>
			
			<br /><br /><div id='url_vod'><div id='url_vod_title'><b>URL</b></div><textarea cols="75" rows="3" id="link_vod" onclick='selection()'><?= $direct_link ?></textarea></div>
	
		</div>
	</div>
    <div class="bottom"><span></span></div>
</div>
<?php
		  		  	
			
		}
		else 
		{ 
			echo '<br /><br /><br /><div class="vodx-round">
			    <div class="top"><span></span></div>
			    <div class="center-content">'.TEXT_NO_CODE.'</div><div class="bottom"><span></span></div></div></div>';
			//header('Location: /vodx.php');
		}
?>
