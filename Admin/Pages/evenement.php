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

/**
 * Inclusion de la classe Evenement 
 */
$evenements = new Calendrier\Evenement($pdo);

if (!isset($_GET['id-evenement'])) {
    header('location:index.php?message=Aucun évenement précisé ! ');
}
try {
    $evenement = $evenements->afficheEvenement($_GET['id-evenement']);
} catch (\Exception $e) {
    header('location:index.php?message=Aucun évenement précisé ! ');
}

?>

<section class="container-fluid">
    <header class="mt-4">
        <h1>Je suis Zaenma</h1>
    </header>
    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-row align-items-center justify-content-between">
                <h1><?= $evenement->getNom(); ?></h1>
                <h3>Débute le : <?= $evenement->getDate_debut()->format('d/m/Y'); ?></h3>
            </div>
        </div>
        <div class="card-body">
            <ul>
                <li>Type d'évènement : <?= $evenement->getType_evenement() ?> </li>
                <li>Date du début de l'évenement : <?= $evenement->getDate_debut()->format('d/m/Y'); ?> </li>
                <li>Heure de démarrage : <?= $evenement->getDate_debut()->format('H:i:s'); ?> </li>
                <li>Date du fin de l'évenement : <?= $evenement->getDate_fin()->format('d/m/Y'); ?> </li>
                <li>Heure de l'évenement : <?= $evenement->getDate_fin()->format('H:i:s'); ?> </li>
            </ul>
        </div>
    </div>
</section>