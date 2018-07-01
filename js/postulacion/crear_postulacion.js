$(document).ready(function(){

	$("#postularme").click(function(){
		var cant=parseInt($("#asientos").val());
		var ok=new Array();
		var limite=parseInt($("#limite").val());
		if($("#asientos").val()===""){
			$("#mensaje14").fadeIn();
			ok[0]=false;
		}
		else{
			$("#mensaje14").fadeOut();
			ok[0]=true;
		}
		if(cant>limite){
			$("#mensaje14_1").empty();
			$("#mensaje14_1").text("El vehiculo seleccionado tiene un maximo de "+limite+" asientos");
			$("#mensaje14_1").fadeIn();
			ok[1]=false;
		}
		else{
			$("#mensaje14_1").fadeOut();
			ok[1]=true;
		}
		if(cant<1){
			$("#mensaje14_2").fadeIn();
			ok[2]=false;
		}
		else{
			$("#mensaje14_2").fadeOut();
			ok[2]=true;
		}
		if(!ok.includes(false)){
			var id_viaje=$("#id_viaje").val();
			var id_usuario=$("#id_usuario").val();
			$.get("controlador/ajaxNuevaPostulacion.php",{id_v:id_viaje,id_u:id_usuario,cant:cant},function(resultado){
				alert("Solicitud enviada correctamente");
				$(location).attr('href',"pagina_principal.php");
			})
		}
		
	})

	$("#boton_etapaExtra").click(function(){
		
		
	})
})
