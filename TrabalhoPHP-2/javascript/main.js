$(document).ready(function() {
	// add navbar active class
	var current = window.location.href.substring(window.location.href.lastIndexOf('/')+1, window.location.href.lastIndexOf('.'));
	$('#nav_' + current).addClass('active');

	if(current == 'list_all') {
		// add subnavbar active class (only on products page)
		if(window.location.href.indexOf('type=')>0) {
			var type = window.location.href.substring(window.location.href.lastIndexOf('type=')+5);
			$('#subnav_' + type).addClass('active');
		}

		// add page numbers active style (only on products page)
		if(window.location.href.indexOf('pg=') > 0) {
			if(window.location.href.indexOf('&') > 0)
				var page_num = window.location.href.substring(window.location.href.lastIndexOf('pg=')+3, window.location.href.indexOf('&'));
			else
				var page_num = window.location.href.substring(window.location.href.lastIndexOf('pg=')+3);
		} else {
			page_num = 1;
		}

		$('#pg_' + page_num).addClass('active');
	}
});
/*
function validateForm() {
	var flagSubmitOk  = true;
	var user_type     = "<?php echo $user_type ?>";
	var form          = document.register_form;
	var username      = form.username.value;
	var password      = form.password.value;

	// validate username
	if(username.length<4 || username.length>10) {
		alert("O username deverá conter no mínimo 4 caracteres e no máximo 10 caracteres");
		$('.field_error#username').html('Oooops');
		flagSubmitOk = false;
	}

	// validate password
	if(password.length<5 || password.length>24) {
		alert("A password deverá conter no mínimo 5 caracteres e no máximo 24 caracteres.");
		flagSubmitOk = false;
	}
	if(user_type=="cliente") {
		var email_pos_at      = form.email.value.indexOf("@");
		var email_pos_dot     = form.email.value.indexOf(".");
		var codigo_postal1    = form.postalcode1.value;
		var codigo_postal2    = form.postalcode2.value;
		var address           = form.address.value;
		var name              = form.name.value;
		var name_pos_space    = form.name.value.indexOf(" ");
		var phone_number      = form.phone_number.value;

		// validate name
		if(name.length<10) {
			alert("O campo de nome deve conter no mínimo 10 caracteres");
			flagSubmitOk = false;
		}
		else if(name_pos_space==-1) {
			alert("Por favor introduza o primeiro e o último nome");
			flagSubmitOk = false;
		}

		// validate email address
		if(email_pos_at==-1 || email_pos_dot<email_pos_at) {
			alert("O Endereço de email não é válido porque não contém o caracter @ e conter o . a seguir ao @");
			flagSubmitOk = false;
		}

		// validate address
		if(!hasNumber(address)) {
			alert("A morada também deve conter o número da porta");
			flagSubmitOk = false;
		}

		// validate zip code
		if(codigo_postal1<1000 || codigo_postal1>9980) {
			alert("Código postal incorreto. Deve ser válido e estar entre o intervalo 1000-9980");
			flagSubmitOk = false;
		}

		// validate phone_number
		if(phone_number.toString().length<9 || isNaN(parseFloat(phone_number))) {
			alert("O número de telefone deve conter exatamente 9 dígitos");
			flagSubmitOk = false;
		}
	}

	return flagSubmitOk;
}*/
