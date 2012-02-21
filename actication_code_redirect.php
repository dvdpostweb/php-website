<?php 

require('configure/application_top.php');

echo "<body onLoad='aboactivation.submit();'>";

?>
<form name="aboactivation" method="post" action="activation_code_process.php">   
	<input type='hidden' name='code' id='code' value='<?php  echo $HTTP_GET_VARS['code'];?>'>                                                                      
</form>
