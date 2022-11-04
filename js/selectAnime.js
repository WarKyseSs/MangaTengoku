$(document).ready(function(){	
	$.ajax({
		type: "POST",
		url: "scripts/selectAnime.php",
		data: {table: "anime"},
		dataType: "json",
		success: function(data) {
			var html = ''
			for(var r of data) {
            	html+= '<tr class="table-dark">'
				html+= '<td>' + r.idAnime + ' </td>'
				html+= '<td>' + r.nomAnime + '</td>'
            	html+= '</tr>'
			}					
			$("#animeTable").html(html);					
		},
		error: function(){
			$("#animeTable").html("ERROR");
		}
	});
})