<?php

if (!empty($_SESSION['Administrateur'])) {
	header('Location:../index.php?page=pages-profile&identifiant=' . $_SESSION['Administrateur']);
}

require_once('../Librairie/fonctions.php');
$pdo = connectionDB();

if (!empty($_POST['btn-connexion-administrateur'])) {
	$reponse = connexion_admin($_POST['email'], $_POST['password']);
	if ($reponse != 0 and $reponse = 1) {
		$_SESSION['Administrateur'] = $_POST['email'];
		header('Location:../index.php?page=pages-profile&identifiant=' . $_SESSION['Administrateur']);
	} else {
		header('Location:' . $_SERVER['REQUEST_URI'] . '?message=veillez vérifier l\'accès à votre espace personnel');
	}
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Esteem An Admin Panel Category Flat Bootstrap Responsive Website Template | Admin Login :: w3layouts</title>
	<!-- custom-theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/component.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- banner -->
	<div class="wthree_agile_admin_info">
		<div class="w3_agileits_top_nav">
			<!-- <ul id="gn-menu" class="gn-menu-main">
				<li class="second logo admin">
					<h1><a href="main-page.html"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Esteem </a></h1>
				</li>
				<li class="second full-screen">
					<section class="full-top">
						<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
					</section>
				</li>
			</ul> -->
		</div>
		<?php
		if (!empty($_SESSION['Administrateur'])) {
			header('Location:../index.php?page=pages-profile&identifiant=' . $_SESSION['Administrateur']);
		}
		?>

		<div class="clearfix"></div>
		<div class="inner_content">
			<div class="inner_content_w3_agile_info">
				<div class="registration admin_agile">
					<div class="signin-form profile admin">
						<div class="alert alert-danger">Interdit d'acceder à cette page</div>
						<h2>Choix de mot de passe</h2>
						<div class="login-form">
							<form action="" method="post">
								<input type="password" name="password-1" required="" placeholder="Veillez choisir un mot de passe" autocomplete="OFF">
								<input type="password" name="password-2" value="" required="" autocomplete="OFF" placeholder="Retaper le mot de passe">
								<div class="tp">
									<input type="submit" name="btn-choix-passe" value="Confiermer">
								</div>
							</form>
						</div>
						<h6><a href="main-page.html">Retour a la page d'accueil</a>
							<h6>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script src="js/scripts.js"></script>
		<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>

</html>