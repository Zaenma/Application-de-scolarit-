<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Publication d'actualité du lycée</a></li>
            <li class="breadcrumb-item active">Formuaire de publication </li>
        </ul>
    </div>
</div>
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h3 display">Formulaire de publication d'actualités</h1>
        </header>

        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>Informations de contacte</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="titre" class="col-form-label">Titre du ficher ici :</label>
                            <input class="form-control" id="message-text" name="titre" placeholder="Entrer un titre identique à votre fichier ici....">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="description" class="col-form-label">Déscription du fichier ici....</label>
                            <input class="form-control" id="message-text" name="description" placeholder="Entrer la déscription du fichier....">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="Photo" class="col-form-label">Auteur de l'actualité | Vous êtes l'auteur par défaut </label>
                            <input type="text" class="form-control" id="message-text" name="auteur" value="<?= $donnees['Nom'] ?>">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="Photo" class="col-form-label">Importer votre image</label>
                            <input type="file" class="form-control" id="message-text" name="Photo">
                        </div>
                    </div>
            </div>
        </div>
        <div class="card">
            <input type="submit" class="btn btn-primary" name="ValiderPublication" value="Publier l'image">
        </div>
        </form>
    </div>
</section>