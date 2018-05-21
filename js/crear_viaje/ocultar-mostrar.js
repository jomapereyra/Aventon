$("#etapa2").hide();
$("#etapa3").hide();
$("#etapa4").hide();
$(document).ready(function(){
	
	$("#boton_etapa1").on('click', function(){
		$("#etapa1").hide();
		$("#etapa2").show();
	});
	$("#boton_etapa2").on('click', function(){
		$("#etapa2").hide();
		$("#etapa3").show();
	})
	$("#boton_etapa3").on('click', function(){
		$("#etapa3").hide();
		$("#etapa4").show();
	})
	$("#volver_etapa1").on('click', function(){
		$("#etapa2").hide();
		$("#etapa1").show();
	})
	$("#volver_etapa2").on('click', function(){
		$("#etapa3").hide();
		$("#etapa2").show();
	})
	$("#volver_etapa3").on('click', function(){
		$("#etapa4").hide();
		$("#etapa3").show();
	})
})