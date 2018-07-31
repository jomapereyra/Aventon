$(document).ready(function(){

	$(".conductor").click(function(){
		var id=$(this).attr("id");
		id=id.replace("c","conductor");
		$("#"+id).toggle("slow");
	})

})