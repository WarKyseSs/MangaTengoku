$(document).ready(function(){	
	$.ajax({
		type: "POST",
		url: "scripts/animePopular.php",
		data: {table: "anime"},
		dataType: "json",
		success: function(data) {
			var html = "" ;
			for(var r of data) {				
				html += '<div class="product__sidebar__view__item" style="background-image: url(\'img/anime/hor/' + r.img + '\');background-repeat: no-repeat; background-size: cover; background-position: top center;">'
				html += '<div class="ep">' + r.nbEpTot + ' Ep / ' + r.etatAnime + '</div>'
				html += '<h5><a href="anime-details.php?idAnime='+r.idAnime+'">' + r.nomAnime + '</a></h5></div>'
			}
			
			$("#animePopular").html(html);					
		},
		error: function(){
			$("#animePopular").html("ERROR");
		}
	});
})