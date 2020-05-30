<?php if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
} ?>
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
            <li class="breadcrumb-item active">Liste des enseignats </li>
        </ul>
    </div>
</div>
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="card card-profile">
                    <div><img src="pieces-enseignant/<?= $selection_enseignant_ne_get['Photo'] ?>" class="img-fluid rounded float-left image-ens"></div>
                    <div class="card-body text-center">
                        <h3 class="mb-3"><?= $selection_enseignant_ne_get['Nom'] ?> <?= $selection_enseignant_ne_get['Prenom'] ?></h3>
                        <p class="mb-4">Spécialite en <?= $selection_enseignant_ne_get['Specialite'] ?> </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="titre text-white bg-dark text-center">
                            <blockquote class="blockquote">
                                <b>Pieces disponible </b>
                            </blockquote>
                        </div>

                        <?php if ($selection_enseignant_ne_get['Piece'] != NULL) : ?>
                            <div class="card text-center">
                                <a class="piece" href="pieces-enseignant/<?= $selection_enseignant_ne_get['Piece'] ?>">Pièce d'identité</a>
                            </div>
                        <?php endif; ?>
                        <?php if ($selection_enseignant_ne_get['Attestation'] != NULL) : ?>
                            <div class="card text-center">
                                <a class="piece" href="pieces-enseignant/<?= $selection_enseignant_ne_get['Attestation'] ?>">Diplôme</a>
                            </div>
                        <?php endif; ?>
                        <?php if ($selection_enseignant_ne_get['CV'] != NULL) : ?>
                            <div class="card text-center">
                                <a class="piece" href="pieces-enseignant/<?= $selection_enseignant_ne_get['CV'] ?>">Curiculum vitae</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th class="bg-dark text-white text-center" colspan="2">
                                    <b>Information complet de <?= $selection_enseignant_ne_get['Nom'] ?> <?= $selection_enseignant_ne_get['Prenom'] ?></b>
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nom et prénom</td>
                                    <td><b><?= $selection_enseignant_ne_get['Nom'] ?> <?= $selection_enseignant_ne_get['Prenom'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Matricule</td>
                                    <td><b><?= $selection_enseignant_ne_get['Matricule'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Date de naissance</td>
                                    <td><?= (new DateTime($selection_enseignant_ne_get['DateNaissance']))->format('d/m/Y') ?></td>
                                </tr>
                                <tr>
                                    <td>Ville de naissance</td>
                                    <td><?= $selection_enseignant_ne_get['LieuNaissance'] ?></td>
                                </tr>
                                <tr>
                                    <td>Ville de résidence</td>
                                    <td><b><?= $selection_enseignant_ne_get['LieuResidence'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Spécialité</td>
                                    <td><b><?= $selection_enseignant_ne_get['Specialite'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Niveau d'étude</td>
                                    <td><b><?= $selection_enseignant_ne_get['Diplome'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Université</td>
                                    <td><b><?= $selection_enseignant_ne_get['Universite'] ?></b></td>
                                </tr>
                                <tr>
                                    <td>Date de recrutement</td>
                                    <td><b><?= (new DateTime($selection_enseignant_ne_get['DateRecrute']))->format('d/m/Y') ?></b></td>
                                </tr>
                                <th colspan="2" class="bg-dark text-white text-center">Informatins pour lui contacter facilement</th>

                                <tr>
                                    <td>Numéro de téléphone</td>
                                    <td><a href="tel:<?= $selection_enseignant_ne_get['Telephone'] ?>"><i class="fa fa-phone"></i> <?= $selection_enseignant_ne_get['Telephone'] ?></a></td>
                                </tr>

                                <tr>
                                    <td>Adresse éléctronique</td>
                                    <td><a href="mailto:<?= $selection_enseignant_ne_get['Email'] ?>"><i class="fa fa-phone"></i> <?= $selection_enseignant_ne_get['Email'] ?></a></td>
                                </tr>
                                <tr>
                                    <td>Lieu de résidence actuel</td>
                                    <td><?= $selection_enseignant_ne_get['LieuResidence'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-white bg-dark text-center mt-5 pt-2 pb-2 sm-2">
                            <b>Liens vers les réseaux sociaux</b>
                        </div>
                        <div class="text-center mt-4 mb-4">
                            <div class="row">
                                <div class="col-3"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Facebook de <?= $selection_enseignant_ne_get['Nom'] ?>"><i class="fa fa-facebook"></i></a></div>
                                <div class="col-3"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Twitter de <?= $selection_enseignant_ne_get['Nom'] ?>"><i class="fa fa-twitter"></i></a></div>
                                <div class="col-3"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Instagram de <?= $selection_enseignant_ne_get['Nom'] ?>"><i class="fa fa-instagram"></i></a></div>
                                <div class="col-3"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Linkedin de <?= $selection_enseignant_ne_get['Nom'] ?>"><i class="fa fa-linkedin"></i></a></div>

                            </div>
                        </div>
                        <div class="text-white bg-dark text-center mt-5 pt-2 pb-2 sm-2">
                            <b>Autres informations supplémentaire</b>
                        </div>
                        <div class="card-body">
                            <b class="mt-3 mb-3"><?= $selection_enseignant_ne_get['Infos_supp'] ?></b>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>