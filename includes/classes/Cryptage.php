<?
////////////////////////////////////////////////////////////////////////////////////
////																			////
////               	Class Cryptage v1.0 - Benjamin TOUCHARD						////
////			Novembre 2004													////
////																			////
////		Contact : benjamin@kolapsis.net - http://kolapsis.net				////
////																			////
////		Merci de m'informé de toutes évolutions apportés ;)					////
////																			////
////////////////////////////////////////////////////////////////////////////////////

class Cryptage {
	var $version = 1.0;
	var $macle;
	var $cnum;
	var $returnString,$newletter;
	var $ch,$char,$letter;
	var $i,$j,$sep,$tmp,$search;

	function Cryptage($c) {
		if ($c == ""){
			echo " !! ERREUR !! vous n'avez pas préciser de clé de cryptage (10 characteres minimum)<br>";
		} else {
			if (strlen($c) < 10) echo " !! ERREUR !!clé de cryptage trop courte 10 characteres minimum<br>";
			 else $this->macle = $c;
		}
	}
	
	function num2str($num) {
		$this->cnum = intval($num);
		return strval($this->cnum);
	}
	
	function encode($str){
		if (strlen($this->macle) < 10){
			return " !! ERREUR !!clé de cryptage trop courte 10 characteres minimum";
		}
		$this->returnString = "";
		for ($this->i=0; $this->i<strlen($str); $this->i++){
			$this->ch = substr($str,$this->i,1);
			$this->char = strval(ord($this->ch));
			for ($this->j=1; $this->j<=strlen($this->char); $this->j++) {
				$this->letter = substr($this->char,$this->j-1, 1);
				if ($this->letter == "0") {
					$this->letter = "10";
				}
				$this->newletter = substr($this->macle,$this->letter,1);
				$this->returnString .= $this->newletter;
			}
			$this->returnString .= substr($this->macle,0,1);
		}
		return $this->returnString;
	}
	
	function decode($str){
		if (strlen($this->macle) < 10){
			return " !! ERREUR !!clé de cryptage trop courte 10 characteres minimum";
		}
		$this->returnString = "";
		$this->sep = ord(substr($this->macle,0,1));
		$this->tmp = "";
		for ($this->i=0; $this->i<strlen($str); $this->i++){
			$this->char = ord(substr($str,$this->i,1));
			if ($this->char == $this->sep){
				$this->returnString .= chr($this->tmp);
				$this->tmp = "";
			} else {
				for ($this->j=1; $this->j<strlen($this->macle); $this->j++) {
					$this->search = ord(substr($this->macle, $this->j, $this->j+1));
					if ($this->search == $this->char) {
						if ($this->j == 10)  $this->j = 0;
						$this->tmp .= $this->j;
						break;
					}
				}
			}
		}
		return $this->returnString;
	}
}
?>