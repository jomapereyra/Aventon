$(document).ready(function(){


	$(".estrella_label").click(function(){

		var id=$(this).attr("id");
		var num=id.substr(5,1);
		var resultado=id.substr(7);
		var valor=$("#input"+num+"_"+resultado).val();
		$("#valor_"+resultado).text(valor);

	})

	$(".calificar").click(function(){
		var ok=new Array();
		var id=$(this).attr("id");
		var comentario=$("#comentario_"+id).val();
		var valor=$("#valor_"+id).text();
		var calificador=$("#calificador").val();
		var pag=$("#pag").val();

		if(valor=="-"){
			ok[0]=false;
			$("#mensaje1_"+id).fadeIn();
		}
		else{
			$("#mensaje1_"+id).fadeOut();
			ok[0]=true;
		}

		if(comentario==""){
			$("#mensaje2_"+id).fadeIn();
			ok[1]=false;
		}
		else{
			$("#mensaje2_"+id).fadeOut();
			ok[1]=true;
		}

		if(!ok.includes(false)){

			$.get("controlador/calificar_conductor.php",{valor:valor,comentario:comentario,id_viaje:id,calificador:calificador},function(resultado){
				alert("Usuario calificado correctamente");
				location.href="http://localhost/Aventon/viajes_aceptados.php?pagina_f="+pag+"&action=2";
			})
		}
	})
})