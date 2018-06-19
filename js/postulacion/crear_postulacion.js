$(document).ready(function(){

	$("#postularme").click(function(){
		var id_viaje=$("#id_viaje").val();
		var id_usuario=$("#id_usuario").val();
		$.get("controlador/ajaxNuevaPostulacion.php",{id_v:id_viaje,id_u:id_usuario},function(resultado){
			alert("Solicitud enviada correctamente");
			$(location).attr('href',"pagina_principal.php");
		})
	})
})
