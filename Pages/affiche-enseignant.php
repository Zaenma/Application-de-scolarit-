<div class="carousel fade-carousel slide carousel-fade" data-ride="carousel" data-interval="3000" id="bs-carousel">
    <ol class="carousel-indicators">
        <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#bs-carousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item slides active carousel-item">
            <div class="slide-1" style="background-image: url(Admin/pieces-enseignant/<?= $selection_enseignant_ne_get['Photo'] ?>);">
                <div class="overlay"></div>
            </div>
        </div>
        <div class="hero">
            <hgroup>
                <h1 class="animated"><?= $selection_enseignant_ne_get['Nom'] ?> <?= $selection_enseignant_ne_get['Prenom'] ?></h1>
                <p><a class="btn btn-primary btn-lg" href="#">Contacter <?= $selection_enseignant_ne_get['Nom'] ?> <?= $selection_enseignant_ne_get['Prenom'] ?></a></p>
            </hgroup>

        </div>
    </div>
</div>
<div class="container fh5co-section-gray" id="fh5co-contact">
    <header>
        <h1 class="h3 display">Profile </h1>
    </header>
    <div class="row row-bottom-padded-md">
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="fh5co-blog animate-box">
                <a href="#"><img class="img-responsive img-enseignant img-fluid" src="Admin/pieces-enseignant/<?= $selection_enseignant_ne_get['Photo'] ?>" class="img-fluid rounded float-left image-ens"></a>
                <div class="blog-text text-center">
                    <div class="prod-title">
                        <h3><a href="#"><?= $selection_enseignant_ne_get['Nom'] ?> <?= $selection_enseignant_ne_get['Prenom'] ?></a></h3>
                    </div>
                    <p>Spécialiste en <?= $selection_enseignant_ne_get['Specialite'] ?></p>
                    <?php if ($selection_enseignant_ne_get['CV'] != NULL) : ?>
                        <div class="card text-center">
                            <a class="btn btn-primary btn-outline" href="Admin/pieces-enseignant/<?= $selection_enseignant_ne_get['CV'] ?>">Curiculum vitae</a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9">
            <table class="table animate-box">
                <thead class="titre">
                    <tr>
                        <th>
                            <div class="">
                                <b>Information complet de <?= $selection_enseignant_ne_get['Nom'] ?> <?= $selection_enseignant_ne_get['Prenom'] ?></b>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nom et prénom</td>
                        <td>
                            <h4><?= $selection_enseignant_ne_get['Nom'] ?> <?= $selection_enseignant_ne_get['Prenom'] ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>Date et lieu de naissance </td>
                        <td><?= (new DateTime($selection_enseignant_ne_get['DateNaissance']))->format('d/m/Y') ?></span> à <?= $selection_enseignant_ne_get['LieuNaissance'] ?></td>
                    </tr>
                    <tr>
                        <td>Résidence actuelle</td>
                        <td><?= $selection_enseignant_ne_get['LieuResidence'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Diplomé en <b><?= $selection_enseignant_ne_get['Specialite'] ?></b> à l'université <b><?= $selection_enseignant_ne_get['Universite'] ?></b> de niveau <b><?= $selection_enseignant_ne_get['Diplome'] ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="titre">
                                <b>Information pour contacter <?= $selection_enseignant_ne_get['Nom'] ?> <?= $selection_enseignant_ne_get['Prenom'] ?></b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Numéro de téléphone</td>
                        <td><a href="tel:<?= $selection_enseignant_ne_get['Telephone'] ?>"><i class="fa fa-phone"></i> <?= $selection_enseignant_ne_get['Telephone'] ?></a></td>
                    </tr>
                    <tr>
                        <td>Adresse électronique</td>
                        <td><a href="mailto:<?= $selection_enseignant_ne_get['Email'] ?>"><i class="fa fa-phone"></i> <?= $selection_enseignant_ne_get['Email'] ?></a></td>
                    </tr>
                    <tr>
                        <td>Lieu de résidence </td>
                        <td><?= $selection_enseignant_ne_get['LieuResidence'] ?></td>
                    </tr>

                </tbody>
            </table>
            <div class="text-center titre animate-box">
                <b>Liens vers les réseaux sociaux</b>
            </div>
            <div class="row">
                <div class="text-center animate-box reseau-enseignant">
                    <div class="col-12 text-center">
                        <p class="fh5co-social-icons">
                            <a href="#"><i class="icon-twitter2"></i></a>
                            <a href="#"><i class="icon-facebook2"></i></a>
                            <a href="#"><i class="icon-instagram"></i></a>
                            <a href="#"><i class="icon-dribbble2"></i></a>
                            <a href="#"><i class="icon-youtube"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="titre animate-box">
        <b>Autres informations supplémentaire</b>
    </div>
    <div class="card-body animate-box">
        <b class="mt-3 mb-3"><?= $selection_enseignant_ne_get['Infos_supp'] ?></b>
    </div>
</div>