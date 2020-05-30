<?php
if (!isset($_SESSION['Administrateur'])) {
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
        <!-- Page Header-->
        <header>
            <h1 class="h3 display">Liste des enseignants du l'établissement</h1>
        </header>
        <?php if (isset($_GET['message-erreur']) && !empty($_GET['message-erreur'])) : ?>
            <div class="alert alert-danger"><?= $_GET['message-erreur'] ?></div>
        <?php endif; ?>
        <?php if (isset($_GET['message-success']) && !empty($_GET['message-success'])) : ?>
            <div class="alert alert-success"><?= $_GET['message-success'] ?></div>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Titres de l'actualité</th>
                    <th>Texte de l'actualité</th>
                    <th>Auteur</th>
                    <th>Date de publication</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actualites as $actualite) : ?>
                    <tr>
                        <td><strong><?= strlen($actualite['Titres']) > 30 ? substr($actualite['Titres'], 0, 30) . ' ... <a href="">Lire la suite</a>' : $actualite['Titres'];  ?> </strong></td>
                        <td><strong><?= strlen($actualite['Publications']) > 50 ? substr($actualite['Publications'], 0, 50) . ' ... <a href="">Lire la suite</a>' : $actualite['Publications'];  ?> </strong></td>
                        <td><?= $actualite['Auteur'] ?></td>
                        <td><?= $actualite['DatePublication'] ?></td>
                        <td>
                            <div class="row">
                                <div class="col-6"><a class="btn btn-primary" href=""><i class="fa fa-eye" aria-hidden="true"></i></a></div>
                                <div class="col-6"><a class="btn btn-primary" href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>