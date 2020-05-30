<?php
ob_start();
require_once('Librairie/fonctions.php');
require_once('Librairie/fonctions-blog.php');


if (isset($_SESSION['Administrateur'])) {
    $publications = publications($_SESSION['Administrateur']);
    $donnees = selection("Admins", $_SESSION['Administrateur']);
} elseif (isset($_SESSION['eleves'])) {
    $publications = publications($_SESSION['eleves']);
    $donnees = selection("Eleves", $_SESSION['eleves']);
} elseif (isset($_SESSION['enseignants'])) {
    $publications = publications($_SESSION['enseignants']);
    $donnees = selection("Enseignants", $_SESSION['enseignants']);
}


require_once('Librairie/traitement.matiere.notes.php');



$lien = explode('&page-courente', $_SERVER['REQUEST_URI'])[0];
$ligne_par_page = 10;

$sessionencours = selectionSessionencours();

if (isset($_GET['niveau']) && !empty($_GET['niveau'])) {
    $eleves = selectionElevespournotes($_GET['niveau']);
    $effectifs_par_classe = effectifs_par_classe($_GET['niveau']);
} elseif (isset($_GET['classe']) && !empty($_GET['classe'])) {
    $eleves = selectionElevespournotes($_GET['classe']);
    $effectifs_par_classe = effectifs_par_classe($_GET['classe']);
}



/**
 * Ajouter une nouvelle classe
 */
if (!empty($_POST['btn-classe'])) {
    $code = generation_matricule($_POST['nom'], '');
    AjoutClasses($code, $_POST['nom']);
}

if (isset($_GET['details-messages']) && !empty($_GET['details-messages']) && intval($_GET['details-messages'])) {
    $details_message = details_message($_GET['details-messages']);
    $reponses_dun_message = reponses_dun_message($_GET['details-messages']);
}



$email_admin = email_admin();
$Outil_administrations = selection_tous_ligne("Outil_administrations");
$matieres = selection_d_ensemble_table("Matiere", $ligne_par_page);
$classes = selection_d_ensemble_table("Classes", $ligne_par_page);
$messages = selection_d_ensemble_table("Messages", $ligne_par_page);
$absences = selection_d_ensemble_table("Absence", $ligne_par_page);
$enseignants = selection_d_ensemble_table("Enseignants", $ligne_par_page);
$bibliotheques = selection_d_ensemble_table("Bibliothèque", $ligne_par_page);
$nombreLigne = compteNombreLigne("Eleves");
$nombreLigneEns = compteNombreLigne("Enseignants");
$nombreLigneClasses = compteNombreLigne("Classes");
$nombreLigneMessages = compteNombreLigne("Messages");
$nombreLigneEvenement = compteNombreLigne("Evenements");
$nombreLigneMatiere = compteNombreLigne("Matiere");
$messages_du_jours = messages_du_jours();
$messages_non_lu = messages_non_lu();
$messages_du_semaine = messages_du_semaine();
$actualites = selectionActualites();
$articles = selection_articles();
$nombre_messages_non_lu = nombre_message_non_lu();
if (!empty($_GET['identifiant-enseignant']) && intval($_GET['identifiant-enseignant'])) {
    $selection_enseignant_ne_get = selection_info_id_ne_get("Enseignants", $_GET['identifiant-enseignant']);
}
if (!empty($_GET['identifiant-eleve']) && intval($_GET['identifiant-eleve'])) {
    $selection_eleve_ne_get = selection_info_id_ne_get("Eleves", $_GET['identifiant-eleve']);
    $parents_eleves = parents_eleves($_GET['identifiant-eleve']);
}
if (!empty($_GET['id-absence']) && intval($_GET['id-absence'])) {
    $selection_Absence_ne_get = selection_info_id_ne_get("Absence", $_GET['id-absence']);
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
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $Outil_administrations['Nom_etablissement'] ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.premium.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/style.perso.css">
    <link rel="stylesheet" href="css/animate.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>

    <?php
    include 'include/menu.php';
    ?>
    <!-- Side Navbar -->
    <div class="page">
        <!-- navbar-->
        <?php
        include 'include/header.php';


        include 'Pages/' . $page . '.php';
        ?>
        <!-- Boite de dialogue pour la session -->

        <footer class="main-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <p><?= $Outil_administrations['Nom_etablissement'] ?> &copy; 2019-2020</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p>Version 1.0</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Notifications-->
    <script src="vendor/messenger-hubspot/build/js/messenger.min.js"> </script>
    <script src="vendor/messenger-hubspot/build/js/messenger-theme-flat.js"> </script>
    <script src="js/home-premium.js"> </script>

    <!-- Data Tables-->
    <script src="vendor/datatables.net/js/jquery.dataTables.js"></script>
    <script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="js/tables-datatable.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script src="js/js.js"></script>
</body>

</html>