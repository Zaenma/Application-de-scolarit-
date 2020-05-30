<div class="container my-5">
    <?php if (isset($_GET['message-erreur'])) : ?>
        <div class="alert alert-danger"><?= $_GET['message-erreur'] ?></div>
    <?php endif; ?>
    <?php if (isset($_GET['message-success'])) : ?>
        <div class="alert alert-success"><?= $_GET['message-success'] ?></div>
    <?php endif; ?>

    <div class="row my-5 mb-5">
        <?php foreach ($bibliotheques as $bibliotheque) : ?>
            <div class="col-sm-3">
                <a href="pieces-bibliotheques/<?= $bibliotheque['Document'] ?>">
                    <div class="card animate-box">
                        <div class="card-body text-center">
                            <h4 class="card-title"><?= $bibliotheque['Titre'] ?></h4>
                            <p class="card-text"><?= $bibliotheque['Description'] ?></p>
                        </div>
                        <div class="card-footer animated-fast text-center">
                            Niveau : <?= $bibliotheque['Niveau'] ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <form action="" method="POST" class="my-5" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="titre">Titre explicatif du document</label>
                    <input type="text" name="titre" id="titre" class="form-control" placeholder="Titre du document">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="niveau">Niveau du document</label>
                    <select class="form-control" name="niveau" id="niveau">
                        <option value="">Selectionner le niveau du document</option>
                        <?php foreach (selectionClasse() as $classe) : ?>
                            <option value="<?= $classe['Nom'] ?>"><?= $classe['Nom']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="document">Importer votre document</label>
                    <input type="file" name="document" id="document" class="form-control">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="description">Une description du document</label>
                    <textarea name="description" id="description" class="form-control" rows="1"></textarea>
                </div>
            </div>
        </div>
        <input type="submit" name="btn-publication-document" class="btn btn-primary" value="Publier le document">
    </form>
</div>