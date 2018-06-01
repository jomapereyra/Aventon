$(document).ready(function(){

	$("#patente").on("keyup blur",function(){
		var patente=$("#patente").val();
		var especiales="^[A-Z0-9_ ]{0,30}$";
		if(patente==""){
			$("#mensaje1").fadeIn();
		}
		else{
			$("#mensaje1").fadeOut();
		}
		if(!patente.match(especiales)){
			$("#mensaje1_1").fadeIn();
		}
		else{
			$("#mensaje1_1").fadeOut();
		}
	})

	$("#marca").on("keyup blur",function(){
		var marca=$("#marca").val();
		if(marca==""){
			$("#mensaje2").fadeIn();
		}
		else{
			$("#mensaje2").fadeOut();
		}
	})

	
	$("#modelo").on("keyup blur",function(){
		var modelo=$("#modelo").val();
		if(modelo==""){
			$("#mensaje3").fadeIn();
		}
		else{
			$("#mensaje3").fadeOut();
		}
	})

	$("#año").on("keyup blur",function(){
		var año=$("#año").val();
		var fecha=new Date();
		var año_actual=fecha.getFullYear();
		if(año==""){
			$("#mensaje4").fadeIn();
		}
		else{
			$("#mensaje4").fadeOut();
		}
		if(año>año_actual){
			$("#mensaje4_1").fadeIn();
		}
		else{
			$("#mensaje4_1").fadeOut();
		}
	})

	$("#tipo_vehiculo").click(function(){
		var tipo=$("#tipo_vehiculo").val();
		if(tipo==""){
			$("#mensaje5").fadeIn();
		}
		else{
			$("#mensaje5").fadeOut();
		}
	})

	$("#asientos").on("keyup blur",function(){
		var asientos=$("#asientos").val();
		if(asientos==""){
			$("#mensaje6").fadeIn();
		}
		else{
			$("#mensaje6").fadeOut();
		}
	})

});

function validar(){

	var patente=$("#patente").val();
	var marca=$("marca").val();
	var modelo=$("#modelo").val();
	var año=$("#año").val();
	var tipo=$("#tipo_vehiculo").val();
	var cant=$("#asientos").val();
	var especiales="^[A-Z0-9_ ]{0,30}$";

	if(patente==""){
		$("#mensaje1").fadeIn();
		return false;
	}
	else{
		$("#mensaje1").fadeOut();
		if(!patente.match(especiales)){
			$("#mensaje1_1").fadeIn();
			return false;
		}
		else{
			$("#mensaje1_1").fadeOut();
			if (marca==""){
				$("#mensaje2").fadeIn();
				return false;
			}
			else{
				$("#mensaje2").fadeOut();
				if(modelo==""){
					$("#mensaje3").fadeIn();
					return false;
				}
				else{
					$("#mensaje3").fadeOut();
					if(año==""){
						$("#mensaje4").fadeIn();
					}
					else{
						$("#mensaje4").fadeOut();
						if(tipo==""){
							$("#mensaje5").fadeIn();
							return false;
						}
						else{
							$("#mensaje5").fadeOut();
							if(cant==""){
								$("#mensaje6").fadeIn();
								return false;
							}
							else{
								return true;
							}
						}
					}
					
				}
			}

		}
	}
}
