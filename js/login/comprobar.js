$(document).ready(function(){

	$("#email").on("keyup",function(){
		if($(this).val()==""){
			$("#mensaje1").fadeIn();
		}
		else{
			$("#mensaje1").fadeOut();
		}
	})

	$("#contraseña").on("keyup",function(){
		if($(this).val()==""){
			$("#mensaje2").fadeIn();
		}
		else{
			$("#mensaje2").fadeOut();
		}
	})

	$("#boton_iniciar_sesion").click(function(){

		var email=$("#email").val();
		var contraseña=$("#contraseña").val();

		$.get("controlador/ajaxLogin.php",{email:email,contraseña:contraseña},function(resultado){
			if(resultado){
				$(location).attr('href',"pagina_principal.php");
			}
			else{
				$("#mensaje3").fadeIn();
			}

		})

		if(email==""){
			$("#mensaje1").fadeIn();
		}
		else{
			$("#mensaje1").fadeOut();
			if(contraseña==""){
				$("#mensaje2").fadeIn();
			}
			else{
				$("#mensaje2").fadeOut();
			}
		}

	})

})




