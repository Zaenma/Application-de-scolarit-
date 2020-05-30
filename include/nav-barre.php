<header id="fh5co-header-section" class="sticky-banner">
    <div class="container">
        <div class="nav-header">
            <a href="index.php?page=home"> <img class="nav-logo" src="Admin/pieces-admin/<?= $Outil_administrations['Logo'] ?>" alt="" srcset=""></a>
            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
            <nav id="fh5co-menu-wrap" role="navigation">
                <ul class="sf-menu" id="fh5co-primary-menu">
                    <li class="<?php activation_mecu("home") ?>"><a href="index.php?page=home">Home</a></li>
                    <li class="<?php activation_mecu("propos") ?>"><a href="index.php?page=propos">À Propos</a></li>
                    <li class="<?php activation_mecu("blog") ?>"><a href="index.php?page=blog">Blog</a></li>
                    <!-- <li class=""><a href="index.php?page=forum">Forum</a></li> -->
                    <li>
                        <a href="vacation.html" class="fh5co-sub-ddown">Aides</a>
                        <ul class="fh5co-sub-menu">
                            <li><a href="index.php?page=forum">Forum de discutions</a></li>
                            <li><a href="index.php?page=bibliotheque">Bibliothèque</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="" class="fh5co-sub-ddown"> <?= !isset($_SESSION['eleves']) ? "Moi" : $eleves_session['Nom']; ?></a>
                        <ul class="fh5co-sub-menu">
                            <?php if (!isset($_SESSION['eleves']) || empty($_SESSION['eleves'])) : ?>
                                <li><a type="button" data-toggle="modal" data-target="#inscription" href="#">Inscription</a></li>
                                <li><a type="button" data-toggle="modal" data-target="#connexion" href="#">Connexion</a></li>
                            <?php else : ?>
                                <li><a href="#">Mes paramèttres</a></li>
                                <li><a href="Admin/index.php?page=pages-profile">Mon profile</a></li>
                                <li><a href="Admin/index.php?page=deconnexion" href="#">Déconnexion</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="<?php activation_mecu("contact") ?>"><a href="index.php?page=contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>


<section id="">
    <div class="modal fade" id="inscription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Demande d'espace de travail personnel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="Librairie/espace.traitement.php" id="form-modal">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="prenom" class="col-form-label">Votre prénom</label>
                            <input autocomplete="OFF" name="prenom" type="text" class="form-control" id="prenom">
                        </div>
                        <div class="form-group">
                            <label for="nom" class="col-form-label">Votre nom</label>
                            <input autocomplete="OFF" name="nom" type="text" class="form-control" id="nom">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Adresse email</label>
                            <input autocomplete="OFF" name="email" type="email" class="form-control" id="emil">
                        </div>
                        <div class="form-group">
                            <label for="telephone" class="col-form-label">Téléphone </label>
                            <input autocomplete="OFF" name="telephone" type="tel" class="form-control" id="telephone">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Mot de passe | au minimum 6 caractères</label>
                            <input autocomplete="OFF" name="password" type="password" class="form-control" id="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <input autocomplete="OFF" name="btn-inscription" type="submit" value="Mon espace personnel" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- fin de la section de connexion  -->



<section>
    <div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" id="form-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Accès à mon espace personnel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="Librairie/espace.traitement.php" id="form-modal">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email" class="col-form-label">Adresse email | matriculation</label>
                            <input autocomplete="OFF" name="email" type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Mot de passe</label>
                            <input autocomplete="OFF" name="password" type="password" class="form-control" id="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <input autocomplete="OFF" name="btn-connexion" type="submit" value="Mon espace personnel" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- fin de la section de connexion  -->