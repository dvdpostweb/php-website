<?php
define("EMAIL_TRANSPORT",'smtp');
define("CHARSET",'iso-8859-1');
define ("SEND_EMAILS", 'true');
define ("EMAIL_LINEFEED", 'CRLF');
require('../includes/classes/mime.php');
require('../includes/classes/email.php');
require('../includes/functions/general.php');
class Emailer
{
	var $db;
	public function __construct()
	{
		$registry = Zend_Registry::getInstance();
		$this->db=$registry->get('db');

		$this->logger = new Zend_Log();
		$redacteur = new Zend_Log_Writer_Stream('php://output');

		$this->logger->addWriter($redacteur);
		


		
	}
	function emailGet($email)
	{
		$sql = 'select * from customers where trim(customers_email_address)=?';
		$stmt = $this->db->query($sql, array( $email));
		$data=$stmt->fetch();
		if($data['customers_id']>0)
		{
			return 'ALREADY EXIST';
		}
		else 
		{
			$sql = 'select * from prospects where trim(customers_email_address)=?';
			$stmt = $this->db->query($sql, array( $email));
			$data=$stmt->fetch();
			if(!empty($data['customers_email_address']))
			{
				return 'ALREADY EXIST';
			}
			else
			{
				return 'NEW';
			}
		}
	}
	function emailPost($email, $lastname, $firstname, $language,$zip,$gender,$birthday)
	{
		$sql = 'select * from customers where trim(customers_email_address)=?';
		$stmt = $this->db->query($sql, array( $email));
		$data=$stmt->fetch();
		if($data['customers_id']>0)
		{
			return 'ALREADY EXIST';
		}
		else 
		{
			$sql = 'select * from prospects where trim(customers_email_address)=?';
			$stmt = $this->db->query($sql, array( $email));
			$data=$stmt->fetch();
			if(!empty($data['customers_email_address']))
			{
				return 'ALREADY EXIST';
			}
			else
			{
				$gender=strtoupper($gender);
				if($gender!="M" && $gender!='F')
				{
					$gender='I';
				}
				$sql="insert into prospects (customers_lastname, customers_firstname, customers_email_address, customers_language, gender, zip, birthday, site, is_email_valid) values (?,?,?,?,?,?,?,?,?);";
				$stmt = $this->db->query($sql, array( $lastname,$firstname,$email,$language,$gender,$zip,$birthday,'ptg prospects',1));
				$sql='SELECT * FROM mail_messages m where mail_messages_id =444 and language_id = ?';
				$stmt = $this->db->query($sql, array($language));
				$data=$stmt->fetch();
				$email_text = $data['messages_html'];
				switch($language)
				{
					case 1:
						$civil = (($gender == 'F') ? 'Chère Madame': 'Cher Monsieur');
					break;
					case 2:
						$civil = (($gender == 'F') ? 'Beste Mevrouw': 'Beste Mijnheer');
					break;
					case 3:
						$civil = (($gender == 'F') ? 'Dear Madam': 'Dear Sir');
					break;
				}
				$email_text = str_replace('{%Civilite%}', $civil, $email_text);
				$name = ucwords($firstname) . ' ' . ucwords($lastname);
				$email_text = str_replace('{%Nom%}', $name , $email_text);
				
		  	$status = tep_mail($name, $email, $data['messages_title'], $email_text, 'DVDPost', 'dvdpost@dvdpost.be','');
				
				return "INSERT";
			}
		}
	}
}
?>