<?php  
	$width=(($_SERVER['PHP_SELF']='/create_account.php'|| $_SERVER['PHP_SELF']=='/create_account_process.php')? SITE_WIDTH_PUBLIC_2009 : SITE_PRIVATE); 
?>

<div class="main-holder">
<div class="image_create"></div>
<table width="950" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php   echo HEADING_TITLE; ?></td>
  </tr>
 
  <tr>
    <td class="SLOGAN_DETAIL">
	  <form name="account_edit" method="post" <?php   echo 'action="' . tep_href_link(FILENAME_CREATE_ACCOUNT_PROCESS, '', 'SSL') . '"'; ?> onSubmit="return check_form();">
		  <input type="hidden" name="action" value="process">
		  <table border="0" align="center" width="<?php   echo $width; ?> cellspacing="0" cellpadding="0">
			<?php  
			  if (sizeof($navigation->snapshot) > 0) {
				?>
				<tr>
					<td class="SLOGAN_DETAIL"><?php   echo sprintf(TEXT_ORIGIN_LOGIN, tep_href_link(FILENAME_LOGIN, tep_get_all_get_params(), 'SSL')); ?></td>
				</tr>
			    
				<?php  
				}
				?>
		      <tr>
		        <td >
                <div id="account_create" align="center">

		        	
					<?php  
					  $email_address = tep_db_prepare_input($HTTP_GET_VARS['email_address']);
					  $account['entry_country_id'] = STORE_COUNTRY;
					  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/account/account_details_public.php'));
					?>
                    </div>
			     </td>
			  </tr>
		      <?php /*?><tr>
		        <td align="center" class="main-removed"><br><?php   echo tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></td>
		      </tr><?php */?>
		</table>
	</form>
    </td>    
  </tr>
</table>
</div>