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
        <?php include "scripts/header.php"; ?>
    </header>
    <!-- Header End -->

    <!-- Product Section Begin -->
	<section class="normal-breadcrumb set-bg" data-setbg="img/support.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
						<h2 class="text-center"> <font color="white" >Informat</font><font color="FF4747">ions</font></h2> 
						<h4 class="text-center"> <strong><font color="white">Si vous rencontrez un problème technique, un bug ou autres veuillez nous contacter au plus vite ! </font></strong></h4><br>
						<h4 class="text-center"><font color="white" >mangatengoku@outlook.com</font></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!-- Product Section End -->

	<!-- Footer Section Begin -->
	<footer class="footer">
		<?php include "scripts/footer.php"; ?>
	</footer>
	<!-- Footer Section End -->

	<!-- Js Plugins -->
	<?php include "scripts/jsPlugin.php"; ?>

</body>
</html>