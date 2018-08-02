$(document).ready(function(){
	$("#contraseña").change(function(){
		var contraseña=$("#contraseña").val();
		if(contraseña==""){
			$("#mensaje1").fadeIn();
		}
		else{
			$("#mensaje1").fadeOut();
			if (contraseña.length < 8) {
				$("#mensaje1_1").fadeIn();
			}
			else{
				$("#mensaje1_1").fadeOut();
				if (contraseña.length > 20) {
					$("#mensaje1_2").fadeIn();
				}
				else{
					$("#mensaje1_2").fadeOut();
				}
			}
		}		
	})

	$("#confirmar_contraseña").change(function(){
		var contraseña=$("#contraseña").val();
		var contraseña1=$("#confirmar_contraseña").val();
		if (!(contraseña1==contraseña)) {
			$("#mensaje2_1").fadeIn();
		}
		else{
			$("#mensaje2_1").fadeOut();
			if(contraseña1==""){
				$("#mensaje2").fadeIn();
			}
			else{
				$("#mensaje2").fadeOut();
			}
		}
		
	})

	$("#boton_camb").click(function(){
		var contraseña=$("#contraseña").val();
		var contraseña1=$("#confirmar_contraseña").val();
		var email=$("#email").val();
		var ok= new Array();
		if(contraseña==""){
			$("#mensaje1").fadeIn();
			ok[0]=false;
		}
		else{
			$("#mensaje1").fadeOut();
			if (contraseña.length < 8) {
				$("#mensaje1_1").fadeIn();
				ok[0]=false;
			}
			else{
				$("#mensaje1_1").fadeOut();
				if (contraseña.length > 20) {
					$("#mensaje1_2").fadeIn();
					ok[0]=false;
				}
				else{
					$("#mensaje1_2").fadeOut();
					ok[0]=true;
				}
			}
		}
		if (!(contraseña1==contraseña)) {
			$("#mensaje2_1").fadeIn();
			ok[1]=false;
		}
		else{
			$("#mensaje2_1").fadeOut();
			if(contraseña1==""){
				$("#mensaje2").fadeIn();
				ok[1]=false;
			}
			else{
				$("#mensaje2").fadeOut();
				ok[1]=true;
			}
		}
		if(!ok.includes(false)){
			$.get("sarasa.php",{email:email,contraseña:contraseña},function(resultado){
				alert("contraseña cambiada correctamente");
				location.href="http://localhost/Aventon/index.php";
			});
			
		}
	})
	
})