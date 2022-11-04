<!DOCTYPE html>
<html lang="fr">

<head>
	<?php include 'scripts/head.php'; ?>
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

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Page d'accueil</a>
                        <a href="./database.php">Catalogue</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Catalogue</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="animeListe"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Les plus populaires</h5>
                            </div>
							<div class="filter__gallery" id="animePopular"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Product Section End -->

	<!-- Footer Section Begin -->
	<footer class="footer">
		<?php include 'scripts/footer.php'; ?>
	</footer>
	<!-- Footer Section End -->
	
	<!-- Js Plugins -->
	<?php include 'scripts/jsPlugin.php'; ?>
	<script src="js/animePopular.js"></script>
	<script src="js/animeListe.js"></script>

</body>
</html>