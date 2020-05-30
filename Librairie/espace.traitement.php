<?php
require_once('../Admin/Librairie/fonctions.php');
require_once('fonctions.php');


$pdo = connectionDB();

if (!empty($_POST['btn-connexion'])) {

  $password = sha1($_POST['password']);
  $reponse = connexion($_POST['email'], $password);

  if ($reponse != 0 && $reponse < 2) {
    $_SESSION['eleves'] = $_POST['email'];
    header('Location:../index.php?page=home&identifiant=' . $_SESSION['eleves']);
  } else {
    header('Location:' . $_SERVER['REQUEST_URI'] . '?message=veillez vérifier l\'accès à votre espace personnel');
  }
}

if (!empty($_POST['btn-inscription'])) {

  $is_valide = validation_formulaire($_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['email'], $_POST['password']);
  if ($is_valide == TRUE) {
    $password = sha1($_POST['password']);
    $reponse = inscription($_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['email'], $password);
    if ($reponse == TRUE) {
      $_SESSION['Utilisateur_email'] = $_POST['email'];
      header('Location:../Admin/index.php?page=pages-profile&identifiant=' . $_SESSION['Utilisateur_email']);
    } else {
      header('Location:index.php?message=veillez vérifier l\'accès à votre espace personnel');
    }
  } else {
    header('Location:index.php?message=veillez respecter les critères décrits en dessous des champs ! ');
  }
}



function posterUnequestion($titre, $question, $auteur, $photo, $niveau, $matiere)
{
  $insert_donnees = connectionDB()->prepare("INSERT INTO Publications(Titres, Publications, Auteurs, Photo,	Niveau,	Matieres)
                                    VALUES (?, ?, ?, ?, ?, ?)");
  $reponse = $insert_donnees->execute(array($titre, $question, $auteur, $photo, $niveau, $matiere));
  return $reponse;
}

if (!empty($_POST['btn-question'])) {
  $auteur = $proprietaire['Nom'];
  $reponse = posterUnequestion($_POST['titre-question'], $_POST['question'], $auteur, $_POST['photo'], $_POST['niveau'], $_POST['matiere']);
  if ($reponse) {
    header('Location:../index.php');
  }
}

function selectionPostes()
{
  $SQL_Connexion = connectionDB()->query("SELECT * FROM Publications");
  $donnees = $SQL_Connexion->fetch();
  return $donnees;
}
