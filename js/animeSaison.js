function loadAnime(idAnime){
	$.ajax({
		type: "POST",
		url: "scripts/animeSaison.php?idAnime="+idAnime,
		data: {table: "anime"},
		dataType: "json",
		success: function(data) {
			var html = "" ;
			for(var r of data) {
				html += '<div class="col-lg-4 col-md-6 col-sm-6"><div class="product__item">'
				html += '<div class="product__item__pic" style="background-image: url(\'img/anime/ver/' + r.img + '\');background-repeat: no-repeat; background-size: cover; background-position: top center;">'
				html += '<div class="ep">' + r.nbEpSaison + ' Ep / ' + r.etatSaison + '</div></div>'
				html += '<div class="product__item__text">'
				html += '<h5><a href="anime-episode.php?idAnime='+r.idAnime+'&numSaison='+r.numSaison+'">' + r.arc + '</a></h5></div></div></div>'
				$("#animeSaisonTitle").html("<h3>"+r.nomAnime+"</h3>");
				$("#randomName").html(r.nomAnime);
			}
			$("#animeSaison").html(html);	
		},
		error: function(){
			$("#animeSaison").html("ERROR");
		}
	});
}