<?php
if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
}
?>
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=home">Acceuil</a></li>
            <li class="breadcrumb-item active">Liste des messages</li>
        </ul>
    </div>
</div>
<section class="forms">
    <div class="container-fluid">
        <header>
            <h1 class="h3 display">Liste total de classe de l'établissement <?= $Outil_administrations['Nom_etablissement'] ?></h1>
        </header>
        <div class="card text-left">
            <?php if (isset($_GET['periode-de-message']) && !empty($_GET['periode-de-message']) && $_GET['periode-de-message'] == "aujourd-hui") : ?>
                <h4 class="card-title p-3">Les messages d'aujourd'hui</h4>
                <div class="card-body">
                    <?php
                    if ($messages_du_jours != 0) :
                        foreach ($messages_du_jours as $messages_du_jour) : ?>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><strong><?= htmlentities($messages_du_jour['Nom']) ?> </strong></div>
                                <div class="col-sm-2"><strong><?= htmlentities($messages_du_jour['Telephone']) ?> </strong></div>
                                <div class="col-sm-4"><strong><?= htmlentities($messages_du_jour['Sujet']) ?> </strong></div>
                                <div class="col-sm-2"><a href="index.php?page=affiche-messages&details-messages=<?= (int) $messages_du_jour['Id']; ?>" class="btn btn-primary">Voire les détails</a></div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="alert alert-info text-center"><b>Pas encore réçu de messages aujourd'hui !</b></div>
                    <?php endif; ?>
                </div>
            <?php elseif (isset($_GET['messages-demandee']) && !empty($_GET['messages-demandee']) && $_GET['messages-demandee'] == "non-repondu") : ?>
                <h4 class="card-title pt-3 pl-3">Tous les messages non repondus</h4>
                <div class="card-body">
                    <?php
                    if ($messages_non_lu != 0) :
                        foreach ($messages_non_lu as $message_non_lu) : ?>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><strong><?= htmlentities($message_non_lu['Nom']) ?> </strong></div>
                                <div class="col-sm-2"><strong><?= htmlentities($message_non_lu['Telephone']) ?> </strong></div>
                                <div class="col-sm-4"><strong><?= htmlentities($message_non_lu['Sujet']) ?> </strong></div>
                                <div class="col-sm-2"><a href="index.php?page=affiche-messages&details-messages=<?= (int) $message_non_lu['Id']; ?>" class="btn btn-primary">Voire les détails</a></div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="alert alert-info text-center"><b>Pas de messages non répondu !</b></div>
                    <?php endif; ?>
                </div>
            <?php elseif (isset($_GET['periode-de-message']) && !empty($_GET['periode-de-message']) && $_GET['periode-de-message'] == "semaine-encours") : ?>
                <h4 class="card-title pt-3 pl-3">Tous les messages réçu cette semaine</h4>
                <div class="card-body">
                    <?php
                    if ($messages_du_semaine != 0) :
                        foreach ($messages_du_semaine as $message_du_semaine) : ?>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><strong><?= htmlentities($message_du_semaine['Nom']) ?> </strong></div>
                                <div class="col-sm-2"><strong><?= htmlentities($message_du_semaine['Telephone']) ?> </strong></div>
                                <div class="col-sm-4"><strong><?= htmlentities($message_du_semaine['Sujet']) ?> </strong></div>
                                <div class="col-sm-2"><a href="index.php?page=affiche-messages&details-messages=<?= (int) $message_du_semaine['Id']; ?>" class="btn btn-primary">Voire les détails</a></div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="alert alert-info text-center"><b>Pas de messages cette semaine !</b></div>
                    <?php endif; ?>
                </div>
            <?php elseif (isset($_GET['messages-demandee']) && !empty($_GET['messages-demandee']) && $_GET['messages-demandee'] == "tous-messages") : ?>
                <h4 class="card-title">Liste complet de messages réçu</h4>
                <div class="card-body">
                    <?php
                    if ($messages != 0) :
                        foreach ($messages as $message) : ?>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"><strong><?= htmlentities($message['Nom']) ?> </strong></div>
                                <div class="col-sm-2"><strong><?= htmlentities($message['Telephone']) ?> </strong></div>
                                <div class="col-sm-4"><strong><?= htmlentities($message['Sujet']) ?> </strong></div>
                                <div class="col-sm-2"><a href="index.php?page=affiche-messages&details-messages=<?= (int) $message['Id']; ?>" class="btn btn-primary">Voire les détails</a></div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="alert alert-info text-center"><b>Aucun message réçu !</b></div>
                    <?php endif; ?>
                </div>
            <?php elseif (isset($_GET['details-messages']) && !empty($_GET['details-messages']) && intval($_GET['details-messages']) && $_GET['details-messages'] != NULL) : ?>
                <div class="card-body">
                    <h4 class="card-title text-primary">Informations de l'expéditeur</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4 col-4">
                            <h4 class="">Nom : </h4>
                        </div>
                        <div class="col-sm-8 col-8">
                            <h4 class=""><?= $details_message['Nom'] ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-4">
                            <h4 class="">Téléphone : </h4>
                        </div>
                        <div class="col-sm-8 col-8">
                            <h4 class=""><?= $details_message['Telephone'] ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-4">
                            <h4 class="">Adresse électronique :</h4>
                        </div>
                        <div class="col-sm-8 col-8">
                            <h4 class=""><?= $details_message['Email'] ?></h4>
                        </div>
                    </div>
                    <hr>
                    <h4 class="text-primary"> Message</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4 col-4">
                            <b class="">Sujet : </b>
                        </div>
                        <div class="col-sm-8 col-8">
                            <b class=""><?= $details_message['Sujet'] ?></b>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4 col-4">
                            <b class="">Message complet :</b>
                        </div>
                        <div class="col-sm-8 col-8">
                            <b class=""><?= $details_message['Message'] ?></b><br><br>
                            <span class="text-small">Le <?= (new DateTime($details_message['Date_envoie']))->format('d/m/Y') ?> à <?= (new DateTime($details_message['Date_envoie']))->format('H:i:s') ?></span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between my-4">
                        <a href="#reponses-envoyee" aria-expanded="false" data-toggle="collapse" class="btn btn-primary">Voir les réponses envoyées </a>
                        <button data-toggle="modal" data-target="#repondre-message" type="button" class="btn btn-primary">Répondre le message</button>
                    </div>
                </div>
            <?php else : ?>
                <div class="alert alert-warning text-center"><b>Aucune information précise à votre boite de réception</b></div>
            <?php endif; ?>
        </div>
        <?php if (isset($_GET['details-messages']) && !empty($_GET['details-messages']) && intval($_GET['details-messages']) && $_GET['details-messages'] != NULL) : ?>
            <div class="card">
                <div class="collapse list-unstyled" id="reponses-envoyee">
                    <div class="card-body">
                        <h4 class="card-title text-primary">Les réponses envoyées pour ce message</h4>
                        <?php if ($reponses_dun_message != 0) : ?>
                            <?php foreach ($reponses_dun_message as $reponse_dun_message) : ?>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-10 col-10">
                                        <i>
                                            <h6><?= $reponse_dun_message['Reponses'] ?></h6>
                                        </i><br>
                                        <i class="text-small">Le <?= (new DateTime($reponse_dun_message['Date_reponse']))->format('d/m/Y') ?> à <?= (new DateTime($reponse_dun_message['Date_reponse']))->format('H:i:s') ?></i>
                                    </div>
                                    <div class="col-sm-2 col-2">
                                        <div class="col-3"><a href="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="alert alert-info">
                                <h4>Aucune réponse envoyée</h4>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>