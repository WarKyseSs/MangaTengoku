<?php
	include 'connexion.php';
	session_start();
	// On récupere les données de l'utilisateur
	$req = $db->prepare('SELECT * FROM utilisateur WHERE token = ?');
	$req->execute(array($_SESSION['user']));
	$data = $req->fetch();
	
	$email = $data['email'];
	
	header('Content-Type: text/html; charset=utf-8');
	try {
		// sql 
		$sql = "SELECT * FROM vu 
		JOIN anime ON anime.idAnime = vu.idAnime
		WHERE vu.email = :email";

		// Prepare statement
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':email',$email, PDO::PARAM_STR, 50);

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