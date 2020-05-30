<?php if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
} ?>
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
            <li class="breadcrumb-item active"></li>Liste des enseignants</li>
        </ul>
    </div>
</div>
<section class="forms">
    <div class="container-fluid">
        <header>
            <h1 class="h3 display">Liste des enseignants de l'établissement</h1>
        </header>
        <?php if (!empty($_GET['message-success'])) : ?>
            <div class="alert alert-primary text-center">
                <b><?= $_GET['message-success'] ?></b>
            </div>
        <?php endif; ?>
        <hr>
        <table class="table table-sm table-lg table-xl">
            <thead>
                <tr class="bg-dark text-white">
                    <th>Nom et prénom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Spécialité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($enseignants as $enseignant) : ?>
                    <tr>
                        <td><strong><?= $enseignant['Nom'] ?> <?= $enseignant['Prenom'] ?></td>
                        <td><?= $enseignant['Telephone'] ?></td>
                        <td><?= $enseignant['Email'] ?></td>
                        <td><?= $enseignant['Specialite'] ?></td>
                        <td>
                            <div class="row">
                                <div class="col-6"><a href="index.php?page=affiche-enseignant&identifiant-enseignant=<?= (int) ($enseignant['Id']) ?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                <div class="col-6"><a href="index.php?page=modification-donnees&indication=modification-enseignat&identifiant-enseignant=<?= (int) ($enseignant['Id']) ?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<div class="container mb-5">
    <div class="slantdiv"></div>
    <?php if (isset($_SESSION['Administrateur'])) : ?>
        <div class="d-flex mt-5 justify-content-between">
            <a href="index.php?page=ajout-enseignant" class="btn btn-primary">Ajouter un enseignant</a>
            <a href="" class="btn btn-primary">Imprimer la liste</a>
        </div>
    <?php endif; ?>
</div>