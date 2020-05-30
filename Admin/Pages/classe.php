<?php
if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
} ?>
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
            <li class="breadcrumb-item active">Liste des classes</li>
        </ul>
    </div>
</div>
<section class="forms">
    <div class="container-fluid">
        <h4 class="bg-dark text-white mt-3 mb-3 p-3 text-center">Liste total de classe de l'établissement</h4>
        <div class="row">
            <div class="col-xl-7 col-md-4 col-6"></div>
            <div class="col-xl-3 col-md-4 col-6">
                <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="exampleModalLabel" class="modal-title">Ajouter une nouvelle classe dans votre établissement</h5>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body" style="margin: 20px">
                                <p>Ajouter une classe qui n'est pas déjà enrégistré !</p>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Nom de la classe</label>
                                        <input name="nom" type="text" placeholder="Nom de la classe" class="form-control" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Fermer la boite</button>
                                        <input name="btn-classe" value="Enrégistrer les infos" type="submit" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr class="bg-dark text-white">
                    <th>Code de la classe</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($classes as $classe) : ?>
                    <tr>
                        <td><?= $classe['Code'] ?></td>
                        <td><?= $classe['Nom'] ?></td>
                        <td>
                            <div class="col-1"><a data-toggle="modal" data-target="#modifier-info"><i class="fa fa-pencil-square-o btn btn-primary" aria-hidden="true"></i></a></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
        <div class="container">
            <div class="slantdiv"></div>
            <?php if (isset($_SESSION['Administrateur'])) : ?>
                <div class="d-flex justify-content-between my-5">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Ajouter une classe</button>
                    <a href="" class="btn btn-primary">Imprimer la liste</a>
                </div>
            <?php endif; ?>
        </div>
</section>