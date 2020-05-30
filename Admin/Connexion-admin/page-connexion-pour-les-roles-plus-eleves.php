<?php

if (!empty($_SESSION['Administrateur'])) {
	header('Location:../index.php?page=pages-profile&identifiant=' . $_SESSION['Administrateur']);
}

require_once('../Librairie/fonctions.php');
$pdo = connectionDB();

$Outil_administrations = selection_tous_ligne("Outil_administrations");

if (!empty($_POST['btn-connexion-administrateur'])) {
	$reponse = connexion_admin($_POST['email'], $_POST['password']);
	if ($reponse != 0 and $reponse = 1) {
		$_SESSION['Administrateur'] = $_POST['email'];
		header('Location:../index.php?page=pages-profile&identifiant=' . $_SESSION['Administrateur']);
	} else {
		header('Location:' . $_SERVER['REQUEST_URI'] . '?message=1');
	}
}

if (!empty($_POST['btn-connexion-enseignant'])) {
	$password = sha1($_POST['password']);
	$reponse = connexion_enseignant($_POST['email'], $password);
	if ($reponse != 0 and $reponse = 1) {
		$_SESSION['enseignants'] = $_POST['email'];
		header('Location:../index.php?page=pages-profile&identifiant=' . $_SESSION['enseignants']);
	} else {
		header('Location:' . $_SERVER['REQUEST_URI'] . '?message=2');
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
	<!-- <link href="css/component.css" rel="stylesheet" type="text/css" media="all" /> -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>

	<nav class="navbar navbar-dark text-white bg-dark">
		<img class="navbar-brand logo" src="../pieces-admin/<?= $Outil_administrations['Logo'] ?>" alt="Logo" srcset="">
		<div class="collapse navbar-collapse" id="collapsibleNavId">

		</div>
	</nav>

	<div class="wthree_agile_admin_info">
		<?php
		if (!empty($_SESSION['Administrateur'])) {
			header('Location:../index.php?page=pages-profile&identifiant=' . $_SESSION['Administrateur']);
		}
		?>

		<div class="clearfix"></div>
		<div class="container">
			<div class="alert alert-danger text-center"> <b> Désolé ! cette page ne vous est pas déstinée. <a href="">Cliquez ici</a> pour retourner</b></div>
			<div class="row">
				<div class="block">
					<div class="col-sm-6">
						<div class="inner_content_w3_agile_info">
							<div class="registration admin_agile">
								<div class="signin-form profile admin">
									<?php if (isset($_GET['message']) && $_GET['message'] === '1') : ?>
										<div class="alert alert-danger">Vous n'êtes pas autorisé d'acceder à cette page</div>
									<?php endif; ?>
									<?php if (isset($_GET['message']) && $_GET['message'] === '2') : ?>
										<div class="alert alert-info">Veillez vérifier l'accès ici</div>
									<?php endif; ?>
									<h2>Connexion</h2>
									<div class="login-form">
										<form action="" method="post">
											<input type="email" name="email" required="Veillez votre adresse email" placeholder="Adresse email" autocomplete="OFF">
											<input type="password" name="password" value="" required="" autocomplete="OFF" placeholder="Mot de passe">
											<div class="tp">
												<input type="submit" name="btn-connexion-administrateur" value="CONNEXION">
											</div>
										</form>
									</div>
									<h6><a href="main-page.html">Retour a la page d'accueil</a>
										<h6>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="inner_content_w3_agile_info">
						<div class="registration admin_agile">
							<div class="signin-form profile admin">
								<?php if (isset($_GET['message']) && $_GET['message'] === '1') : ?>
									<div class="alert alert-info">Veillez vérifier l'accès ici</div>
								<?php endif; ?>
								<?php if (isset($_GET['message']) && $_GET['message'] === '2') : ?>
									<div class="alert alert-danger">Vous n'êtes pas autorisé d'acceder à cette page</div>
								<?php endif; ?>
								<h2>Pour les enseignants</h2>
								<div class="login-form">
									<form action="" method="post">
										<input type="email" name="email" required="Veillez votre adresse email" placeholder="Adresse email" autocomplete="OFF">
										<input type="password" name="password" value="" required="" autocomplete="OFF" placeholder="Mot de passe">
										<div class="tp">
											<input type="submit" name="btn-connexion-enseignant" value="CONNEXION">
										</div>
									</form>
								</div>
								<h6><a href="main-page.html">Retour a la page d'accueil</a>
									<h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script src="js/scripts.js"></script>
		<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
</body>

</html>