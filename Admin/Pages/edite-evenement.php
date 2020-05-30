<?php
if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
}
ob_start();

$sessionencours = selectionSessionencours();
/***
 * Connexion à la base de donnée, défini dans Admin/Librairie/fonctions.php
 */
$pdo = connectionDB();
/**
 * Les classes du calendrier 
 * 
 */
// require_once('source/Calendrier/Events.php');
require_once('vendor/autoload.php');

?>
<?php

$erreurs = [];
/**
 * Inclusion de la classe Evenement 
 */
$evenements = new Calendrier\Evenement($pdo);

if (!isset($_GET['id-evenement'])) {
    header('location:index.php?page=index&message=Aucun évenement précisé ! ');
}


try {
    $evenement = $evenements->afficheEvenement($_GET['id-evenement']);
} catch (\Exception $e) {
    header('location:index.php?page=index&message=Aucun évenement précisé ! ');
}


$donnees = [
    'titre'             => $evenement->getNom(),
    'type-evenement'    => $evenement->getType_evenement(),
    'date_debut'        => $evenement->getDate_debut()->format('Y-m-d'),
    'heure_debut'       => $evenement->getDate_debut()->format('H:i'),
    'date_fin'          => $evenement->getDate_fin()->format('Y-m-d'),
    'heure_fin'         => $evenement->getDate_fin()->format('H:i'),
    'description'       => $evenement->getDescription(),
];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $donnees = $_POST;
    $evenementValide = new Calendrier\EvenementValide();
    $erreurs = $evenementValide->validees($donnees);

    if (empty($erreurs)) {
        $evenement->setNom($donnees['titre']);
        $evenement->setType_evenement($donnees['type-evenement']);
        $evenement->setDescription($donnees['description']);
        $evenement->setDate_debut(DateTime::createFromFormat('Y-m-d H:i', $donnees['date_debut'] . ' ' . $donnees['heure_debut'])->format('Y-m-d H:i:s'));
        $evenement->setDate_fin(DateTime::createFromFormat('Y-m-d H:i', $donnees['date_fin'] . ' ' . $donnees['heure_fin'])->format('Y-m-d H:i:s'));
        $evenements->edite_evenement($evenement);
        header('location:index.php?page=index&message=1');
        exit();
    }
}

?>

<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
            <li class="breadcrumb-item active"></li>Edition de l'évènement <?= $evenement->getNom() ?></li>
        </ul>
    </div>
</div>
<section class="container-fluid my-5">
    <div class="d-flex flex-row align-items-center justify-content-between">
    </div>
    <?php if (!empty($erreurs)) : ?>
        <div class="alert alert-danger">
            Merci de corriger vos erreurs
        </div>
    <?php endif; ?>
    <div class="d-flex flex-row align-items-center justify-content-between">
        <h1>Edition de l'évenement</h1>
    </div>
    <form action="" method="POST" class="form mt-5">
        <?php include 'event-form.php' ?>
        <button class="btn btn-primary">Editer l'évènement</button>
    </form>
</section>