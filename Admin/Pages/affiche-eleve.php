<?php
if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
} ?>
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Profile </li>
        </ul>
    </div>
</div>
<section class="container-fluid">
    <div class="row  mt-3">
        <div class="col-sm-4">
            <div class="card">
                <img class="image-eleve img-fluid" src="pieces-eleves/<?= $selection_eleve_ne_get['Photo'] ?>" alt="">
                <div class="card-body">
                    <h4 class="card-title text-center"><?= $selection_eleve_ne_get['Nom'] ?> <?= $selection_eleve_ne_get['Prenom'] ?></h4>
                </div>
                <?php if ($selection_eleve_ne_get['Piece'] != NULL) : ?>
                    <div class="pb-5 text-center">
                        <a class="bg-dark pl-5 pr-5 pt-3 pb-3 text-white" href="pieces-eleves/<?= $selection_eleve_ne_get['Piece'] ?>">Pièce d'identité</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card">
                <img class="image-eleve img-fluid" src="pieces-eleves/<?= $parents_eleves['Photo'] ?>" alt="">
                <div class="card-body text-center">
                    <h3 class="card-title"><?= $parents_eleves['Nom'] ?></h3>
                    <small>Responsable de l'élève <?= $selection_eleve_ne_get['Nom'] ?> durant son cursus</small>
                </div>

                <?php if ($parents_eleves['Piece'] != NULL) : ?>
                    <div class="mb-5 text-center">
                        <a class="bg-dark pl-5 pr-5 pt-3 pb-3 text-white" href="pieces-eleves/<?= $parents_eleves['Piece'] ?>">Pièce d'identité</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card border-danger">
                <div class="titre text-white bg-dark text-center p-2 mb-3">
                    <h4>Information complet de <?= $selection_eleve_ne_get['Nom'] ?> <?= $selection_eleve_ne_get['Prenom'] ?></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Informations</th>
                                <th>Données</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nom et prénom</td>
                                <td><?= $selection_eleve_ne_get['Nom'] ?> <?= $selection_eleve_ne_get['Prenom'] ?></td>
                            </tr>
                            <tr>
                                <td>Matricule</td>
                                <td><?= $selection_eleve_ne_get['Code'] ?></td>
                            </tr>
                            <tr>
                                <td>Sexe</td>
                                <td><?= $selection_eleve_ne_get['Sexe'] ?></td>
                            </tr>
                            <tr>
                                <td>Date de naissance</td>
                                <td><?= (new DateTime($selection_eleve_ne_get['Date_de_naissance']))->format('d/m/Y') ?></td>
                            </tr>
                            <tr>
                                <td>Lieu de naissance</td>
                                <td><?= $selection_eleve_ne_get['VilleNaissance'] ?></td>
                            </tr>
                            <tr>
                                <td>Lieu de résidence</td>
                                <td><?= $selection_eleve_ne_get['VilleResidence'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="titre text-white bg-dark text-center mt-5 pt-2 pb-2">
                    <h4>Informations Accademiques</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Niveau actuel</td>
                                <td><b> <?= $selection_eleve_ne_get['Niveau'] ?></b></td>
                            </tr>
                            <tr>
                                <td>Session en cours</td>
                                <td><b><?= $selection_eleve_ne_get['Session'] ?></b>
                                </td>
                            </tr>
                            <tr>
                                <td>Date d'inscription </td>
                                <td> <b><?= (new DateTime($selection_eleve_ne_get['DateInscrit']))->format('d/m/Y') ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="titre text-white bg-dark text-center mt-5 pt-2 pb-2">
                    <h4>Informatins pour contacter l'élève facilement</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Numéro de téléphone</td>
                                <td><a href="tel:<?= $selection_eleve_ne_get['Telephone'] ?>"><i class="fa fa-phone"></i> <?= $selection_eleve_ne_get['Telephone'] ?></a></td>
                            </tr>
                            <tr>
                                <td>Adresse éléctronique</td>
                                <td><a href="mailto:<?= $selection_eleve_ne_get['Email'] ?>"><i class="fa fa-phone"></i> <?= $selection_eleve_ne_get['Email'] ?></a></td>
                            </tr>
                            <tr>
                                <td>Lieu de résidence actuel</td>
                                <td><?= $selection_eleve_ne_get['VilleResidence'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="titre text-white bg-dark text-center mt-5 pt-2 pb-2">
                    <h4>Responsable de <?= $selection_eleve_ne_get['Nom'] ?></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nom complet</td>
                                <td><b><?= $parents_eleves['Nom'] ?></b></td>
                            </tr>
                            <tr>
                                <td>Matricule</td>
                                <td><b><?= $parents_eleves['Matricule'] ?></b></td>
                            </tr>
                            <tr>
                                <td>Téléphone</td>
                                <td><b><?= $parents_eleves['Telephone'] ?></b></td>
                            </tr>
                            <tr>
                                <td>Adresse email</td>
                                <td><b><?= $parents_eleves['Email'] ?></b></td>
                            </tr>
                            <tr>
                                <td>Lien parenté</td>
                                <td><b><?= $parents_eleves['Lien'] ?></b></td>
                            </tr>
                            <tr>
                                <td>Lieu de résidence</td>
                                <td><b><?= $parents_eleves['Residence'] ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="titre text-white bg-dark text-center mt-5 pt-2 pb-2">
                    <h4>Informations supplémentaire sur l'élève</h4>
                </div>
                <div class="card-body text-center">
                    <p class="mt-3 mb-3"><?= $selection_eleve_ne_get['Infos_supp'] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>