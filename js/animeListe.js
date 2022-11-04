$(document).ready(function(){	
	$.ajax({
		type: "POST",
		url: "scripts/animeListe.php",
		data: {table: "anime"},
		dataType: "json",
		success: function(data) {
			var html = "" ;
			for(var r of data) {
				html += '<div class="col-lg-4 col-md-6 col-sm-6"><div class="product__item">'
				html += '<div class="product__item__pic" style="background-image: url(\'img/anime/ver/' + r.img + '\'); background-repeat: no-repeat; background-size: cover; background-position: top center;">'
				html += '<div class="ep">' + r.nbEpTot + ' Ep / ' + r.etatAnime + '</div></div>'
				html += '<div class="product__item__text">'
				html += '<h5><a href="anime-details.php?idAnime='+r.idAnime+'">' + r.nomAnime + '</a></h5></div></div></div>'
			}	
			
			$("#animeListe").html(html);					
		},
		error: function(){
			$("#animeListe").html("ERROR");
		}
	});
})