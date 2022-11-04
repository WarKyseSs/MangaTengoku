<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'scripts/head.php'; ?>
</head>

<?php 
	require_once 'scripts/connexion.php'; // ajout connexion bdd 

    if(isset($_SESSION['user'])){
        header('Location: index.php');
    }
?>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <?php include 'scripts/header.php'; ?>
    </header>
    <!-- Header End -->

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Inscription</h2>
                        <p>Bienvenue chez MangaTengoku.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Signup Section Begin -->
    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Inscrivez-vous</h3>
						<?php 
						if(isset($_GET['reg_err']))
						{
							$err = htmlspecialchars($_GET['reg_err']);

							switch($err)
							{
								case 'success':
								?>
									<div class="alert alert-success">
										<strong>Succès</strong> inscription réussie !
									</div>
								<?php
								break;

								case 'password':
								?>
									<div class="alert alert-danger">
										<strong>Erreur</strong> mot de passe différent
									</div>
								<?php
								break;

								case 'email':
								?>
									<div class="alert alert-danger">
										<strong>Erreur</strong> email non valide
									</div>
								<?php
								break;

								case 'email_length':
								?>
									<div class="alert alert-danger">
										<strong>Erreur</strong> email trop long
									</div>
								<?php 
								break;

								case 'pseudo_length':
								?>
									<div class="alert alert-danger">
										<strong>Erreur</strong> pseudo trop long
									</div>
								<?php 
								case 'already':
								?>
									<div class="alert alert-danger">
										<strong>Erreur</strong> compte deja existant
									</div>
								<?php 

							}
						}
						?>
                        <form method="post">
                           <div class="input__item">
                                <input type="email" placeholder="Adresse mail" name="email" id="email" required>
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" placeholder="Pseudo" name="pseudo" id="pseudo" required>
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" placeholder="Mot de passe" name="mdp" id="mdp" required>
                                <span class="icon_lock"></span>
                            </div>
							<div class="input__item">
                                <input type="password" placeholder="Confirmation de mot de passe" name="cmdp" id="cmdp" required>
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn" name="formsig" id="formsig">Inscription</button>
                        </form>
						<?php include 'scripts/signup.php';?>
                    </div>
                </div>
				<div class="col-lg-6">
                    <div class="login__register">
                        <h3>Vous possédez déjà un compte? </h3>
                        <a href="login.php" class="primary-btn">Se connecter maintenant</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <?php include 'scripts/footer.php'; ?>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php include 'scripts/jsPlugin.php'; ?>

</body>
</html>