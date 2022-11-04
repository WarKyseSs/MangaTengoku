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
	} else {
		header("Location: index.php");
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

    <!-- Insertion d'un tableau pour user  -->
    </br>
	<h2 style="text-align:center"><font color="white">Liste des utilisat</font><font color="FF4747">eurs</font></h2>
	<div class="table-responsive table-dark w-75 text-center" style="max-height:500px; margin:0 auto">
		<table class="table table-striped table-hover table-sm ">
			<thead>
				<tr class="table-light">
					<th scope="col">Ps<font color="FF4747">eudo</font></th>
					<th scope="col">E<font color="FF4747">mail</font></th>
					<th scope="col">Date d'inscrip<font color="FF4747">tion</font></th>
				</tr>
			</thead>
			<tbody id="userInTable"></tbody>
		</table>
	</div>
	<!-- Insertion d'un tableau pour user  -->
	
    </br></br></br></br></br>
	<!-- Footer Section Begin -->
	<footer class="footer">
		<?php include 'scripts/footer.php'; ?>
	</footer>
	<!-- Footer Section End -->

	<!-- Js Plugins -->
	<?php include 'scripts/jsPlugin.php'; ?>
	<script src="js/utilisateurTableau.js"></script>

</body>
</html>