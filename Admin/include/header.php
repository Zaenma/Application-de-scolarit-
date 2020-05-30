<header class="header">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a></div>
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Notifications dropdown-->
                    <!-- <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">
                            </span></a>
                        <ul aria-labelledby="notifications" class="dropdown-menu">
                            <li><a rel="nofollow" href="#" class="dropdown-item">
                                    <div class="notification d-flex justify-content-between">
                                        <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                                        <div class="notification-time"><small>4 minutes ago</small></div>
                                    </div>
                                </a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item">
                                    <div class="notification d-flex justify-content-between">
                                        <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                                        <div class="notification-time"><small>4 minutes ago</small></div>
                                    </div>
                                </a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item">
                                    <div class="notification d-flex justify-content-between">
                                        <div class="notification-content"><i class="fa fa-upload"></i>Server Rebooted</div>
                                        <div class="notification-time"><small>4 minutes ago</small></div>
                                    </div>
                                </a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item">
                                    <div class="notification d-flex justify-content-between">
                                        <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                                        <div class="notification-time"><small>10 minutes ago</small></div>
                                    </div>
                                </a></li>
                            <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications </strong></a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item"><a href="index.php?page=documentation" class="nav-link"> <span class="d-none d-sm-inline-block">Docummentation</span></i></a></li>
                    <!-- Messages dropdown-->
                    <?php if (isset($_SESSION['Administrateur'])) : ?>
                        <li class="nav-item dropdown">
                            <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i>
                                <span class="badge badge-primary">
                                    <div class="count-number"><?= $nombre_messages_non_lu ?> </div>
                                </span>
                            </a>
                            <?php if ($nombre_messages_non_lu != 0) : ?>
                                <ul aria-labelledby="notifications" class="dropdown-menu">
                                    <?php foreach ($messages_non_lu as $message_non_lu) : ?>
                                        <li>
                                            <a rel="nofollow" href="index.php?page=affiche-messages&details-messages=<?= $message_non_lu['Id'] ?>" class="dropdown-item d-flex">
                                                <div class="msg-profile"> <img src="img/avatar-7.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                                <div class="msg-body">
                                                    <h3 class="h5"><?= $message_non_lu['Nom'] ?></h3><span><?= $message_non_lu['Sujet'] ?></span><small>le <?= (new DateTime($message_non_lu['Date_envoie']))->format('d/m/Y') ?> à <?= (new DateTime($message_non_lu['Date_envoie']))->format('H:i') ?></small>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item"><a href="index.php?page=deconnexion" class="nav-link logout"> <span class="d-none d-sm-inline-block">Déconnexion</span><i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>