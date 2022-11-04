function favorite(numEp, idAnime, numSaison, email){
	if(document.getElementById("favorite" + numEp).className == "fa fa-heart"){
		document.getElementById("favorite" + numEp).className = "fa fa-heart-o";		
		appelScript("2", idAnime, numSaison, numEp, email);
	} else {
		document.getElementById("favorite" + numEp).className = "fa fa-heart";
		appelScript("1", idAnime, numSaison, numEp, email);
	}
}

function appelScript(action, idAnime, numSaison, numEp, email){
	$.ajax({
		type: "POST",
		url: "scripts/favorite.php?idAnime="+idAnime+"&numSaison="+numSaison+"&numEp="+numEp+"&email="+email+"&action="+action,
		data: {table: "anime"},
		dataType: "json"
	});
}


function loadAnime(idAnime, numSaison, email){
	$.ajax({
		type: "POST",
		url: "scripts/animeEpisode.php?idAnime="+idAnime+"&numSaison="+numSaison,
		data: {table: "anime"},
		dataType: "json",
		success: function(data) {
			console.log(data.length)
			var html = "" ;
			see = true;
			previous = 0;
			for(var r of data) {
				if(previous != r.numEp){
					html += '<div class="col-lg-4 col-md-6 col-sm-6"><div class="product__item">'
					html += '<div class="product__item__pic" style="background-image: url(\'img/anime/ver/' + r.img + '\');background-repeat: no-repeat; background-size: cover; background-position: top center;">'
					if(r.email == 'A'){
						html += '<div class="ep">Episode ' + r.numEp + ' <i id="favorite'+r.numEp+'" class="fa fa-heart" onclick=\'javascript:favorite("'+r.numEp+'", "'+r.idAnime+'", "'+r.numSaison+'" , "'+email+'");\'></i></div></div>'
					} else {
						html += '<div class="ep">Episode ' + r.numEp + ' <i id="favorite'+r.numEp+'" class="fa fa-heart-o" onclick=\'javascript:favorite("'+r.numEp+'", "'+r.idAnime+'", "'+r.numSaison+'" , "'+email+'");\'></i></div></div>'
					}
					see = false
					html += '<div class="product__item__text">'
					html += '<h5><a href="#">' + r.titre + '</a></h5></div></div></div>'
					$("#animeEpisodeTitle").html('<h3>'+r.arc+' - Studio : ' + r.studio + ' </h3>');
					$("#randomName").html(r.nomAnime);
					$("#randomName2").html(r.arc);
					previous = r.numEp;
				}
				
				
				/*
				html += '<div class="col-lg-4 col-md-6 col-sm-6"><div class="product__item">'
				html += '<div class="product__item__pic" style="background-image: url(\'img/anime/ver/' + r.img + '\');background-repeat: no-repeat; background-size: cover; background-position: top center;">'
				html += '<div class="ep">Episode ' + r.numEp + ' <i id="favorite'+r.numEp+'" class="fa fa-heart-o" onclick=\'javascript:favorite("'+r.numEp+'", "'+r.idAnime+'", "'+r.numSaison+'" , "'+email+'");\'></i></div></div>'
				html += '<div class="product__item__text">'
				html += '<h5><a href="#">' + r.titre + '</a></h5></div></div></div>'
				$("#animeEpisodeTitle").html('<h3>'+r.arc+' - Studio : ' + r.studio + ' </h3>');
				$("#randomName").html(r.nomAnime);
				*/
			}
			$("#animeEpisode").html(html);	
		},
		error: function(){
			$("#animeEpisode").html("ERROR");
		}
	});
}