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

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/tanjiro.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Profil</h2>
                        <p>Bienvenue sur votre profil, <?php echo $data['pseudo'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->
	
	<!-- Insertion d'un tableau pour user  -->
    </br>
	<h2 style="text-align:center"><font color="white">Liste des episod</font><font color="FF4747">es vu</font></h2>
	<div class="table-responsive table-dark w-75 text-center" style="max-height:500px; margin:0 auto">
		<table class="table table-striped table-hover table-sm">
			<thead>
				<tr class="table-light">
					<th scope="col">Nom de l'a<font color="FF4747">nime</font></th>
					<th scope="col">Sa<font color="FF4747">ison</font></th>
					<th scope="col">N° de l'epi<font color="FF4747">sode</font></th>
				</tr>
			</thead>
			<tbody id="profilTable"></tbody>
		</table>
	</div>
	<!-- Insertion d'un tableau pour user  -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <?php include 'scripts/footer.php'; ?>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <?php include 'scripts/jsPlugin.php'; ?>
	<script src="js/profilTableau.js"></script>

</body>
</html>