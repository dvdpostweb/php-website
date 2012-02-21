<?php
$path='partial/payment_method_change/';
?>
<!-- debut du CONTAINER -->
<div class="main-holder">
  <table cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td colspan="3">
                <div id="step_container">
                <!-- Formulaire adresse -->
					
						<div id="step_promo_explain" class="step3c_promo_explain">
        					<?php 
								if ($_GET['payment']=='ogone_change' || $_GET['payment']=='ogone_change_end'){ 
        					    	echo '<h2>'.TITLE_PAYMENT_OGONE_CHANGE.'</h2>';
        					 	}else {
        					 		echo '<h2>'.TITLE_PAYMENT_METHOD_CHANGE.'</h2>';
        					    } 
        					?>

							<?php
							switch($_GET['payment'])
							{
							case 'ogone':
								include($path.'ogone_confirmation.php');
							break;
							case 'ogone_change':
								include($path.'ogone_change.php');
							break;
							case 'ogone_change_end':
								include($path.'ogone_change_end.php');	
							break;
							case 'ogone_end':
									include($path.'ogone_end.php');	
							break;
							case 'domiciliation':
								switch($_GET['confirm'])
								{
								case 'download':
								case 'letter':
									include($path.'domiciliation_confirmation.php');
									break;
								break;
								case 'download_end':
								case 'letter_end':
									include($path.'domiciliation_end.php');
								break;
								default:
									include($path.'domiciliation_choice.php');
								}
							break;
							default:
							
								include($path.'payment_choice.php');
							}
							?>
                            
						</div>
                     </div>
                 </td>
              </tr>
           </table>	
</div>
