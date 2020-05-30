<?php

/**
 * Traitement de la modification d'enseignat
 */

if (isset($_POST['btn-modification-enseignant'])) {

    $piece_identite = $selection_enseignant_ne_get['Piece'];
    $photo = $selection_enseignant_ne_get['Photo'];
    $attestation = $selection_enseignant_ne_get['Attestation'];
    $cv = $selection_enseignant_ne_get['CV'];


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

    $reponse = modifiaction_enseignant($_POST['nom'], $_POST['prenom'], $_POST['specialite'], $_POST['diplome'], $_POST['email'], $_POST['telephone'], $photo, $piece_identite, $_POST['date_de_naissance'], $_POST['dateRecrute'], $_POST['infos_supp'], $_POST['lieuResidence'], $_POST['titre'], $_POST['matricule'], $cv, $_POST['universite'], $_POST['lieuNaissance'], $attestation, $_GET['identifiant-enseignant']);
    if ($reponse) {
        header('location:index.php?page=liste-enseignant&identifiant-enseignant=' . $_GET['identifiant-enseignant'] . '&message-success=Les informations sont bien mis à jour');
    } else {
        header('location:index.php?page=pagemodification-donnees&indication=modification-enseignat&identifiant-enseignant=' . $_GET['identifiant-enseignant'] . '&message-erreur=Certainnes informations ne sont pas correctes, veillez récommencer s\'il vous plait');
    }
}


/**
 * Modification d'une matière
 */
if (!empty($_POST['btn-modification-matiere'])) {
    die("ok");
}

if (isset($_POST['btn-modification-matiere'])) {
    die('ok');
}
