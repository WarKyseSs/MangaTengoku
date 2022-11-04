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

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel" id="animeCarou">
                <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h2>Attack on Titan</h2>
								<p>Shingeki no Kyojin</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="img/hero/hero-2.png">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h2>One Piece</h2>
								<p>One Piece</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="img/hero/hero-3.png">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h2>Demon Slayer</h2>
								<p>Kimetsu no Yaiba</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Derniers ajoutés</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="animeAdded"></div>
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
	<script src="js/animeAdded.js"></script>

</body>
</html>