$(function() {

	$.validator.addMethod('latinos', function(value, element){
		return this.optional(element)|| /^[0-9a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/.test(value);
	});

	$.validator.addMethod('letras', function(value, element){
		return this.optional(element)|| /^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/.test(value);
	});

	$("#btn").on("click", function(){

		$("#formulario").validate({

			rules:

			{
			 cadenas:{ required: true, latinos: true, minlength: 1, maxlength: 300 },
			 letras:{ required: true, letras: true, minlength: 1, maxlength: 20 },	
			 apellPat:{ required: true, letras: true, minlength: 1, maxlength: 20 },
			 apellMat:{ required: true, letras: true, minlength: 1, maxlength: 20 },
			 email:{ required: true, email: true, minlength: 1, maxlength: 20},
			 url:{ required: true, letras: true, minlength: 1, maxlength: 100 },
			 password:{ required: true, numeros: true, minlength: 1, maxlength: 20 },
			 
			},

			messages:

			{

			cadenas: { required: "<p>El campo es requerido</p>", latinos: "Solo se adminiten letras y numeros",
			minlength: "Al menos un caracter", maxlength:"Solo 300 caracteres" },

			letras: { required: "El campo es requerido", letras: "Solo se adminiten letras", 
			minlength: "Al menos un caracter", maxlength:"Solo 20 caracteres" },

			apellPat: { required: "El campo es requerido", letras: "Solo se adminiten letras", 
			minlength: "Al menos un caracter", maxlength:"Solo 20 caracteres" },

			apellMat: { required: "El campo es requerido", letras: "Solo se adminiten letras", 
			minlength: "Al menos un caracter", maxlength:"Solo 20 caracteres" },

			email:{ required: "El campo es requerido", email: "Debe introducir un email valido", 
			minlength: "Al menos un caracter", maxlength:"Solo20 caracteres" },
			
			url: { required: "El campo es requerido", latinos: "debe introducir una url balida", 
			minlength: "Al menos un caracter", maxlength:"Solo 100 caracteres" },

			password: { required: "El campo es requerido", letras: "debe introducir una url balida", 
			minlength: "Al menos un caracter", maxlength:"Solo 20 caracteres" },
			
			}

		});
	});
});