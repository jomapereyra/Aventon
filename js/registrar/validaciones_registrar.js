$(document).ready(function(){

	$("#nombre_usuario").change(function(){
		var nombre=$("#nombre_usuario").val();
		var especiales="^[A-Za-z0-9]{0,30}$";
		if(nombre==""){
			$("#mensaje1").fadeIn();
		}
		else{
			$("#mensaje1").fadeOut();
		}
		if (!nombre.match(especiales)) {
			$("#mensaje1_1").fadeIn();
		}
		else{
			$("#mensaje1_1").fadeOut();
		}
	})

	$("#apellido_usuario").change(function(){
		var apellido=$("#apellido_usuario").val();
		var especiales="^[A-Za-z0-9]{0,30}$";
		if(apellido==""){
			$("#mensaje2").fadeIn();
		}
		else{
			$("#mensaje2").fadeOut();
		}
		if (!apellido.match(especiales)) {
			$("#mensaje2_1").fadeIn();
		}
		else{
			$("#mensaje2_1").fadeOut();
		}
	})

	$("#email_usuario").change(function(){
		var email=$("#email_usuario").val();
		var hotmail= email.indexOf("@hotmail.com");
		var gmail= email.indexOf("@gmail.com");
		var yahoo= email.indexOf("@yahoo.com");

		$("#mensaje8").fadeOut();
		
		if(email==""){
			$("#mensaje3").fadeIn();
			
		}
		else{
			$("#mensaje3").fadeOut();
		}
		if(hotmail == "-1" && gmail == "-1" && yahoo =="-1"){
			$("#mensaje3").fadeIn();
		}
		else{
			$("#mensaje3").fadeOut();
		}

	})

	$("#contraseña").change(function(){
		var contraseña=$("#contraseña").val();
		if(contraseña==""){
			$("#mensaje4").fadeIn();
		}
		else{
			$("#mensaje4").fadeOut();
			if (contraseña.length < 8) {
				$("#mensaje4_1").fadeIn();
			}
			else{
				$("#mensaje4_1").fadeOut();
				if (contraseña.length > 20) {
					$("#mensaje4_2").fadeIn();
				}
				else{
					$("#mensaje4_2").fadeOut();
				}
			}
		}		
	})

	$("#confirmar_contraseña").change(function(){
		var contraseña=$("#contraseña").val();
		var contraseña1=$("#confirmar_contraseña").val();
		if (!(contraseña1==contraseña)) {
			$("#mensaje5_1").fadeIn();
		}
		else{
			$("#mensaje5_1").fadeOut();
			if(contraseña1==""){
				$("#mensaje5").fadeIn();
			}
			else{
				$("#mensaje5").fadeOut();
			}
		}
		
	})

	$("#telefono_usuario").change(function(){
		var telefono=$("#telefono_usuario").val();
		var especiales="^[0-9]{0,30}$";
		if(telefono==""){
			$("#mensaje7").fadeIn();
		}
		else{
			$("#mensaje7").fadeOut();
		}
		if (!telefono.match(especiales)) {
			$("#mensaje7_1").fadeIn();
		}
		else{
			$("#mensaje7_1").fadeOut();
		}
		if (telefono.length < 11) {
			$("#mensaje7_1").fadeIn();
		}
		else{
			$("#mensaje7_1").fadeOut();
			if (telefono.length > 13) {
				$("#mensaje7_1").fadeIn();
			}
			else{
				$("#mensaje7_1").fadeOut();
			}
		}
	})

	$("#boton_reg").click(function(){

		var nombre=$("#nombre_usuario").val();
		var apellido=$("#apellido_usuario").val();
		var email=$("#email_usuario").val();
		var contraseña=$("#contraseña").val();
		var confirmar_contraseña=$("#confirmar_contraseña").val();
		var fecha_nacimiento=$("#fecha_nacimiento").val();
		var telefono=$("#telefono_usuario").val();
		var fecha=new Date();
		fecha.setDate(fecha.getDate());
		dia=fecha.getDate();
		mes=fecha.getMonth()+1;
		año=fecha.getFullYear()-18;

		if(dia<10){
			dia='0'+dia;
		} 
		if(mes<10){
			mes='0'+mes;
		}

		var fecha_menor= String(año+"-"+mes+"-"+dia);


		if(nombre==""){
			$("#mensaje1").fadeIn();
		}
		else{
			$("#mensaje1").fadeOut();
			if(apellido==""){
				$("#mensaje2").fadeIn();
			}
			else{
				$("#mensaje2").fadeOut();
				if(email==""){
					$("#mensaje3").fadeIn();
				}
				else{
					$("#mensaje3").fadeOut();
					if(contraseña==""){
						$("#mensaje4").fadeIn();
					}
					else{
						$("#mensaje4").fadeOut();
						if (!(confirmar_contraseña==contraseña)) {
							$("#mensaje5_1").fadeIn();
						}
						else{
							$("#mensaje5_1").fadeOut();
							if(fecha_nacimiento==""){
								$("#mensaje6").fadeIn();
							}
							else{
								$("#mensaje6").fadeOut();
								if(fecha_nacimiento>fecha_menor){
									$("#mensaje6_1").fadeIn();
								}
								else{
									$("#mensaje6_1").fadeOut();
									if(telefono==""){
										$("#mensaje7").fadeIn();
									}
									else{
										$("#mensaje7").fadeOut();
										$.get("controlador/ajaxRegistrar.php",{email:email,nombre_usuario:nombre,apellido_usuario:apellido,contraseña:contraseña,fecha_nacimiento:fecha_nacimiento,telefono_usuario:telefono},function(resultado){
											if(!resultado){
												alert("Usuario registrado correctamente");
												$(location).attr('href',"index.php");
											}
											else{
												$("#mensaje8").fadeIn();
											}

										})
									}

								}
							}
						}
					}
				}
			}
		}

	})
})






