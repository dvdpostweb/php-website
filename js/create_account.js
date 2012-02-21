
var submitted = false;

function check_form() {
	
  var error = 0;
  var error_message = "Il a eu des erreurs au traitement du formulaire ! Veuillez faire les corrections suivantes :";

  if(submitted){ 
    alert( "Ce formulaire a d�j� �t� post�. Merci d'appuyer sur ok et d'attendre que le processus soit termin�."); 
    return false; 
  }
   
  var first_name = $F('firstname');
  var last_name = $F('lastname');
  //var dob = document.account_edit.dob.value;
  var email_address = $F('email_address');
  var street_address = $F('street_address');
  var postcode = $F('postcode');
  var city = $F('city');
  var telephone = $F('telephone');
  var password = $F('password');
    if (document.account_edit.gender[0].checked || document.account_edit.gender[1].checked) {
    } else {
      error_message = error_message + "* Le sexe doit �tre indiqu�.";
      error = 1;
    }
    if (first_name == '' || first_name.length < 2) {
      error_message = error_message + "* Le pr�nom doit comporter au moins 2 caract�res.";
      error = 1;
    }
    if (last_name == '' || last_name.length < 2) {
      error_message = error_message + "* Le nom doit comporter au moins 2 caract�res.";
      error = 1;
    }
  /*if (document.account_edit.elements['dob'].type != "hidden") {
    if (dob == '' || dob.length < 10) {
      error_message = error_message + "* La date de naissance doit �tre au format jj/mm/aaaa (jour/mois/ann�e).";
      error = 1;
    }
  }*/

    if (email_address == '' || email_address.length < 6) {
      error_message = error_message + "* L'adresse e-mail doit comporter au moins 6 caract�res.";
      error = 1;
    }
    if (street_address == '' || street_address.length < 5) {
      error_message = error_message + "* L'adresse doit comporter au moins 5 caract�res.";
      error = 1;
    }
    if (postcode == '' || postcode.length < 4) {
      error_message = error_message + "* Le code postal doit comporter au moins 4 caract�res.";
      error = 1;
  }

    if (city == '' || city.length < 3) {
      error_message = error_message + "* La ville doit comporter au moins 3 caract�res.";
      error = 1;
    }

  /*if (document.account_edit.elements['country'].type != "hidden") {
    if (document.account_edit.country.value == 0) {
      error_message = error_message + "* Le pays doit �tre s�lectionn�.";
      error = 1;
    }
  }*/

    if (telephone == '' || telephone.length < 3) {
      error_message = error_message + "* Le num�ro de t�l�phone doit comporter au moins 3 caract�res.";
      error = 1;
    }
    if(password.length >0){
		if ( password.length < 5) {
      		error_message = error_message + "* Le mot de passe et la confirmation doivent �tre identiques et comporter au moins 5 caract�res.";
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

