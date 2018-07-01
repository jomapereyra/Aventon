$("#etapa2").hide();
$("#etapa3").hide();
$("#etapa4").hide();
$("#etapa5").hide();
$("#etapaExtra").hide();
$("#semanal").hide();
$(document).ready(function(){

	/* *********************** ETAPA 1 ************************ */

	$("#provincia_origen").on("change",function(){
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
		var ok=new Array();

		if(provincia==""){
			$("#mensaje1").fadeIn();
			ok[0]=false;
		}
		else{
			$("#mensaje1").fadeOut();
			ok[0]=true;
		}
		if (calle==""){
			$("#mensaje2").fadeIn();
			ok[1]=false;
		}
		else{
			$("#mensaje2").fadeOut();
			ok[1]=true;
		}
		if(!calle.match(especiales)){
			$("#mensaje2_1").fadeIn();
			ok[2]=false;
		}
		else{
			$("#mensaje2_1").fadeOut();
			ok[2]=true;
		}
		if(numero==""){
			$("#mensaje3").fadeIn();
			ok[3]=false;
		}
		else{
			$("#mensaje3").fadeOut();
			ok[3]=true;
		}
		if(!ok.includes(false)){
			$("#etapa1").hide("fast");
			$("#etapa2").show("slow");
		}

	})

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
		var ok=new Array();

		if(provincia==""){
			$("#mensaje4").fadeIn();
			ok[0]=false;
		}
		else{
			$("#mensaje4").fadeOut();
			ok[0]=true;
		}

		if (calle==""){
			$("#mensaje5").fadeIn();
			ok[1]=false;
		}
		else{
			$("#mensaje5").fadeOut();
			ok[1]=true;
		}

		if(!calle.match(especiales)){
			$("#mensaje5_1").fadeIn();
			ok[2]=false;
		}
		else{
			$("#mensaje5_1").fadeOut();
			ok[2]=true;
		}

		if(numero==""){
			$("#mensaje6").fadeIn();
			ok[3]=false;
		}
		else{
			$("#mensaje6").fadeOut();
			ok[3]=true;
		}

		if(!ok.includes(false)){
			$("#etapa2").hide("fast");
			$("#etapa3").show("slow");
		}

	})

	$("#volver_etapa1").click(function(){
		$("#etapa2").hide("fast");
		$("#etapa1").show("slow");
	})

	/* ****************** ETAPA 3 ******************************* */

	var cant_dias=1;

	$("#frecuencia").change(function(){
		var tipo=$(this).val();
		if(tipo=="casual"){
			$("#semanal").hide("fast");
		}
		else{
			$("#semanal").show("fast");
		}
	})

	$("#boton_etapa3").click(function(){

		var tipo=$("#frecuencia").val();
		var tamarreglo;
		var arreglosemanal= new Array();
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
		var diainicio=moment(fecha_partida).day();
		var ok=new Array();

		if(tipo=="semanal"){
			
			for (var i = 1; i < 8; i++) {
				if($("#"+i).prop('checked')){
					arreglosemanal.push(($("#"+i).val()));
				}
			}

			if(arreglosemanal.length==0){
				$("#mensajesemanal").fadeIn();
				ok[0]=false;
			}
			else{
				$("#mensajesemanal").fadeOut();
				ok[0]=true;
			}

			if (arreglosemanal.includes((diainicio.toString()))) {
				$("#mensajesemanal").fadeOut();
				$("#arreglo_semanal").val(arreglosemanal);
				ok[1]=true;
			}
			else{
				$("#mensajesemanal").fadeIn();
				ok[1]=false;
			}
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
				ok[2]=false;
			}
			else{
				$("#mensaje7").fadeOut();
				ok[2]=true;
			}

			if(fecha_partida<fecha_actual){
				$("#mensaje7_1").fadeIn();
				ok[3]=false;
			}
			else{
				$("#mensaje7_1").fadeOut();
				ok[3]=true;
			}

			if (hora_partida==""){
				$("#mensaje8").fadeIn();
				ok[4]=false;
			}
			else{
				$("#mensaje8").fadeOut();
				ok[4]=true;
			}

			if(fecha_partida==fecha_actual && hora_partida<hora_minima){
				$("#mensaje8_1").fadeIn();
				ok[5]=false;
			}
			else{
				$("#mensaje8_1").fadeOut();
				ok[5]=true;
			}

			if(fecha_llegada==""){
				$("#mensaje9").fadeIn();
				ok[6]=false;
			}
			else{
				$("#mensaje9").fadeOut();
				ok[6]=true;
			}

			if(fecha_llegada<fecha_partida){
				$("#mensaje9_1").fadeIn();
				ok[7]=false;
			}
			else{
				$("#mensaje9_1").fadeOut();
				ok[7]=true;
			}

			if(hora_llegada==""){
				$("#mensaje10").fadeIn();
				ok[8]=false;
			}
			else{
				$("#mensaje10").fadeOut();
				ok[8]=true;
			}

			if(fecha_partida==fecha_llegada && hora_llegada<hora_partida){
				$("#mensaje10_1").fadeIn();
				ok[9]=false;
			}
			else{
				$("#mensaje10_1").fadeOut();
				ok[9]=true;
			}

			if(!ok.includes(false)){

				$("#etapa3").hide("fast");
				$("#etapaExtra").show("slow");
			}
		}
		

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
			ok[2]=false;
		}
		else{
			$("#mensaje7").fadeOut();
			ok[2]=true;
		}

		if(fecha_partida<fecha_actual){
			$("#mensaje7_1").fadeIn();
			ok[3]=false;
		}
		else{
			$("#mensaje7_1").fadeOut();
			ok[3]=true;
		}

		if (hora_partida==""){
			$("#mensaje8").fadeIn();
			ok[4]=false;
		}
		else{
			$("#mensaje8").fadeOut();
			ok[4]=true;
		}

		if(fecha_partida==fecha_actual && hora_partida<hora_minima){
			$("#mensaje8_1").fadeIn();
			ok[5]=false;
		}
		else{
			$("#mensaje8_1").fadeOut();
			ok[5]=true;
		}

		if(fecha_llegada==""){
			$("#mensaje9").fadeIn();
			ok[6]=false;
		}
		else{
			$("#mensaje9").fadeOut();
			ok[6]=true;
		}

		if(fecha_llegada<fecha_partida){
			$("#mensaje9_1").fadeIn();
			ok[7]=false;
		}
		else{
			$("#mensaje9_1").fadeOut();
			ok[7]=true;
		}

		if(hora_llegada==""){
			$("#mensaje10").fadeIn();
			ok[8]=false;
		}
		else{
			$("#mensaje10").fadeOut();
			ok[8]=true;
		}

		if(fecha_partida==fecha_llegada && hora_llegada<hora_partida){
			$("#mensaje10_1").fadeIn();
			ok[9]=false;
		}
		else{
			$("#mensaje10_1").fadeOut();
			ok[9]=true;
		}

		if(!ok.includes(false)){

			$("#etapa3").hide("fast");
			$("#etapaExtra").show("slow");
		}
	})

$("#volver_etapa2").click(function(){
	$("#etapa3").hide("fast");
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
	var ok=new Array();
	if($("#vehiculo").val()===""){
		$("#mensaje13").fadeIn();
		ok[0]=false;
	}
	else{
		$("#mensaje13").fadeOut();
		ok[0]=true;
	}
	if($("#asientos").val()===""){
		$("#mensaje14").fadeIn();
		ok[1]=false;
	}
	else{
		$("#mensaje14").fadeOut();
		ok[1]=true;
	}
	if(cant>limite){
		$("#mensaje14_1").empty();
		$("#mensaje14_1").text("El vehiculo seleccionado tiene un maximo de "+limite+" asientos");
		$("#mensaje14_1").fadeIn();
		ok[2]=false;
	}
	else{
		$("#mensaje14_1").fadeOut();
		ok[2]=true;
	}
	if(cant<1){
		$("#mensaje14_2").fadeIn();
		ok[3]=false;
	}
	else{
		$("#mensaje14_2").fadeOut();
		ok[3]=true;
	}
	if(!ok.includes(false)){
		$("#etapaExtra").hide("fast");
		$("#etapa4").show("slow");
	}

})

$("#vehiculo").on("change",function(){
	if($("#vehiculo").val()===""){
		$("#mensaje13").fadeIn();
	}
	else{
		$("#mensaje13").fadeOut();
	}
})

$("#asientos").on("keyup",function(){
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
	$("#etapaExtra").hide("fast");
	$("#etapa3").show("slow");
})

/* ****************** ETAPA 4 ******************************* */

$("#boton_etapa4").click(function(){
	var ok=new Array();
	var costo=$("#costo").val();
	var descripcion=$("#descripcion").val();

	if(costo==""){
		$("#mensaje12").fadeIn();
		ok[0]=false;
	}
	else{
		$("#mensaje12").fadeOut();
		ok[0]=true;
	}
	if(descripcion==""){
		$("#mensaje11").fadeIn();
		ok[1]=false;
	}
	else{
		$("#mensaje11").fadeOut();
		ok[1]=true;
	}
	if(descripcion.length > 300){
		$("#mensaje11_1").fadeIn();
		ok[2]=false;
	}
	else{
		$("#mensaje11_1").fadeOut();
		ok[2]=true;
	}
	if(!ok.includes(false)){

		var cost=parseFloat($("#costo").val());
		var costo_impuesto=cost+(Math.floor(cost*15)/100);
		var tipo_viaje=$("#frecuencia").val();
		var info_horario="";
		$("#costo_impuesto").val(costo_impuesto);
		$("#etapa4").hide("fast");
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
		"<li>Hora de llegada: " + $('#hora_llegada').val() + "</li>" +
		"<li>Vehiculo: " + $('#vehiculo option:selected').text() + "</li>"+
		"<li>Asientos disponibles: " + $('#asientos').val() + "</li>"+
		"<li>Costo con impuestos: " + $('#costo_impuesto').val() +"</li>"+
		"<li>Descripcion del viaje: " + $('#descripcion').val() + "</li>";
		$("#lista_confirmacion").append(html);
	}

})

$("#descripcion").on("keyup blur",function(){
	var descripcion=$("#descripcion").val();
	if(descripcion==""){
		$("#mensaje11").fadeIn();
	}
	else{
		$("#mensaje11").fadeOut();
		if(descripcion.length > 300){
			$("#mensaje11_1").fadeIn();
		}
		else{
			$("#mensaje11_1").fadeOut();
		}
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
	$("#etapa4").hide("fast");
	$("#etapaExtra").show("slow");
})

$("#volver_etapa4").click(function(){
	$("#lista_confirmacion").empty();
	$("#etapa5").hide("fast");
	$("#etapa4").show("slow");
})

$("#crear").click(function(){

	var tipo=$("#frecuencia").val();
	var id_vehiculo=$("#vehiculo").val();
	var descripcion=$("#descripcion").val();
	var asientos_disponibles=$("#asientos").val();
	var fecha_salida=$("#fecha_partida").val();
	var fecha_llegada=$("#fecha_llegada").val();
	var hora_salida=$("#hora_partida").val();
	var hora_llegada=$("#hora_llegada").val();
	var costo=$("#costo_impuesto").val();
	var provincia_origen=$("#provincia_origen").val();
	var ciudad_origen=$("#ciudad_origen").val();
	var calle_origen=$("#calle_origen").val();
	var numero_origen=$("#numero_origen").val();
	var provincia_destino=$("#provincia_destino").val();
	var ciudad_destino=$("#ciudad_destino").val();
	var calle_destino=$("#calle_destino").val();
	var numero_destino=$("#numero_destino").val();

	if(tipo=="casual"){
		$.get("controlador/guardar_viaje.php",{descripcion:descripcion,costo_impuesto:costo,provincia_origen:provincia_origen,provincia_destino:provincia_destino,ciudad_origen:ciudad_origen,ciudad_destino:ciudad_destino,calle_origen:calle_origen,calle_destino:calle_destino,numero_origen:numero_origen,numero_destino:numero_destino,vehiculo:id_vehiculo,asientos:asientos_disponibles,frecuencia:tipo,fecha_partida:fecha_salida,fecha_llegada:fecha_llegada,hora_partida:hora_salida,hora_llegada:hora_llegada},function(resultado){
			alert("Viaje Creado");
			location.href="http://localhost/Aventon/pagina_principal.php";
		})
	}
	else{
		var arreglo_s=$("#arreglo_semanal").val();
		$("#loading").fadeIn();
		$.get("controlador/guardar_viaje_semanal.php",{descripcion:descripcion,costo_impuesto:costo,provincia_origen:provincia_origen,provincia_destino:provincia_destino,ciudad_origen:ciudad_origen,ciudad_destino:ciudad_destino,calle_origen:calle_origen,calle_destino:calle_destino,numero_origen:numero_origen,numero_destino:numero_destino,vehiculo:id_vehiculo,asientos:asientos_disponibles,frecuencia:tipo,fecha_partida:fecha_salida,fecha_llegada:fecha_llegada,hora_partida:hora_salida,hora_llegada:hora_llegada,arreglo_semanal:arreglo_s},function(resultado){
			$("#loading").fadeOut("fast");
			alert("Viajes semanales creados");
			location.href="http://localhost/Aventon/pagina_principal.php";
		})
	}
})
})



