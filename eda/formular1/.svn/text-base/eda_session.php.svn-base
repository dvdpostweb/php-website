<?php

  require_once 'eda_config.php';

  class eda_session {
    
    private $username;
    private $key_file;
    private $session_timestamp;
    private $session_id;
    private $data;
    private $signature_hex;
    
    
  	public function __construct($username, $pkey_file_path) {
  		$this->username = $username;
  		$this->key_file = $pkey_file_path;
  		$this->setsession_id();
  		$this->session_timestamp = eda_session::gettimestamp();
  		$this->setdata();
  	}
  	
  	
  	public static function str2hex($string) {
  		$hexstr = unpack('H*', $string);
  		return array_shift($hexstr);
  	}

  	public static function eda_session_object($username, $pkey_file_path){
  	  return new eda_session($username, $pkey_file_path);
  	}


  	public static function gettimestamp(){
  		return dechex(floor(microtime(true) * 1000));
  	}
  	
  	private function getprivatekey($key_file){
  		if (file_exists($key_file)) {
  			$fp = fopen($key_file, "r");
  			$priv_key = fread($fp, 8192);
  			fclose($fp);
  			return $priv_key;
  		}
  		else{
  			echo "Can't find file, check '$key_file' var...<BR>";
  			return 0;
  		}
  	} 	
 
  	
  	private function setsession_id(){
  	  $this->session_id = uniqid('', true);
  	}
  	 	
  	private function setdata(){
  		$this->data = $this->username . '&' . $this->session_id . '&' . $this->session_timestamp;
  		$binary_signature = "";
  		openssl_sign($this->data, $binary_signature, $this->getprivatekey($this->key_file), OPENSSL_ALGO_SHA1);
  		$this->signature_hex = eda_session::str2hex($binary_signature);
  	}
  	
  	public function getusername(){
  	  return $this->username;
  	}
  
  	public function getsessionid(){
  		return $this->session_id;
  	}
  
  	public function getsessiontimestamp(){
  		return $this->session_timestamp;
  	}
  
  	public function getdata(){
  		return $this->data;
  	}
  
  	public function getsignature(){
  		return $this->signature_hex;
  	}
  	

  }



$obj = eda_session::eda_session_object($eda_username, $eda_key);
echo '<script type=\'text/javascript\'>
		  var eda_session_id="'.$obj->getsessionid().'";
		  var eda_session_timestamp="'.$obj->getsessiontimestamp().'";
		  var eda_username= \''.$obj->getusername().'\'; 
		  var eda_signature="'.$obj->getsignature().'";
	  </script>' . "\n";

?>
