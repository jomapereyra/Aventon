$(document).ready(function(){
	
	$("#provincia_origen").change(function(){
		var pro=$("#provincia_origen").val();
		$.get("controlador/ajaxData1.php",{provincia_origen:pro},function(resultado){
			$("#ciudad_origen").empty();
			$("#ciudad_origen").append("<option value='0'>Elija una ciudad</option>");
			$("#ciudad_origen").append(resultado);
		});
	})

	$("#provincia_destino").change(function(){
		var pro=$("#provincia_destino").val();
		$.get("controlador/ajaxData2.php",{provincia_destino:pro},function(resultado){
			$("#ciudad_destino").empty();
			$("#ciudad_destino").append("<option value='0'>Elija una ciudad</option>");
			$("#ciudad_destino").append(resultado);
		});
	})

})