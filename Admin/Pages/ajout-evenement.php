<?php

use App\Valide;

ob_start();

if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
}
$sessionencours = selectionSessionencours();
/***
 * Connexion à la base de donnée, défini dans Admin/Librairie/fonctions.php
 */
$pdo = connectionDB();
/**
 * Les classes du calendrier 
 * 
 */
// require_once('source/Calendrier/Evenement.php');
require_once('vendor/autoload.php');
$erreurs = [];
$donnees = [

    'date_debut' => $_GET['date'] ?? NULL,
    'date_fin' => $_GET['date'] ?? NULL
];

$valide = new Valide($donnees);
$valide->validee('date_debut', 'date_valide');
$valide->validee('date_fin', 'date_valide');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $donnees = $_POST;
    $evenementValide = new Calendrier\EvenementValide();
    $erreurs = $evenementValide->validees($_POST);

    if (empty($erreurs)) {

        $evenement = new \Calendrier\Events();
        $evenement->setNom($donnees['titre']);
        $evenement->setType_evenement($donnees['type-evenement']);
        $evenement->setDescription($donnees['description']);
        $evenement->setDate_debut(DateTime::createFromFormat('Y-m-d H:i', $donnees['date_debut'] . ' ' . $donnees['heure_debut'])->format('Y-m-d H:i:s'));
        $evenement->setDate_fin(DateTime::createFromFormat('Y-m-d H:i', $donnees['date_fin'] . ' ' . $donnees['heure_fin'])->format('Y-m-d H:i:s'));
        $evenements = new \Calendrier\Evenement($pdo);
        $evenements->creer_evenement($evenement);
        header('location:index.php?page=index&message=1');
        exit();
    }
}
?>
<?php

/**
 * Inclusion de la classe Evenement 
 */
$evenements = new Calendrier\Evenement($pdo);

?>

<section class="container-fluid">
    <header class="mt-4">
        <h1>Je suis Zaenma</h1>
    </header>
    <?php if (!empty($erreurs)) : ?>
        <div class="alert alert-danger">
            Merci de corriger vos erreurs
        </div>
    <?php endif; ?>
    <div class="d-flex flex-row align-items-center justify-content-between">
        <h1>Ajout d'un évenement</h1>
    </div>
    <form action="" method="POST" class="form">
        <?php include 'event-form.php' ?>
        <button class="btn btn-primary mb-5">Ajouter l'évènement</button>
    </form>

</section>