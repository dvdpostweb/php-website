<?php 
if (strlen($HTTP_GET_VARS['code']) >0){
	$stractivation_code = $HTTP_GET_VARS['code'];
}else{
	$stractivation_code = $HTTP_POST_VARS['code'];
}

$data='<br /><br />code error<br />';

$data.='host -> '.$_SERVER['HTTP_HOST'].'<br />';
$data.='user agent -> '.$_SERVER['HTTP_USER_AGENT'].'<br />';
$data.='current page -> '.$_SERVER['SCRIPT_FILENAME'].'<br />';
$data.='referer -> '.$_SERVER['HTTP_REFERER'].'<br />';
$data.='query string -> '.$_SERVER['QUERY_STRING'].'<br />';
if(count($_POST)>0){
	foreach($_POST as $db_data  => $value){
		if(is_string($value)){
			$data.='post -> '.$db_data.' -> '.$value.'<br />'; 
		}
	}
}
if(!empty($_COOKIE['customers_id']))
	$data.=$_COOKIE['customers_id'].'<br />';
if(!empty($_COOKIE['email_address']))
	$data.=$_COOKIE['email_address'].'<br />';		
if(tep_session_is_registered('customer_id')){
	$data.='cust_id'.$customer_id.'<br />';		
}
function error($customers_registration_step,$data)
{
	
	$data.='step -> '.$customers_registration_step;
	if(!tep_session_is_registered('customer_id') || $customers_registration_step < 21)
	{	
?>
<table  cellspacing="0" width="90%">
	<tr valign="middle" >
		<td class="slogan_detail">
			<?php  echo TEXT_ERROR ;?>
		</td>
	</tr>
    <tr >
        <td class="slogan_detail">
        	<table  width="100%" align="center" >
	        	<tr>
	        		<form name="form1" method="post" action="activation_code_confirm.php">
		        	<td class="slogan_detail16" align="center">
		        		<br />
		        		<b><?php  
								echo TEXT_CODE_DOESNOT_EXIST2;
								tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','code error prod','4'.$data,'bugreport@dvdpost.be','bugreport@dvdpost.be');
							?></b><br/>
		        		<?php  
		        		 
		        			echo '<p>'.TEXT_PROMO_CODE.'<br />';
							echo '<input name="code" id="code" type="text" class="inputs" size="20" size="18"><input name="imageField" type="image" src="'.DIR_WS_IMAGES.'canvas/go.gif" align="absbottom" border="0"></p>';
						?>
						<br /><br /><br />											
		        	</td>
		        	</form>
		        </tr>
		      </table>
	    </td>
    </tr>					
</table>
<?php	
	}
	else
	{
?>		<table  cellspacing="0" width="90%">
		<tr valign="middle">
			<td class="slogan_detail">
				<?php  echo TEXT_ERROR ;?>
			</td>
		</tr>
		<tr >
		    <td class="slogan_detail">
		    	<table  width="100%" align="center" >
		        	<tr>
			        	<td class="slogan_detail">
			        		<b><?php  echo TEXT_ERROR_NO_BYPASS ;?></b><br/>
			        	</td>
			        </tr>
			    </table>
			 </td>
		</tr>					
		</table>
<?php
	}
}
?>
<tr>
<td class="SLOGAN_DETAIL" align="center">
<?php  
	$code_discount_query = tep_db_query("select * from " . TABLE_DISCOUNT_CODE . " where discount_code  = '" . $stractivation_code . "' ");
	$code_discount = tep_db_fetch_array($code_discount_query);
	if ($code_discount['discount_code_id'] > 0)
	{
		$date_now=date("Y-m-d");
		if($code_discount['discount_validityto'] == NULL)
			$date_code=$date_now;
		else
		{
			$dt=explode('-',$code_discount['discount_validityto']);
			$date_code = date("Y-m-d", mktime(0, 0, 0, $dt[1], $dt[2], $dt[0]));
		}
		if ($code_discount['discount_status'] < 1 || $date_code < $date_now  )
		{
			echo '<br>' . TEXT_CODE_ALREADY_NOT_VALID_ANYMORE;
			tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','code error prod','1. '.$data,'bugreport@dvdpost.be','bugreport@dvdpost.be');
		}
		else
		{					
			//bon code;	
				if(!tep_session_is_registered('customer_id') || $customers_registration_step < 21)
				{}
				else{
					error($customers_registration_step,$data);
				}
		}			
	}
	else
	{					
		$act_code ="SELECT * from activation_code where activation_code='".$stractivation_code."'";
		$code_activation_query = tep_db_query($act_code);
		$code_activation = tep_db_fetch_array($code_activation_query);
		if (!empty($code_activation['activation_code']))
		{
			$date_now=date("Y-m-d");
			if($code_activation['activation_code_validto_date'] == NULL)
				$date_code=$date_now;
			else
			{
				$dt=explode('-',$code_activation['activation_code_validto_date']);
				$date_code = date("Y-m-d", mktime(0, 0, 0, $dt[1], $dt[2], $dt[0]));
			}
			if ( $date_code < $date_now  )
			{
				echo '<br>' . TEXT_CODE_ALREADY_NOT_VALID_ANYMORE;
				tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','code error prod','2. '.$data,'bugreport@dvdpost.be','bugreport@dvdpost.be');
			}
			else
			{
				//bon code
				if ( $code_activation['customers_id']>0)
				{
						echo '<br>' . TEXT_CODE_ALREADY_NOT_VALID_ANYMORE;
					tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','code error prod','3. '.$data,'bugreport@dvdpost.be','bugreport@dvdpost.be');
				}
				else
				{
					if(!tep_session_is_registered('customer_id') || $customers_registration_step < 21)
						{}
					else{
						error($customers_registration_step,$data);
					}
				}	
			}
		}
		else
		{
		
			error($customers_registration_step,$data);
		
		}
	}

?>
</td>
</tr>
