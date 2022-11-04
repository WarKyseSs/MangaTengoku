<!DOCTYPE html>
<html lang="fr">

<head>
	<?php include "scripts/head.php"; ?>
</head>

<?php 
	require_once 'scripts/connexion.php'; // ajout connexion bdd 

	if(isset($_SESSION['user'])){
		
		// On récupere les données de l'utilisateur
		$req = $db->prepare('SELECT * FROM utilisateur WHERE token = ?');
		$req->execute(array($_SESSION['user']));
		$data = $req->fetch();
		
		$perm = $data['perm'];
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

    <!-- Information Section Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/kaneki.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2 class="text-center"> <font color="white" >Qui sommes-n</font><font color="FF4747">ous ?</font></h2>
						<h4 class="text-center"><font color="white">Nous sommes 2 étudiants de bloc 2 en bachelier d'informatique de gestion à la <a href="https://www.helha.be">HELHa</a> de Mons.</font></h4>
						</br>
						<h4 class="text-center"><font color="white">D. Florian</font></h4>
						<h4 class="text-center"><font color="white">R. Livio</font></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<br><br><br>
	<section class="normal-breadcrumb set-bg" data-setbg="img/toka.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2 class="text-center"> <font color="white" >Pourquoi un site d'an</font><font color="FF4747">ime ?</font></h2> 
						<h4 class="text-center" style="padding-left : 6%; padding-right : 6%">
							<font color="white" >
								Nous avons une passion pour les mangas/animes, nous avions aussi un projet
								de faire un site pour répertorier nos animes vu dans une bibliothèque propre à chaqu'un ! Grâce à nos connaissance 
								nous avons pu développer le site !
							</font>
						</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!-- Information Section End -->

	<!-- Footer Section Begin -->
	<footer class="footer">
		<?php include 'scripts/footer.php'; ?>
	</footer>
	<!-- Footer Section End -->

	<!-- Js Plugins -->
	<?php include "scripts/jsPlugin.php"; ?>

</body>
</html>