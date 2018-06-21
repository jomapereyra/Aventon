$("#etapa2").hide();
$("#etapa3").hide();
$("#etapa4").hide();
$("#etapa5").hide();
$("#etapaExtra").hide();
$("#semanal").hide();
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
						$("#etapa2").hide("fast");
						$("#etapa3").show("slow");
					}
				}
				
			}
		}
	})

	$("#volver_etapa1").click(function(){
		$("#etapa2").hide("fast");
		$("#etapa1").show("slow");
	})

	/* ****************** ETAPA 3 ******************************* */

	var cant_dias=1;

	/*$("#frecuencia").change(function(){
		var tipo=$(this).val();
		if(tipo=="casual"){
			$("#semanal").hide("fast");
			$("#casual").show("slow");
		}
		else{
			$("#casual").hide("fast");
			$("#semanal").show("slow");
		}
	})*/

	$("#agregar_dia").click(function(){
		$("#agregar").append("<div class='form-row'><div class='form-group col-md-6'><label for='dia_partida'>Seleccione el dia de partida: </label><select class='form-control' id='dia_partida' name='dia_partida'><option value='1'>LUNES</option><option value=2>MARTES</option><option value=3>MIERCOLES</option><option value=4>JUEVES</option><option value=5>VIERNES</option><option value=6>SABADO</option><option value=7>DOMINGO</option></select></div><div class='form-group col-md-6'><label for='dia_llegada'>Seleccione el dia de llegada:</label><select class='form-control' id='dia_llegada' name='dia_llegada'><option value='1'>LUNES</option><option value='2'>MARTES</option><option value='3'>MIERCOLES</option><option value='4'>JUEVES</option><option value='5'>VIERNES</option><option value='6'>SABADO</option><option value='7'>DOMINGO</option></select></div></div><div class='form-row'><div class='form-group col-md-6 col-sm-6'><label for='hora_partida'>Ingrese una hora de partida: </label><div class='input-group date'><input id='hora_partida' name='hora_partida' type='time' class='form-control'><div class='input-group-append'><div class='input-group-text'><i class='far fa-clock'></i></div></div></div><div id='mensaje8' class='error'><i class='fas fa-times'></i>&nbsp;Debe ingresar una hora de partida</div><div id='mensaje8_1' class='error'><i class='fas fa-times'></i>&nbsp;Respete una diferencia de 2 horas a la actual para poder continuar</div><small id='ayudaHora1' class='text-muted'>La hora de partida debe tener una diferencia minima de 2 horas a la actual </small></div><div class='form-group col-md-6 col-sm-6'><label for='hora_llegada'>Ingrese una hora de llegada: </label><div class='input-group date'><input id='hora_llegada' name='hora_llegada' type='time' class='form-control'><div class='input-group-append'><div class='input-group-text'><i class='far fa-clock'></i></div></div></div><div id='mensaje10' class='error'><i class='fas fa-times'></i>&nbsp;Debe ingresar una hora de llegada</div><div id='mensaje10_1' class='error'><i class='fas fa-times'></i>&nbsp;Si el viaje transcurre en un dia, el horario de llegada debe ser superior al horario de partida</div></div></div>");
	})

	$("#boton_etapa3").click(function(){

		var tipo=$("#frecuencia").val();

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
										$("#etapa3").hide("fast");
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
			if(tipo_viaje=="semanal"){
				info_horario="<li>Dia de partida: " + $('#dia_partida option:selected').text() + "</li>"+
				"<li>Hora de partida: " + $('#hora_partida_semanal').val() + "</li>"+
				"<li>Dia de llegada: " + $('#dia_llegada option:selected').text() + "</li>"+
				"<li>Hora de llegada: " + $('#hora_llegada_semanal').val() + "</li>";
			}
			else{
				if(tipo_viaje=="casual"){
					info_horario="<li>Fecha de partida: " + $('#fecha_partida').val() + "</li>"+
					"<li>Hora de partida: " + $('#hora_partida').val() + "</li>"+
					"<li>Fecha de llegada: " + $('#fecha_llegada').val() + "</li>"+
					"<li>Hora de llegada: " + $('#hora_llegada').val() + "</li>";
				}
			}
			var html="<li>Provincia de partida: " + $('#provincia_origen option:selected').text() + "</li>"+
			"<li>Ciudad de partida: " + $('#ciudad_origen option:selected').text() + "</li>"+
			"<li>Calle de partida: " + $('#calle_origen').val() + "</li>"+
			"<li>Numero de partida: " + $('#numero_origen').val() + "</li>"+
			"<li>Provincia de llegada: " + $('#provincia_destino option:selected').text() + "</li>"+
			"<li>Ciudad de llegada: " + $('#ciudad_destino option:selected').text() + "</li>"+
			"<li>Calle de llegada: " + $('#calle_destino').val() + "</li>"+
			"<li>Numero de llegada: " + $('#numero_destino').val() + "</li>"+
			info_horario +
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
				alert(resultado);
				location.href="http://localhost/Aventon/pagina_principal.php";
			})
		}
		else{
			moment.locale('es');
			var fecha_maxima=(moment(moment(fecha_salida).add(2, 'years')).format('YYYY-MM-DD'));
			var fecha_nueva=moment(fecha_salida).format('YYYY-MM-DD');
			var fecha_nueva2= fecha_llegada;
			alert(fecha_maxima);
			while(moment(fecha_nueva).isSameOrBefore(fecha_maxima)){
				$.get("controlador/guardar_viaje.php",{descripcion:descripcion,costo_impuesto:costo,provincia_origen:provincia_origen,provincia_destino:provincia_destino,ciudad_origen:ciudad_origen,ciudad_destino:ciudad_destino,calle_origen:calle_origen,calle_destino:calle_destino,numero_origen:numero_origen,numero_destino:numero_destino,vehiculo:id_vehiculo,asientos:asientos_disponibles,frecuencia:tipo,fecha_partida:fecha_nueva,fecha_llegada:fecha_nueva2,hora_partida:hora_salida,hora_llegada:hora_llegada},function(resultado){
				});
				fecha_nueva=(moment(moment(fecha_nueva).add(7, 'days')).format('YYYY-MM-DD'));
				fecha_nueva2=(moment(moment(fecha_nueva2).add(7, 'days')).format('YYYY-MM-DD'));
			}
			if(moment(fecha_nueva).isAfter(fecha_maxima)){
				location.href="http://localhost/Aventon/pagina_principal.php";
			}
		}

	})

})


