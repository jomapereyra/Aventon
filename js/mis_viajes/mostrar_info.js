$(document).ready(function(){

	$(".mostrar").click(function(){
		var id=$(this).attr("id");
		var resultado=id.substr(0,3);
		if(resultado=="pos")
			id=id.replace("pos","postulantes");
		else
			id=id.replace("pas","pasajeros");
		$("#"+id).toggle("slow");
	})

	$("#realizar-tab").click(function(){
		location.href ="?pagina=1&action=1";
	})

	$("#finalizados-tab").click(function(){
		location.href ="?pagina=1&action=2";
	})

})