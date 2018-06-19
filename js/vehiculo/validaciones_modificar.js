$(document).ready(function(){

	$("#patente").on("keyup blur",function(){
		var patente=$("#patente").val();
		var especiales="^[A-Z0-9_]{0,30}$";

		$("#mensaje1_2").fadeOut();
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
		if (patente.length < 6 || patente.length > 7) {
			$("#mensaje1_3").fadeIn();
		}
		else{
			$("#mensaje1_3").fadeOut();
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

	$("#tipo_vehiculo").on("change blur",function(){
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
		if(asientos==0){
			$("#mensaje6_1").fadeIn();
		}
		else{
			$("#mensaje6_1").fadeOut();
		}
	})

	$("#boton_modificar").click(function(){

		var patente=$("#patente").val();
		var marca=$("#marca").val();
		var modelo=$("#modelo").val();
		var año=$("#año").val();
		var tipo=$("#tipo_vehiculo").val();
		var cant=$("#asientos").val();
		var especiales="^[A-Z0-9_ ]{0,30}$";
		var id_vehiculo=$("#id_vehiculo").val();
		var ok=new Array();

		if(patente==""){
			$("#mensaje1").fadeIn();
			ok[0]=false;
		}
		else{
			$("#mensaje1").fadeOut();
			ok[0]=true;
		}
		if(!patente.match(especiales)){
			$("#mensaje1_1").fadeIn();
			ok[1]=false;
		}
		else{
			$("#mensaje1_1").fadeOut();
			ok[1]=true;
		}
		if (patente.length < 6 || patente.length > 7) {
			$("#mensaje1_3").fadeIn();
			ok[2]=false;
		}
		else{
			$("#mensaje1_3").fadeOut();
			ok[2]=true;
		}
		if (marca==""){
			$("#mensaje2").fadeIn();
			ok[3]=false;
		}
		else{
			$("#mensaje2").fadeOut();
			ok[3]=true;
		}
		if(modelo==""){
			$("#mensaje3").fadeIn();
			ok[4]=false;
		}
		else{
			$("#mensaje3").fadeOut();
			ok[4]=true;
		}
		if(año==""){
			$("#mensaje4").fadeIn();
			ok[5]=false;
		}
		else{
			$("#mensaje4").fadeOut();
			ok[5]=true;
		}
		if(tipo==""){
			$("#mensaje5").fadeIn();
			ok[6]=false;
		}
		else{
			$("#mensaje5").fadeOut();
			ok[6]=true;
		}
		if(cant==""){
			$("#mensaje6").fadeIn();
			ok[7]=false;
		}
		else{
			$("#mensaje6").fadeOut();
			ok[7]=true;
		}
		if(cant==0){
			$("#mensaje6_1").fadeIn();
			ok[8]=false;
		}
		else{
			$("#mensaje6_1").fadeOut();
			ok[8]=true;
		}

		if(!ok.includes(false)){
			$.get("controlador/ajaxModificarVehiculo.php",{patente:patente,id_v:id_vehiculo,marca_v:marca,modelo:modelo,año:año,tipo:tipo,cant:cant},function(resultado){
				if(!resultado){
					alert("Vehiculo modificado correctamente");
					$(location).attr('href',"mis_vehiculos.php");
				}
				else{
					alert("No se pudo modificar el vehiculo debido a que la patente ingresada ya fue registrada");
					$(location).attr('href',"mis_vehiculos.php");
				}
			})
		}
	})
})