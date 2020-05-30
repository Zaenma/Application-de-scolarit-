<section class="container-fluid">
    <header class="mt-4">
        <h1>Je suis Zaenma</h1>
    </header>
    <?php if ($selection_Absence_ne_get['Justiee'] == 1) : ?>
        <div class="alert alert-primary text-center">
            <b>L'absence est déjà justifié, vous pouvez juste modifier la justification</b>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-row align-items-center justify-content-between">
                <h1>Justifier l'absence de </h1>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="POST" class="form">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="titre">Matricule</label>
                            <input type="text" class="form-control" name="titre" id="titre" value="<?= $selection_Absence_ne_get['Matricules'] ?>" placeholder="Titre de l'évenement" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="date">Fonction </label>
                            <input type="text" class="form-control" name="date" id="" value="<?= $selection_Absence_ne_get['personnel'] ?>" placeholder="Date du début de l'évenement" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="titre">Matricule de l'étudiant </label>
                            <input type="text" class="form-control" name="titre" id="titre" value="<?= $selection_Absence_ne_get['Matieres'] ?>" placeholder="Titre de l'évenement" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="date">Date de la séance </label>
                            <input type="date" class="form-control" name="date" id="" value="<?= $selection_Absence_ne_get['Date_seance'] ?>" placeholder="Date du début de l'évenement" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="time">Date de début</label>
                            <input type="time" class="form-control" name="date_debut" value="<?= $selection_Absence_ne_get['Heure_debut'] ?>" placeholder="Heure de démarage de l'évenement " required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="time">Date de fin </label>
                            <input type="time" class="form-control" name="date_fin" id="" value="<?= $selection_Absence_ne_get['Heure_fin'] ?>" placeholder="Heure du fin de l'évenement " required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Déscription de l'évenement </label>
                    <textarea name="description" id="" class="form-control" required placeholder="Description de l'évènement"> <?= $selection_Absence_ne_get['Commentaire'] ?></textarea>
                </div>
                <!-- <input type="submit" class="btn btn-dark" name="btn-justification-absence" value="Justifier l'absence"> -->
            </form>
        </div>
    </div>
</section>