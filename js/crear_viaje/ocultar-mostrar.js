$("#etapa2").hide();
$("#etapa3").hide();
$("#etapa4").hide();
$(document).ready(function(){

	/* *********************** ETAPA 1 ************************ */

	$("#provincia_origen").change(function(){
		var provincia=$("#provincia_origen").val();
		if(provincia==""){
			$("#mensaje1").fadeIn();
		}
		else{
			$("#mensaje1").fadeOut();
		}
	})

	$("#calle_origen").blur(function(){
		var calle=$("#calle_origen").val();
		var especiales="^[A-Za-z0-9_]{0,30}$";
		if(calle==""){
			$("#mensaje2").fadeIn();
		}
		else{
			$("#mensaje2").fadeOut();
		}
		if(!calle.match(especiales)){
			$("#mensaje2_1").fadeIn();
		}
		else{
			$("#mensaje2_1").fadeOut();
		}
	})

	
	$("#numero_origen").blur(function(){
		var numero=$("#numero_origen").val();
		if(numero==""){
			$("#mensaje3").fadeIn();
		}
		else{
			$("#mensaje3").fadeOut();
		}
	})


	$("#boton_etapa1").click(function(){

		var provincia=$("#provincia_origen").val();
		var calle=$("#calle_origen").val();
		var numero=$("#numero_origen").val();
		var especiales="^[A-Za-z0-9_]{0,30}$";

		if(provincia==""){
			$("#mensaje1").fadeIn();
		}
		else{
			$("#mensaje1").fadeOut();
			if (calle==""){
				$("#mensaje2").fadeIn();
			}
			else{
				$("#mensaje2").fadeOut();
				if(!calle.match(especiales)){
					$("#mensaje2_1").fadeIn();
				}
				else{
					$("#mensaje2_1").fadeOut();
					if(numero==""){
						$("#mensaje3").fadeIn();
					}
					else{
						$("#etapa1").hide();
						$("#etapa2").show();
					}
				}
				
			}
		}

	});

	/* **************************** ETAPA 2 ************************************* */

	$("#provincia_destino").change(function(){
		var provincia=$("#provincia_destino").val();
		if(provincia==""){
			$("#mensaje4").fadeIn();
		}
		else{
			$("#mensaje4").fadeOut();
		}
	})

	$("#calle_destino").blur(function(){
		var calle=$("#calle_destino").val();
		var especiales="^[A-Za-z0-9_]{0,30}$";
		if(calle==""){
			$("#mensaje5").fadeIn();
		}
		else{
			$("#mensaje5").fadeOut();
		}
		if(!calle.match(especiales)){
			$("#mensaje5_1").fadeIn();
		}
		else{
			$("#mensaje5_1").fadeOut();
		}
	})

	
	$("#numero_destino").blur(function(){
		var numero=$("#numero_destino").val();
		if(numero==""){
			$("#mensaje6").fadeIn();
		}
		else{
			$("#mensaje6").fadeOut();
		}
	})


	$("#boton_etapa2").click(function(){
		var provincia=$("#provincia_destino").val();
		var calle=$("#calle_destino").val();
		var numero=$("#numero_destino").val();
		var especiales="^[A-Za-z0-9_]{0,30}$";

		if(provincia==""){
			$("#mensaje4").fadeIn();
		}
		else{
			$("#mensaje4").fadeOut();
			if (calle==""){
				$("#mensaje5").fadeIn();
			}
			else{
				$("#mensaje5").fadeOut();
				if(!calle.match(especiales)){
					$("#mensaje5_1").fadeIn();
				}
				else{
					$("#mensaje5_1").fadeOut();
					if(numero==""){
						$("#mensaje6").fadeIn();
					}
					else{
						$("#etapa2").hide();
						$("#etapa3").show();
					}
				}
				
			}
		}
	})

	$("#volver_etapa1").click(function(){
		$("#etapa2").hide();
		$("#etapa1").show();
	})

	/* ****************** ETAPA 3 ******************************* */

	$("#boton_etapa3").click(function(){
		
		var fecha_partida=$("#fecha_partida").val();
		var hora_partida=$("#hora_partida").val();
		var fecha_llegada=$("#fecha_llegada").val();
		var hora_llegada=$("#hora_llegada").val();
		

		if(fecha_partida==""){
			$("#mensaje7").fadeIn();
		}
		else{
			$("#mensaje7").fadeOut();
			if (hora_partida==""){
				$("#mensaje8").fadeIn();
			}
			else{
				$("#mensaje8").fadeOut();
				if(fecha_llegada==""){
					$("#mensaje9").fadeIn();
				}
				else{
					$("#mensaje9").fadeOut();
					if(hora_llegada==""){
						$("#mensaje10").fadeIn();
					}
					else{
						$("#mensaje10").fadeOut();
						$("#etapa3").hide();
						$("#etapa4").show();
					}
				}		
			}
		}
	})

	$("#volver_etapa2").click(function(){
		$("#etapa3").hide();
		$("#etapa2").show();
	})

	/* ****************** ETAPA 4 ******************************* */

	$("#volver_etapa3").click(function(){
		$("#etapa4").hide();
		$("#etapa3").show();
	})


})