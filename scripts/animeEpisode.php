<?php
	include 'connexion.php';
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	$idAnime = $_GET["idAnime"];
	$numSaison = $_GET["numSaison"];
	try {
		// sql 
		$sql = "SELECT anime.*, saison.*, episode.*, CASE WHEN vu.email = :email THEN 'A' ELSE 'B' END as email FROM anime 
		LEFT JOIN saison ON saison.idAnime = anime.idAnime
		LEFT JOIN episode ON episode.idAnime = saison.idAnime
			AND episode.numSaison = saison.numSaison
        LEFT JOIN vu ON vu.idAnime = anime.idAnime AND vu.numSaison=episode.numSaison AND vu.numEp=episode.numEp
		WHERE saison.idAnime = :idAnime AND saison.numSaison = :numSaison ORDER BY numEp ASC, email ASC;"; 
		
		
		// Prepare statement
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':idAnime', $idAnime, PDO::PARAM_STR, 50);
		$stmt->bindParam(':numSaison',$numSaison, PDO::PARAM_STR, 50);
		$stmt->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR, 50);	
		$stmt->execute();

		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		// L'opérateur de résolution de portée "double deux-points" (::), fournit un moyen d'accéder aux membres static ou constant, ainsi qu'aux propriétés ou méthodes surchargées d'une classe.
		
		echo utf8_encode(json_encode($rs));
		// echo ($stmt->rowCount() . " record correspond");
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$db = null;  //fermer la connexion pour libérer les ressources du serveur;

?>