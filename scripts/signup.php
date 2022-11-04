<?php

	require_once 'connexion.php'; // On inclut la connexion à la base de données
	
	if(isset($_POST['formsig'])) {
		
		// Si les variables existent et qu'elles ne sont pas vides
		if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['cmdp'])) {
			
			// Patch XSS
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$email = htmlspecialchars($_POST['email']);
			$mdp = htmlspecialchars($_POST['mdp']);
			$cmdp = htmlspecialchars($_POST['cmdp']);

			// On vérifie si l'utilisateur existe
			$check = $db->prepare('SELECT * FROM utilisateur WHERE email = ?');
			$check->execute(array($email));
			$data = $check->fetch();
			$row = $check->rowCount();

			$email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
			
			// Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
			if($row == 0){ 
				if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
					if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
						if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
							
							if($mdp == $cmdp){ // si les deux mdp saisis sont bon
							
								// On hash le mot de passe avec Bcrypt, via un coût de 12
								$cost = ['cost' => 12];

								$hashpass = password_hash($mdp, PASSWORD_BCRYPT, $cost);

								// On insère dans la base de données
								$insert = $db->prepare('INSERT INTO utilisateur (pseudo, email, mdp, token) VALUES(:pseudo, :email, :mdp, :token)');
								
								$insert->execute(array(
									'pseudo' => $pseudo,
									'email' => $email,
									'mdp' => $hashpass,
									'token' => bin2hex(openssl_random_pseudo_bytes(64))
								));

								// On redirige avec le message de succès
								//header('Location: ../MangaTengoku/index.php');
							}//else{ header('Location: /MangaTengoku/signup.php?reg_err=password');}
						}//else{ header('Location: /MangaTengoku/signup.php?reg_err=email');}
					}//else{ header('Location: /MangaTengoku/signup.php?reg_err=email_length');}
				}//else{ header('Location: /MangaTengoku/signup.php?reg_err=pseudo_length');}
			}//else{ header('Location: /MangaTengoku/signup.php?reg_err=already');}	
		}
	}
	$db = null;  //fermer la connexion pour libérer les ressources du serveur;