<?php
	include 'connexion.php';
	header('Content-Type: text/html; charset=utf-8');
	$email = $_GET['email'];
	$idAnime = $_GET['idAnime'];
	$numSaison = $_GET['numSaison'];
	$numEp = $_GET['numEp'];
	$action = $_GET['action'];
	try {
		
		if($action == '1'){
			// sql 
			$sql = "INSERT INTO `vu`(`email`, `idAnime`, `numSaison`, `numEp`) VALUES (:email, :idAnime, :numSaison, :numEp)";
		} else if ($action == '2'){
			// sql 
			$sql = "DELETE FROM `vu` WHERE email=:email AND idAnime=:idAnime AND numSaison=:numSaison AND numEp=:numEp";
		}
		
		// Prepare statement
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':email', $email, PDO::PARAM_STR, 50);
		$stmt->bindParam(':idAnime', $idAnime, PDO::PARAM_STR, 50);
		$stmt->bindParam(':numSaison', $numSaison, PDO::PARAM_STR, 50);
		$stmt->bindParam(':numEp', $numEp, PDO::PARAM_STR, 50);
		
		$stmt->execute();

		$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		echo utf8_encode(json_encode($rs));
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}

	$db = null;

?>