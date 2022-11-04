function loadAnime(idAnime){
	$.ajax({
		type: "POST",
		url: "scripts/animeDetails.php?idAnime="+idAnime,
		data: {table: "anime"},
		dataType: "json",
		success: function(data) {
			for(var r of data) {
				console.log(r.descript)
				$("#descript").html(r.descript);
				$("#nbSaisons").html(r.nbSaisons);
				$("#status").html(r.etatAnime);
				$("#rating").html(r.note + ' /10');
				$("#img").html('<img src="img/anime/ver/' + r.img + '"></img>');
				$("#animeTitle").html("<h3>"+r.nomAnime+"</h3>");
				$("#randomName").html(r.nomAnime);
			}			
		},
		error: function(){
			$("#animeAdded").html("ERROR");
		}
	});
}