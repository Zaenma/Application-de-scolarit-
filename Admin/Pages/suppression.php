<?php
if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
}

/**
 * Suppression en d'une matière
 */
if (isset($_GET['identifiant-matiere-à-supprimée']) && !empty($_GET['identifiant-matiere-à-supprimée']) && intval($_GET['identifiant-matiere-à-supprimée'])) {
    $suppression_succes = suppression_element_id_en_get($_GET['identifiant-matiere-à-supprimée'], "Matiere");
    if ($suppression_succes) {
        header('location:index.php?page=suppression&demande-suppression=modification-matieres&modification-etat=active&message-warning=vous avez supprimé la matière, elle ne ferra désormais plus parti des matières enseignée dans votre établissement');
    } else {
        header('location:index.php?page=matiere&message-echec=La matière est bien été supprimé !');
    }
}


/**
 * Suppression en d'un Enseignants
 */
if (isset($_GET['identifiant-enseignant-à-supprimée']) && !empty($_GET['identifiant-enseignant-à-supprimée']) && intval($_GET['identifiant-enseignant-à-supprimée'])) {
    $suppression_succes = suppression_element_id_en_get($_GET['identifiant-enseignant-à-supprimée'], "Enseignants");
    if ($suppression_succes) {

        header('location:index.php?page=suppression&demande-suppression=suppression-enseignats&modification-etat=active&message-warning=l\'enseignant que vous avez cliqué est bien été supprimé, il ne ferra désormais plus parti des enseignants de votre établissement');
    } else {
        header('location:index.php?page=matiere&message-echec=La matière est bien été supprimé !');
    }
}

/**
 * Suppression en d'une classe
 */
if (isset($_GET['identifiant-classe-à-supprimée']) && !empty($_GET['identifiant-classe-à-supprimée']) && intval($_GET['identifiant-classe-à-supprimée'])) {
    $suppression_succes = suppression_element_id_en_get($_GET['identifiant-classe-à-supprimée'], "Classes");
    if ($suppression_succes) {

        header('location:index.php?page=suppression&demande-suppression=modification-classes&message-warning=la classe que vous avez cliqué est bien été supprimée, elle ne ferra désormais plus parti des classes existante de votre établissement');
    } else {
        header('location:index.php?page=matiere&message-echec=La matière est bien été supprimé !');
    }
}

/**
 * Suppression en d'un Élève
 */
if (isset($_GET['identifiant-eleve-à-supprimée']) && !empty($_GET['identifiant-eleve-à-supprimée']) && intval($_GET['identifiant-eleve-à-supprimée'])) {
    $suppression_succes = suppression_element_id_en_get($_GET['identifiant-eleve-à-supprimée'], "Eleves");
    if ($suppression_succes) {
        header('location:index.php?page=suppression&classe-demande-modification-en=' . $_GET['classe'] . '&classe=' . $_GET['classe'] . '&message-warning=l\'élève que vous avez cliqué est bien été supprimé, désormais il ne ferra plus parti des élèves de votre établissement');
    } else {
        header('location:index.php?page=matiere&message-echec=La matière est bien été supprimé !');
    }
}

/**
 * Activer || désactiver
 */

if (isset($_GET['modification-état']) && !empty($_GET['modification-état']) && $_GET['modification-état'] == "active" && !empty($_GET['demande-suppression']) && $_GET['demande-suppression'] == "suppression-enseignats" && !empty($_GET['identifiant-enseignant'])) {
    // desactiver_activer("Enseignants", "Etat", 0, $_GET['identifiant']);

    if (desactiver_activer("Enseignants", "Etat", 0, $_GET['identifiant-enseignant'])) {
        header('location:index.php?page=suppression&demande-suppression=suppression-enseignats&modification-etat=active&message-success=état bien modifié en inactif');
    }
}
if (isset($_GET['modification-état']) && !empty($_GET['modification-état']) && $_GET['modification-état'] == "desactive" && !empty($_GET['demande-suppression']) && $_GET['demande-suppression'] == "suppression-enseignats" && !empty($_GET['identifiant-enseignant'])) {
    if (desactiver_activer("Enseignants", "Etat", 1, $_GET['identifiant-enseignant'])) {
        header('location:index.php?page=suppression&demande-suppression=suppression-enseignats&modification-etat=active&message-success=état bien modifié en inactif');
    }
}
/**
 * =========================================================================================================================
 */
if (isset($_GET['modification-état']) && !empty($_GET['modification-état']) && $_GET['modification-état'] == "active" && !empty($_GET['demande-suppression']) && $_GET['demande-suppression'] == "modification-classes"  && !empty($_GET['identifiant-classe'])) {
    // desactiver_activer("Enseignants", "Etat", 0, $_GET['identifiant']);

    if (desactiver_activer("Classes", "Etat", 0, $_GET['identifiant-classe'])) {
        header('location:index.php?page=suppression&demande-suppression=modification-classes&message-success=état bien modifié en inactif');
    }
}
if (isset($_GET['modification-état']) && !empty($_GET['modification-état']) && $_GET['modification-état'] == "desactive" && !empty($_GET['demande-suppression']) && $_GET['demande-suppression'] == "modification-classes"  && !empty($_GET['identifiant-classe'])) {
    if (desactiver_activer("Classes", "Etat", 1, $_GET['identifiant-classe'])) {
        header('location:index.php?page=suppression&demande-suppression=modification-classes&message-success=état bien modifié en inactif');
    }
}
/**
 * =========================================================================================================================
 */
if (isset($_GET['modification-état']) && !empty($_GET['modification-état']) && $_GET['modification-état'] == "active" && !empty($_GET['demande-suppression']) && $_GET['demande-suppression'] == "modification-matieres"  && !empty($_GET['identifiant-matiere'])) {
    // desactiver_activer("Enseignants", "Etat", 0, $_GET['identifiant']);

    if (desactiver_activer("Matiere", "Etat", 0, $_GET['identifiant-matiere'])) {
        header('location:index.php?page=suppression&demande-suppression=modification-matieres&modification-etat=active&message-success=état bien modifié en inactif');
    }
}
if (isset($_GET['modification-état']) && !empty($_GET['modification-état']) && $_GET['modification-état'] == "desactive" && !empty($_GET['demande-suppression']) && $_GET['demande-suppression'] == "modification-matieres"  && !empty($_GET['identifiant-matiere'])) {
    if (desactiver_activer("Matiere", "Etat", 1, $_GET['identifiant-matiere'])) {
        header('location:index.php?page=suppression&demande-suppression=modification-matieres&modification-etat=active&message-success=état bien modifié en inactif');
    }
}

/**
 * =========================================================================================================================
 */
if (isset($_GET['modification-état']) && !empty($_GET['modification-état']) && $_GET['modification-état'] == "active" && !empty($_GET['classe-demande-modification-en']) && $_GET['classe-demande-modification-en'] == "modification-en-eleve"  && !empty($_GET['identifiant-eleve'])) {
    // desactiver_activer("Enseignants", "Etat", 0, $_GET['identifiant']);

    if (desactiver_activer("Eleves", "Etat", 0, $_GET['identifiant-eleve'])) {
        header('location:index.php?page=suppression&classe-demande-modification-en=' . $_GET['classe'] . '&classe=' . $_GET['classe']);
    }
}
if (isset($_GET['modification-état']) && !empty($_GET['modification-état']) && $_GET['modification-état'] == "desactive" && !empty($_GET['classe-demande-modification-en']) && $_GET['classe-demande-modification-en'] == "modification-en-eleve"  && !empty($_GET['identifiant-eleve'])) {
    if (desactiver_activer("Eleves", "Etat", 1, $_GET['identifiant-eleve'])) {
        header('location:index.php?page=suppression&classe-demande-modification-en=' . $_GET['classe'] . '&classe=' . $_GET['classe']);
    }
}

?>
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
            <li class="breadcrumb-item active">suppression des enregistrements</li>
        </ul>
    </div>
</div>
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <!-- <h1 class="h3 display">Liste total de classe du lycée LCOFT</h1> -->
        </header>
        <?php if (isset($_GET['message-warning']) && !empty($_GET['message-warning'])) : ?>
            <div class="alert alert-warning text-center"><?= $_GET['message-warning'] ?></div>
        <?php endif; ?>
        <?php if (isset($_GET['message-success']) && !empty($_GET['message-success'])) : ?>
            <div class="alert alert-primary text-center"><?= $_GET['message-success'] ?></div>
        <?php endif; ?>
        <div class="card text-left">
            <?php if (isset($_GET['demande-suppression']) && !empty($_GET['demande-suppression']) && $_GET['demande-suppression'] == "suppression-enseignats") : ?>
                <h4 class="card-title pl-4 pt-4">Suivant la liste des enseignant présents dans votre établissement</h4>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>#</th>
                                <th>Nom</th>
                                <th>Téléphone</th>
                                <th>Spécialité</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conte = 1;
                            foreach ($enseignants as $enseignant) {
                            ?>
                                <tr>
                                    <td scope="row"><strong><?= $conte; ?></td>
                                    <td><strong><?= $enseignant['Nom'] ?> <?= $enseignant['Prenom'] ?></td>
                                    <td><strong><?= $enseignant['Telephone'] ?> </strong></td>
                                    <td><strong><?= $enseignant['Specialite'] ?></strong></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <?php if ($enseignant['Etat'] != 0) : ?>
                                                    <div class="col-sm-1 col-1"><a href="index.php?page=suppression&demande-suppression=suppression-enseignats&modification-état=active&identifiant-enseignant=<?= (int) $enseignant['Id'] ?>" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a></div>
                                                <?php else : ?>
                                                    <div class="col-sm-1"> <a href="index.php?page=suppression&demande-suppression=suppression-enseignats&modification-état=desactive&identifiant-enseignant=<?= (int) $enseignant['Id'] ?>" class="btn btn-warning"> <i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-6">
                                                <div class="col-sm-1 col-1"><a href="index.php?page=suppression&identifiant-enseignant-à-supprimée=<?= $enseignant['Id'] ?>" onclick="return confirm('Attention ! Attention ! Vous êtes sur le point de supprimer l\'enseingnant <?= $enseignant['Nom'] ?> spécialiste en <?= $enseignant['Specialite'] ?> êtes vous sûr de vouloir supprimer ? ')" class=" btn btn-danger"><i class="fa fa-trash-o"></i></a></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $conte += 1;
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between my-4">
                        <?php if (nombre_ligne("Enseignants")  > $ligne_par_page) :  ?>
                            <?php if (page_courente_a_afficher("Enseignants", $ligne_par_page) > 1) : ?>
                                <?php
                                $lien .= "&page-courente=" . (page_courente_a_afficher("Enseignants", $ligne_par_page) - 1);
                                ?>
                                <a href="<?= $lien ?>" class="btn btn-primary">&laquo; Page précédente</a>
                            <?php endif; ?>
                            <?php if (page_courente_a_afficher("Enseignants", $ligne_par_page) < toutes_les_pages_possible("Enseignants", $ligne_par_page)) : ?>
                                <?php
                                $lien .= "&page-courente=" . (page_courente_a_afficher("Enseignants", $ligne_par_page) + 1);
                                ?>
                                <a href="<?= $lien ?>" class="btn btn-primary ml-auto">Page suivante &raquo;</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif (isset($_GET['demande-suppression']) && !empty($_GET['demande-suppression']) && $_GET['demande-suppression'] == "modification-matieres") : ?>
                <h4 class="card-title pt-3 pl-3">Tous les messages non repondus</h4>
                <div class="card-body">



                    <table class="table">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>#</th>
                                <th>Code matière</th>
                                <th>Noms</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conte = 1;
                            foreach ($matieres as $matiere) {
                            ?>
                                <tr>
                                    <td scope="row"><strong><?= $conte ?> </strong></td>
                                    <td><strong><?= $matiere['Code'] ?> </strong></td>
                                    <td><strong><?= $matiere['Nom'] ?> </strong></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <?php if ($matiere['Etat'] != 0) : ?>
                                                    <div class="col-sm-1 col-1"><a href="index.php?page=suppression&demande-suppression=modification-matieres&modification-état=active&identifiant-matiere=<?= (int) $matiere['Id'] ?>" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a></div>
                                                <?php else : ?>
                                                    <div class="col-sm-1"> <a href="index.php?page=suppression&demande-suppression=modification-matieres&modification-état=desactive&identifiant-matiere=<?= (int) $matiere['Id'] ?>" class="btn btn-warning"> <i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-6">
                                                <div class="col-sm-2 col-1"><a href="index.php?page=suppression&identifiant-matiere-à-supprimée=<?= $matiere['Id'] ?>" onclick="return confirm('Vous êtes sur le point de supprimer la matière noméé <?= $matiere['Nom'] ?>; êtes vous sûr de vouloir supprimer')" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $conte += 1;
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between my-4">
                        <?php if (nombre_ligne("Matiere") > $ligne_par_page) :  ?>

                            <?php if (page_courente_a_afficher("Matiere", $ligne_par_page) > 1) : ?>
                                <?php $lien .= "&page-courente=" . (page_courente_a_afficher("Matiere", $ligne_par_page) - 1); ?>
                                <a href="<?= $lien ?>" class="btn btn-primary">&laquo; Page précédente</a>
                            <?php endif; ?>

                            <?php if (page_courente_a_afficher("Matiere", $ligne_par_page) < toutes_les_pages_possible("Matiere", $ligne_par_page)) : ?>
                                <?php $lien .= "&page-courente=" . (page_courente_a_afficher("Matiere", $ligne_par_page) + 1); ?>
                                <a href="<?= $lien ?>" class="btn btn-primary ml-auto">Page suivante &raquo;</a>
                            <?php endif; ?>

                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif (isset($_GET['demande-suppression']) && !empty($_GET['demande-suppression']) && $_GET['demande-suppression'] == "modification-classes") : ?>
                <h4 class="card-title pt-4 pl-4">Tous les messages réçu cette semaine</h4>
                <div class="card-body">



                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code de la classe</th>
                                <th>Noms</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conte = 1;
                            foreach ($classes as $classe) {
                            ?>
                                <tr>
                                    <td scope="row"><strong><?= $conte; ?> </strong></td>
                                    <td><strong><?= $classe['Code'] ?> </strong></td>
                                    <td><strong><?= $classe['Nom'] ?> </strong></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <?php if ($classe['Etat'] != 0) : ?>
                                                    <div class=""><a href="index.php?page=suppression&demande-suppression=modification-classes&modification-état=active&identifiant-classe=<?= (int) $classe['Id'] ?>" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a></div>
                                                <?php else : ?>
                                                    <div class=""> <a href="index.php?page=suppression&demande-suppression=modification-classes&modification-état=desactive&identifiant-classe=<?= (int) $classe['Id'] ?>" class="btn btn-warning"> <i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-6"><a href="index.php?page=suppression&identifiant-classe-à-supprimée=<?= $classe['Id'] ?>" onclick="return confirm('Attention ! Attention ! Vous êtes sur le point de supprimer la classe de <?= $classe['Nom'] ?> dans votre établissement.  êtes vous sûr de vouloir la supprimer ? ')" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $conte += 1;
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between my-4">
                        <?php if (nombre_ligne("Classes")  > $ligne_par_page) :  ?>
                            <?php if (page_courente_a_afficher("Classes", $ligne_par_page) > 1) : ?>
                                <?php
                                $lien .= "&page-courente=" . (page_courente_a_afficher("Classes", $ligne_par_page) - 1);
                                ?>
                                <a href="<?= $lien ?>" class="btn btn-primary">&laquo; Page précédente</a>
                            <?php endif; ?>
                            <?php if (page_courente_a_afficher("Classes", $ligne_par_page) < toutes_les_pages_possible("Classes", $ligne_par_page)) : ?>
                                <?php
                                $lien .= "&page-courente=" . (page_courente_a_afficher("Classes", $ligne_par_page) + 1);
                                ?>
                                <a href="<?= $lien ?>" class="btn btn-primary ml-auto">Page suivante &raquo;</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif (isset($_GET['demande-suppression']) && !empty($_GET['demande-suppression']) && $_GET['demande-suppression'] == "suppression-eleves") : ?>
                <h4 class="card-title">Liste complet de messages réçu</h4>
                <div class="text-center">
                    <?php foreach (selectionClasse() as $classe) {   ?>
                        <a class="a-classe" href="index.php?page=suppression&classe-demande-modification-en=<?= $classe['Nom'] ?>&classe=<?= $classe['Nom'] ?>">
                            <div class="card card-classe bg-dark text-white-50">
                                <div class="card-body">
                                    <?= $classe['Nom'] ?>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            <?php elseif (isset($_GET['classe-demande-modification-en']) && !empty($_GET['classe-demande-modification-en']) && $_GET['classe-demande-modification-en'] != NULL && $_GET['classe-demande-modification-en'] == $_GET['classe']) : ?>

                <table class="table">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>Nom</th>
                            <th>Matricule</th>
                            <th>Niveau</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($eleves as $eleve) :  ?>
                            <tr>
                                <td scope="row"><strong><?= $eleve['Nom'] ?> <?= $eleve['Prenom'] ?></strong></td>
                                <td><strong><?= $eleve['Code'] ?> </strong></td>
                                <td><strong><?= $eleve['Niveau'] ?> </strong></td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <?php if ($eleve['Etat'] != 0) : ?>
                                                <a href="index.php?page=suppression&classe-demande-modification-en=modification-en-eleve&modification-état=active&identifiant-eleve=<?= (int) $eleve['Id'] ?>&classe=<?= $_GET['classe-demande-modification-en'] ?>" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            <?php else : ?>
                                                <a href="index.php?page=suppression&classe-demande-modification-en=modification-en-eleve&modification-état=desactive&identifiant-eleve=<?= (int) $eleve['Id'] ?>&classe=<?= $_GET['classe-demande-modification-en'] ?>" class="btn btn-warning"> <i class="fa fa-times" aria-hidden="true"></i></a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-6">
                                            <a href="index.php?page=suppression&identifiant-eleve-à-supprimée=<?= $enseignant['Id'] ?>&classe=<?= $_GET['classe-demande-modification-en'] ?>" onclick="return confirm('Attention ! Attention ! Vous êtes sur le point de supprimer l\'élève <?= $eleve['Nom'] ?> <?= $eleve['Prenom'] ?> élève en clase de <?= $eleve['Niveau'] ?>.  êtes vous sûr de vouloir supprimer ? ')" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
    <?php else : ?>
        <div class="alert alert-warning text-center"><b>Aucune information précise à votre boite de réception</b></div>
    <?php endif; ?>
    </div>
</section>