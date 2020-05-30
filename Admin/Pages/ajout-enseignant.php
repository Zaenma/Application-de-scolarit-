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
            <blockquote class="blockquote bg-dark text-white text-center">
                <h4>Ajouter un enseignat</h4>
            </blockquote>
            <?php if (!empty($_GET['message-erreur'])) : ?>
                <div class="alert alert-danger"><?= $_GET['message-erreur'] ?></div>
            <?php endif; ?>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Ajout d'un enseignant</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" method="POST" action="" enctype="multipart/form-data">
                            <div class=" row">
                                <div class="form-group col-sm-6">
                                    <label id="titre" class="form-control-label">Titre</label>
                                    <select name="titre" class="form-control clid"="">
                                        <option value="">Selectionner la titre</option>
                                        <option value="Homme">Homme</option>
                                        <option value="Homme">Femme</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label id="matricule" class="">Matricule</label>
                                    <input name="matricule" type="text" class="form-control" placeholder="Matricule de l'eseignants">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class=" row">
                                <div class="form-group col-sm-6">
                                    <label id="nom" class="">Nom : </label>
                                    <input name="nom" type="text" class="form-control">
                                </div>
                                <?php if (isset($erreurs['nom'])) : ?>
                                    <p class="form-text text-danger"> <?= $erreurs['nom'] ?> </p>
                                <?php endif; ?>
                                <div class="form-group col-sm-6">
                                    <label id="prenom" class="">Prénom</label>
                                    <input name="prenom" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class=" row">
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Téléphone</label>
                                    <input name="telephone" type="tel" placeholder="Téléphone de l'étudiant" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class=" row">
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">Date de naissance</label>
                                    <input name="date_de_naissance" type="date" placeholder="Pays" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">Date recrutement</label>
                                    <input type="date" name="dateRecrute" class="form-control">
                                </div>
                            </div>

                            <div class="line"></div>
                            <div class=" row">
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">Spécialité : </label>
                                    <input name="specialite" type="text" placeholder="Domaine d'enseignement" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">Niveau de diplôme</label>
                                    <input type="text" name="diplome" id="" class="form-control">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class=" row">
                                <div class="form-group col-lg-6">
                                    <label id="universite" class="form-control-label">Université</label>
                                    <input type="text" name="universite" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label id="cycle" class="form-control-label">Information supplémentaire</label>
                                    <textarea name="infos-supp" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class=" row">
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">Lieu de résidence</label>
                                    <input name="lieuResidence" type="text" placeholder="Lieu de résidence" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-control-label">Lieu de naissance</label>
                                    <input name="lieuNaissance" type="text" placeholder="Lieu de résidence" class="form-control">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class=" row">
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Piece d'identité en format pdf</label>
                                    <input type="file" name="piece-identite" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Photo</label>
                                    <input type="file" name="photo" class="form-control">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class=" row">
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Attestation de diplôme si ça existe</label>
                                    <input type="file" name="attestation" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-control-label">Curuculum vitae</label>
                                    <input type="file" name="cv" class="form-control">
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="">
                                    <input name="btn-insert-enseignant" type="submit" value="Enregistrer les informations" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>