<?php
if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
}
/**
 * Suppression en d'une matière
 */
if (isset($_GET['identifiant-suppression-eleve']) && !empty($_GET['identifiant-suppression-eleve'])) {
    $suppression_succes = suppression_element_id_en_get($_GET['identifiant-suppression-eleve'], "Eleves");
    if ($suppression_succes) {
        header('location:index.php?page=matiere&message-success=La matière est bien été supprimé !');
    } else {
        header('location:index.php?page=matiere&message-echec=La matière est bien été supprimé !');
    }
}
?>
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
            <?php if (isset($_GET['niveau'])) : ?>
                <li class="breadcrumb-item active">Liste des élèves de <?= $_GET['niveau'] ?> </li>
            <?php elseif (isset($_GET['classe'])) : ?>
                <li class="breadcrumb-item active">Liste des élèves de <?= $_GET['classe'] ?> </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <?php if (isset($_GET['niveau'])) : ?>
                <h1 class="h3 display">Liste complete des élèves inscrits en <?= $_GET['niveau'] ?> pour la session <?= $sessionencours['Sessionencours'] ?></h1>
                <h1 class="h3 display mt-5 animate-box">Éffectif d'élèves <?= $_GET['niveau'] ?> : <span class="text-primary"><?= $effectifs_par_classe ?></span> </h1>
            <?php elseif (isset($_GET['classe'])) : ?>
                <h1 class="h3 display">Liste complete des élèves inscrits en <?= $_GET['classe'] ?> pour la session <?= $sessionencours['Sessionencours'] ?></h1>
            <?php endif; ?>
        </header>
</section>
<!-- Liste des élèves par classe envoyer pas la methode GET -->
<section class="container-fluid">

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom et nom</th>
                <th>Niveau</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (isset($_GET['niveau']) && !empty($_GET['niveau']) || ($_GET['classe']) && !empty($_GET['classe'])) {
                foreach ($eleves as $eleve) :  ?>
                    <tr>
                        <td><?= $eleve['Code'] ?></td>
                        <td><?= $eleve['Nom'] ?></td>
                        <td><?= $eleve['Niveau'] ?></td>
                        <td>
                            <?php if (isset($_GET['niveau'])) : ?>
                                <div class="row">
                                    <div class="col-4"><a href="index.php?page=modification-donnees&indication=modification-eleve&identifiant-eleve=<?= $eleve['Id'] ?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                                    <div class="col-4"><a href="index.php?page=affiche-eleve&identifiant-eleve=<?= $eleve['Id'] ?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></i></a></div>
                                    <div class="col-4"> <a href="" class="btn btn-success"> <i class="fa fa-check" aria-hidden="true"></a></i></div>
                                </div>
                            <?php elseif (isset($_GET['classe'])) : ?>
                                <div class="row">
                                    <div class="col-sm-2 col-2"><a href="" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                                    <div class="col-sm-2 col-2"><a href="" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></i></a></div>
                                    <div class="col-sm-2 col-2"> <a href="" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i></i></a></i></div>
                                    <div class="col-sm-2 col-2"> <a href="" class="btn btn-success"> <i class="fa fa-check" aria-hidden="true"></a></i></div>
                                    <div class="col-sm-2 col-2"> <a href="" class="btn btn-danger"> <i class="fa fa-times" aria-hidden="true"></i></a></i></div>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php } ?>
        </tbody>
    </table>

    <div class="container">
        <div class="slantdiv"></div>
        <div class="barslant">
            <div>
                <h3 class="text-primary">Autres actions à faire</h3>
            </div>
        </div>
        <br>
        <?php if (isset($_SESSION['Administrateur'])) : ?>
            <div class="row">
                <div class="col-xl-8 col-md-4 col-6"></div>
                <div class="col-xl-2 col-md-4 col-6">
                    <a href="index.php?page=ajouter-eleves" class="btn btn-primary">Ajouter un élève</a>
                </div>
                <div class="col-xl-2 col-md-4 col-6">
                    <a href="" class="btn btn-primary">Imprimer la liste</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>