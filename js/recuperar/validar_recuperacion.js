$(document).ready(function(){
	$("#email_usuario").on("change",function(){
		var email=$("#email_usuario").val();
		var hotmail= email.indexOf("@hotmail.com");
		var gmail= email.indexOf("@gmail.com");
		var yahoo= email.indexOf("@yahoo.com");
		if(email==""){
			$("#mensaje1").fadeIn();
		}
		else{
			$("#mensaje1").fadeOut();
		}
		if(hotmail == "-1" && gmail == "-1" && yahoo =="-1"){
			$("#mensaje1").fadeIn();
		}
		else{
			$("#mensaje1").fadeOut();
		}
	})
	$("#pregunta").on("keyup blur",function(){
		var pregunta=$("#pregunta").val();
		if(pregunta==""){
			$("#mensaje2").fadeIn();
		}
		else{
			$("#mensaje2").fadeOut();
		}
	})
	$("#respuesta").on("change",function(){
		var respuesta=$("#respuesta").val();
		if(respuesta==""){
			$("#mensaje3").fadeIn();
		}
		else{
			$("#mensaje3").fadeOut();
		}
	})
	$("#boton_conf").click(function(){
		var email=$("#email_usuario").val();
		var pregunta=$("#pregunta").val();
		var respuesta=$("#respuesta").val();
		var ok=new Array();
		if(email==""){
			$("#mensaje1").fadeIn();
			ok[0]=false;
		}
		else{
			$("#mensaje1").fadeOut();
			ok[0]=true;
		}
		if(pregunta==""){
			$("#mensaje2").fadeIn();
			ok[1]=false;
		}
		else{
			$("#mensaje2").fadeOut();
			ok[1]=true;
		}
		if(respuesta==""){
			$("#mensaje3").fadeIn();
			ok[2]=false;
		}
		else{
			$("#mensaje3").fadeOut();
			ok[2]=true;
		}
		if(!ok.includes(false)){
			$.get("controlador/verificar_datos.php",{email:email,pregunta:pregunta,respuesta:respuesta},function(resultado){
				if (resultado) {
					location.href="http://localhost/Aventon/cambiar.php";
				}
				else{
					alert("Datos incorrectos");
					$("#mensaje4").fadeIn();
				}
			})
			
		}

	})


})