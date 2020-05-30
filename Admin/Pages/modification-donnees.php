<?php

include 'Librairie/traitement-modifications.php';

?>
<?php if (isset($_GET['indication']) && $_GET['indication'] == 'modification-enseignat' && !empty($_GET['identifiant-enseignant']) && intval($_GET['identifiant-enseignant'])) :  ?>
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Ajout d'élèves</a></li>
                <li class="breadcrumb-item active">Formulaire </li>
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <div class="titre text-white bg-dark text-center">
                    <blockquote class="blockquote">
                        <h4>Modification des information de l'enseignant </h4>
                    </blockquote>
                </div>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <?php if (!empty($_GET['message-erreur'])) : ?>
                            <div class="alert alert-danger text-center">
                                <b><?= $_GET['message-erreur'] ?></b>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($_GET['message-success'])) : ?>
                            <div class="alert alert-danger text-center">
                                <b><?= $_GET['message-success'] ?></b>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <form class="" method="POST" action="" enctype="multipart/form-data">
                                <div class=" row">
                                    <div class="form-group col-sm-6">
                                        <label id="titre" class="form-control-label">Titre</label>
                                        <select name="titre" class="form-control clid" required="required">
                                            <option value="<?= $selection_enseignant_ne_get['Sexe'] ?>">Selectionner la valeur correcte</option>
                                            <option value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label id="matricule" class="">Matricule</label>
                                        <input name="matricule" type="text" class="form-control" value="<?= $selection_enseignant_ne_get['Matricule'] ?>" required placeholder="Matricule de l'eseignants">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class=" row">
                                    <div class="form-group col-sm-6">
                                        <label id="nom" class="">Nom : </label>
                                        <input name="nom" type="text" class="form-control" value="<?= $selection_enseignant_ne_get['Nom'] ?>" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label id="prenom" class="">Prénom</label>
                                        <input name="prenom" type="text" class="form-control" value="<?= $selection_enseignant_ne_get['Prenom'] ?>" required>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class=" row">
                                    <div class="form-group col-sm-6">
                                        <label class="form-control-label">Téléphone</label>
                                        <input name="telephone" type="tel" value="<?= $selection_enseignant_ne_get['Telephone'] ?>" placeholder="Téléphone de l'étudiant" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-control-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= $selection_enseignant_ne_get['Email'] ?>" required>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class=" row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-control-label">Date de naissance</label>
                                        <input name="date_de_naissance" type="date" placeholder="Pays" class="form-control" value="<?= $selection_enseignant_ne_get['DateNaissance'] ?>" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="form-control-label">Date recrutement</label>
                                        <input type="date" name="dateRecrute" class="form-control" value="<?= $selection_enseignant_ne_get['DateRecrute'] ?>" required>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class=" row">
                                    <div class="form-group col-sm-6">
                                        <label class="form-control-label">Spécialité : </label>
                                        <input name="specialite" type="text" placeholder="Domaine d'enseignement" value="<?= $selection_enseignant_ne_get['Specialite'] ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-control-label">Niveau de diplôme : </label>
                                        <input name="diplome" type="text" placeholder="Niveau de diplôme" value="<?= $selection_enseignant_ne_get['Diplome'] ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class=" row">
                                    <div class="form-group col-sm-6">
                                        <label id="indos_supp" class="form-control-label">Information supplémentaire</label>
                                        <textarea name="infos_supp" id="indos_supp" class="form-control"><?= $selection_enseignant_ne_get['Infos_supp'] ?></textarea>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-control-label">Lieu de résidence</label>
                                        <input name="lieuResidence" type="text" placeholder="Lieu de résidence" class="form-control" value="<?= $selection_enseignant_ne_get['LieuResidence'] ?>">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class=" row">
                                    <div class="form-group col-sm-6">
                                        <label id="lieuNaissance" class="form-control-label">Lieu de naissance</label>
                                        <input type="text" name="lieuNaissance" id="lieuNaissance" value="<?= $selection_enseignant_ne_get['LieuNaissance'] ?>" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-control-label" for="universite">Université qu'il a eu le diplôme</label>
                                        <input name="universite" type="text" placeholder="Lieu de résidence" id="universite" class="form-control" value="<?= $selection_enseignant_ne_get['Universite'] ?>">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class=" row">
                                    <div class="form-group col-sm-6">
                                        <label class="form-control-label">Passeport | extrait de naissance | carte nationnale</label>
                                        <input type="file" name="piece-identite" class="form-control" value="<?= $selection_enseignant_ne_get['Piece'] ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-control-label">Photo</label>
                                        <input type="file" name="photo" class="form-control" value="<?= $selection_enseignant_ne_get['Photo'] ?>">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class=" row">
                                    <div class="form-group col-sm-6">
                                        <label class="form-control-label">Attestation de diplôme</label>
                                        <input type="file" name="attestation" class="form-control" value="<?= $selection_enseignant_ne_get['Attestation'] ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="form-control-label">Curiculum vitae</label>
                                        <input type="file" name="cv" class="form-control" value="<?= $selection_enseignant_ne_get['CV'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="btn-modification-enseignant" type="submit" value="Mettre à jour les informations" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (isset($_GET['indication']) && $_GET['indication'] == 'modification-eleve' && !empty($_GET['identifiant-eleve']) && intval($_GET['identifiant-eleve'])) :  ?>
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Ajout d'élèves</a></li>
                <li class="breadcrumb-item active">Formulaire </li>
            </ul>
        </div>
    </div>
    <section class="forms">
        <div class="container-fluid">
            <header>
                <div class="titre text-white bg-dark text-center">
                    <blockquote class="blockquote">
                        <h4>Modification des information de l'enseignant </h4>
                    </blockquote>
                </div>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <?php if (!empty($_GET['message-erreur'])) : ?>
                        <div class="alert alert-danger text-center">
                            <b><?= $_GET['message-erreur'] ?></b>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($_GET['message-success'])) : ?>
                        <div class="alert alert-danger text-center">
                            <b><?= $_GET['message-success'] ?></b>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <form class="form" method="POST" action="" enctype="multipart/form-data">
                            <div class="personnal-card">
                                <div class="card border-2">
                                    <div class="card-header">
                                        <div class="slantdiv mt-4"></div>
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
                                                        <option value="<?= $selection_eleve_ne_get['Sexe'] ?>">Choisissez le titre</option>
                                                        <option value="Femme">Femme</option>
                                                        <option value="Homme">Homme</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label id="nom" class="">Nom : </label>
                                                <input name="nom" type="text" class="form-control" value="<?= $selection_eleve_ne_get['Nom'] ?>" required>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label id="prenom" class="">Prénom</label>
                                                <input name="prenom" type="text" class="form-control" value="<?= $selection_eleve_ne_get['Prenom'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="line"></div>
                                        <div class=" row">
                                            <div class="form-group col-sm-6">
                                                <label class="form-control-label">Date de naissance : </label>
                                                <input name="date_de_naissance" type="date" placeholder="Date de naissance" class="form-control" value="<?= $selection_eleve_ne_get['Date_de_naissance'] ?>" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-control-label">Ville de naissance</label>
                                                <input name="villeNaissance" type="text" placeholder="Pays" class="form-control" value="<?= $selection_eleve_ne_get['VilleNaissance'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="line"></div>
                                        <div class=" row">
                                            <div class="form-group col-sm-6">
                                                <label class="form-control-label">Photo</label>
                                                <input name="photo" type="file" placeholder="" value="<?= $selection_eleve_ne_get['Photo'] ?>" class="form-control">
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label class="form-control-label">Pièce d'identité</label>
                                                <input type="file" name="piece" value="<?= $selection_eleve_ne_get['Piece'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <!-- <div class="d-flex justify-content-end">
                                            <input type="button" class="bg-dark text-white mt-2 pl-5 pb-2 pt-2 pr-5 rounded btn-personnal" value="Suivant &raquo;"></input>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- carte des informations de contacte -->
                            <div class="contact-card">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="slantdiv mt-4"></div>
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
                                                <input name="telephone" type="tel" placeholder="Téléphone de l'étudiant" value="<?= $selection_eleve_ne_get['Telephone'] ?>" class="form-control" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-control-label">Email</label>
                                                <input type="email" name="email" class="form-control" value="<?= $selection_eleve_ne_get['Email'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="line"></div>
                                        <div class=" row">
                                            <div class="form-group col-sm-6">
                                                <label class="form-control-label">Ville de résidence </label>
                                                <input type="text" name="villeResidence" class="form-control" value="<?= $selection_eleve_ne_get['VilleResidence'] ?>" required>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="form-control-label">Autres contactes supplementaires </label>
                                                <input type="text" name="autreContacte" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="d-flex justify-content-end">
                                        <input type="button" class="bg-dark text-white mt-2 pl-5 pb-2 pt-2 pr-5 rounded btn-contact" value="Suivant &raquo;"></input>
                                    </div> -->
                                </div>
                            </div>
                            <div class="accademy-card">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="slantdiv mt-4"></div>
                                        <div class="barslant">
                                            <div>
                                                <h4 class="text-primary bg-white">Informations Accadémiques</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
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
                                                        <?php foreach ($classes as $classe) {   ?>
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
                                    <!-- <div class="d-flex justify-content-end">
                                        <input type="button" class="bg-dark text-white mt-2 pl-5 pb-2 pt-2 pr-5 rounded btn-accademy" value="Suivant &raquo;"></input>
                                    </div> -->
                                </div>
                            </div>
                            <div class="parents-card">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="slantdiv mt-4"></div>
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
                                                <input name="photoR" type="file" placeholder="Pays" class="form-control">
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label class="form-control-label">Pièce d'identité du résponsable</label>
                                                <input type="file" name="pieceR" class="form-control">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <input type="button" class="bg-dark text-white mt-2 pl-5 pb-2 pt-2 pr-5 rounded btn-parents" value="Enregistrer les informations de l'élève"></input>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="d-flex justify-content-end">
                                    <input name="btn-modifier-infos-eleves" type="submit" class="bg-dark text-white mt-2 pl-5 pb-2 pt-2 pr-5 rounded" value="Enregistrer les informations de l'élève"></input>
                                </div> -->
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>