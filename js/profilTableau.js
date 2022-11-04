$(document).ready(function(){	
	$.ajax({
		type: "POST",
		url: "scripts/profilTableau.php",
		data: {table: "vu"},
		dataType: "json",
		success: function(data) {
			var html = "" ;
			for(var r of data) {
            	html+= '<tr class="table-dark">'
				html+= '<td>' + r.nomAnime + '</td>'
				html+= '<td>' + r.numSaison + '</td>'
				html+= '<td>' + r.numEp + '</td>'
            	html+= '</tr>'
			}			
			$("#profilTable").html(html);					
		},
		error: function(){
			$("#profilTable").html("ERROR");
		}
	});
})