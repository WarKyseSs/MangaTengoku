<!DOCTYPE html>
<html lang="fr">

<head>
	<?php include 'scripts/head.php'; ?>
</head>

<?php 
	require_once 'scripts/connexion.php'; // ajout connexion bdd 

    if(isset($_SESSION['user'])){
        header('Location: index.php');
        die();
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
                        <h2>Connexion</h2>
                        <p>Bienvenue chez MangaTengoku.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->
	
    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Connectez-vous</h3>
						<?php 
						if(isset($_GET['login_err']))
						{
							$err = htmlspecialchars($_GET['login_err']);

							switch($err)
							{
								case 'password':
								?>
									<div class="alert alert-danger">
										<strong>Erreur</strong> mot de passe incorrect
									</div>
								<?php
								break;

								case 'email':
								?>
									<div class="alert alert-danger">
										<strong>Erreur</strong> email incorrect
									</div>
								<?php
								break;

								case 'already':
								?>
									<div class="alert alert-danger">
										<strong>Erreur</strong> compte non existant
									</div>
								<?php
								break;
							}
						}
						?> 
                        <form method="post">
                            <div class="input__item">
                                <input type="email" placeholder="Adresse mail" name="email" id="email" required>
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" placeholder="Mot de passe" name="mdp" id="mdp" required>
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn" name="formlog" id="formlog">Connexion</button>
                        </form>
						<?php include "scripts/login.php"; ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Vous ne possédez pas de compte?</h3>
                        <a href="signup.php" class="primary-btn">S'inscrire maintenant</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <?php include 'scripts/footer.php'; ?>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php include 'scripts/jsPlugin.php'; ?>

</body>
</html>