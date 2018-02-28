function check(input) {


	  if (input.value != document.getElementById('passe').value) {
		input.setCustomValidity('Les deux mots de passe ne correspondent pas.');
		 alert("MDP different");
	  } else {
		// le champ est valide : on réinitialise le message d'erreur
		input.setCustomValidity('');
	  }

}
