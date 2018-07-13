$(document)
.on("submit", "form.js-register", function(event){
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);
	var dataObj = {
		fname 		: $("#fname", _form).val(),
		lname 		: $("#lname", _form).val(),
		county 		: $("#form-s-s", _form).val(),
		addr 		: $("#addr", _form).val(),
		cnp 		: $("#cnp", _form).val(),
		sn 			: $("#sn", _form).val(),
		email 		: $("#email", _form).val(),
		password 	: $("#pass", _form).val()
	}

	if (dataObj.fname.length <3 || dataObj.fname.length>15) {
		_error
			.text("The first name does not fit required length")
			.show();
		return false;
	}else if (dataObj.lname.length <3 || dataObj.lname.length>15){
		_error
			.text("The last name does not fit required length")
			.show();
		return false;
	}else if (dataObj.addr.length < 6){
		_error
			.text("Please enter a valid email address")
			.show();
		return false;
	}else if (dataObj.cnp.length != 13){
		_error
			.text("The CNP must be 13 digits!")
			.show();
		return false;
	}else if (dataObj.sn.length != 8){
		_error
			.text("Series and Number must be 8 characters long")
			.show();
		return false;
	}else if (dataObj.email.length < 6){
		_error
			.text("Please enter a valid email address")
			.show();
		return false;
	}else if (dataObj.password.length < 11){
		_error
			.text("Please enter at least an 11 char password")
			.show();
		return false;
	}

	//_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/register.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data){
		//Whatever data is
		if(data.redirect !== undefined){
			window.location = data.redirect;
		} else if (data.error !== undefined){
			_error
				.text(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e){
		//This failed
	})
	.always(function ajaxAlwaysDoThis(data){
		//Always do
		console.log('Always');
	})

	
	//alert('form was submitted');

	return false;
})

//LOGIN
.on("submit", "form.js-login", function(event){
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);
	var dataObj = {
		email : $("#email", _form).val(),
		password : $("#pass", _form).val()
	}

	if (dataObj.email.length < 6){
		_error
			.text("Please enter a valid email address")
			.show();
		return false;
	}else if (dataObj.password.length < 11){
		_error
			.text("Please enter at least an 11 char password")
			.show();
		return false;
	}

	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/login.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data){
		//Whatever data is
		if(data.redirect !== undefined){
			window.location = data.redirect;
		} else if (data.error !== undefined){
			_error
				.html(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e){
		//This failed
	})
	.always(function ajaxAlwaysDoThis(data){
		//Always do
		console.log('Always');
	})

	
	//alert('form was submitted');

	return false;
})

//PASSWORD RESET
.on("submit", "form.js-passreset", function(event){
	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);
	var dataObj = {
		email : $("#email", _form).val()
	}

	if (dataObj.email.length < 6){
		_error
			.text("Please enter a valid email address")
			.show();
		return false;
	}

	//_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/forgotPassword.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data){
		//Whatever data is
		if(data.redirect !== undefined){
			window.location = data.redirect;
		} else if (data.error !== undefined){
			_error
				.html(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e){
		//This failed
	})
	.always(function ajaxAlwaysDoThis(data){
		//Always do
		console.log('Always');
	})

	
	alert('form was submitted');

	return false;
})