<script>
	//funcion auto invocada
	(function(){
		//cero significa a cual formName entrara
		var form = document.getElementsByName('formuser')[0],campos=form.elements,boton=document.getElementById('validar');

	
		
		var validarNombre=function(pd){
			if (form.nombre.value==0){
				alert('El campo "Nombre" está vacío');
				pd.preventDefault();

			}
		};


		var validarApellidoPat=function(pd){
			if (form.app.value==0){
				alert('El campo "Apellido Paterno" está vacío');
				pd.preventDefault();
			}
		};

		
		var validarApellidoMat=function(pd){
			if (form.apm.value==0){
				alert('El campo "Apellido Materno" está vacío');
				pd.preventDefault();
			}
		};

			var validarArea=function(pd){
			if (form.id_area.value==0){
				alert('El campo "Área" está vacío');
				pd.preventDefault();
			}
		};

		var validarFechaN=function(pd){
			if (form.fechaNac.value==0){
				alert('Fecha invalida');
				pd.preventDefault();
			}
		};

		var validarCalle=function(pd){
			if (form.calle.value==0){
				alert('El campo "Calle" está vacío');
				pd.preventDefault();
			}
		};
		


		var validarColonia=function(pd){
			if (form.colonia.value==0){
				alert('El campo "Colonia" está vacío');
				pd.preventDefault();
			}
		};

		
		var validarNumExt=function(pd){
			if (form.numExt.value==0){
				alert('El campo "Número Exterior" está vacío');
				pd.preventDefault();
			}
		};

		

		var validarTelefono=function(pd){
			if (form.telefono.value==0){
				alert('El campo "Telefono" está vacío');
				pd.preventDefault();
			}
		};


		var validarPassword=function(pd){
			if (form.password.value==0){
				alert('El campo "Password" está vacío');
				pd.preventDefault();
			}
		};


		var validarCampos=function(pd){
			validarNombre(pd); 
			validarApellidoPat(pd); 
			validarApellidoMat(pd); 
			validarArea(pd);  
			validarFechaN(pd);
			validarCalle(pd); 
			validarColonia(pd); 
			validarNumExt(pd); 
			validarTelefono(pd); 
			validarPassword(pd); 
			reload();
		};

		form.addEventListener('submit',validarCampos);


	}())
</script>



