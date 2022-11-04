<?php
	include 'connexion.php';
	header('Content-Type: text/html; charset=utf-8');
	try {
		// sql 
		$sql = "SELECT * FROM utilisateur";

		// Prepare statement
		$stmt = $db->prepare($sql);

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