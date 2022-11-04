<?php

	require_once 'connexion.php'; // On inclut la connexion à la base de données
	
	if(isset($_POST['formlog'])) {

		if(!empty($_POST['email']) && !empty($_POST['mdp'])) // Si il existe les champs email, password et qu'il sont pas vident
		{
			// Patch XSS
			$email = htmlspecialchars($_POST['email']); 
			$mdp = $_POST['mdp'];
			
			$email = strtolower($email); // email transformé en minuscule
			
			// On regarde si l'utilisateur est inscrit dans la table utilisateurs
			$check = $db->prepare('SELECT * FROM utilisateur WHERE email = ?');
			$check->execute(array($email));
			$data = $check->fetch();
			$row = $check->rowCount();

			// Si > à 0 alors l'utilisateur existe
			if($row > 0)
			{
				// Si le mail est bon niveau format
				if(filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					// Si le mot de passe est le bon
					if(password_verify($mdp, $data['mdp']))
					{
						// On créer la session et on redirige sur index.php
						$_SESSION['user'] = $data['token'];
						$_SESSION['email'] = $data['email'];
						header('Location: /MangaTengoku/index.php');
					}else{ header('Location: /MangaTengoku/login.php?login_err=password'); }
				}else{ header('Location: /MangaTengoku/login.php?login_err=email');}
			}else{ header('Location: /MangaTengoku/login.php?login_err=already');}
		}else{ header('Location: /MangaTengoku/login.php');} // si le formulaire est envoyé sans aucune donnée
	}
	$db = null;  //fermer la connexion pour libérer les ressources du serveur;