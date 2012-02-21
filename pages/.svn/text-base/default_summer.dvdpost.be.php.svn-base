<?php

	echo '<link rel="stylesheet" href="/stylesheet/tool.css" type="text/css" />';
	echo '<link rel="stylesheet" href="/stylesheet/facebox.css" type="text/css" />';
	echo '<script src="/js/jquery-1.4.2.min.js?1276614285" type="text/javascript"></script>';
  echo '<script src="/js/facebox.js?1276614285" type="text/javascript"></script>';
	echo '<script type="text/javascript" src="/js/summer.js"></script>';
?>
<style>


#main_box * {
    margin: 0;
    padding: 0;
    letter-spacing: 0px;
    border: none;
}
#main_box {
    position: relative;
    background-color: #fff;
}
#main_box #top_bit {
    position: relative;
    background: transparent url(<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/summer/home.jpg' ;?>) no-repeat scroll 0 0;
    height: 622px;
    color: #fff;
}

#bullets {
    font-size: 14px;
    font-weight: normal;
    position: absolute;
    width: 900px;
    top: 95px;
    left: 0px;
    text-align: center;
}
#promo_bit {
    position: absolute;
    left: 365px;
    top: 210px;
    width: 237px;
}
#main_box .promo_box {
    border: 1px solid #000;
    width: 216px;
    margin-bottom: 10px;
    font-size: 24px;
    padding: 12px;
    color: #000;
    font-weight: bold;
    text-align: center;
    text-transform: uppercase;
    float: left;
}
#main_box #promo_bit h3 {
    width: 237px;
    margin-bottom: 10px;
    font-weight: normal;
  
    text-align: center;
}
#main_box #new_cust {
    margin-bottom: 10px;
}
#main_box #terms_and_cons {
    padding: 18px;
    font-size: 11px;
    color: #666;
    text-align: justify;
}
#terms_link {
    margin: 18px auto 0px auto;
    display: block;
    cursor: pointer;
    width: 240px;
    text-align: right;
    font-size: 12px;
    padding-bottom: 18px;
    text-decoration: underline;
	color:#000;
    font-weight: bold;
}
#terms_and_cons {
    display: none;
}



</style>

<div class="main-holder">

<div id="main_box">
<div id="top_bit">
        <div id="bullets"><?php echo TEXT_EXPLAIN_SUMMER ;?></div>
        <div id="promo_bit">
            <h3><?php echo TEXT_CODE_SUMMER ;?></h3>
            <form id="signup_form" name="form1" method="post" action="activation_code_confirm.php">
            
           <input name="code" class="promo_box" id="code" type="text" class="inputs_codes" maxlength="10" value=""  onclick="form1.code.value='';">
           
                <input id="new_cust" name="imageField" type="image" src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/summer/new_custm_button.png' ;?>" align="absmiddle" border="0">
                <a id="login_code"href='login_code.php?force=1'><img src='<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/summer/old_custm_button.png' ;?>' /></a>
          
            
            <input name="condition1" type="hidden" id="condition1" value="gift">
	</form>
            <div id="terms_link"><p><a id ="condition" href ="/conditions/condition_summer_<?= $lang_short ?>.html"><?php echo TEXT_CONDITION_SUMMER ;?></a></p>
    </div>
            <div class="clearfix"></div>
        </div>
    </div>

   
    
</div>

</div>

