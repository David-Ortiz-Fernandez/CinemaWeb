$(document).ready(function(){

	$(".campoEmail").change(function(){

		verifyUser();
	});
});

function verifyUser(){

	var urlweb="includes/comprobarUsuario.php";
	var exp = /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/;
	var correo = $(".campoEmail").val();


	var datos = {
	email:correo
	};

	var request = $.ajax({
	url: urlweb,
	type: "get",
	data: datos,
	success: function(response) {
		if ( response=="Existe" && exp.test(correo)) {

		$(".noimg1").css("display", "inline-block");

		$(".okimg1").css("display", "none");
	} else if ( response=="Existe" && !exp.test(correo) ){

		$(".noimg1").css("display", "inline-block");

		$(".okimg1").css("display", "none");

	}else if ( response=="Disponible" && exp.test(correo) ){

		$(".okimg1").css("display", "inline-block");

		$(".noimg1").css("display", "none");

	}else if ( response=="Disponible" && !exp.test(correo) ){

		$(".noimg1").css("display", "inline-block");

		$(".okimg1").css("display", "none");
	}
		},

	error: function() {
		alert('error');
	}
	});

}
