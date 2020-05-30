<div class="carousel fade-carousel slide carousel-fade" data-ride="carousel" data-interval="3000" id="bs-carousel">
    <ol class="carousel-indicators">
        <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#bs-carousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item slides active carousel-item">
            <div class="slide-1" style="background-image: url(Admin/pieces-articles/<?= $un_article['Image'] ?>);">
                <div class="overlay"></div>
            </div>
        </div>
        <div class="hero">
            <hgroup>
                <h1 class="animated"><?= $un_article['Titres'] ?></h1>
                <strong class="animated bounceInDown mb-5">Publié par <?= $un_article['Nom'] ?> Le <?= (new \DateTime($un_article['Date']))->format('d/m/Y à H:i:s') ?></strong>
                <p><a class="btn btn-primary btn-lg" href="#">Lire l'actualité</a></p>
            </hgroup>
        </div>
    </div>
</div>



<div id="fh5co-contact" class="fh5co-section-gray">
    <div class="container">
        <div class="row animate-box">
            <div class="fh5co-heading">
                <h2><?= $un_article['Titres'] ?></h2>
                <p><?= $un_article['Articles'] ?></p>
                <div class="auteur">
                    <i class="animated bounceInDown mb-5">Publié par <?= $un_article['Nom'] ?> Le <?= (new \DateTime($un_article['Date']))->format('d/m/Y à H:i:s') ?></i>
                </div>
                <div class="commentaire">
                    <?php foreach ($commentaire_par_article as $commentaire) : ?>
                        <b><?= $commentaire['Auteur'] ?></b><br>
                        <i><?= $commentaire['Commentaire'] ?></i>
                        <br><br>
                    <?php endforeach; ?>
                </div>
                <div class="text-center heading-section animate-box">
                    <b>Ajouter un commentaire</b>
                </div>
                <?php if (role_session()) : ?>
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="pseudo">Votre pseudo (il sera publique)</label>
                                    <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Votre pseudo publique" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="commentaire">Votre commentaire</label>
                                    <textarea name="commentaire" id="commentaire" cols="30" rows="3" class="form-control desabled" required placeholder="Votre message complet"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn-post-commentaire" value="Poster le commentaire" class="btn btn-primary">
                        </div>
                    </form>
                <?php else : ?>
                    <div class="alert alert-info text-center">
                        <b>Vous devez être connecté pour ajouter des commentaires</b>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <hr>
    </div>
</div>