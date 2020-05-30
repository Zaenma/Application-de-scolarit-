<?php

include('Admin/Librairie/fonctions.php');
include('Admin/Librairie/fonctions-blog.php');

$matieres = selection_d_ensemble_table("Matiere", connectionDB()->query("SELECT * FROM Matiere")->rowCount());
$classes = selection_d_ensemble_table("Classes", connectionDB()->query("SELECT * FROM Classes")->rowCount());
$enseignants = selection_d_ensemble_table("Enseignants", connectionDB()->query("SELECT * FROM Enseignants")->rowCount());
$actualites = derniere_actualite();
$articles = selection_articles();
$tous_articles = tous_articles();
$Outil_administrations = selection_tous_ligne("Outil_administrations");
$bibliotheques = selection_tous_ligne("Bibliothèque");

if (!empty($_SESSION['eleves'])) {
	$eleves_session = selection("Eleves", $_SESSION['eleves']);
}

if (isset($_GET['identifiant']) && !empty($_GET['identifiant']) && intval($_GET['identifiant'])) {
	$un_article = retoune_un_article($_GET['identifiant']);
	$commentaire_par_article = commentaire_par_article($_GET['identifiant']);
}

if (!empty($_POST['btn-post-commentaire']) && !empty($_GET['identifiant']) && intval($_GET['identifiant'])) {
	if (!insert_commentaire($_GET['identifiant'], $_POST['pseudo'], $_POST['commentaire'])) {
		echo '<script>alert("Veillez reprendre le commentaire");</script>';
	}
}
$nombre_messages_non_lu = nombre_message_non_lu();
if (!empty($_GET['identifiant-enseignant']) && intval($_GET['identifiant-enseignant'])) {
	$selection_enseignant_ne_get = selection_info_id_ne_get("Enseignants", $_GET['identifiant-enseignant']);
}
$dossier = 'Pages/';
$pages = scandir($dossier);

if (isset($_GET['page']) && !empty($_GET['page'])) {
	if (in_array($_GET['page'] . '.php', $pages)) {
		$page = $_GET['page'];
	} else {
		$page = "error";
	}
} else {
	$page = "home";
}

?>


<!DOCTYPE html>
<html class="no-js">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $Outil_administrations['Nom_etablissement'] ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'> -->

	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<!-- CS Select -->
	<link rel="stylesheet" href="css/cs-select.css">
	<link rel="stylesheet" href="css/cs-skin-border.css">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/main.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<div id="fh5co-wrapper">
		<div id="fh5co-page">

			<?php
			include 'include/nav-barre.php';

			include 'Pages/' . $page . '.php';

			include('include/footer.php');
			?>

		</div>


	</div>

	<!-- jQuery -->


	<script src="js/jquery.minn.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/sticky.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	<!-- CS Select -->
	<script src="js/classie.js"></script>
	<script src="js/selectFx.js"></script>

	<!-- Main JS -->
	<script src="js/main.js"></script>

</body>

</html>