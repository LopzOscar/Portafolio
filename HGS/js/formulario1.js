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
			 cadenas:{ required: true, latinos: true, minlength: 1, maxlength: 20 },
			 letras:{ required: true, letras: true, minlength: 1, maxlength: 20 },
			 nombre:{ required: true, letras: true, latinos: true, minlength: 1, maxlength: 20 },	
			 apellPat:{ required: true, letras: true, minlength: 3, maxlength: 25 },
			 apellMat:{ required: true, letras: true, minlength: 1, maxlength: 20 },
			 email:{ required: true, email: true, minlength: 1, maxlength: 20},
			 numeros: { required: true, digits: true, minlength: 1, maxlength: 20}
			},

			messages:

			{

			cadenas: { required: "El campo es requerido", latinos: "Solo se adminiten letras y numeros",
			minlength: "Al menos un caracter", maxlength:"Solo 20 caracteres" },

			letras: { required: "El campo es requerido", letras: "Solo se adminiten letras", 
			minlength: "Al menos tres caracteres", maxlength:"Sólo 25 caracteres" },

			nombre: { required: "El campo es requerido", letras: "Solo se adminiten letras", 
			minlength: "Al menos un caracter", maxlength:"Solo 20 caracteres" },
			
			apellPat: { required: "El campo es requerido", letras: "Solo se adminiten letras", 
			minlength: "Al menos un caracter", maxlength:"Solo 20 caracteres" },

			apellMat: { required: "El campo es requerido", letras: "Solo se adminiten letras", 
			minlength: "Al menos un caracter", maxlength:"Solo 20 caracteres" },

			email:{ required: "El campo es requerido", email: "Debe introducir un email valido", 
			minlength: "Al menos un caracter", maxlength:"Solo20 caracteres" },
			
			numeros: { required: "El campo es requerido", digits: "Solo se adminiten numeros", minlength: "Al menos un caracter", 
			maxlength:"Solo 20 caracteres" }
			}

		});
	});
});