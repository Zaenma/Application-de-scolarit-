<?php
if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
} ?>
<section class="dashboard-counts section-padding">
    <div class="container-fluid">
        <div class="card session-en-cours">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Début de la session en cours : <?= (new DateTime($sessionencours['Debut_session']))->format('d/m/Y') ?></h3>
                </div>
                <div class="col-sm-6">
                    <h3>Fin de la session : <?= (new DateTime($sessionencours['Fin_session']))->format('d/m/Y') ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card nombre-eleves">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-user"></i></div>
                        <div class="name">Nombre d'élèves
                            <div class="count-number"><?= $nombreLigne ?> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Count item widget-->
            <div class="col-sm-4 animate-box">
                <div class="card bg-warning">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-user"></i></div>
                        <div class="name">Nombre d'enseignants
                            <div class="count-number"><?= $nombreLigneEns ?> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Count item widget-->
            <div class="col-sm-4">
                <div class="card nombre-classes">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-user"></i></div>
                        <div class="name">Nombre de classes
                            <div class="count-number"><?= $nombreLigneClasses ?> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card bg-dark">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-mail"></i></div>
                        <div class="name">Messages non repondus
                            <div class="count-number"><?= $nombreLigneEns ?> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card bg-info">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-mail"></i></div>
                        <div class="name">Messages du jours
                            <div class="count-number"><?= $nombreLigneEns ?> </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card nombre-message">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-user"></i></div>
                        <div class="name">Articles publiés
                            <div class="count-number"><?= $nombreLigneEns ?> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card bg-danger">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-user"></i></div>
                        <div class="name">Absences du jour
                            <div class="count-number"><?= $nombreLigneEns ?> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card nombre-evenement">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-user"></i></div>
                        <div class="name">Évènements publiés
                            <div class="count-number"><?= $nombreLigneEvenement ?> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card nombre-matiere">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-user"></i></div>
                        <div class="name">Matières enseignées
                            <div class="count-number"><?= $nombreLigneMatiere ?> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-dark py-3">
            <h3 class="text-center">Calendrier des évènements </h3>
        </div>

        <?php
        require_once('vendor/autoload.php');
        $pdo = connectionDB();
        $evenements = new Calendrier\Evenement($pdo);
        $mois = new Calendrier\Mois($_GET['mois'] ?? NULL, $_GET['annee'] ?? NULL);

        $dateJour = $mois->premierJourduMois();
        $nombreSemaine = $mois->nombreJours();

        // La date du jour 
        $dateJour = $dateJour->format('N') === '1' ? $dateJour :   $mois->premierJourduMois()->modify('last monday');
        // dte de fin de l'évenement 
        $finEvenement = (clone $dateJour)->modify('+' . (6 + 7 * ($nombreSemaine - 1)) . 'days');
        // L'ensemble des évenements 
        $evenements = $evenements->recupereEvenementParJour($dateJour, $finEvenement);

        ?>
        <section class="container-fluid">
            <div class="calendrier">
                <div class="d-flex flex-row align-items-center justify-content-end ml-3">
                    <div class="">
                        <a href="index.php?page=index&mois=<?= $mois->moisPrecendent()->mois; ?>&annee=<?= $mois->moisPrecendent()->annee; ?>" class="btn btn-primary">&lt;</a>
                        <a href="index.php?page=index&mois=<?= $mois->moisSuivant()->mois; ?>&annee=<?= $mois->moisSuivant()->annee; ?>" class="btn btn-primary">&gt;</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="calendrier-table">
                        <?php for ($i = 0; $i < $nombreSemaine; $i++) : ?>
                            <tr>
                                <?php
                                foreach ($mois->t_jours as $k => $jour) :
                                    $date = (clone $dateJour)->modify("+" . ($k + $i * 7) . "days");
                                    $evenementDejour = $evenements[$date->format('Y-m-d')] ?? [];
                                    $aujourdhui = date('Y-m-d') === $date->format('Y-m-d');
                                ?>
                                    <td class="<?= $mois->estJourDuLeMois($date) ? '' : 'calendrier_autre_jour' ?> <?= $aujourdhui ? 'aujourdhui' : '' ?>">
                                        <?php if ($i === 0) : ?>
                                            <div class="calendrier-p-jour"><?= $jour; ?></div>
                                        <?php endif; ?>
                                        <a class="calendrier-jour" href="index.php?page=ajout-evenement&date=<?= $date->format('Y-m-d'); ?>"><?= $date->format('d'); ?></a>
                                        <?php foreach ($evenementDejour as $evenement) : ?>
                                            <div class="calendrier-evenement">
                                                <?= (new DateTime($evenement['date_debut']))->format('H:i') ?> - <a href="index.php?page=edite-evenement&id-evenement=<?= $evenement['Id'] ?>"><?= $evenement['Nom'] ?></a>
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endfor; ?>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <section>
                    <div class="bnt-ajout-evenement mb-5"> <a href="index.php?page=ajout-evenement">+</a> </div>
                </section>
            </div>
        </section>
    </div>

</section>

<?php

if (!empty($_POST['btn'])) {

    extract($_POST);

    $nom = valide_champ_texte("Nom", 3, 10);
    $prenom = valide_champ_texte("prenom", 3, 10);
    $fils = valide_champ_texte("fils", 3, 10);
    $filles = valide_champ_texte("fille", 3, 10);
}


?>