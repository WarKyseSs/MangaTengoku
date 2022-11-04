<div class="container">
	<div class="row">
		<div class="col-lg-2">
			<div class="header__logo">
				<a href="./index.php">
					<img src="img/logo.png" alt="">
				</a>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="header__nav">
				<nav class="header__menu mobile-menu">
					<ul>
						<li class="active"><a href="./index.php">Page d'accueil</a></li>
						<li><a href="./catalogue.php">Catalogue</a></li>
						<?php if(isset($_SESSION['user']) && $perm == 1){ ?>
							<li>
								<a>Admin <span class="arrow_carrot-down"></span></a>
								<ul class="dropdown">
									<li><a href="./user.php">Utilisateurs</a></li>
									<li><a href="./anime.php">Anime</a></li>
								</ul>
							</li>
						<?php } ?>
					</ul>
				</nav>
			</div>
		</div>
		<div class="col-lg-2">
			<div class=" dropdown text-end">
				<a href="#" class="d-block link-dark text-decoration-none header__right" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
					<span class="icon_profile"></span>
				</a>
				<?php
					if(!isset($_SESSION['user'])){ 
				?>
						<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
							<li><a class="dropdown-item" href="login.php">Connexion</a></li>
						</ul>
				<?php
					} else { 
				?>
						<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
							<li><a class="dropdown-item" href="profil.php">Profil</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="scripts/logout.php">Déconnexion</a></li>
						</ul>
				<?php
					}			
				?>
			</div>
		</div>
	</div>
</div>