<?php
if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
}

?>
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Paramèttres d'administration</li>
        </ul>
    </div>
</div>
<div class="container-fluid">
    <div class="bg-dark text-white text-center p-3 mt-3 mb-3">
        <h4>Paramètes d'administration de l'établissement</h4>
    </div>
    <?php if (!empty($_GET['message-erreur'])) : ?>
        <div class="alert alert-danger text-center"><?= $_GET['message-erreur'] ?></div>
    <?php endif; ?>
    <?php if (!empty($_GET['message-success'])) : ?>
        <div class="alert alert-primary text-center"><?= $_GET['message-success'] ?></div>
    <?php endif; ?>
    <div class="card mt-3">
        <div class="row">
            <div class="col-sm-4">
                <img class="img-fluid rounded" src="pieces-admin/<?= $Outil_administrations['Logo'] ?>" alt="">
                <h1 class="text-center mt-3">Logo de <span class=""><?= $Outil_administrations['Nom_etablissement'] ?></span></h1>
            </div>
            <div class="col-sm-8 mt-3">
                <h1 class="nom-etablissement"><?= $Outil_administrations['Nom_etablissement'] ?></h1>

                <table class="table">
                    <tbody>
                        <tr>
                            <td>Adresse email de l'établissement</td>
                            <td><span class="infos-paramettres"><?= $Outil_administrations['Email_admin'] ?></span></td>
                        </tr>
                        <tr>
                            <td>Numéro de l'établissement</td>
                            <td><span class="infos-paramettres"><?= $Outil_administrations['Telephone_Admin'] ?></span></td>
                        </tr>
                        <tr>
                            <td>Fax</td>
                            <td><span class="infos-paramettres"><?= $Outil_administrations['Fax'] ?></span></td>
                        </tr>
                        <tr>
                            <td>Directeur acturl</td>
                            <td><span class="infos-paramettres"><?= $Outil_administrations['Directeur'] ?></span></span></td>
                        </tr>
                        <tr>
                            <td>Date de création de l'établissement</td>
                            <td><span class="infos-paramettres"><?= (new \DateTime($Outil_administrations['Date_creation']))->format('d/m/Y') ?></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container-fluid">
            <hr>
            <label class="text-primary" for="">La description de votre établissement :</label> <br>
            <?= $Outil_administrations['Histoire'] ?>
        </div>
        <div class="bg-dark text-white text-center mt-3 p-3">
            <div class="d-flex justify-content-between">
                <a href="#modifier-infos-admin" aria-expanded="false" data-toggle="collapse">
                    <h4 class="text-white">Modifier les informations</h4>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="collapse list-unstyled" id="modifier-infos-admin">
            <div class="bg-dark text-white text-center mb-4 p-3">
                <h4>Modifcation des paramètres de votre établissement</h4>
            </div>
            <div class="p-3">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="" enctype="multipart/form-data" method="post">
                            <img class="img-fluid rounded mb-3" src="pieces-admin/<?= $Outil_administrations['Logo'] ?>" alt="">
                            <input type="file" name="logo" value="<?= $Outil_administrations['Logo'] ?>" id="" class="form-control mb-3">
                            <input type="submit" name="modification-logo" class="btn btn-primary" value="Modifier le logo">
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label for="">Nom de l'établissement<?= $Outil_administrations['Nom_etablissement'] ?></label>
                                <input type="text" name="nom" id="" class="form-control" value="<?= $Outil_administrations['Nom_etablissement'] ?>" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group ">
                                <label for="">Directeur actuel</label>
                                <input type="text" name="directeur" id="" class="form-control" value="<?= $Outil_administrations['Directeur'] ?>" placeholder="" aria-describedby="helpId">
                            </div>

                            <div class="form-group ">
                                <label for="email">Adresse emil l'établissement<?= $Outil_administrations['Email_admin'] ?></label>
                                <input type="email" name="email" id="email" class="form-control" value="<?= $Outil_administrations['Email_admin'] ?>" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group ">
                                <label for="tel">Numéro de téléphone établissement</label>
                                <input type="tel" name="telephone" id="tel" class="form-control" value="<?= $Outil_administrations['Telephone_Admin'] ?>" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group ">
                                <label for="">Fax : </label>
                                <input type="fax" name="fax" id="" class="form-control" value="<?= $Outil_administrations['Fax'] ?>" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="description">Déscription de l'établissement</label>
                                <textarea name="histoire" id="description" cols="30" class="form-control" rows="5"><?= $Outil_administrations['Histoire'] ?></textarea>
                            </div>
                            <input type="submit" name="btn-modification-parametre" value="Modifier les informations" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>