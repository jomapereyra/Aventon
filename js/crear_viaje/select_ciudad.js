$(document).ready(function(){

	$("#provincia_origen").change( function() {
		if ($(this).val() === "") {
			$("#ciudad_origen").prop("disabled", true);
		} else {
			$("#ciudad_origen").prop("disabled", false);
		}
	});

	$("#provincia_destino").change( function() {
		if ($(this).val() === "") {
			$("#ciudad_destino").prop("disabled", true);
		} else {
			$("#ciudad_destino").prop("disabled", false);
		}
	});

	$("#fecha_partida").blur( function() {
		if ($(this).val() === "") {
			$("#fecha_llegada").prop("disabled", true);
		} else {
			$("#fecha_llegada").prop("disabled", false);
		}
	});

})
