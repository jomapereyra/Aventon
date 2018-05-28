$("#etapa2").hide();
$("#etapa3").hide();
$("#etapa4").hide();
$("#etapa5").hide();
$("#etapaExtra").hide();
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
		var fecha=new Date();
		var dia=fecha.getDate();
		var mes=fecha.getMonth()+1;
		var año=fecha.getFullYear();
		var horas=fecha.getHours()+2;
		var minutos=fecha.getMinutes();
		
		/* ****************** EL COMPORTMAIENTO DEPENDE DE LA DIFERENCIA HORARIA ********** */

		if(horas>24){
			horas='01';
			fecha.setDate(fecha.getDate()+1);
			dia=fecha.getDate();
			mes=fecha.getMonth()+1;
			año=fecha.getFullYear();
		}
		else{
			if(horas==24){
				horas='00';
			}
			else{
				if(horas<10){
					horas='0'+horas;
				} 
			}
		}

		/* ******************* EN CUALQUIERA DE LOS CASOS SE HACE ESTO ************* */

		if(dia<10){
			dia='0'+dia;
		} 
		if(mes<10){
			mes='0'+mes;
		}
		
		if(minutos<10){
			minutos='0'+minutos;
		}

		var fecha_actual=String(año+"-"+mes+"-"+dia);
		
		var hora_minima=String(horas+":"+minutos);
		
		if(fecha_partida==""){
			$("#mensaje7").fadeIn();
		}
		else{
			$("#mensaje7").fadeOut();
			if(fecha_partida<fecha_actual){
				$("#mensaje7_1").fadeIn();
			}
			else{
				$("#mensaje7_1").fadeOut();
				if (hora_partida==""){
					$("#mensaje8").fadeIn();
				}
				else{
					$("#mensaje8").fadeOut();
					if(fecha_partida==fecha_actual && hora_partida<hora_minima){
						$("#mensaje8_1").fadeIn();
					}
					else{
						$("#mensaje8_1").fadeOut();
						if(fecha_llegada==""){
							$("#mensaje9").fadeIn();
						}
						else{
							$("#mensaje9").fadeOut();
							if(fecha_llegada<fecha_partida){
								$("#mensaje9_1").fadeIn();
							}
							else{
								$("#mensaje9_1").fadeOut();
								if(hora_llegada==""){
									$("#mensaje10").fadeIn();
								}
								else{
									$("#mensaje10").fadeOut();
									if(fecha_partida==fecha_llegada && hora_llegada<hora_partida){
										$("#mensaje10_1").fadeIn();
									}
									else{
										$("#mensaje10_1").fadeOut();
										$("#etapa3").hide();
										$("#etapaExtra").show();
									}
								}
							}
							
						}
					}

				}	
			}
			
		}
	})

	$("#volver_etapa2").click(function(){
		$("#etapa3").hide();
		$("#etapa2").show();
	})

	/* ****************** ETAPA EXTRA ******************************* */

	$("#boton_etapaExtra").click(function(){
		if($("#vehiculo").val()===""){
			$("#mensaje13").fadeIn();
		}
		else{
			$("#mensaje13").fadeOut();
			$("#etapaExtra").hide();
			$("#etapa4").show();
		}
	})

	$("#vehiculo").on("change focus",function(){
		if($("#vehiculo").val()===""){
			$("#mensaje13").fadeIn();
		}
		else{
			$("#mensaje13").fadeOut();
		}
	})

	$("#volver_etapa3").click(function(){
		$("#etapaExtra").hide();
		$("#etapa3").show();
	})

	/* ****************** ETAPA 4 ******************************* */

	$("#boton_etapa4").click(function(){
		if($("#costo").val()===""){
			$("#mensaje12").fadeIn();
		}
		else{
			$("#mensaje12").fadeOut();
			if($("#descripcion").val()==""){
				$("#mensaje11").fadeIn();
			}
			else{
				$("#mensaje11").fadeOut();
				var cost=parseFloat($("#costo").val());
				var costo_impuestos=cost+(Math.floor(cost*15)/100);
				$("#costo").val(costo_impuestos);
				$("#etapa4").hide();
				$("#etapa5").show();
				var html="<li>Provincia de partida: " + $('#provincia_origen option:selected').text() + "</li>"+
				"<li>Ciudad de partida: " + $('#ciudad_origen option:selected').text() + "</li>"+
				"<li>Calle de partida: " + $('#calle_origen').val() + "</li>"+
				"<li>Numero de partida: " + $('#numero_origen').val() + "</li>"+
				"<li>Provincia de llegada: " + $('#provincia_destino option:selected').text() + "</li>"+
				"<li>Ciudad de llegada: " + $('#ciudad_destino option:selected').text() + "</li>"+
				"<li>Calle de llegada: " + $('#calle_destino').val() + "</li>"+
				"<li>Numero de llegada: " + $('#numero_destino').val() + "</li>"+
				"<li>Fecha de partida: " + $('#fecha_partida').val() + "</li>"+
				"<li>Hora de partida: " + $('#hora_partida').val() + "</li>"+
				"<li>Fecha de llegada: " + $('#fecha_llegada').val() + "</li>"+
				"<li>Hora de llegada: " + $('#hora_llegada').val() + "</li>"+
				"<li>Costo con impuestos: " + costo_impuestos + "</li>"+
				"<li>Descripcion del viaje: " + $('#descripcion').val() + "</li>";
				$("#lista_confirmacion").append(html);
			}
		}
	})

	$("#descripcion").blur(function(){
		if($(this).val()==""){
			$("#mensaje11").fadeIn();
		}
		else{
			$("#mensaje11").fadeOut();
		}
	})


	$("#costo").change(function(){
		if($(this).val()==""){
			$("#mensaje12").fadeIn();
		}
		else{
			$("#mensaje12").fadeOut();
		}
	})

	$("#volver_etapaExtra").click(function(){
		$("#etapa4").hide();
		$("#etapaExtra").show();
	})

	$("#volver_etapa4").click(function(){
		$("#lista_confirmacion").empty();
		$("#etapa5").hide();
		$("#etapa4").show();
	})

})

