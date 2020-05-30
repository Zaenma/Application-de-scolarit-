<?php

if (!isset($_SESSION['Administrateur']) && !isset($_SESSION['eleves']) && !isset($_SESSION['enseignants'])) {
    header('Location:index.php?page=deconnexion');
}


?>
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
        <header>
            <h1 class="h3 display">Profile</h1>
        </header>

        <?php if (isset($_GET['message-erreur']) && !empty($_GET['message-erreur'])) : ?>
            <div class="alert alert-danger"><?= $_GET['message-erreur'] ?></div>
        <?php endif; ?>
        <?php if (isset($_GET['message-success']) && !empty($_GET['message-success'])) : ?>
            <div class="alert alert-success"><?= $_GET['message-success'] ?></div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-profile">
                    <?php if (isset($_SESSION['Administrateur'])) : ?>
                        <div style="background-image: url(img/photos/paul-morris-116514-unsplash.jpg);" class="card-header"></div>
                        <div class="card-body text-center">
                            <img src="pieces-admin/<?= $donnees['Photo'] ?>" class="card-profile-img">
                            <h3 class="mb-3"><?= $donnees['Nom'] ?></h3>
                            <p class="mb-4">Vous êtes connecté en tant qu'Administrateur </p>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['eleves'])) : ?>
                        <div style="background-image: url(img/photos/paul-morris-116514-unsplash.jpg);" class="card-header"></div>
                        <div class="card-body text-center"><img src="pieces-eleves/<?= $donnees['Photo'] ?>" class="card-profile-img">
                            <h3 class="mb-3"><?= $donnees['Nom'] ?></h3>
                            <p class="mb-4">Vous êtes connecté en tant du'élève</p>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['enseignants'])) : ?>
                        <div style="background-image: url(img/photos/paul-morris-116514-unsplash.jpg);" class="card-header"></div>
                        <div class="card-body text-center"><img src="pieces-enseignant/<?= $donnees['Photo'] ?>" class="card-profile-img">
                            <h3 class="mb-3"><?= $donnees['Nom'] ?></h3>
                            <p class="mb-4">Vous êtes connecté en tant qu'enseignant</p>
                        </div>
                    <?php endif; ?>
                </div>
                <form class="card">
                    <div class="card-header">
                        <h3 class="card-title">Modification de mot de passe</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-auto d-flex align-items-center"><span style="background-image: url(img/avatar-7.jpg)" class="avatar avatar-lg"></span></div>
                            <div class="col">
                                <label class="form-label">Nom</label>
                                <p><?= $donnees['Nom'] ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Adresse email</label>
                            <input placeholder="<?= $donnees['Email'] ?>" class="form-control" autocomplete="OFF" value="<?= $donnees['Email'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mot de passe</label>
                            <input type="password" value="" required class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Mes publications</h1>
                        <!-- <div class="input-group">
                            <input type="text" placeholder="Message" class="form-control">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary"><i class="fa fa-send"></i></button>
                            </div>
                        </div> -->
                    </div>
                    <div class="list-group card-list-group">
                        <div class="list-group-item py-5">
                            <div class="media">
                                <?php if (isset($_SESSION['Administrateur'])) : ?>
                                    <div style="background-image: url(pieces-admin/<?= $donnees['Photo'] ?>);" class="media-object avatar avatar-md mr-3"></div>
                                <?php endif; ?>
                                <?php if (isset($_SESSION['eleves'])) : ?>
                                    <div style="background-image: url(pieces-eleves/<?= $donnees['Photo'] ?>);" class="media-object avatar avatar-md mr-3"></div>
                                <?php endif; ?>
                                <?php if (isset($_SESSION['enseignants'])) : ?>
                                    <div style="background-image: url(pieces-enseignant/<?= $donnees['Photo'] ?>);" class="media-object avatar avatar-md mr-3"></div>
                                <?php endif; ?>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h5><?= $donnees['Nom'] ?></h5>
                                    </div>
                                    <?php foreach ($publications as $publication) : ?>
                                        <div class="text-muted text-small"><?= $publication['Titres'] ?></div>
                                        <div class="d-flex justify-content-end">
                                            <small>Le <?= (new \DateTime($publication['Date_poste']))->format('d/m/Y à H:i:s') ?></small>
                                        </div>
                                        <div class="media-list">
                                            <div class="media mt-4">
                                                <div style="background-image: url(img/avatar-3.jpg)" class="media-object avatar mr-3"></div>
                                                <div class="media-body text-muted text-small"><strong class="text-dark">Serenity Mitchelle: </strong>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. &quot;What's happened to me?&quot; he thought. It wasn't a dream.</div>
                                            </div>
                                            <div class="media mt-4">
                                                <div style="background-image: url(img/avatar-1.jpg)" class="media-object avatar mr-3"></div>
                                                <div class="media-body text-muted text-small"><strong class="text-dark">Tony O'Brian: </strong>His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table.</div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item py-5">
                            <div class="media">
                                <div style="background-image: url(img/avatar-7.jpg)" class="media-object avatar avatar-md mr-3"></div>
                                <div class="media-body">
                                    <div class="media-heading"><small class="float-right text-muted">12 min</small>
                                        <h5><?= $donnees['Nom'] ?></h5>
                                    </div>
                                    <div class="text-muted text-small">Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item py-5">
                            <div class="media">
                                <div style="background-image: url(img/avatar-7.jpg)" class="media-object avatar avatar-md mr-3"></div>
                                <div class="media-body">
                                    <div class="media-heading"><small class="float-right text-muted">34 min</small>
                                        <h5><?= $donnees['Nom'] ?></h5>
                                    </div>
                                    <div class="text-muted text-small">He must have tried it a hundred times, shut his eyes so that he wouldn't have to look at the floundering legs, and only stopped when he began to feel a mild, dull pain there that he had never felt before.</div>
                                    <div class="media-list">
                                        <div class="media mt-4">
                                            <div style="background-image: url(img/avatar-6.jpg)" class="media-object avatar mr-3"></div>
                                            <div class="media-body text-muted text-small"><strong class="text-dark">Javier Gregory: </strong>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid">
    <div class="bg-dark text-white text-center mb-5 mt-5 p-3">
        <h2>Faire une publication</h2>
    </div>
    <div class="alert alert-danger mb-5">
        <b>Attention ! <br> Interdit de faire des publications hors de l'éducation, elles seront supprimés par les administrateurs et l'auteur sera suspendu !</b>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Titre de la publication</label>
                    <input type="text" name="titre" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Titre explicatif de votre publication</small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Catégorie | Matière</label>
                    <select name="matiere" class="form-control" required>
                        <option value="">Selectionner la matière</option>
                        <?php foreach ($matieres as $matiere) {   ?>
                            <option value="<?= $matiere['Nom'] ?>"><?= $matiere['Nom'] ?></option>
                        <?php } ?>
                    </select>
                    <small id="helpId" class="text-muted">Ex : Physique | Chimie | Mathématique...</small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Le Niveau de votre publication</label>
                    <select name="classe" class="form-control" required>
                        <option value="">Selectionner le niveau de votre</option>
                        <?php foreach ($classes as $classe) {   ?>
                            <option value="<?= $classe['Nom'] ?>"><?= $classe['Nom'] ?></option>
                        <?php } ?>
                    </select>
                    <small id="helpId" class="text-muted">Ex : Terminal | Qutrième...</small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Source de la publication</label>
                    <input type="text" name="source" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Veillez indiquer la source de votre publication</small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Image de votre publication</label>
                    <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Help text</small>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Document en format pdf</label>
                    <input type="file" name="pdf" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Un livre | Text | Sujet d'éxamen...</small>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Description de votre publication</label>
            <textarea class="form-control" name="description" id="" rows="3"></textarea>
            <small id="helpId" class="text-muted">Merci d'jouter une description explicatif de votre publication</small>
        </div>
        <div class="d-flex  justify-content-end mb-5">
            <input type="submit" name="btn-publication" value="Publier l'article" class="btn btn-dark">
        </div>
    </form>
</section>