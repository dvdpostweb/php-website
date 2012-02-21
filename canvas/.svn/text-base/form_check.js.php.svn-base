<script language="javascript">
<!--
var submitted = false;

function check_form() {
  var error = 0;
  var error_message = "<?php echo removeCRForJS(JS_ERROR); ?>";

  if(submitted){ 
    alert( "<?php echo removeCRForJS(JS_ERROR_SUBMITTED); ?>"); 
    return false; 
  }
   
  var first_name = document.account_edit.firstname.value;
  var last_name = document.account_edit.lastname.value;
<?php
   if (ACCOUNT_DOB == 'true') echo '  var dob = document.account_edit.dob.value;' . "\n";
?>
  var email_address = document.account_edit.email_address.value;  
  var street_address = document.account_edit.street_address.value;
  var postcode = document.account_edit.postcode.value;
  var city = document.account_edit.city.value;
  var telephone = document.account_edit.telephone.value;
  var password = document.account_edit.password.value;
  var confirmation = document.account_edit.confirmation.value;

<?php
   if (ACCOUNT_GENDER == 'true') {
?>
  if (document.account_edit.elements['gender'].type != "hidden") {
    if (document.account_edit.gender[0].checked || document.account_edit.gender[1].checked) {
    } else {
      error_message = error_message + "<?php echo removeCRForJS(JS_GENDER); ?>";
      error = 1;
    }
  }
<?php
  }
?>
 
  if (document.account_edit.elements['firstname'].type != "hidden") {
    if (first_name == '' || first_name.length < <?php echo removeCRForJS(ENTRY_FIRST_NAME_MIN_LENGTH); ?>) {
      error_message = error_message + "<?php echo removeCRForJS(JS_FIRST_NAME); ?>";
      error = 1;
    }
  }

  if (document.account_edit.elements['lastname'].type != "hidden") {
    if (last_name == '' || last_name.length < <?php echo removeCRForJS(ENTRY_LAST_NAME_MIN_LENGTH); ?>) {
      error_message = error_message + "<?php echo removeCRForJS(JS_LAST_NAME); ?>";
      error = 1;
    }
  }

<?php
   if (ACCOUNT_DOB == 'true') {
?>
  if (document.account_edit.elements['dob'].type != "hidden") {
    if (dob == '' || dob.length < <?php echo removeCRForJS(ENTRY_DOB_MIN_LENGTH); ?>) {
      error_message = error_message + "<?php echo removeCRForJS(JS_DOB); ?>";
      error = 1;
    }
  }
<?php
  }
?>
  if (document.account_edit.elements['email_address'].type != "hidden") {
    if (email_address == '' || email_address.length < <?php echo removeCRForJS(ENTRY_EMAIL_ADDRESS_MIN_LENGTH); ?>) {
      error_message = error_message + "<?php echo removeCRForJS(JS_EMAIL_ADDRESS); ?>";
      error = 1;
    }
  }

  if (document.account_edit.elements['street_address'].type != "hidden") {
    if (street_address == '' || street_address.length < <?php echo removeCRForJS(ENTRY_STREET_ADDRESS_MIN_LENGTH); ?>) {
      error_message = error_message + "<?php echo removeCRForJS(JS_ADDRESS); ?>";
      error = 1;
    }
  }

  if (document.account_edit.elements['postcode'].type != "hidden") {
    if (postcode == '' || postcode.length < <?php echo removeCRForJS(ENTRY_POSTCODE_MIN_LENGTH); ?>) {
      error_message = error_message + "<?php echo removeCRForJS(JS_POST_CODE); ?>";
      error = 1;
    }
  }

  if (document.account_edit.elements['city'].type != "hidden") {
    if (city == '' || city.length < <?php echo removeCRForJS(ENTRY_CITY_MIN_LENGTH); ?>) {
      error_message = error_message + "<?php echo removeCRForJS(JS_CITY); ?>";
      error = 1;
    }
  }

<?php
  if (ACCOUNT_STATE == 'true') {
?>
  if (document.account_edit.elements['state'].type != "hidden") {
    if (document.account_edit.state.value == '' || document.account_edit.state.value.length < <?php echo removeCRForJS(ENTRY_STATE_MIN_LENGTH); ?> ) {
       error_message = error_message + "<?php echo removeCRForJS(JS_STATE); ?>";
       error = 1;
    }
  }
<?php
  }
?>

  if (document.account_edit.elements['country'].type != "hidden") {
    if (document.account_edit.country.value == 0) {
      error_message = error_message + "<?php echo removeCRForJS(JS_COUNTRY); ?>";
      error = 1;
    }
  }

  if (document.account_edit.elements['telephone'].type != "hidden") {
    if (telephone == '' || telephone.length < <?php echo removeCRForJS(ENTRY_TELEPHONE_MIN_LENGTH); ?>) {
      error_message = error_message + "<?php echo removeCRForJS(JS_TELEPHONE); ?>";
      error = 1;
    }
  }

  if (document.account_edit.elements['password'].type != "hidden") {
    if ((password != confirmation) || (password == '' || password.length < <?php echo removeCRForJS(ENTRY_PASSWORD_MIN_LENGTH); ?>)) {
      error_message = error_message + "<?php echo removeCRForJS(JS_PASSWORD); ?>";
      error = 1;
    }
  }

  if (error == 1) { 
    alert(error_message); 
    return false; 
  } else { 
    submitted = true; 
    return true; 
  } 
}
//--></script>
<script language="javascript">
<!--
function reviewcheckForm() {
  var error = 0;
  var error_message = "<?php echo removeCRForJS(JS_ERROR); ?>";

  var review = document.product_reviews_write.review.value;

  if (review.length < <?php echo removeCRForJS(REVIEW_TEXT_MIN_LENGTH); ?>) {
    error_message = error_message + "<?php echo removeCRForJS(JS_REVIEW_TEXT); ?>";
    error = 1;
  }

  if ((document.product_reviews_write.rating[0].checked) || (document.product_reviews_write.rating[1].checked) || (document.product_reviews_write.rating[2].checked) || (document.product_reviews_write.rating[3].checked) || (document.product_reviews_write.rating[4].checked)) {
  } else {
    error_message = error_message + "<?php echo removeCRForJS(JS_REVIEW_RATING); ?>";
    error = 1;
  }

  if (error == 1) {
    alert(error_message);
    return false;
  } else {
    return true;
  }
}
//-->
</script>
<script type="text/javascript">
<!--
function cegenpopup1(){
settings='width=800,height=500,scrollbars=100,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
window.open('popup1.php','pop1', settings); 
}
function cegenpopup2(){
settings='width=800,height=500,scrollbars=100,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
window.open('popup2.php','pop2', settings); 
}
function cegenpopup4(){
settings='width=800,height=500,scrollbars=100,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
window.open('popup4.php','pop2', settings); 
}
//-->
</script>
<script language="javascript">
<!--
function PopupC(url,w,h)
{
var top=(screen.height-h)/2;
var left=(screen.width-w)/2;
window.open(url,"DVDPost","top="+top+",left="+left+",width="+w+",height="+h+",menubar=no,scrollbars=no,statusbar=no");
}
//-->
</script>			