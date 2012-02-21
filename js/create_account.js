
var submitted = false;

function check_form() {
	
  var error = 0;
  var error_message = "Il a eu des erreurs au traitement du formulaire ! Veuillez faire les corrections suivantes :";

  if(submitted){ 
    alert( "Ce formulaire a déjà été posté. Merci d'appuyer sur ok et d'attendre que le processus soit terminé."); 
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
      error_message = error_message + "* Le sexe doit être indiqué.";
      error = 1;
    }
    if (first_name == '' || first_name.length < 2) {
      error_message = error_message + "* Le prénom doit comporter au moins 2 caractères.";
      error = 1;
    }
    if (last_name == '' || last_name.length < 2) {
      error_message = error_message + "* Le nom doit comporter au moins 2 caractères.";
      error = 1;
    }
  /*if (document.account_edit.elements['dob'].type != "hidden") {
    if (dob == '' || dob.length < 10) {
      error_message = error_message + "* La date de naissance doit être au format jj/mm/aaaa (jour/mois/année).";
      error = 1;
    }
  }*/

    if (email_address == '' || email_address.length < 6) {
      error_message = error_message + "* L'adresse e-mail doit comporter au moins 6 caractères.";
      error = 1;
    }
    if (street_address == '' || street_address.length < 5) {
      error_message = error_message + "* L'adresse doit comporter au moins 5 caractères.";
      error = 1;
    }
    if (postcode == '' || postcode.length < 4) {
      error_message = error_message + "* Le code postal doit comporter au moins 4 caractères.";
      error = 1;
  }

    if (city == '' || city.length < 3) {
      error_message = error_message + "* La ville doit comporter au moins 3 caractères.";
      error = 1;
    }

  /*if (document.account_edit.elements['country'].type != "hidden") {
    if (document.account_edit.country.value == 0) {
      error_message = error_message + "* Le pays doit être sélectionné.";
      error = 1;
    }
  }*/

    if (telephone == '' || telephone.length < 3) {
      error_message = error_message + "* Le numéro de téléphone doit comporter au moins 3 caractères.";
      error = 1;
    }
    if(password.length >0){
		if ( password.length < 5) {
      		error_message = error_message + "* Le mot de passe et la confirmation doivent être identiques et comporter au moins 5 caractères.";
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

