$("#etapa2").hide();
$("#etapa3").hide();
$("#etapa4").hide();
$("#etapa5").hide();
$("#etapaExtra").hide();
$(document).ready(function(){

	/* *********************** ETAPA 1 ************************ */

	$("#provincia_origen").on("change blur",function(){
		var provincia=$("#provincia_origen").val();
		if(provincia==""){
			$("#mensaje1").fadeIn();
		}
		else{
			$("#mensaje1").fadeOut();
		}
	})

	$("#calle_origen").on("keyup blur",function(){
		var calle=$("#calle_origen").val();
		var especiales="^[A-Za-z0-9_ ]{0,30}$";
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

	
	$("#numero_origen").on("keyup blur",function(){
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
		var especiales="^[A-Za-z0-9_ ]{0,30}$";

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
						$("#etapa1").hide("slow");
						$("#etapa2").show("slow");
					}
				}
				
			}
		}

	});

	/* **************************** ETAPA 2 ************************************* */

	$("#provincia_destino").on("change blur",function(){
		var provincia=$("#provincia_destino").val();
		if(provincia==""){
			$("#mensaje4").fadeIn();
		}
		else{
			$("#mensaje4").fadeOut();
		}
	})

	$("#calle_destino").on("keyup blur",function(){
		var calle=$("#calle_destino").val();
		var especiales="^[A-Za-z0-9_ ]{0,30}$";
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

	
	$("#numero_destino").on("keyup blur",function(){
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
		var especiales="^[A-Za-z0-9_ ]{0,30}$";

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
						$("#etapa2").hide("slow");
						$("#etapa3").show("slow");
					}
				}
				
			}
		}
	})

	$("#volver_etapa1").click(function(){
		$("#etapa2").hide("slow");
		$("#etapa1").show("slow");
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
										$("#etapa3").hide("slow");
										$("#etapaExtra").show("slow");
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
		$("#etapa3").hide("slow");
		$("#etapa2").show("slow");
	})

	/* ****************** ETAPA EXTRA ******************************* */

	var limite=999;

	$("#vehiculo").change(function(){
		var v_id=$("#vehiculo").val();
		$.get("controlador/ajaxData3.php",{id_vehiculo:v_id},function(resultado){
			limite=resultado;
		})
	})


	$("#boton_etapaExtra").click(function(){
		var cant=parseInt($("#asientos").val());
		if($("#vehiculo").val()===""){
			$("#mensaje13").fadeIn();
		}
		else{
			$("#mensaje13").fadeOut();
			if($("#asientos").val()===""){
				$("#mensaje14").fadeIn();
			}
			else{
				$("#mensaje14").fadeOut();
				if(cant>limite){
					$("#mensaje14_1").fadeIn();
				}
				else{
					$("#mensaje14_1").fadeOut();
					$("#etapaExtra").hide("slow");
					$("#etapa4").show("slow");
				}
			}
		}
	})

	$("#vehiculo").on("change blur",function(){
		if($("#vehiculo").val()===""){
			$("#mensaje13").fadeIn();
		}
		else{
			$("#mensaje13").fadeOut();
		}
	})

	$("#asientos").on("keyup blur",function(){
		if($("#asientos").val()===""){
			$("#mensaje14").fadeIn();
		}
		else{
			$("#mensaje14").fadeOut();
			var cant=parseInt($("#asientos").val());
			if(cant>limite){
				$("#mensaje14_1").empty();
				$("#mensaje14_1").text("El vehiculo seleccionado tiene un maximo de "+limite+" asientos");
				$("#mensaje14_1").fadeIn();
			}
			else{
				$("#mensaje14_1").fadeOut();
			}
		}
	})

	$("#volver_etapa3").click(function(){
		$("#etapaExtra").hide("slow");
		$("#etapa3").show("slow");
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
				var costo_impuesto=cost+(Math.floor(cost*15)/100);
				$("#costo_impuesto").val(costo_impuesto);
				$("#etapa4").hide("slow");
				$("#etapa5").show("slow");
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
				"<li>Vehiculo: " + $('#vehiculo option:selected').text() + "</li>"+
				"<li>Asientos disponibles: " + $('#asientos').val() + "</li>"+
				"<li>Costo con impuestos: " + $('#costo_impuesto').val() +"</li>"+
				"<li>Descripcion del viaje: " + $('#descripcion').val() + "</li>";
				$("#lista_confirmacion").append(html);
			}
		}
	})

	$("#descripcion").on("keyup blur",function(){
		if($(this).val()==""){
			$("#mensaje11").fadeIn();
		}
		else{
			$("#mensaje11").fadeOut();
		}
	})


	$("#costo").on("keyup blur",function(){
		if($(this).val()==""){
			$("#mensaje12").fadeIn();
		}
		else{
			$("#mensaje12").fadeOut();
		}
	})

	$("#volver_etapaExtra").click(function(){
		$("#etapa4").hide("slow");
		$("#etapaExtra").show("slow");
	})

	$("#volver_etapa4").click(function(){
		$("#lista_confirmacion").empty();
		$("#etapa5").hide("slow");
		$("#etapa4").show("slow");
	})

})

