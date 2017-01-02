$(document).ready(function() {
	// add navbar active class
	var current = window.location.href.substring(window.location.href.lastIndexOf('/')+1, window.location.href.lastIndexOf('.'));
	$('#nav_' + current).addClass('active');

	if(current == 'list_all') { // if it is the product page
		// activate seach input bar
		$('#search').css('display', 'block');

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

	// Check username availability
	$("form[name='register_form'] > input[name='username']").on('input', function() {
		if(document.register_form.username.value.length >= 4) {
			// execute with delay?
			checkUsername();
		} else {
			$('.field_error#username').html('');
		}
	});

	// Close error/success messages
	$('.close').click(function() {
	    $(this).parent().fadeOut();
	});

});

// Ajax check is username already exists
function checkUsername() {
	var username = document.register_form.username.value;

  $.getJSON("../../api/users/userexists.php", {username: username}, function(data) {
  	if(data == true) {
			$('.field_error#username').html('Username não disponível');
			$('.field_error#username').css({"font-family": "inital", "color": "red"});
		} else {
			$('.field_error#username').html('&#252;');
			$('.field_error#username').css({"font-family": "wingdings", "color": "green"});
		}
  });
}

function hasNumber(address) {
	return /\d/.test(address);
}

function validateForm() {
	var flagSubmitOk  = true;
	var form          = document.register_form;
	var username      = form.username.value;
	var password      = form.password.value;
	var name          = form.name.value;
	var name_space    = form.name.value.indexOf(" ");
	var zipcode1      = form.zipcode1.value;
	var zipcode2      = form.zipcode2.value;
	var address       = form.address.value;
	var email       = form.email.value;
	var email_at      = form.email.value.indexOf("@");
	var email_dot     = form.email.value.indexOf(".");
	var phone         = form.phone.value;

	$('.field_error').html('');

	// validate username
	if(username.length<4 || username.length>10) {
		$('.field_error#username').html('O username deverá conter no mínimo 4 caracteres e no máximo 10 caracteres');
		flagSubmitOk = false;
	}

	// validate password
	if(password.length<5 || password.length>24) {
		$('.field_error#password').html('A password deverá conter no mínimo 5 caracteres e no máximo 24 caracteres');
		flagSubmitOk = false;
	}

	// valid name
	if(name.length<10) {
		$('.field_error#name').html('O campo de nome deve conter no mínimo 10 caracteres');
		flagSubmitOk = false;
	} else if(name_space == -1) {
		$('.field_error#name').html('Por favor introduza o primeiro e o último nome');
		flagSubmitOk = false;
	}

	// validate address
	if(!hasNumber(address) || address.length<5) {
		$('.field_error#address').html('A morada também deve conter o número da porta');
		flagSubmitOk = false;
	}

	// validate zip code
	if(zipcode1<1000 || zipcode1>9980 || zipcode2<1) {
		$('.field_error#zipcode').html('Código postal incorrecto');
		flagSubmitOk = false;
	}

	if(email_at<0 || email_dot<0) {
		$('.field_error#email').html('E-mail inválido');
		flagSubmitOk = false;
	}

	// validate phone
	if(phone.toString().length<9 || isNaN(parseFloat(phone))) {
		$('.field_error#phone').html('O número de telefone deve conter exatamente 9 dígitos');
		flagSubmitOk = false;
	}

	return flagSubmitOk;
}
/* TODO - apagar isto
function getGetValue(key) {
	var result = null;
	if(window.location.href.indexOf(key)>0) {
		result = window.location.href.substring(window.location.href.indexOf(key+'=')+key.length+1);
		if(result.indexOf('&')>0)
			result  = result.substring(0, result.indexOf('&'));
	}
		return result;
}

function sortProductsBy(sel) {
	var str_aux = "";
	var type = getGetValue('type');
	if(type)
		str_aux += '&type='+type;
	var lower_lim = getGetValue('lower_lim');
	if(lower_lim)
		str_aux += '&lower_lim='+lower_lim;
	var upper_lim = getGetValue('upper_lim');
	if(upper_lim)
		str_aux += '&upper_lim='+upper_lim;

	window.location.assign('list_all.php?sort_by='+sel.value+str_aux);
}
*/

function sortProductsBy(sel, type, lower_lim, upper_lim) {
	var str_aux = "";
	if(type)
		str_aux += "&type="+type;
	if(lower_lim)
		str_aux += "&lower_lim"+lower_lim;
	if(upper_lim)
		str_aux += "&upper_lim"+upper_lim;

	window.location.assign('list_all.php?sort_by='+sel.value+str_aux);
}
