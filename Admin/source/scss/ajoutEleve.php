<?php
require_once('Librairie/Classe.php');
$donnees = selection($_SESSION['Email']);
$nombreLigneMessages = compteNombreLigne("Messages");
if (!empty($_POST['btn-insert-eleves'])) {
   AjoutEleves($_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['email'], $_POST['villeResidence'], $_POST['villeNaissance'], $_POST['date_de_naissance'], $_POST['niveau'], $_POST['infoss'], $_POST['photo'], $_POST['matricule'], $_POST['piece'], $_POST['dInscrit'], $_POST['sexe'], $_POST['matriculeR'], $_POST['session'], $_POST['autreContacte']);
   AjoutParents($_POST['matriculeR'], $_POST['nomR'], $_POST['telephoneR'], $_POST['emailR'], $_POST['lien'], $_POST['photoR'], $_POST['pieceR'], $_POST['residenceR']);
}
$classes = selectionClasse();
?>


<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Bootstrap Dashboard by Bootstrapious.com</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="robots" content="all,follow">
   <!-- Bootstrap CSS-->
   <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
   <!-- Font Awesome CSS-->
   <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
   <!-- Fontastic Custom icon font-->
   <link rel="stylesheet" href="css/fontastic.css">
   <!-- Google fonts - Roboto -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
   <!-- jQuery Circle-->
   <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
   <!-- Custom Scrollbar-->
   <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
   <!-- theme stylesheet-->
   <link rel="stylesheet" href="css/style.default.premium.css" id="theme-stylesheet">
   <!-- Custom stylesheet - for your changes-->
   <link rel="stylesheet" href="css/custom.css">
   <!-- Favicon-->
   <link rel="shortcut icon" href="img/favicon.ico">
   <!-- Tweaks for older IEs-->
   <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
   <!-- Side Navbar -->
   <?php include 'include/menu.php'; ?>
   <div class="page">
      <!-- navbar-->
      <?php include 'include/header.php'; ?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
         <div class="container-fluid">
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Ajout d'élèves</a></li>
               <li class="breadcrumb-item active">Formulaire </li>
            </ul>
         </div>
      </div>
      <section class="forms">
         <div class="container-fluid">
            <!-- Page Header-->
            <header>
               <h1 class="h3 display">Formulaire d'ajout d'un élève</h1>
            </header>
            <div class="row">
               <div class="col-lg-12">
                  <form class="" method="POST" action="">
                     <div class="card">
                        <div class="card-header d-flex align-items-center">
                           <h4>Information personnel</h4>
                        </div>
                        <div class="card-body">
                           <div class=" row">
                              <div class="form-group col-lg-4">
                                 <label class="form-control-label">Titre</label>
                                 <div class="">
                                    <select name="sexe" class="form-control">
                                       <option>Choisissez le titre</option>
                                       <option>Femme</option>
                                       <option>Homme</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group col-lg-4">
                                 <label id="nom" class="">Nom : </label>
                                 <input name="nom" type="text" class="form-control" required>
                              </div>
                              <div class="form-group col-lg-4">
                                 <label id="prenom" class="">Prénom</label>
                                 <input name="prenom" type="text" class="form-control" required>
                              </div>
                           </div>
                           <div class="line"></div>
                           <div class=" row">
                              <div class="form-group col-lg-6">
                                 <label class="form-control-label">Date de naissance : </label>
                                 <input name="date_de_naissance" type="date" placeholder="Date de naissance" class="form-control" required>
                              </div>
                              <div class="form-group col-lg-6">
                                 <label class="form-control-label">Ville de naissance</label>
                                 <input name="villeNaissance" type="text" placeholder="Pays" class="form-control" required>
                              </div>
                           </div>

                           <div class="line"></div>
                           <div class=" row">
                              <div class="form-group col-lg-6">
                                 <label class="form-control-label">Photo</label>
                                 <input name="photo" type="file" placeholder="Pays" class="form-control">
                              </div>

                              <div class="form-group col-lg-6">
                                 <label class="form-control-label">Pièce d'identité</label>
                                 <input type="file" name="piece" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header d-flex align-items-center">
                           <h4>Informations de contacte</h4>
                        </div>
                        <div class="card-body">
                           <div class=" row">
                              <div class="form-group col-lg-6">
                                 <label class="form-control-label">Téléphone</label>
                                 <input name="telephone" type="tel" placeholder="Téléphone de l'étudiant" class="form-control" required>
                              </div>
                              <div class="form-group col-lg-6">
                                 <label class="form-control-label">Email</label>
                                 <input type="email" name="email" class="form-control" required>
                              </div>
                           </div>
                           <div class="line"></div>
                           <div class=" row">
                              <div class="form-group col-lg-6">
                                 <label class="form-control-label">Ville de résidence </label>
                                 <input type="text" name="villeResidence" class="form-control" required>
                              </div>
                              <div class="form-group col-lg-6">
                                 <label class="form-control-label">Autres contactes supplementaires </label>
                                 <input type="text" name="autreContacte" class="form-control" required>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header d-flex align-items-center">
                           <h4>Informations Accadémiques</h4>
                        </div>
                        <div class="card-body">
                           <form class="" method="POST" action="">
                              <div class="row">
                                 <div class="form-group col-lg-4">
                                    <label class="form-control-label">Date d'inscription au lycée</label>
                                    <input type="date" name="dInscrit" class="form-control" required>
                                 </div>
                                 <div class="form-group col-lg-4">
                                    <label class="form-control-label">Session accadémique</label>
                                    <input type="text" name="session" class="form-control" required>
                                 </div>
                                 <div class="form-group col-lg-4">
                                    <label class="form-control-label">Matricule de la session actuel</label>
                                    <input type="text" name="matricule" class="form-control" required>
                                 </div>
                              </div>
                              <div class="line"></div>
                              <div class=" row">
                                 <div class="form-group col-lg-6">
                                    <label id="niveau" class="form-control-label">Niveau de l'élève | Classe</label>
                                    <div class="">
                                       <select name="niveau" class="form-control">
                                          <option value="">Selectionner la Classe</option>
                                          <?php foreach ($classes as $classe) {   ?>
                                             <option value="<?= $classe['Nom'] ?>"><?= $classe['Nom']; ?></option>
                                          <?php } ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group col-lg-6">
                                    <label id="serie" class="form-control-label">Informations supplemantaire</label>
                                    <textarea class="form-control" name="infoss"></textarea>
                                 </div>
                              </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header d-flex align-items-center">
                           <h4>Information sur le responsable de l'élève</h4>
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="form-group col-lg-6">
                                 <label>Matricule</label>
                                 <input name="matriculeR" type="text" placeholder="matriculation personnel" class="form-control" required data-msg="La matriculation' du reponsable">
                              </div>
                              <div class="form-group col-lg-6">
                                 <label>Nom complet</label>
                                 <input name="nomR" type="tel" placeholder="Nom complet" class="form-control" required data-msg="Nom complet">
                              </div>
                           </div>

                           <div class="line"></div>
                           <div class="row">
                              <div class="form-group col-lg-6">
                                 <label>Téléphone permanent</label>
                                 <input name="telephoneR" type="tel" placeholder="Téléphone" class="form-control" required data-msg="Téléphone">
                              </div>
                              <div class="form-group col-lg-6">
                                 <label>Email</label>
                                 <input type="email" name="emailR" placeholder="Email Address" class="form-control" required data-msg="Adresse emil">
                              </div>
                           </div>

                           <div class="line"></div>
                           <div class="form-group row">
                              <div class="col-lg-6">
                                 <label id="lienParente" class="form-control-label">Lien parenté</label>
                                 <div class="">
                                    <select name="lien" class="form-control" required data-msg="Veillez le lien">
                                       <option>Père</option>
                                       <option>Mère</option>
                                       <option>Autre</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label id="residenceR">Lieu de résidence</label>
                                    <input name="residenceR" type="text" placeholder="Lieu de résidence actuel" class="form-control" required data-msg="Lieu de résidence que vous pouvez lui joindre">
                                 </div>
                              </div>
                           </div>
                           <div class="line"></div>
                           <div class=" row">
                              <div class="form-group col-lg-6">
                                 <label class="form-control-label">Photo du résponsable</label>
                                 <input name="photoR" type="file" placeholder="Pays" class="form-control">
                              </div>

                              <div class="form-group col-lg-6">
                                 <label class="form-control-label">Pièce d'identité du résponsable</label>
                                 <input type="file" name="pieceR" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="text-center card">
                        <input name="btn-insert-eleves" type="submit" value="Enregistrer les informations de l'élève" class="btn btn-primary">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <footer class="main-footer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6">
                  <p>Dévelopé pas <strong>Halidi Zaenma</strong> &copy; 2019-2020</p>
               </div>
               <div class="col-sm-6 text-right">
                  <p>Tout droit réservés</p>
               </div>
            </div>
         </div>
      </footer>
   </div>
   <!-- JavaScript files-->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
   <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
   <script src="vendor/chart.js/Chart.min.js"></script>
   <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
   <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
   <!-- Main File-->
   <script src="js/front.js"></script>
</body>

</html>