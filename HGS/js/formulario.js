
//Validar espacios
	//funcion auto invocada
	(function(){
		//cero significa a cual formName entrara
		var form = document.getElementsByName('formulario')[0],campos=form.elements,boton=document.getElementById('btn');

		var validarTodos=function(pd){
			if (form.nombre.value==0 || form.apellidoPat.value==0 || form.apellidoMat.value==0 || form.noControl.value==0 || form.noSegSoc.value==0 || form.calle.value==0 || form.colonia.value==0){
				
				alert('Revisar!!!\nAlgunos campos son inválidos.');
				pd.preventDefault();
			};
		};
		
		var validarCampos=function(pd){
			validarTodos(pd);
		};

		form.addEventListener('submit',validarCampos);
	}())


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
			 
			 
			 nombre:{ required: true, letras: true, minlength: 1, maxlength: 25 },
			 
			 apellidoPat:{ required: true, letras: true, minlength: 1, maxlength: 25 },
			 
			 apellidoMat:{ required: true, letras: true, minlength: 1, maxlength: 25 },
			 
			 email:{ required: true, email: true, minlength: 1, maxlength: 20},
			 
			 mensaje:{ required: true, latinos: true, minlength: 1, maxlength: 100 },

			 password:{ required: true, latinos: true, minlength: 1, maxlength: 25 },
			
			 url:{ required: true, letras: true, minlength: 1, maxlength: 100 }

					 
			},

			messages:

			{
				
			nombre: { required: "El campo es requerido", letras: "Solo se adminiten letras", 
			minlength: "Al menos un caracter", maxlength:"Solo 20 caracteres" },

			apellidoPat: { required: "El campo es requerido", letras: "Solo se adminiten letras", 
			minlength: "Al menos un caracter", maxlength:"Solo 20 caracteres" },

			apellidoMat: { required: "El campo es requerido", letras: "Solo se adminiten letras", 
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