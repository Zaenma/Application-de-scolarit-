<div class="carousel fade-carousel slide carousel-fade" data-ride="carousel" data-interval="3000" id="bs-carousel">
    <ol class="carousel-indicators">
        <!-- <li data-target="#bs-carousel" data-slide-to="0" class="active"></li> -->
        <!-- <li data-target="#bs-carousel" data-slide-to="1"></li> -->
    </ol>
    <div class="carousel-inner">
        <div class="item slides active carousel-item">
            <div class="slide-1" style="background-image: url(images/bi.jpg);">
                <div class="overlay"></div>
            </div>
        </div>
        <div class="hero">
            <hgroup>
                <h1 class="animate-box">Bibliothèque de <?= $Outil_administrations['Nom_etablissement'] ?></h1>
                <p><a class="btn btn-primary btn-lg" href="#">Avoir plus d'infos sur notre établissement <?= $Outil_administrations['Nom_etablissement'] ?></a></p>
            </hgroup>
        </div>
    </div>
</div>

<div class="container fh5co-section-gray" id="fh5co-contact">
    <div class="container">
        <div class="text-center heading-section animate-box">
            <h3>Bibliothèque de <?= $Outil_administrations['Nom_etablissement'] ?></h3>
            <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</b>
        </div>
    </div>
    <div class="row <?= role_session() ? '' : "desabled"; ?>">
        <?php foreach ($bibliotheques as $bibliotheque) : ?>
            <div class="col-sm-3">
                <a href="Admin/pieces-bibliotheques/<?= $bibliotheque['Document'] ?>">
                    <div class="fh5co-blog animate-box">
                        <div class="blog-text">
                            <div class="prod-title">
                                <b class="text-center"><?= $bibliotheque['Titre'] ?></b>
                                <p><?= $bibliotheque['Description'] ?></p>
                            </div>
                            <div class="card-footer text-center">
                                Niveau : <?= $bibliotheque['Niveau'] ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>