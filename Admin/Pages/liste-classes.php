<?php if (!isset($_SESSION['Administrateur'])) {
    header('Location:index.php?page=deconnexion');
} ?>
<section class="dashboard-counts section-padding">
    <div class="container-fluid">
        <!-- Count item widget-->
        <div class="text-center">
            <?php foreach ($classes as $classe) {   ?>
                <a class="a-classe" href="index.php?page=liste-eleves-par-classe&classe=<?= $classe['Nom'] ?>">
                    <div class="card card-classe bg-dark text-white-50">
                        <div class="card-body">
                            <?= $classe['Nom'] ?>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</section>