<?php
if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=pages-profile');
} ?>
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Profile </li>
        </ul>
    </div>
</div>
<section class="forms">
    <div class="container-fluid">
        <div class="titre text-white bg-dark text-center mt-1">
            <blockquote class="blockquote">
                <b>Inscription d'un élève</b>
            </blockquote>
        </div>
        <?php if (isset($_GET['message-erreur']) && !empty($_GET['message-erreur'])) : ?>
            <div class="alert alert-danger"><?= $_GET['message-erreur'] ?></div>
        <?php endif; ?>
        <?php if (isset($_GET['message-success']) && !empty($_GET['message-success'])) : ?>
            <div class="alert alert-success"><?= $_GET['message-success'] ?></div>
        <?php endif; ?>
        <div class="row">
            <div class="col-sm-12">
                <form class="" method="POST" action="" enctype="multipart/form-data">
                    <div class="card border-2">
                        <div class="card-header">
                            <div class="slantdiv mt-1"></div>
                            <div class="barslant">
                                <div>
                                    <h4 class="text-primary bg-white">Information personnel</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class=" row">
                                <div class="form-group col-sm-4">
                                    <label class="form-control-label">Titre</label>
                                    <div class="">
                                        <select name="sexe" class="form-control" required>
                                            <option value="">Choisissez le titre</option>
                                            <option value="Femme">Femme</option>
                                            <option value="Homme">Homme</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label id="nom" class="">Nom : </label>
                                    <input name="nom" type="text" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label id="prenom" class="">Prénom</label>
                                    <input name="prenom" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class=" row">
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Date de naissance : </label>
                                    <input name="date_de_naissance" type="date" placeholder="Date de naissance" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Ville de naissance</label>
                                    <input name="villeNaissance" type="text" placeholder="Pays" class="form-control" required>
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class=" row">
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Photo</label>
                                    <input name="photo-eleve" type="file" placeholder="Pays" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Pièce d'identité</label>
                                    <input type="file" name="piece-eleve" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="slantdiv mt-1"></div>
                            <div class="barslant">
                                <div>
                                    <h4 class="text-primary bg-white">Informations de contacte</h4>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="card-body">
                            <div class=" row">
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Téléphone</label>
                                    <input name="telephone" type="tel" placeholder="Téléphone de l'étudiant" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class=" row">
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Ville de résidence </label>
                                    <input type="text" name="villeResidence" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Autres contactes supplementaires </label>
                                    <input type="text" name="autreContacte" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="slantdiv mt-1"></div>
                            <div class="barslant">
                                <div>
                                    <h4 class="text-primary bg-white">Informations Accadémiques</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="" method="POST" action="">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label class="form-control-label">Date d'inscription au lycée</label>
                                        <input type="date" name="dInscrit" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-control-label">Session accadémique</label>
                                        <input type="text" name="session" class="form-control" required>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class=" row">
                                    <div class="form-group col-sm-6">
                                        <label id="niveau" class="form-control-label">Niveau de l'élève | Classe</label>
                                        <div class="">
                                            <select name="niveau" class="form-control">
                                                <option value="">Selectionner la Classe</option>
                                                <?php foreach (selectionClasse() as $classe) {   ?>
                                                    <option value="<?= $classe['Nom'] ?>"><?= $classe['Nom']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label id="serie" class="form-control-label">Informations supplemantaire</label>
                                        <textarea class="form-control" name="infoss"></textarea>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="slantdiv mt-1"></div>
                            <div class="barslant">
                                <div>
                                    <h4 class="text-primary bg-white">Information sur le responsable de l'élève</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Matricule</label>
                                    <input name="matriculeR" type="text" placeholder="matriculation personnel" class="form-control" required data-msg="La matriculation' du reponsable">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Nom complet</label>
                                    <input name="nomR" type="tel" placeholder="Nom complet" class="form-control" required data-msg="Nom complet">
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Téléphone permanent</label>
                                    <input name="telephoneR" type="tel" placeholder="Téléphone" class="form-control" required data-msg="Téléphone">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Email</label>
                                    <input type="email" name="emailR" placeholder="Email Address" class="form-control" required data-msg="Adresse emil">
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label id="lienParente" class="form-control-label">Lien parenté</label>
                                    <div class="">
                                        <select name="lien" class="form-control" required data-msg="Veillez le lien">
                                            <option value="">Selectionner le lien parenté</option>
                                            <option value="Père">Père</option>
                                            <option value="Mère">Mère</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="residenceR">Lieu de résidence</label>
                                        <input name="residenceR" type="text" placeholder="Lieu de résidence actuel" class="form-control" required data-msg="Lieu de résidence que vous pouvez lui joindre">
                                    </div>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class=" row">
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Photo du résponsable</label>
                                    <input name="photo-responsable" type="file" placeholder="Pays" class="form-control">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Pièce d'identité du résponsable</label>
                                    <input type="file" name="piece-responsable" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center card">
                        <input name="btn-insert-eleves" type="submit" value="Enregistrer les informations de l'élève" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>