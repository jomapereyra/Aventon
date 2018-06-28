$(document).ready(function(){

	$("button").click(function(){
		var id=$(this).attr("id");
		id=parseInt(id)+1;
		$("#"+id).toggle("slow");
	})

})