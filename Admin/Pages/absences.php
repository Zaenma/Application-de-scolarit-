<?php
if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
} ?>
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Data Table </li>
        </ul>
    </div>
</div>
<section class="container-fluid">
    <div class="text-white bg-dark text-center mt-3 p-2 mb-3">
        <h1 class="h3 display">Suivant la liste des absences </h1>
    </div>
    <?php if (!empty($_GET['message-success'])) : ?>
        <div class="alert alert-primary text-center"><?= $_GET['message-success'] ?></div>
    <?php endif; ?>
    <?php if (!empty($_GET['message-erreur'])) : ?>
        <div class="alert alert-danger text-center"><?= $_GET['message-erreur'] ?></div>
    <?php endif; ?>


    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Identifiants</th>
                <th>Date de la séance</th>
                <th>Justifiée</th>
                <th>Commentaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($absences as $absence) {
                $debut = $absence['Heure_debut'];
                $fin = $absence['Heure_fin'];
                if ($absence['Justiee'] == 0) {
                    $absence['Justiee'] =  '<b class="text-danger">NON</b>';
                } else {
                    $absence['Justiee'] = '<b class="text-success">OUI</b>';
                }
            ?>
                <tr>
                    <td><?= $absence['Matricules'] ?></td>
                    <td>Le <?= $absence['Date_seance'] ?> de <?= (new DateTime($absence['Heure_debut']))->format('H:i') ?> à <?= (new DateTime($absence['Heure_fin']))->format('H:i') ?></td>
                    <td><?= $absence['Justiee'] ?></td>
                    <td><?= $absence['Commentaire'] ?></td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <div class="col-xl-3 col-md-3 col-3"><a type="button" data-toggle="modal" data-target="#affiche-<?= (int) ($absence['Id']) ?>" href="" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></div>

                            <?php if ($absence['Justiee'] == '<b class="text-danger">NON</b>') { ?>
                                <div class="col-sm-3 col-md-3 col-3"> <a type="button" data-toggle="modal" data-target="#justifie-<?= (int) ($absence['Id']) ?>" href="" class="btn btn-warning"> <i class="fa fa-times" aria-hidden="true"></i></a></div>
                            <?php } else { ?>
                                <div class="col-sm-3 col-md-3 col-3"> <a type="button" data-toggle="modal" data-target="#justifie-<?= (int) ($absence['Id']) ?>" href="" class="btn btn-success"> <i class="fa fa-check" aria-hidden="true"></i></a></div>
                            <?php } ?>
                            <div class="col-xl-3 col-md-3 col-3"><a href="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></div>
                        </div>
                        <div class="modal fade" id="affiche-<?= (int) ($absence['Id']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <?php $adsences_eleve = adsences_eleves($absence['Matricules']); ?>
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Absence de <?= $adsences_eleve['Nom'] ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <table class="table" style="font-size: 12px;">
                                                <tbody>
                                                    <tr>
                                                        <td>Nom et prénom</td>
                                                        <td><?= $adsences_eleve['Nom'] ?> <?= $adsences_eleve['Prenom'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Matricule</td>
                                                        <td><?= $adsences_eleve['Matricules'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Niveau actuel</td>
                                                        <td><?= $adsences_eleve['Niveau'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date de séance</td>
                                                        <td><?= (new DateTime($absence['Date_seance']))->format('d/m/Y') ?> de <?= (new DateTime($absence['Heure_debut']))->format('H:i') ?> à <?= (new DateTime($absence['Heure_fin']))->format('H:i') ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Matière</td>
                                                        <td><?= $adsences_eleve['Matieres'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nature de la séance</td>
                                                        <td><?= $adsences_eleve['Type_seance'] ?></td>
                                                    </tr>
                                                    <?php if ($adsences_eleve['Justiee'] == 0) : ?>
                                                        <tr>
                                                            <td>Justification</td>
                                                            <td>Absence non justifiée</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if ($adsences_eleve['Justiee'] == 1) : ?>
                                                        <tr>
                                                            <td>Justification</td>
                                                            <td><?= $adsences_eleve['Commentaire'] ?></td>
                                                        </tr>
                                                    <?php endif; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer la boite modal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="justifie-<?= (int) ($absence['Id']) ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Justification de l'absence de <?= $adsences_eleve['Nom'] ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Nom et prénom</td>
                                                    <td><?= $adsences_eleve['Nom'] ?> <?= $adsences_eleve['Prenom'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Classe</td>
                                                    <td><?= $adsences_eleve['Niveau'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Cours de </td>
                                                    <td><?= $adsences_eleve['Matieres'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="mx-3 mt-5">
                                            <?php
                                            if (isset($_POST['btn-justification-absence'])) {
                                                justification_absence($_POST['Commentaire'], $absence['Id'], $absence['Date_enregistree']);
                                            }

                                            ?>
                                            <form action="" method="POST">
                                                <div class="form-group">
                                                    <label for="">Commentaire de justification</label>
                                                    <textarea class="form-control" name="Commentaire" id="" rows="3"><?= $absence['Commentaire'] ?></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuller et Fermer</button>
                                                    <input type="submit" value="Valider la justification" class="btn btn-primary" name="btn-justification-absence">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>