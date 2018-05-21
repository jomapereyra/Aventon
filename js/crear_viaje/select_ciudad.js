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
})
