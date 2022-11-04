<!DOCTYPE html>
<html lang="fr">

<head>
	<?php include 'scripts/head.php'; ?>
	<style>img{width:100%;height:100%;object-fit:contain;}</style>
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

<body onload="loadAnime(<?php echo $_GET['idAnime'];?>)">
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
                        <a href="./catalogue.php">Catalogue</a>
						<a href="./anime-details.php?idAnime=<?php echo $_GET['idAnime'];?>" id="randomName"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3" id="img"></div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title" id="animeTitle"></div>
                            <div id="descript"></div>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Nb. saisons:</span><span id="nbSaisons"></span></li>
                                            <li><span>Status:</span><span id="status"></span></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Rating:</span><span id="rating"></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a href="anime-saison.php?idAnime=<?php echo $_GET['idAnime'];?>" class="follow-btn"> Saison(s)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->

	<!-- Footer Section Begin -->
	<footer class="footer">
		<?php include 'scripts/footer.php'; ?>
	</footer>
	<!-- Footer Section End -->

	<!-- Js Plugins -->
	<?php include 'scripts/jsPlugin.php'; ?>
	<script src="js/animeDetails.js"></script>

</body>
</html>