<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><a href="index.php?page=pages-profile"><img src="img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle"></a>
                <h2 class="h5"><?= $donnees['Nom'] ?></h2><span class="text-success"><?= role_session() ?></span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <img src="img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle"></a></div>
        </div>
        <?php if (isset($_SESSION['Administrateur'])) : ?>
            <div class="main-menu pb-3">
                <h5 class="text-center text-primary">Menu de navigation</h5>
                <ul id="side-main-menu" class="side-menu list-unstyled">
                    <li class="<?php activation_mecu("home") ?>"><a href="index.php?page=home"> <i class="icon-home"></i>Vu d'ensemble</a></li>
                    <li class="<?php activation_mecu("Scolarité", "page=ajouter-eleves") ?>"><a href="#eleve" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Scolarité</a>
                        <ul id="eleve" class="collapse list-unstyled ">
                            <li><a href="index.php?page=ajouter-eleves">Inscription</a></li>
                            <!-- <li><a href="pages-invoice.html">Ajouter une classe</a></li> -->
                        </ul>
                    </li>
                    <li class="<?php activation_mecu("Élèves par classe", "liste-eleves-par-classe") ?>"><a href="#formsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-form"></i>Élèves par classe</a>
                        <ul id="formsDropdown" class="collapse list-unstyled ">
                            <?php foreach (selectionClasse() as $classe) : ?>
                                <li>
                                    <a href="index.php?page=liste-eleves-par-classe&niveau=<?= $classe['Nom']; ?>">
                                        <?= $classe['Nom']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="<?php activation_mecu("liste-enseignant") ?>"> <a href="index.php?page=liste-enseignant"> <i class="icon-screen"> </i>Professeures</a></li>
                    <li class="<?php activation_mecu("index") ?>"> <a href="index.php?page=index"> <i class="icon-screen"> </i>Calendrier</a></li>
                    <li class="<?php activation_mecu("bibliotheque") ?>"> <a href="index.php?page=bibliotheque"> <i class="icon-screen"> </i>Bibliothèque</a></li>
                    <li><a href="#emploie" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Emplos du temps </a>
                        <ul id="emploie" class="collapse list-unstyled ">
                            <?php foreach (selectionClasse() as $classe) : ?>
                                <li>
                                    <a href="index.php?page=emploie-du-temps&classe=<?= $classe['Nom']; ?>">
                                        <?= $classe['Nom']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li><a href="#pagesDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Classes </a>
                        <ul id="pagesDropdown" class="collapse list-unstyled ">
                            <li><a href="index.php?page=classe">Géstion | classes</a></li>
                            <li><a href="pages-invoice.html">Ajouter une classe</a></li>
                        </ul>
                    </li>
                    <li class="<?php activation_mecu("absences") ?>"><a href="#absent" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Les absents</a>
                        <ul id="absent" class="collapse list-unstyled ">
                            <li><a data-toggle="modal" data-target="#absences" href="">Ajouter des absents</a></li>
                            <li><a href="index.php?page=absences&fonction=enseignant">Enseignants</a></li>
                            <li><a href="index.php?page=absences&fonction=eleve">Élèves</a></li>
                        </ul>
                    </li>
                    <li><a href="#article" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Article</a>
                        <ul id="article" class="collapse list-unstyled ">
                            <li><a href="index.php?page=article-accueil">Articles publiées</a></li>
                            <li><a href="index.php?page=absences&fonction=enseignant">Articles non publiées</a></li>
                            <li><a href="index.php?page=absences&fonction=eleve">Publier des articles</a></li>
                        </ul>
                    </li>
                    <li><a href="#matiere" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Matières</a>
                        <ul id="matiere" class="collapse list-unstyled ">
                            <li><a href="index.php?page=matiere">Géstion matières</a></li>
                            <li><a data-toggle="modal" data-target="#connexion" href="">Ajouter une matière</a></li>
                        </ul>
                    </li>
                    <li class="<?php activation_mecu("Examens", "affiche-messages") ?>"><a href="#resultat" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Examens</a>
                        <ul id="resultat" class="collapse list-unstyled ">
                            <li><a href="index.php?page=liste-classes">Ajouter des résultats</a></li>
                            <li><a href="pages-invoice.html">Gérer les résultats</a></li>
                            <li><a href="pages-invoice.html">Calendier d'examens</a></li>

                        </ul>
                    </li>
                    <li class="<?php activation_mecu("Messages", "affiche-messages") ?>"><a href="#message" aria-expanded="false" data-toggle="collapse"> <i class="icon-mail"></i></i>Messages</a>
                        <ul id="message" class="collapse list-unstyled ">
                            <li><a href="index.php?page=affiche-messages&periode-de-message=aujourd-hui">Messages d'aujourd'hui</a></li>
                            <li><a href="index.php?page=affiche-messages&periode-de-message=semaine-encours">Messages de la semaine</a></li>
                            <li><a href="index.php?page=affiche-messages&messages-demandee=non-repondu">Messages non repondu</a></li>
                            <li><a href="index.php?page=affiche-messages&messages-demandee=tous-messages">Tous les messages</a></li>
                            <li><a type="button" data-toggle="modal" data-target="#envoie-message" href="">Envoie des messages</a></li>

                        </ul>
                    </li>
                    <li> <a href="#"> <i class="icon-mail"></i>Activités</a></li>
                    <li class="" <?php activation_mecu("actualite") ?>"><a href="#actualite-a" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Actualités</a>
                        <ul id="actualite-a" class="collapse list-unstyled ">
                            <li><a href="index.php?page=actualite">Actualités publiés</a></li>
                            <li><a type="button" data-toggle="modal" data-target="#actualite">Publier un actualité</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
            <div class="admin-menu pb-5">
                <h5 class="text-center text-danger">Administration avancé</h5>
                <ul id="side-admin-menu" class="side-menu list-unstyled">
                    <li class="<?php activation_mecu("paramettres") ?>"><a href="#admin" aria-expanded="false" data-toggle="collapse">Administrations</i></a>
                        <ul id="admin" class="collapse list-unstyled ">
                            <li><a href="index.php?page=paramettres">Paramèttres</a></li>
                            <li><a href="" data-toggle="modal" data-target="#ajout-admin">Ajouter un rôle</a></li>
                        </ul>
                    </li>
                    <li> <a href="" data-toggle="modal" data-target="#session"> <i class="icon-flask"> </i>Session</a></li>
                    <li class="<?php activation_mecu("suppression") ?>"><a href="#suppression" aria-expanded="false" data-toggle="collapse">| <i class="fa fa-trash-o text-danger"></i> || <i class="fa fa-check text-primary" aria-hidden="true"></i> || <i class="fa fa-times text-warning" aria-hidden="true"></i></a>
                        <ul id="suppression" class="collapse list-unstyled ">
                            <li><a href="index.php?page=suppression&demande-suppression=suppression-enseignats">Enseignats</a></li>
                            <li><a href="index.php?page=suppression&demande-suppression=suppression-eleves">Élèves</a></li>
                            <li><a href="index.php?page=suppression&demande-suppression=modification-matieres">Matières</a></li>
                            <li><a href="index.php?page=suppression&demande-suppression=modification-classes">Classes</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['eleves'])) : ?>
            <div class="main-menu">
                <h5 class="sidenav-heading">Main</h5>
                <ul id="side-main-menu" class="side-menu list-unstyled">
                    <li><a href="index.php?page=pages-profile"> <i class="icon-home"></i>Mon espace</a></li>
                    <li><a href="#formsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-form"></i>Classes | Élèves</a>
                        <ul id="formsDropdown" class="collapse list-unstyled ">
                            <?php foreach (selectionClasse() as $classe) {   ?>
                                <li>
                                    <a href="index.php?page=liste-eleves-par-classe&classe=<?= $classe['Nom']; ?>">
                                        <option value="<?= $classe['Nom'] ?>"><?= $classe['Nom']; ?></option>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li> <a href="index.php?page=index"> <i class="icon-screen"> </i>Calendrier</a></li>
                    <li><a type="button" data-toggle="modal" data-target="#envoie-message" href="">Envoie des messages</a></li>
                    <li> <a href="index.php?page=bibliotheque"> <i class="icon-screen"> </i>Bibliothèque</a></li>
                    <li><a href="#matiere" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Matières</a>
                        <ul id="matiere" class="collapse list-unstyled ">
                            <li><a href="index.php?page=matiere">Géstion matières</a></li>
                            <li><a href="index.php?page=ajout-matiere">Ajouter une matière</a></li>
                        </ul>
                    </li>
                    <li> <a href="#"> <i class="icon-mail"></i>Activités</a></li>
                    <li><a href="#actualite" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Actualités</a>
                        <ul id="actualite" class="collapse list-unstyled ">
                            <li><a href="actualite.php">Actualités publiés</a></li>
                            <li><a href="publication.php">Publier un actualité</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</nav>


<section>
    <div id="email-admin" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Modifier l'adresse de réception de message</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" style="margin: 20px">
                    <form method="POST" action="Librairie/traitement.matiere.notes.php">
                        <div class="form-group">
                            <label for="email">Entrer la nouvelle adresse de réception</label>
                            <input class="form-control" type="email" name="email" id="email" required value="<?= $email_admin; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Fermer la boite</button>
                            <input name="btn-modifier-adresse" value="Modifier l'adresse" type="submit" class="btn btn-primary" onclick="return confirm('Souhaitez vous modifier l\'adresse d\'administration ?')">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div id="repondre-message" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Repondre le message de <?= $details_message['Nom'] ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" style="margin: 20px">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="email-reponse">Email d'envoie de réponse</label>
                            <input type="email" class="form-control" name="email-reponse" id="email-reponse" aria-describedby="helpId" placeholder="" value="<?= $details_message['Email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="reponse">Envoyer la réponse à <?= $details_message['Nom'] ?></label>
                            <textarea class="form-control" name="reponse" id="reponse" cols="30" rows="5"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Fermer la boite</button>
                            <input name="btn-repondre-message" value="Envoyer la réponse" type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div id="envoie-message" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Envoie des messages</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" style="margin: 20px">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="email-destinataire">L'adresse éléctronique du déstinataire</label>
                            <input type="email" class="form-control" name="email-destinataire" id="email-destinataire" placeholder="Email destinataire" autocomplete="OFF">
                        </div>
                        <div class="form-group">
                            <label for="titre-message">Titre du message</label>
                            <input type="text" class="form-control" name="titre-message" id="titre-message" placeholder="Titre de votre message" value="" autocomplete="OFF">
                        </div>
                        <div class="form-group">
                            <label for="message">Votre message</label>
                            <textarea class="form-control" name="message" id="message" cols="30" rows="2"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Fermer la boite</button>
                            <input name="btn-envoie-messages" value="Envoyer le message" type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div id="session" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Modifier la session en cours</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" style="margin: 20px">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="session">Entrer la session en cours</label>
                            <input class="form-control" type="text" name="session" id="session" required value="<?= $sessionencours['Sessionencours'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="d_session">Début de la session</label>
                            <input class="form-control" type="date" name="d_session" id="d_session" required value="<?= $sessionencours['Debut_session'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="f_session">Fin de la session</label>
                            <input class="form-control" type="date" name="f_session" id="f_session" required value="<?= $sessionencours['Fin_session'] ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Fermer la boite</button>
                            <input name="btn-session" value="Modifier la session en cours" type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ajout d'un rôle -->
<section>
    <div id="ajout-admin" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Ajout d'un rôle</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" style="margin: 20px">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="nom">Nom et prénom</label>
                            <input class="form-control" type="text" name="nom" id="nom" placeholder="Nom complet" autocomplete="OFF" required value="">
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse électronique</label>
                            <input class="form-control" type="email" name="adresse" id="adresse" placeholder="Adresse email pour l'envoie des infos" autocomplete="OFF" required value="">
                        </div>
                        <div class="form-group">
                            <label for="r-adresse">Répeter l'adresse électronique</label>
                            <input class="form-control" type="email" name="r-adresse" id="r-adresse" placeholder="Repeter l'adresse email" autocomplete="OFF" required value="">
                        </div>
                        <div class="form-group">
                            <label for="role" class="col-form-label">la fonction : </label>
                            <select name="role" class="form-control" required>
                                <option value="">Selectionner le rôle</option>
                                <option value="Super administrateur">Super administrateur | Directeur</option>
                                <option value="Surveillant">Surveillant</option>
                                <option value="Serétaire général">Serétaire général</option>
                                <option value="Comptable">Comptable</option>

                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Fermer la boite</button>
                            <input name="btn-ajout-role" value="Envoyer les informations" type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div id="actualite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Publier des actualités de votre établissment</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" style="margin: 20px">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="titre" class="col-form-label">Titre de l'actualité :</label>
                            <input class="form-control" id="titre" name="titre" placeholder="Entrer un titre identique à votre fichier ici...." required>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">Détail de l'actualité</label>
                            <textarea name="description" id="description" rows="3" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="auteur" class="col-form-label">Auteur de l'actualité | Vous êtes l'auteur par défaut </label>
                            <input type="text" class="form-control" id="auteur" name="auteur" value="<?= $donnees['Nom'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="photo-actualite" class="col-form-label">Image d'illustration</label>
                            <input type="file" class="form-control" id="photo-actualite" name="photo-actualite">
                        </div>
                        <div class="form-group">
                            <label for="photo-2-actualite" class="col-form-label">Autre image d'illustration</label>
                            <input type="file" class="form-control" id="photo-2-actualite" name="photo-2-actualite">
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Fermer la boite</button>
                            <input name="btn-ajout-actualite" value="Publier l'actualité" type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div id="absences" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Ajouter les absence du </h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body" style="margin: 20px">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="matricule" class="col-form-label">Matricule de l'élève</label>
                            <input class="form-control" id="matricule" name="matricule" placeholder="Entrer le matricule " required>
                        </div>
                        <div class="form-group">
                            <label for="matiere" class="col-form-label">Matière : </label>
                            <select name="matiere" class="form-control" required>
                                <option value="">Selectionner la matière</option>
                                <?php foreach ($matieres as $matiere) {   ?>
                                    <option value="<?= $matiere['Nom'] ?>"><?= $matiere['Nom'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type-seance" class="col-form-label">Type de séance : </label>
                            <select name="type-seance" class="form-control" required>
                                <option value="">Selectionner la Classe</option>
                                <option value="Cours magistral">Cours magistral</option>
                                <option value="Séance d'exercice">Séance d'exercice</option>
                                <option value="Devoir">Devoir</option>
                                <option value="Examen">Examen</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="date-seance" class="col-form-label">Date de séance </label>
                            <input type="date" class="form-control" id="date-seance" name="date-seance" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="heure-debut" class="col-form-label">Heure de début de la séance </label>
                            <input type="time" class="form-control" id="heure-debut" name="heure-debut" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="heure-fin" class="col-form-label">Heure de fin de la séance </label>
                            <input type="time" class="form-control" id="heure-fin" name="heure-fin" value="" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Fermer la boite</button>
                            <input name="btn-ajout-absences" value="Modifier la session en cours" type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>