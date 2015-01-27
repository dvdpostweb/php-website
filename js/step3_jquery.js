$(function() {
	//check email
	
	$('#day').change(function() {birth_change()});
	$('#month').change(function() {birth_change()});
	$('#year').change(function() {birth_change()});
	$('#country').change(function() {country_change()});
	$('#street_address').blur(function() {street_address_blur()});
  setInterval(function() {city_keyup(1)}, 200)
  setInterval(function() {street_address_keyup()}, 200)
  setInterval(function() {postcode_keyup()}, 200)
  setInterval(function() {firstname_keyup()}, 200)
  setInterval(function() {lastname_keyup()}, 200)
  setInterval(function() {phone_keyup()}, 200)
  setInterval(function() {housenum_fct()}, 200)
  housenum_var=''
	if(!$('#check_firsname').hasClass('step_input_ok') && !$('#check_firsname').hasClass('step_input_error'))
		firstname_keyup();	
	if(!$('#check_lastname').hasClass('step_input_ok') && !$('#check_lastname').hasClass('step_input_error'))
		lastname_keyup();
	if(!$('#check_street').hasClass('step_input_ok') && !$('#check_street').hasClass('step_input_error'))
		street_address_keyup();
	if(!$('#check_zip').hasClass('step_input_ok') && !$('#check_zip').hasClass('step_input_error'))
		postcode_keyup();
	if(!$('#check_city').hasClass('step_input_ok') && !$('#check_city').hasClass('step_input_error'))
		city_keyup(2);
	if(!$('#check_phone').hasClass('step_input_ok') && !$('#check_phone').hasClass('step_input_error'))
		phone_keyup();
	if($('#day').attr('value')==0 || $('#month').attr('value')==0  || $('#year').attr('value')==0 || calcul_age($('#day').attr('value')+'/'+$('#month').attr('value')+'/'+$('#year').attr('value')) < 18)
	{}
	else{
		$('#check_birthday').addClass('step_input_ok');
		$('#check_birthday').children('div').html(' ');
	}
	if($('#check_firsname').hasClass('step_input_ok') || $('#check_lastname').hasClass('step_input_ok') || $('#check_street').hasClass('step_input_ok') || $('#check_zip').hasClass('step_input_ok') || $('#check_city').hasClass('step_input_ok') || $('#check_phone').hasClass('step_input_ok') || $('#check_birthday').hasClass('step_input_ok'))
	{
		$('check_country').addClass('step_input_ok');
		$('check_country').children('div').html(' ');
	}
});
function housenum_fct()
{
  if($('#housenum').attr('value')!='')
  {
    if(housenum_var != $('#housenum').attr('value'))
    {
      $('#street_address').val($('#street_address').attr('value')+ ' ' + $('#housenum').attr('value'))
      housenum_var = $('#housenum').attr('value');
    }
    
  }
}
function firstname_keyup()
{
	if($('#firstname').attr('value')!='')
	{
			if($('#firstname').attr('value').length<2)
			{
				$('#check_firsname').addClass('step_input_error').removeClass('step_input_ok').removeClass('step_input_none');
				$('#check_firsname').children('div').html($('#error_first_text').html());
			}
			else
			{
				$('#check_firsname').addClass('step_input_ok').removeClass('step_input_error').removeClass('step_input_none');
				$('#check_firsname').children('div').html(' ');
			}
	}
	else
	{
		$('#check_firsname').addClass('step_input_none').removeClass('step_input_error').removeClass('step_input_ok');
		$('#check_firsname').children('div').html('');	
	}
}
function lastname_keyup(event)
{
	if($('#lastname').attr('value')!='')
	{
			if($('#lastname').attr('value').length<2)
			{
				$('#check_lastname').addClass('step_input_error').removeClass('step_input_ok').removeClass('step_input_none');
				$('#check_lastname').children('div').html($('#error_last_text').html());
			}
			else
			{
				$('#check_lastname').addClass('step_input_ok').removeClass('step_input_error').removeClass('step_input_none');
				$('#check_lastname').children('div').html(' ');
			
			}
	}
	else
	{
		$('#check_lastname').addClass('step_input_none').removeClass('step_input_error').removeClass('step_input_ok');
		$('#check_lastname').children('div').html('');	
	}
	
}
function street_address_keyup()
{
	if($('#street_address').attr('value')!='')
	{
			if($('#street_address').attr('value').length<6)
			{
				$('#check_street').addClass('step_input_error').removeClass('step_input_none').removeClass('step_input_ok');;
				$('#check_street').children('div').html($('#error_address_text').html());
			}
			else
			{
				$('#check_street').addClass('step_input_ok').removeClass('step_input_error').removeClass('step_input_none');
				$('#check_street').children('div').html(' ');
			}
	}
	else
	{
		$('#check_street').addClass('step_input_none').removeClass('step_input_error').removeClass('step_input_ok');
		$('#check_street').children('div').html('');	
	}
	
}
function street_address_blur()
{
	
	var myRegExp = new RegExp("([0-9])","g"); 
	number=myRegExp.test($('#street_address').attr('value'));
	
	if(number==false)
	{
		alert($('#error_street_number').html());
	}
}
function postcode_keyup()
{
	if($('#postcode').attr('value')!='')
	{
	    var myRegExp = new RegExp("([^0-9])","g"); 
    	number=myRegExp.test($('#postcode').attr('value'));
			if($('#postcode').attr('value').length <4)
			{
				$('#check_zip').addClass('step_input_error').removeClass('step_input_ok').removeClass('step_input_none');
				$('#check_zip').children('div').html($('#error_zip_text').html());
			}
			else
			{
				$('#check_zip').addClass('step_input_ok').removeClass('step_input_error').removeClass('step_input_none');
				$('#check_zip').children('div').html(' ');
			
			}
	}
	else
	{
		$('#check_zip').addClass('step_input_none').removeClass('step_input_error').removeClass('step_input_ok');
		$('#check_zip').children('div').html('');	
	}
	
}
function city_keyup(data)
{
	if($('#city').attr('value')!='')
	{
			if($('#city').attr('value').length<3)
			{
				$('#check_city').addClass('step_input_error').removeClass('step_input_ok').removeClass('step_input_none');
				$('#check_city').children('div').html($('#error_zip_text').html());
			}
			else
			{
				$('#check_city').addClass('step_input_ok').removeClass('step_input_error').removeClass('step_input_none');
				$('#check_city').children('div').html(' ');
			
			}
	}
	else
	{
		$('#check_city').addClass('step_input_none').removeClass('step_input_error').removeClass('step_input_ok');
		$('#check_city').children('div').html('');	
	}
	
}
function phone_keyup()
{
	if($('#phone').attr('value')!='')
	{
			var re=/^(\+)?[0-9 -./]+$/;
			var myRegExp = new RegExp("([^0-9])","g"); 
			phone=$('#phone').attr('value').replace(myRegExp ,'');
			if( !re.test($('#phone').attr('value')) || phone.length < 9)
			{
				$('#check_phone').addClass('step_input_error').removeClass('step_input_ok')
				$('#check_phone').children('div').html($('#error_phone_text').html());
			}
			else
			{
				$('#check_phone').addClass('step_input_ok').removeClass('step_input_error')
				$('#check_phone').children('div').html(' ');
			
			}
	}
	else
	{
		$('#check_phone').removeClass('step_input_error').removeClass('step_input_ok');
		$('#check_phone').children('div').html('');	
	}
	
}
function birth_change(event)
{
	if($('#day').attr('value')==0 || $('#month').attr('value')==0  || $('#year').attr('value')==0 )
	{
		$('#check_birthday').addClass('step_input_error').removeClass('step_input_ok');
		$('#check_birthday').children('div').html($('#error_birth_text').html());
	}
	else
	{
	  age = calcul_age($('#day').attr('value')+'/'+$('#month').attr('value')+'/'+$('#year').attr('value'))
	  if (age >= 18)
	  {
		  $('#check_birthday').addClass('step_input_ok').removeClass('step_input_error');
		  $('#check_birthday').children('div').html(' ');
	  }
	  else
	  {
	    $('#check_birthday').addClass('step_input_error').removeClass('step_input_ok');
  		$('#check_birthday').children('div').html($('#error_minor').html());
	  }
	}
}
function country_change()
{
	$('#check_country').addClass('step_input_ok');
	$('#check_country').children('div').html(' ');
}
function calcul_age(date_naissance){
	
	
	var elem_n = date_naissance.split('/');
		jour_n = elem_n[0];
		mois_n = elem_n[1];
		annee_n = elem_n[2];
	
	var date_day = new Date();
		jour_day = date_day.getDate();
		mois_day = date_day.getMonth()+1;
		annee_day = date_day.getFullYear();
	
	//calcul age
	var ans; var mois; var age="";
	
	if(mois_day >= mois_n){
		ans =  annee_day - annee_n;
		mois= mois_day - mois_n;
	}else{
		ans =  (annee_day - annee_n) -1;
		mois= mois_day +( 12 - mois_n);
	}
	if(jour_day < jour_n){	
		mois= mois -1;
		if(mois_day < mois_n){
		ans =  ans -1;
		}	
	}
	
	if(ans >0 && ans <=1) age += ans+' an ';
	if(ans >1) age += ans+' ans ';
	if(mois >0) age +=mois+' mois ';
	 // on affiche le résultat
	return ans ;
}