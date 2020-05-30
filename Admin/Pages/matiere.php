<?php
if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
}

?>
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
            <li class="breadcrumb-item active"></li>Liste des enseignants</li>
        </ul>
    </div>
</div>
<div class="container-fluid">

    <div class="bg-dark mt-3 p-3 text-center text-white">Suivant la liste des matières enseignées dana l'établissement</div>
    <hr>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Code de la matière</th>
                <th>Nom</th>
                <th>Actions possible</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matieres as $matiere) : ?>
                <tr>
                    <td scope="row"><?= $matiere['Code'] ?></td>
                    <td><?= $matiere['Nom'] ?></td>
                    <td>
                        <div class="row">
                            <div class="col-6"><a href="" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
                            <div class="col-6"><a type="button" data-toggle="modal" data-target="#matiere-<?= $matiere['Id'] ?>" href="" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="modal fade" id="matiere-<?= $matiere['Id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modification d'information</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <form class="form" method="POST">
                                                <div class="form-group mt-5">
                                                    <label for="<?= $matiere['Nom'] ?>">Modification du nom de la matière</label>
                                                    <input type="text" name="<?= $matiere['Nom'] ?>" id="<?= $matiere['Nom'] ?>" value="<?= $matiere['Nom'] ?>" class="form-control" placeholder="">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <input type="submit" name="btn-modification-matiere" value="Mettre à jour le nom" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



    <!-- Modal -->

    <div class="d-flex justify-content-between my-4">
        <?php if (page_courente_a_afficher("Matiere", $ligne_par_page) > 1) : ?>
            <?php
            if (page_courente_a_afficher("Matiere", $ligne_par_page) > 2) {
                $lien .= "&page-courente=" . (page_courente_a_afficher("Matiere", $ligne_par_page) - 1);
            }
            ?>
            <a href="<?= $lien ?>" class="btn btn-primary">&laquo; Page précédente</a>
        <?php endif; ?>
        <?php if (page_courente_a_afficher("Matiere", $ligne_par_page) < toutes_les_pages_possible("Matiere", $ligne_par_page)) : ?>
            <?php
            if (page_courente_a_afficher("Matiere", $ligne_par_page) < toutes_les_pages_possible("Matiere", $ligne_par_page)) {
                $lien .= "&page-courente=" . (page_courente_a_afficher("Matiere", $ligne_par_page) + 1);
            }
            ?>
            <a href="<?= $lien ?>" class="btn btn-primary ml-auto">Page suivante &raquo;</a>
        <?php endif; ?>
    </div>
</div>
<!-- boite de dialogue de connexion -->
<section>
    <div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle matière</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body" style="margin:20px">
                        <div class="form-group">
                            <label for="nom" class="col-form-label">Nom de la matière</label>
                            <input name="nom" type="text" class="form-control" required id="nom">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <input name="btn-ajout-matiere" type="submit" value="Enregistrer la matière" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>