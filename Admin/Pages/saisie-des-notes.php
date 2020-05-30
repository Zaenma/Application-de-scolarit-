<?php if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
} ?>
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
            <li class="breadcrumb-item active">Liste des élèves de <?= $_GET['code-eleve'] ?> </li>
        </ul>
    </div>
</div>
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h3 display">Saisie de notes de l'élève <?= $_GET['code-eleve'] ?> pour la session <?= $sessionencours['Sessionencours'] ?></h1>
        </header>
</section>
<!-- Liste des élèves par classe envoyer pas la methode GET -->
<section class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <strong>Nom des matières</strong>
            </div>
        </div>
        <div class="col-lg-2">
            <strong>Note de devoir</strong>
        </div>
        <div class="col-lg-2">
            <strong>Note d'éxamen</strong>
        </div>
        <div class="col-lg-2">
            <strong>Cœufficient</strong>
        </div>
        <div class="col-lg-2">
            <strong>Meyenne final</strong>
        </div>
    </div>
    <?php
    foreach ($matieres as $matiere) { ?>
        <hr>
        <form action="">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for=""><?= $matiere['Nom'] ?></label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <input type="number" class="form-control" name="<?= $matiere['Nom'] ?>-devoir" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="col-lg-2">
                    <input type="number" class="form-control" name="<?= $matiere['Nom'] ?>-examen" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="col-lg-2">
                    <input type="number" class="form-control" name="<?= $matiere['Nom'] ?>-ceoufficient" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="col-lg-2">
                    <input type="number" class="form-control" name="<?= $matiere['Nom'] ?>-ceoufficient" id="" aria-describedby="helpId" placeholder="" disabled>
                </div>
            </div>
        </form>
    <?php }
    ?>

</section>