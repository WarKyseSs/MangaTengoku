<?PHP
	include 'connexion.php';
	header('Content-Type: text/html; charset=utf-8');
	try {

        if($_GET['action'] == '1'){

            $insert = $db->prepare('insert into anime(nomAnime, nbSaisons, nbeptot, etatanime, descript, img, note) 
            values(
                :AnimeBoxNomAnime, 
                :AnimeBoxNbSaison, 
                :AnimeBoxNbTotal, 
                :AnimeBoxEtatAnime, 
                :AnimeBoxDescAnime, 
                :AnimeBoxImageAnime, 
                :AnimeBoxNoteAnime)'
            );
            $insert->execute(array(
                'AnimeBoxNomAnime' => $_POST['AnimeBoxNomAnime'],
                'AnimeBoxNbSaison' => $_POST['AnimeBoxNbSaison'],
                'AnimeBoxNbTotal' => $_POST['AnimeBoxNbTotal'],
                'AnimeBoxEtatAnime' => $_POST['AnimeBoxEtatAnime'],
                'AnimeBoxDescAnime' => $_POST['AnimeBoxDescAnime'],
                'AnimeBoxImageAnime' => $_POST['AnimeBoxImageAnime'],
                'AnimeBoxNoteAnime' => $_POST['AnimeBoxNoteAnime']
            ));

        } else if ($_GET['action'] == '2'){
            $insert = $db->prepare('insert into saison(numSaison, arc, nbEpSaison, etatSaison, idAnime, studio) 
            values(
                :SaisonBoxNumSaison,
                :SaisonBoxNom,
                :SaisonBoxNbSaison,
                :SaisonBoxEtatSaison,
                :SaisonBoxIDSaison,
                :SaisonBoxStudioSaison)'
            );
            $insert->execute(array(
                'SaisonBoxNumSaison' => $_POST['SaisonBoxNumSaison'],
                'SaisonBoxNom' => $_POST['SaisonBoxNom'],
                'SaisonBoxNbSaison' => $_POST['SaisonBoxNbSaison'],
                'SaisonBoxEtatSaison' => $_POST['SaisonBoxEtatSaison'],
                'SaisonBoxIDSaison' => $_POST['SaisonBoxIDSaison'],
                'SaisonBoxStudioSaison' => $_POST['SaisonBoxStudioSaison'],
            ));

        } else if ($_GET['action'] == '3'){
            $insert = $db->prepare('insert into episode(numEp, titre, numSaison, idAnime) 
            values(
                :EpisodeBoxNbEpisode,
                :EpisodeBoxNom,
                :EpisodeBoxNumEpisode,
                :EpisodeBoxIdAnime)'
            );
            $insert->execute(array(
                'EpisodeBoxNbEpisode' => $_POST['EpisodeBoxNbEpisode'],
                'EpisodeBoxNom' => $_POST['EpisodeBoxNom'],
                'EpisodeBoxNumEpisode' => $_POST['EpisodeBoxNumEpisode'],
                'EpisodeBoxIdAnime' => $_POST['EpisodeBoxIdAnime'],
            ));
        }
		// Prepare statement
		$rs = $insert->fetchAll(PDO::FETCH_ASSOC);
		// L'opérateur de résolution de portée "double deux-points" (::), fournit un moyen d'accéder aux membres static ou constant, ainsi qu'aux propriétés ou méthodes surchargées d'une classe.
		
		echo utf8_encode(json_encode($rs));
		// echo ($stmt->rowCount() . " record correspond");
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$db = null;     
?>
