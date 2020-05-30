<?php

/**
 * Traitement de la formule d'ajout de matière
 */
if (!empty($_POST['btn-ajout-matiere'])) {
  $code = generation_matricule($_POST['nom'], $_POST['nom']);
  $resultat = ajoutMatieres($code, $_POST['nom']);
  if ($resultat) {
    header('Location:index.php?page=matiere&message=La matière a été bien ajouté !');
  }
}


/**
 * traitement du formulaire de modification de session
 */
if (!empty($_POST['btn-session'])) {
  $reponse = modificationSession($_POST['session'], $_POST['d_session'], $_POST['f_session']);
  if ($reponse) {
    header('Location:index.php?message=Session modifiée avec succès !');
  }
}


/**
 * formulaire d'ajout d'un enseignant --------------------------------------------------------------
 */
if (!empty($_POST['btn-insert-enseignant'])) {

  if (!empty($_FILES['piece-identite'])) {
    $extension = telechaurger_un_fichier("pieces-enseignant/", "piece-identite");
    if ($extension == ".pdf" || $extension == ".PDF") {
      $piece_identite = $_FILES['piece-identite']['name'];
    } else {
      header('location:index.php?page=modification-donnees&indication=modification-enseignat&identifiant-enseignant=' . $_GET['identifiant-enseignant'] . '&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers avec l\'extension «.pdf ou .PDF» sont autorisés');
    }
  }
  if (!empty($_FILES['photo'])) {
    $extension = telechaurger_un_fichier("pieces-enseignant/", "photo");
    $extension_autorisees = array('.png', '.PNG', '.jpg', '.jpeg', '.gif', '.JPG', '.JPEG');
    if (in_array($extension, $extension_autorisees)) {
      $photo = $_FILES['photo']['name'];
    } else {
      header('location:index.php?page=modification-donnees&indication=modification-enseignat&identifiant-enseignant=' . $_GET['identifiant-enseignant'] . '&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers aux format images sont autorisés');
    }
  }
  if (!empty($_FILES['attestation'])) {
    $extension = telechaurger_un_fichier("pieces-enseignant/", "attestation");
    if ($extension == ".pdf" || $extension == ".PDF") {
      $attestation = $_FILES['attestation']['name'];
    } else {
      header('location:index.php?page=modification-donnees&indication=modification-enseignat&identifiant-enseignant=' . $_GET['identifiant-enseignant'] . '&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers avec l\'extension «.pdf ou .PDF» sont autorisés');
    }
  }
  if (!empty($_FILES['cv'])) {
    $extension = telechaurger_un_fichier("pieces-enseignant/", "cv");
    if ($extension == ".pdf" || $extension == ".PDF") {
      $cv = $_FILES['cv']['name'];
    } else {
      header('location:index.php?page=modification-donnees&indication=modification-enseignat&identifiant-enseignant=' . $_GET['identifiant-enseignant'] . '&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers avec l\'extension «.pdf ou .PDF» sont autorisés');
    }
  }


  // Nom, Prenom, Specialite, Diplome, Email, Telephone, Photo, Piece, DateNaissance, LieuNaissance, DateRecrute,Infos_supp,LieuResidence,Sexe, CV, Matricule, Attestation
  $reponse = AjoutEnseignqnt($_POST['nom'], $_POST['prenom'], $_POST['specialite'], $_POST['diplome'], $_POST['email'], $_POST['telephone'], $photo, $piece_identite, $_POST['date_de_naissance'], $_POST['lieuNaissance'], $_POST['dateRecrute'], $_POST['infos-supp'], $_POST['lieuResidence'], $_POST['titre'], $cv, $_POST['universite'], $_POST['matricule'], $attestation);
  if ($reponse) {
    header('Location:index.php?page=enesignant&message-succes=l\'enseignant a été bie ajouté ! ');
  }
}


/**
 * =========================================================================================================
 * traitement du formulaire d'ajout d'absence 
 */
if (!empty($_POST['btn-ajout-absences'])) {
  $donnee = NULL;
  $matricule_eleve = matricule_eleve($_POST['matricule'], "Eleves", "Code");
  if ($matricule_eleve == 1) {
    $_POST['personne'] = "Élève";
    $donnee = ajout_absences($_POST['matiere'], $_POST['matricule'], $_POST['date-seance'], $_POST['heure-debut'], $_POST['heure-fin'], $_POST['type-seance'], $_POST['personne']);
  } else {
    $matricule_enseignant = matricule_eleve($_POST['matricule'], "Enseignants", "Matricule");
    if ($matricule_enseignant == 1) {
      $_POST['personne'] = "Enseignant";
      $donnee = ajout_absences($_POST['matiere'], $_POST['matricule'], $_POST['date-seance'], $_POST['heure-debut'], $_POST['heure-fin'], $_POST['type-seance'], $_POST['personne']);
    } else {
      header('Location:../index.php?page=absences&message-erreur=Veillez vérifier la matricule de l\'');
    }
  }
  if ($donnee != NULL) {
    header('Location:index.php?page=absences&message-succes=l\'absence de ' . $_POST['matricule'] . 'a été bien enregistré !');
  } else {
    header('Location:index.php?page=absences&message-erreur=Veillez vérifier la matricule');
  }
}

/**
 * Traitement du formulaire de modification d'adresse email de recéption de message
 */
// if (isset($_POST['btn-modifier-adresse']) && !empty($_POST['btn-modifier-adresse'])) {
//   $adresse_modif = modification_email($_POST['email']);
//   if ($adresse_modif) {
//     header('Location:../index.php?page=home&message-succes=Désorma');
//   } else {
//     header('Location:../index.php?page=home&message-erreur=Veillez vérifier réessayer s\'il vous plait');
//   }
// }


/**
 * Traitement du formulaire de contacte
 */
if (isset($_POST['btn-envoie-message']) && !empty($_POST['btn-envoie-message'])) {
  $messege_insert = insersion_message_base($_POST['nom'], $_POST['telephone'], $_POST['email'], $_POST['sujet'], $_POST['message']);
  if ($messege_insert) {
    $reponse_envoie = envoie_message_par_email($_POST['nom'], $_POST['telephone'], $_POST['email'], $_POST['sujet'], $_POST['message']);
    if ($reponse_envoie) {
      header('Location:../../index.php&message-success=Merci pour votre message, vous serez contacté dans les meilleures délait');
    } else {
      header('Location:../../index.php&message-success=Recommencé votre messages');
    }
  } else {
    header('Location:../../index.php&message-erreur=Un problème est survenu, veillerz remplire correctement les champs');
  }
}

/**
 * Traitement d'envoie de réponse
 */
if (isset($_POST['btn-repondre-message']) && !empty($_POST['btn-repondre-message'])) {
  $ajout_reponse = ajouter_reponse($_GET['details-messages'], $_POST['reponse']);
  if ($ajout_reponse) {
    $reponse_envoie = envoie_reponse_par_email($_POST['email'], $details_message['Sujet'], $details_message['Email'], $_POST['reponse']);
    if ($reponse_envoie) {
      header('Location:../../index.php&message-success=Merci pour votre message ! ');
    } else {
      header('Location:../../index.php&message-erreur=Un problème est survenu, veillerz ressayer ultérieurement !');
    }
  } else {
    header('Location:index.php?page=affiche-messages&&message-erreur=Un problème est survenu, veillerz remplire correctement les champs');
  }
}

if (isset($_POST['btn-ajout-actualite']) && !empty($_POST['btn-ajout-actualite'])) {

  if (!empty($_FILES['photo-actualite'])) {
    $extension = telechaurger_un_fichier("photos-actualites/", "photo-actualite");
    if ($extension == NULL) {
      $photo_1 = NULL;
    } else {
      $extension_autorisees = array('.png', '.PNG', '.jpg', '.jpeg', '.gif', '.JPG', '.JPEG');
      if (in_array($extension, $extension_autorisees)) {
        $photo_1 = $_FILES['photo-actualite']['name'];
      } else {
        header('location:index.php?page=actualite&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers aux format images sont autorisés');
      }
    }
  }

  if (!empty($_FILES['photo-2-actualite'])) {
    $extension = telechaurger_un_fichier("photos-actualites/", "photo-2-actualite");
    if ($extension == NULL) {
      $photo_2 = NULL;
    } else {
      $extension_autorisees = array('.png', '.PNG', '.jpg', '.jpeg', '.gif', '.JPG', '.JPEG');
      if (in_array($extension, $extension_autorisees)) {
        $photo_2 = $_FILES['photo-2-actualite']['name'];
      } else {
        header('location:index.php?page=actualite&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers aux format images sont autorisés');
      }
    }
  }

  if (strlen($_POST['description'] < 1000)) {
    if ($photo_1 == NULL && $photo_2 == NULL) {
      header('location:index.php?page=actualite&message-erreur=Veillez choisir au moins une image d\'illustration !');
    } else {
      if (!empty($_POST['titre']) && strlen($_POST['titre']) > 30) {
        $ajout = ajout_dactualite($_POST['titre'], $_POST['description'], $_POST['auteur'], $photo_1, $photo_2);
        if ($ajout) {
          header('location:index.php?page=actualite&message-success=Merci votre actualité est bien publié !');
        }
      } else {
        header('location:index.php?page=actualite&message-erreur=Veillez entrer un titre déscriptif à votre actualité !');
      }
    }
  } else {
    header('location:index.php?page=actualite&message-erreur=Veillez entrer une déscription valide de l\'actualité, au minimum 1000 caractères !');
  }
}


/**
 * traitement de formulaire d'ajout d'élève
 */
if (!empty($_POST['btn-insert-eleves'])) {

  $matricule = generation_matricule($_POST['nom'], $_POST['prenom']);

  if (!empty($_FILES['photo-eleve'])) {
    $extension = telechaurger_un_fichier("pieces-eleves/", "photo-eleve");
    if ($extension == NULL) {
      $photo_eleve = "default.png";
    } else {
      $extension_autorisees = array('.png', '.PNG', '.jpg', '.jpeg', '.gif', '.JPG', '.JPEG');
      if (in_array($extension, $extension_autorisees)) {
        $photo_eleve = $_FILES['photo-eleve']['name'];
      } else {
        header('location:index.php?page=actualite&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers aux format images sont autorisés');
      }
    }
  }

  if (!empty($_FILES['piece-eleve'])) {
    $extension = telechaurger_un_fichier("pieces-eleves/", "piece-eleve");
    if ($extension == NULL) {
      $piece_eleve = NULL;
    } else {
      if ($extension == ".pdf" || $extension == ".PDF") {
        $piece_eleve = $_FILES['piece-eleve']['name'];
      } else {
        header('location:index.php?page=actualite&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers aux formats «.pdf ou .PDF» sont autorisés');
      }
    }
  }
  if (!empty($_FILES['photo-responsable'])) {
    $extension = telechaurger_un_fichier("pieces-eleves/", "photo-responsable");
    if ($extension == NULL) {
      $photo_responsable = "default.png";
    } else {
      $extension_autorisees = array('.png', '.PNG', '.jpg', '.jpeg', '.gif', '.JPG', '.JPEG');
      if (in_array($extension, $extension_autorisees)) {
        $photo_responsable = $_FILES['photo-responsable']['name'];
      } else {
        header('location:index.php?page=actualite&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers aux format images sont autorisés');
      }
    }
  }

  if (!empty($_FILES['piece-responsable'])) {
    $extension = telechaurger_un_fichier("pieces-eleves/", "piece-responsable");
    if ($extension == NULL) {
      $piece_responsable = NULL;
    } else {
      if ($extension == ".pdf" || $extension == ".PDF") {
        $piece_responsable = $_FILES['piece-responsable']['name'];
      } else {
        header('location:index.php?page=actualite&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers aux formats «.pdf ou .PDF» sont autorisés');
      }
    }
  }
  AjoutEleves($_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['email'], $_POST['villeResidence'], $_POST['villeNaissance'], $_POST['date_de_naissance'], $_POST['niveau'], $_POST['infoss'], $photo_eleve, $matricule, $piece_eleve, $_POST['dInscrit'], $_POST['sexe'], $_POST['matriculeR'], $_POST['session'], $_POST['autreContacte']);
  AjoutParents($_POST['matriculeR'], $_POST['nomR'], $_POST['telephoneR'], $_POST['emailR'], $_POST['lien'], $photo_responsable, $piece_responsable, $_POST['residenceR']);
  header('Location:index.php?page=liste-eleves-par-classe&niveau=' . $_POST['niveau']);
}

/**
 * 
 * Traitement de la formulaire de modification des paramètres d'administrations
 */


if (!empty($_POST['btn-modification-parametre'])) {

  if (!empty($_POST['nom']) && !empty($_POST['directeur']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['fax']) && !empty($_POST['histoire'])) {
    $succes = modification_infos_admin($_POST['email'], $_POST['nom'], $_POST['telephone'], $_POST['fax'], $_POST['directeur'], $_POST['histoire']);

    if ($succes) {
      header('location:index.php?page=paramettres&message-success=Les informations sont bien mis à jour');
    } else {
      header('location:index.php?page=paramettres&message-erreur=Veillez remplir tous les champs correctement et réessayer');
    }
  } else {
    header('location:index.php?page=paramettres&message-erreur=Veillez remplir tous les champs correctement');
  }
}

if (!empty($_POST['modification-logo'])) {
  if (!empty($_FILES['logo'])) {
    $extension = telechaurger_un_fichier("pieces-admin/", "logo");
    $extension_autorisees = array('.png', '.PNG', '.jpg', '.jpeg', '.gif', '.JPG', '.JPEG');
    if (in_array($extension, $extension_autorisees)) {
      $logo = $_FILES['logo']['name'];
      if (connectionDB()->query("UPDATE Outil_administrations SET Logo = '$logo'")) {
        header('location:index.php?page=paramettres&message-success=Votre Logo a bien été modifié, Félicitation !');
      }
    } else {
      header('location:index.php?page=paramettres&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers aux format images sont autorisés');
    }
  }
}


if (isset($_GET['details-messages']) && intval($_GET['details-messages']) && !empty($_GET['details-messages'])) {
  desactiver_activer("Messages", "Lu", 1, $_GET['details-messages']);
}


/**
 * Justification d'absence 
//  */
// if (isset($_POST['btn-justification-absence'])) {
//   if (justification_absence($_POST['description'], $_GET['id-absence'])) {
//     header('Location:index.php?page=absences&message-success=L\'absence a bien été justifié, merci de ne plus fuir les cours');
//   }
// }

/**
 * Traitement de formulaire de publication 
 */

if (!empty($_POST['btn-publication'])) {

  htmlspecialchars(trim(extract($_POST)));

  if (!empty($titre) && !empty($source) && !empty($matiere) && !empty($classe) && !empty($description) && strlen($description) > 50) {

    if (!empty($_FILES['image'])) {
      $extension = telechaurger_un_fichier("pieces-publications/", "image");
      $extension_autorisees = array('.png', '.PNG', '.jpg', '.jpeg', '.gif', '.JPG', '.JPEG');
      if (in_array($extension, $extension_autorisees)) {
        $image = $_FILES['image']['name'];
      }
    } else {
      header('location:index.php?page=pages-profile&identifiant=' . $donnees['Email'] . '&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers aux format images sont autorisés');
    }

    if (!empty($_FILES['pdf'])) {
      $extension = telechaurger_un_fichier("pieces-publications/", "pdf");
      if ($extension == NULL) {
        $pdf = NULL;
      } else {
        if ($extension == ".pdf" || $extension == ".PDF") {
          $pdf = $_FILES['pdf']['name'];
        } else {
          header('location:index.php?page=actualite&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers aux formats «.pdf ou .PDF» sont autorisés');
        }
      }
    }
    if (!empty($_SESSION['Administrateur'])) {
      $auteur = $_SESSION['Administrateur'];
    }
    if (!empty($_SESSION['Utilisateur_email'])) {
      $auteur = $_SESSION['Utilisateur_email'];
    }
    if (insert_publication($titre, $description, $auteur, $source, $image, $pdf, $classe, $matiere)) {

      header('location:index.php?page=pages-profile&identifiant=' . $auteur . '&message-success=Merci pour votre publication');
    }
  } else {
    echo '<script> alert("Veillez remplire correctement les champs !"); </script>';
  }
}



/**
 * Traitement d'envoie de réponse
 */
if (isset($_POST['btn-repondre-message']) && !empty($_POST['btn-repondre-message'])) {
  $ajout_reponse = ajouter_reponse($_GET['details-messages'], $_POST['reponse']);
  if ($ajout_reponse) {
    $reponse_envoie = envoie_reponse_par_email($details_message['Nom'], $details_message['Sujet'], $_POST['email'], $_POST['reponse']);
    if ($reponse_envoie) {
      header('Location:index.php?page=affiche-messages&messages-demandee=non-repondu&message-success=Merci pour votre message ! ');
    } else {
      header('Location:index.php?page=affiche-messages&messages-demandee=non-repondu&message-erreur=Un problème est survenu, veillerz ressayer ultérieurement !');
    }
  } else {
    header('Location:index.php?page=affiche-messages&messages-demandee=non-repondu&message-erreur=Un problème est survenu, veillerz remplire correctement les champs');
  }
}



/**
 * 
 * 
 * Traitement de formulaire d'ajout d'un role 
 */


if (!empty($_POST['btn-ajout-role'])) {
  if (!empty($_POST['nom']) && strlen($_POST['nom']) > 3) {
    if ($_POST['adresse'] == $_POST['r-adresse']) {
      ajout_dun_role($_POST['nom'], $_POST['adresse'], $_POST['role']);
    } else {
      header('location:' . $_SERVER['REQUEST_URI'] . '&message-erreur=les deux adresses ne correspondent pas');
    }
  } else {
    header('location:' . $_SERVER['REQUEST_URI'] . '&message-erreur=Veillez remplir correctement le champs nom');
  }
}

/**
 * Publication sur la bibliothèque
 */

if (isset($_POST['btn-publication-document'])) {

  $extension = telechaurger_un_fichier("pieces-bibliotheques/", "document");
  if ($extension == NULL) {
    header('location:index.php?page=bibliotheque&message-erreur=On a pas pu télécharger le fichier, il ne respecte pas les conditions de téléchargement');
  } else {
    if ($extension == ".pdf" || $extension == ".PDF") {
      $document = $_FILES['document']['name'];
      $reponse = publication_dans_bibliotheque($_POST['titre'], $document, $_POST['description'], $_POST['niveau'], $donnees['Email']);
      if ($reponse != 0) {
        header('location:index.php?page=bibliotheque&message-success=Merci pour le document');
      } else {
        header('location:index.php?page=bibliotheque&message-erreur=Veillez remplir correctement le formulaire de publication');
      }
    } else {
      header('location:index.php?page=bibliotheque&message-erreur=Veillez vérifier le type de fichier que vous venez d\'importer, seuls les fichiers aux formats «.pdf ou .PDF» sont autorisés');
    }
  }
}


/**
 * Traitement d'envoie des messages
 */
if (!empty($_POST['btn-envoie-messages'])) {
  $resultat = envoie_messages($_POST['email-destinataire'], $_POST['titre-message'], $_POST['message'], $donnees['Email']);
  if ($resultat == 0) {

    if (isset($_GET['message-success'])) {
      $lien = explode('&message-success', $_SERVER['REQUEST_URI'])[0];
      header('location:' . $lien . '&message-erreur=Votre message a bien été envoyé sur le formulaire !');
    } else {
      header('location:' . $_SERVER['REQUEST_URI'] . '&message-erreur=Merci de corriger vos erreurs sur le formulaire !');
    }
  } else {
    if (isset($_GET['message-erreur'])) {
      $lien = explode('&message-erreur', $_SERVER['REQUEST_URI'])[0];
      header('location:' . $lien . '&message-success=Votre message a bien été envoyé !');
    } else {
      header('location:' . $_SERVER['REQUEST_URI'] . '&message-success=Votre message a bien été envoyé !');
    }
  }
}
