$(document).ready(function(){	
	$.ajax({
		type: "POST",
		url: "scripts/utilisateurTableau.php",
		data: {table: "utilisateur"},
		dataType: "json",
		success: function(data) {
			var html = "" ;
			for(var r of data) {
            	html+= '<tr class="table-dark">'
				html+= '<td>' + r.pseudo + '</td>'
				html+= '<td>' + r.email + '</td>'
				html+= '<td>' + r.date_inscription + '</td>'
            	html+= '</tr>'
			}			
			$("#userInTable").html(html);					
		},
		error: function(){
			$("#userInTable").html("ERROR");
		}
	});
})