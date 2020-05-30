<?php
session_start();
/**
 * connectionDB : connexion à la base de donnée 
 *
 * @return PDO
 */
function connectionDB(): PDO
{
    $pdo = new PDO('mysql:host=localhost;dbname=lcoft', 'Zaenma', 'Zaenma-Admin', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}

/**
 * inscription : inscription d'un nouveau utilisateur
 *
 * @param  mixed $nom
 * @param  mixed $prenom
 * @param  mixed $email
 * @param  mixed $password
 * @return void
 */
function inscription($nom, $prenom, $telephone, $email, $password): bool
{
    $pdo = connectionDB();
    $insert_donnees = $pdo->prepare("INSERT INTO Eleves(Nom, Prenom, Telephone, Email, Password)
                                    VALUES (?, ?, ?, ?, ?)");
    $reponse = $insert_donnees->execute(array($nom, $prenom, $telephone, $email, $password));
    if ($reponse) {
        return TRUE;
    }
}

/**
 * connexion : permet la connexion au système
 *
 * @param  mixed $email
 * @param  mixed $password
 * @param  mixed $chemin
 * @return void
 */
function connexion($email, $password)
{
    $SQL_Connexion = connectionDB()->query("SELECT * FROM Eleves WHERE Email = '$email' AND Password = '$password'") or die('Erreur de la requête SQL');
    $total = $SQL_Connexion->rowCount();
    return $total;
}


/**
 * connexion_admin : connexuon pour l'administrateur du système
 *
 * @param  mixed $email
 * @param  mixed $password
 * @return int
 */
function connexion_admin($email, $password): int
{
    $SQL_Connexion = connectionDB()->query("SELECT * FROM Admins WHERE Email = '$email' AND Password = '$password' AND Etat = 1") or die('Erreur de la requête SQL');
    $total = $SQL_Connexion->rowCount();
    return $total;
}



/**
 * connexion_admin : connexuon pour l'administrateur du système
 *
 * @param  mixed $email
 * @param  mixed $password
 * @return int
 */
function connexion_enseignant($email, $password): int
{
    $SQL_Connexion = connectionDB()->query("SELECT * FROM Enseignants WHERE Email = '$email' AND Password = '$password' AND Etat = 1") or die('Erreur de la requête SQL');
    $total = $SQL_Connexion->rowCount();
    return $total;
}

/**
 * selection : retourne les données de la ligne
 *
 * @param  mixed $email
 * @return array
 */
function selection($table, $email): array
{
    $pdo = connectionDB();
    $SQL_Connexion = $pdo->query("SELECT * FROM $table WHERE Email = '$email'") or die('Erreur de la requête SQL');
    $donnees = $SQL_Connexion->fetch();
    return $donnees;
}

/**
 * selectionSessionencours : selectionne tout la ligne de la table sessionEncours
 *
 * @return array
 */
function selectionSessionencours(): array
{
    $SQL_Connexion = connectionDB()->query("SELECT * FROM SessionEncours") or die('Erreur de la requête SQL');
    $donnees = $SQL_Connexion->fetch();
    return $donnees;
}



/**
 * compteNombreLigne : compter le nombre de la ligne d'une table donnée en paramètre
 *
 * @param  mixed $table
 * @return int
 */
function compteNombreLigne($table): int
{
    $pdo = connectionDB();
    $SQL_Connexion = $pdo->query("SELECT * FROM $table") or die('Erreur de la requête SQL');
    $nombreLignes = $SQL_Connexion->rowCount();
    return $nombreLignes;
}

/**
 * selecteActualites : retourne la dernière actualité publiée 
 *
 * @return array
 */
function selecteActualites(): array
{
    $sql  = 'SELECT * FROM Actualite WHERE DatePublication >= ALL(SELECT DatePublication FROM Actualite)';
    $SQL_Connexion = connectionDB()->prepare($sql);
    $SQL_Connexion->execute();
    $resultats = $SQL_Connexion->fetchAll();
    return $resultats;
}

/**
 * affiche : affiche un champs de l'actualité 
 *
 * @param  mixed $champ
 * @return void
 */
function affiche($champ)
{
    $actualites = selecteActualites();
    foreach ($actualites as $actualite) {
        echo $actualite["$champ"];
    }
}

/**
 * ajout_dactualite
 *
 * @param  mixed $titre
 * @param  mixed $description
 * @param  mixed $utilisateur
 * @param  mixed $photos_1
 * @param  mixed $photos_2
 * @return void
 */
function ajout_dactualite($titre, $description, $utilisateur, $photos_1, $photos_2)
{
    $insert_donnees = connectionDB()->prepare("INSERT INTO Actualite(Titres, Publications, Auteur, Photos_1, Photos_2) VALUES (?, ?, ?, ?, ?)");
    $resultat = $insert_donnees->execute(array($titre, $description, $utilisateur, $photos_1, $photos_2));
    return $resultat;
}

/**
 * selectionActualites : retourne toutes les actualités presentes
 *
 * @return array
 */
function selectionActualites(): array
{
    $pdo = connectionDB();
    $SQL_Connexion = $pdo->query("SELECT * FROM Actualite") or die('Erreur de la requête SQL');
    $donnees = $SQL_Connexion->fetchAll();
    return $donnees;
}


/**
 * AjoutParents : inserer le responsable d'un élève
 *
 * @param  mixed $matricule
 * @param  mixed $nom
 * @param  mixed $telephone
 * @param  mixed $email
 * @param  mixed $lien
 * @param  mixed $photo
 * @param  mixed $piece
 * @param  mixed $residence
 * @return void
 */
function AjoutParents($matricule, $nom,  $telephone, $email, $lien, $photo, $piece, $residence)
{
    $insert_donnees = connectionDB()->prepare("INSERT INTO Responsables(Matricule,	Nom,	Telephone,	Email,	Lien,	Photo,	Piece,	Residence)
                                              VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $insert_donnees->execute(array($matricule, $nom, $telephone, $email, $lien, $photo, $piece, $residence));
}

/**
 * selectionClasse : retourne toutes les classes de 
 *
 * @return array
 */
function selectionClasse(): array
{
    $SQL_Connexion = connectionDB()->query("SELECT * FROM Classes");
    $donnees = $SQL_Connexion->fetchAll();
    return $donnees;
}

/**
 * selectionengat : retourne les la ligne de la classe avec l'identifiant en GET
 *
 * @param  mixed $varget
 * @return array
 */
function selection_info_id_ne_get($table, $varget): ?array
{
    $SQL_Connexion = connectionDB()->query("SELECT * FROM $table WHERE Id = '$varget'");
    $donnees = $SQL_Connexion->fetch();
    return $donnees;
}


/**
 * AjoutClasses : Ajouter une claase
 *
 * @param  mixed $nom
 * @param  mixed $cycle
 * @return array
 */
function AjoutClasses($nom, $cycle)
{
    $insert_donnees = connectionDB()->prepare("INSERT INTO Classes(Code, Nom)
                                                VALUES (?, ?)");
    $reponse = $insert_donnees->execute(array($nom, $cycle));
    return $reponse;
}


/**
 * selectionElevespournotes : selectionne tous les élèves de la clesse passée en paramètre 
 *
 * @param  mixed $classe
 * @return array
 */
function selectionElevespournotes($classe): array
{
    $SQL_Connexion = connectionDB()->query("SELECT Id, Nom, Prenom, Code, Niveau, Etat FROM Eleves WHERE Niveau = '$classe' AND Session = (SELECT Sessionencours FROM SessionEncours)");
    $donnees = $SQL_Connexion->fetchAll();
    return $donnees;
}
/**
 * =====================================================================================================================
 * ========================  FONCTIONS DE LA PAGINATION ================================================================
 * =====================================================================================================================
 */

function nombre_ligne($table)
{
    return (int) connectionDB()->query("SELECT COUNT(Id) FROM $table")->fetch(PDO::FETCH_NUM)[0];
}
/**
 * toutes_les_pages_possible : retourne toutes les pages possible à afficher
 *
 * @return int
 */
function toutes_les_pages_possible($table, $ligne_par_page): int
{
    $toutes_pages = ceil(nombre_ligne($table) / $ligne_par_page);
    return $toutes_pages;
}
/**
 * page_courente_a_afficher : la page courente à afficher 
 *
 * @return int
 */
function page_courente_a_afficher($table, $ligne_par_page): int
{
    $page_courent = (int) ($_GET['page-courente'] ?? 1) ?: 1;
    if ($page_courent > toutes_les_pages_possible($table, $ligne_par_page)) {
        $page_courent = toutes_les_pages_possible($table, $ligne_par_page);
    }
    if (!filter_var($page_courent, FILTER_VALIDATE_INT)) {
        $page_courent = 1;
    }
    return $page_courent;
}

/**
 * selectionMatiere : retourne toutes les matière 
 *
 * @return array
 */
function selection_d_ensemble_table($table, $ligne_par_page): array
{
    $offset = $ligne_par_page * (page_courente_a_afficher($table, $ligne_par_page) - 1);

    $SQL_Connexion = connectionDB()->query("SELECT * FROM $table LIMIT $ligne_par_page OFFSET $offset");

    $donnees = $SQL_Connexion->fetchAll();
    return $donnees;
}
/**
 * ===========================================================================================================================
 * ============================================================================================================================
 */

/**
 * AjoutEnseignqnt : Ajouter un enseignant 
 *
 * @param  mixed $nom
 * @param  mixed $prenom
 * @param  mixed $specialite
 * @param  mixed $classe
 * @param  mixed $email
 * @param  mixed $telephone
 * @param  mixed $photo
 * @param  mixed $dateNaissance
 * @param  mixed $dateRecrute
 * @param  mixed $cycle
 * @param  mixed $lieuResidence
 * @param  mixed $sexe
 * @param  mixed $matricule
 * @return string
 */
function AjoutEnseignqnt($nom, $prenom, $specialite, $diplome, $email, $telephone, $photo, $piece, $dateNaissance, $lieuNaissance, $dateRecrute, $infos_supp, $lieuResidence, $sexe, $cv, $universite, $matricule, $attestation): string
{
    $insert_donnees = connectionDB()->prepare("INSERT INTO Enseignants(Nom, Prenom, Specialite, Diplome, Email, Telephone, Photo, Piece, DateNaissance, LieuNaissance, DateRecrute, Infos_supp, LieuResidence, Sexe, CV, Universite, Matricule, Attestation)
                                                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $reponse = $insert_donnees->execute(array($nom, $prenom, $specialite, $diplome, $email, $telephone, $photo, $piece, $dateNaissance, $lieuNaissance, $dateRecrute, $infos_supp, $lieuResidence, $sexe, $cv, $universite, $matricule, $attestation));

    return $reponse;
}


/**
 * AjoutEnseignqnt : Modification des information d'un enseignant 
 *
 * @param  mixed $nom
 * @param  mixed $prenom
 * @param  mixed $specialite
 * @param  mixed $classe
 * @param  mixed $email
 * @param  mixed $telephone
 * @param  mixed $photo
 * @param  mixed $dateNaissance
 * @param  mixed $dateRecrute
 * @param  mixed $cycle
 * @param  mixed $lieuResidence
 * @param  mixed $sexe
 * @param  mixed $matricule
 * @return string
 */
function modifiaction_enseignant($nom, $prenom, $specialite, $diplome, $email, $telephone, $photo, $piece, $dateNaissance, $dateRecrute, $infos_supp, $lieuResidence, $sexe, $matricule, $cv, $universite, $lieuNaissance, $attestation, $identifiant)
{
    $modification_enseignant = connectionDB()->query("UPDATE Enseignants SET Nom = '$nom', Prenom = '$prenom', Specialite = '$specialite', Diplome = '$diplome', Email = '$email', Telephone = '$telephone', Photo = '$photo', Piece = '$piece', lieuNaissance = '$lieuNaissance', DateNaissance = '$dateNaissance', DateRecrute = '$dateRecrute', Infos_supp = '$infos_supp', LieuResidence = '$lieuResidence', Sexe = '$sexe', Matricule = '$matricule', CV = '$cv', Universite = '$universite', Attestation = '$attestation' WHERE Id = $identifiant");
    return $modification_enseignant;
}


/**
 * selectionEnseignant : retourne tous les enseignants qui sont présents
 *
 * @return array
 */
function selection_tous_ligne($table): array
{
    $pdo = connectionDB();
    $SQL_Connexion = $pdo->query("SELECT * FROM $table") or die('Erreur de la requête SQL');
    if ($SQL_Connexion->rowCount() > 1) {
        $donnees = $SQL_Connexion->fetchAll();
    } else {
        $donnees = $SQL_Connexion->fetch();
    }
    return $donnees;
}


/**
 * ajoutMatieres : Ajouter une matière
 *
 * @param  mixed $code
 * @param  mixed $nom
 * @return string
 */
function ajoutMatieres($code, $nom): string
{
    $insert_donnees = connectionDB()->prepare("INSERT INTO Matiere(Code, Nom)
                                                VALUES (?, ?)");
    $resultat = $insert_donnees->execute(array($code, $nom));
    return $resultat;
}

/**
 * modificationSession : Modification de la session 
 *
 * @param  mixed $session
 * @return string
 */
function modificationSession($session, $f_session, $d_session)
{
    $SQL = connectionDB()->query("UPDATE SessionEncours SET Sessionencours = '$session', Debut_session = '$f_session', Fin_session = '$d_session'");
    return $SQL;
}

/**
 * selectionEleves : 
 *
 * @param  mixed $table
 * @param  mixed $critere
 * @return array
 */
function selectionEleves($table, $critere): array
{
    $pdo = connectionDB();
    $SQL_Connexion = $pdo->query("SELECT * FROM $table WHERE Niveau = '$critere'") or die('Erreur de la requête SQL');
    $donnees = $SQL_Connexion->fetchAll();
    return $donnees;
}


/**
 * AjoutEleves : Ajouter un élève depuis l'espace d'administration
 *
 * @param  mixed $nom
 * @param  mixed $prenom
 * @param  mixed $telephone
 * @param  mixed $email
 * @param  mixed $villeResidence
 * @param  mixed $villeNaissance
 * @param  mixed $date_de_naissance
 * @param  mixed $niveau
 * @param  mixed $infos_supp
 * @param  mixed $photo
 * @param  mixed $code
 * @param  mixed $piece
 * @param  mixed $dateInscrit
 * @param  mixed $sexe
 * @param  mixed $matriculeR
 * @param  mixed $session
 * @param  mixed $autreContacte
 * @return string
 */
function AjoutEleves($nom, $prenom, $telephone, $email, $villeResidence, $villeNaissance, $date_de_naissance, $niveau, $infos_supp, $photo, $code, $piece, $dateInscrit, $sexe, $matriculeR, $session, $autreContacte)
{

    $insert_donnees = connectionDB()->prepare("INSERT INTO Eleves(Nom,Prenom,Telephone,Email,VilleResidence,VilleNaissance, Date_de_naissance,Niveau,Infos_supp,Photo,Code, Piece, DateInscrit, Sexe, MatriculeRes, Session, AutreContacte)
                                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $reponse = $insert_donnees->execute(array($nom, $prenom, $telephone, $email, $villeResidence, $villeNaissance, $date_de_naissance, $niveau, $infos_supp, $photo, $code, $piece, $dateInscrit, $sexe, $matriculeR, $session, $autreContacte));

    return $reponse;
}


/**
 * mot_de_passe_valide : fonction de vérification de mot de passe 
 *
 * @param  mixed $password
 * @return bool
 */
function mot_de_passe_valide($password): bool
{
    if (strlen($password) >= 6) {
        if (preg_match("/[A-Z]/", $password) && preg_match("/[a-z]/", $password) && preg_match("/[0-9]/", $password)) {
            return TRUE;
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}

/**
 * validation_numero : validation de numéro de téléphone 
 *
 * @param  mixed $telephone
 * @return bool
 */
function validation_numero($telephone): bool
{
    if (strlen($telephone) >= 7) {
        if (preg_match("/[A-Z]/", $telephone) && preg_match("/[a-z]/", $telephone)) {
            return FALSE;
        } else {

            return TRUE;
        }
    } else {
        return FALSE;
    }
}
/**
 * validation_formulaire : validation de formulaire 
 *
 * @param  mixed $nom
 * @param  mixed $prenom
 * @param  mixed $email
 * @param  mixed $telephone
 * @param  mixed $password
 * @return bool
 */
function validation_formulaire($nom, $prenom, $telephone, $email, $password): bool
{
    if (!empty($nom) || !empty($prenom)) {
        if (isset($email) && isset($telephone)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (validation_numero($telephone) == TRUE) {
                    if (mot_de_passe_valide($password) == TRUE) {
                        return TRUE;
                    } else {
                        return FALSE;
                    }
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } elseif (isset($telephone)) {
            if (validation_numero($telephone) == TRUE) {
                if (mot_de_passe_valide($password) == TRUE) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } elseif (isset($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (mot_de_passe_valide($password) == TRUE) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}

/**
 * generation_matricule : génération de matricule 
 *
 * @param  mixed $nom
 * @param  mixed $prenom
 * @param  mixed $autre
 * @return string
 */
function generation_matricule($nom, $prenom): string
{
    $nom = strtoupper(substr(md5($nom), 0, 3));
    $prenom = strtoupper(substr(sha1($prenom), -3));
    $autre = random_int(2, 99);
    return $autre . "-" . $nom . $prenom;
}


/**
 * ajout_absences : ahout d'absences
 *
 * @param  mixed $matieres
 * @param  mixed $matricules
 * @param  mixed $Date_seance
 * @param  mixed $Heure_debut
 * @param  mixed $Type_seance
 * @return string
 */
function ajout_absences($matieres, $matricules, $Date_seance, $Heure_debut, $heure_fin, $Type_seance, $personnel): string
{
    $insert_donnees = connectionDB()->prepare("INSERT INTO Absence(Matieres, Matricules, Date_seance, Heure_debut, Heure_fin, Type_seance, personnel)
    VALUES (?, ?, ?, ?, ?, ?, ?)");
    $reponse = $insert_donnees->execute(array($matieres, $matricules, $Date_seance, $Heure_debut, $heure_fin, $Type_seance, $personnel));

    return $reponse;
}

/**
 * matricule_eleve :  selection les matricule des élèves
 *
 * @param  mixed $matricule
 * @return int
 */
function matricule_eleve($matricule, $table, $champ): int
{
    $SQL_Connexion = connectionDB()->query("SELECT $champ FROM $table WHERE $champ = '$matricule'");
    $donnees = $SQL_Connexion->rowCount();
    return $donnees;
}


/**
 * suppression_element_id_en_get
 *
 * @param  mixed $identifiant
 * @param  mixed $table
 * @return void
 */
function suppression_element_id_en_get($identifiant, $table)
{
    $suppression_donnees = connectionDB()->prepare("DELETE FROM $table  WHERE Id = ?");
    $reponse = $suppression_donnees->execute(array($identifiant));
    return $reponse;
}


/**
 * modification_email Modification de l'adresse mail de récéption
 *
 * @param  mixed $email
 * @return string
 */
function modification_infos_admin($email, $nom, $telephone, $fax, $directeur, $histoire)
{
    $modification_enseignant = connectionDB()->query("UPDATE Outil_administrations SET Email_admin = '$email', Nom_etablissement = '$nom', Fax = '$fax', Telephone_Admin = '$telephone', Directeur = '$directeur', Histoire = \"$histoire\" ");
    return $modification_enseignant;
}

/**
 * email_admin : Adresse de reception des message
 *
 * @return string
 */
function email_admin(): string
{
    $sql = "SELECT Email_admin from Outil_administrations";
    $query = connectionDB()->prepare($sql);
    $query->execute();
    $resultats = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) :
        foreach ($resultats as $resultat) :
            $email_admin = $resultat->Email_admin;
        endforeach;
    endif;
    return $email_admin;
}


/**
 * insersion_message_base : insert le message dans la base de données
 *
 * @param  mixed $nom
 * @param  mixed $telephone
 * @param  mixed $email
 * @param  mixed $subject
 * @param  mixed $message
 * @return void
 */
function insersion_message_base($nom, $telephone, $email, $subject, $message)
{
    $insert_donnees = connectionDB()->prepare("INSERT INTO Messages(Nom, Telephone, Email, Sujet, Message)
                                                   VALUES (?, ?, ?, ?, ?)");
    $reponse = $insert_donnees->execute(array($nom, $telephone, $email, $subject, $message));
    return $reponse;
}


/**
 * envoie_message_par_email : envoie de messge par les adresse email : destinataire et expéditeur
 *
 * @param  mixed $name
 * @param  mixed $phoneno
 * @param  mixed $email
 * @param  mixed $subject
 * @param  mixed $message
 * @return void
 */
function envoie_message_par_email($name, $phoneno, $email, $subject, $message)
{
    $headers = "";
    $ms = "";
    $to = $email . "," . email_admin();
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From:Zaenma Contact<contacte.zaenma@gmail.com>' . "\r\n";
    $ms .= "<html>
                </body>
                    <div>
                        <div style='text-align:center;'><h2>Nom : $name, </h2></div>
                        <div style='text-align:center;'><h2>Numéro de téléphone : $phoneno,</h2></div>
                        <div style='text-align:center;'><h2>Adresse électronique : $email,</h2></div>";
    $ms .= "<div style='padding-top:8px;'><b>Message : $message</b></div>
                    <div>   
                </body>
            </html>";
    $envoie = mail($to, $subject, $ms, $headers);
    return $envoie;
}


/**
 * envoie_message_par_email : repondre un message par emil *
 * @param  mixed $name
 * @param  mixed $phoneno
 * @param  mixed $email
 * @param  mixed $subject
 * @param  mixed $message
 * @return void
 */
function envoie_reponse_par_email($name, $subject, $email, $reponse)
{
    $headers = "";
    $ms = "";
    $to = $email;
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From:Zaenma Contact<contacte.zaenma@gmail.com>' . "\r\n";
    $ms .= "<html>
                </body>
                    <div>
                        <div style='text-align:center;'><h2>Bonjour $name, </h2></div>
                        <div style='text-align:center;'><h2>Réponse à votre message titré : $subject, </h2></div>";
    $ms .= "<div style='padding-top:15px;'><b>Message : $reponse</b></div>
                    <div>   
                </body>
            </html>";
    $envoie = mail($to, $subject, $ms, $headers);
    return $envoie;
}


/**
 * messages_du_jours affiche les messages d'aujourdui 
 *
 * @return array
 */
function messages_du_jours()
{
    $SQL_Connexion = connectionDB()->query("SELECT * FROM Messages WHERE date(Date_envoie)=CURDATE()");
    $donnees = $SQL_Connexion->rowCount();
    if ($donnees > 0) {
        $donnees = $SQL_Connexion->fetchAll();
    }
    return $donnees;
}

/**
 * message_non_lu
 *
 * @return void
 */
function messages_non_lu()
{
    $SQL_Connexion = connectionDB()->query("SELECT * FROM Messages WHERE Lu = 0");
    $donnees = $SQL_Connexion->rowCount();
    if ($donnees > 0) {
        $donnees = $SQL_Connexion->fetchAll();
    }
    return $donnees;
}


/**
 * messages_du_jours affiche les messages de la semaine 
 *
 * @return void
 */
function messages_du_semaine()
{
    $SQL_Connexion = connectionDB()->query("SELECT * FROM Messages WHERE date(Date_envoie)>= DATE(NOW()) - INTERVAL 7 DAY");
    $donnees = $SQL_Connexion->rowCount();
    if ($donnees > 0) {
        $donnees = $SQL_Connexion->fetchAll();
    }
    return $donnees;
}

/**
 * nombre_message_non_lu
 *
 * @return int
 */
function nombre_message_non_lu(): int
{
    $SQL_nombre_messages = connectionDB()->query("SELECT Id FROM Messages WHERE Lu = 0");
    $messages = $SQL_nombre_messages->rowCount();
    return $messages;
}

/**
 * details_message : retourne tous les données d'un message avec l'identifiant en paramètre 
 *
 * @param  mixed $identifiant
 * @return array
 */
function details_message($identifiant)
{
    $SQL_nombre_messages = connectionDB()->query("SELECT * FROM Messages WHERE Id = $identifiant");
    $messages = $SQL_nombre_messages->fetch();
    return $messages;
}

/**
 * ajouter_reponse : Ajouter la reponse d'un message dans la base de données
 *
 * @param  mixed $identifiant
 * @param  mixed $reponse
 * @return void
 */
function ajouter_reponse($identifiant, $reponse): string
{
    $insert_donnees = connectionDB()->prepare("INSERT INTO Reponse(Id_message, Reponses)
                                                   VALUES (?, ?)");
    $resultat = $insert_donnees->execute(array($identifiant, $reponse));
    return $resultat;
}

/**
 * reponses_dun_message
 *
 * @param  mixed $identifiant
 * @return void
 */
function reponses_dun_message($identifiant)
{
    $sql = "SELECT Reponse.* FROM Reponse LEFT JOIN  Messages ON  Reponse.Id_message = Messages.Id WHERE Messages.Id = $identifiant";
    $SQL_nombre_messages = connectionDB()->query($sql);
    $messages = $SQL_nombre_messages->rowCount();
    if ($messages != 0) {
        $messages = $SQL_nombre_messages->fetchAll();
    }
    return $messages;
}

/**
 * desactiver_activer : modifier l'état d'une ligne dans la base de données 
 *
 * @param  mixed $table
 * @param  mixed $champ
 * @param  mixed $valeur
 * @return void
 */
function desactiver_activer($table, $champ, $valeur, $identifiant)
{
    $SQL = connectionDB()->query("UPDATE $table SET $champ = '$valeur' WHERE Id = $identifiant");
    return $SQL;
}

/**
 * telechaurger_un_fichier : permet de déplacer un fichier
 *
 * @param  mixed $extension
 * @param  mixed $nom
 * @param  mixed $chemin_destination
 * @return void
 */
function telechaurger_un_fichier($chemin_destination, $index_fichier)
{
    $erreure = NULL;
    $nom = $_FILES[$index_fichier]['name'];
    $extension = strrchr($nom, '.');
    $chemin_temporaire = $_FILES[$index_fichier]['tmp_name'];
    $extension_autorisees = array('.pdf', '.PDF', '.png', '.PNG', '.jpg', '.jpeg', '.gif', '.docx');
    $chemin_destination = $chemin_destination . $nom;
    if (in_array($extension, $extension_autorisees)) {
        if (move_uploaded_file($chemin_temporaire, $chemin_destination)) {
            return $extension;
        } else {
            return $erreure;
        }
    } else {
        return $erreure;
    }
}


/**
 * derniere_actualite : retourne la dernière actualité publiée
 *
 * @return void
 */
function derniere_actualite()
{
    $actualite = connectionDB()->query("SELECT * FROM Actualite WHERE DatePublication >= ALL(SELECT DatePublication FROM Actualite)");
    $actualite = $actualite->fetch();
    return $actualite;
}


/**
 * avant_dernier_date : retourne l'avant dernier actualité selon la date
 *
 * @return void
 */
function avant_dernier_date()
{
    $derniere_actualite = derniere_actualite()['DatePublication'];
    $actualite = connectionDB()->query("SELECT * FROM Actualite WHERE DatePublication < '$derniere_actualite' ");
    $actualite = $actualite->fetch();
    return $actualite;
}

/**
 * justification_absence
 *
 * @param  mixed $Commentaire
 * @param  mixed $id_absence
 * @return void
 */
function justification_absence($Commentaire,  $id_absence, $Date_enregistree)
{
    $modification_enseignant = connectionDB()->query("UPDATE Absence SET Commentaire = '$Commentaire', Justiee = 1 WHERE Id = '$id_absence' AND Date_enregistree = '$Date_enregistree'");
    return $modification_enseignant;
}



/**
 * parents d'un éleve
 *
 * @param  mixed $identifiant
 * @return void
 */
function parents_eleves($identifiant)
{
    $sql = "SELECT Responsables.* FROM Responsables LEFT JOIN  Eleves ON  Responsables.Matricule = Eleves.MatriculeRes WHERE Eleves.Id = $identifiant";
    $SQL_nombre_messages = connectionDB()->query($sql);
    $parents = $SQL_nombre_messages->fetch();
    return $parents;
}

/**
 * effectifs_par_classe
 *
 * @param  mixed $classe
 * @return void
 */
function effectifs_par_classe(string $classe)
{
    return connectionDB()->query("SELECT Id FROM Eleves WHERE Niveau = '$classe'")->rowCount();
}

/**
 * insert_publication
 *
 * @param  mixed $titre
 * @param  mixed $description
 * @param  mixed $auteur
 * @param  mixed $source
 * @param  mixed $image
 * @param  mixed $pdf
 * @param  mixed $niveau
 * @param  mixed $matiere
 * @return void
 */
function insert_publication($titre, $description, $auteur, $source, $image, $pdf, $niveau, $matiere)
{
    $insert_donnees = connectionDB()->prepare("INSERT INTO Publications(`Titres`, `Publications`, `Auteurs`, `Source`, `Photo`, `Documents`, `Niveau`, `Matieres`)
                                                   VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $resultat = $insert_donnees->execute(array($titre, $description, $auteur, $source, $image, $pdf, $niveau, $matiere));
    return $resultat;
}


/**
 * publications
 *
 * @param  mixed $identifiant
 * @return void
 */
function publications($identifiant)
{
    $actualite = connectionDB()->query("SELECT * FROM Publications WHERE Auteurs = '$identifiant'");
    $actualite = $actualite->fetchAll();
    return $actualite;
}


/**
 * activation_mecu
 *
 * @param  mixed $menu
 * @return void
 */
function activation_mecu(string $menu, ...$autres)
{
    if (!isset($_GET['page']) || empty($_GET['page'])) {
        $_GET['page'] = 'home';
    }
    foreach ($autres as $autre) {
        if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] == $autre) {
            $_GET['page'] = $menu;
        }
    }
    if (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] == $menu) {
        echo 'active';
    }
}


/**
 * adsences_eleves
 *
 * @param  mixed $matricule
 * @return void
 */
function adsences_eleves($matricule)
{
    $sql = "SELECT Absence.Id, Absence.Matieres, Absence.Matricules, Absence.Justiee, Absence.Commentaire, Absence.Date_seance, Absence.Heure_debut, Absence.Heure_fin, Absence.Type_seance, Absence.personnel, Absence.Date_enregistree, Eleves.Nom, Eleves.Prenom, Eleves.Niveau, Eleves.Session FROM Absence LEFT JOIN  Eleves ON  Absence.Matricules = Eleves.Code WHERE Eleves.Code = '$matricule'";
    $SQL_nombre_messages = connectionDB()->query($sql);
    $parents = $SQL_nombre_messages->fetch();
    return $parents;
}


/**
 * valide_champ_texte
 *
 * @param  mixed $champ
 * @param  mixed $taille_min
 * @param  mixed $taille_max
 * @return void
 */
function valide_champ_texte(string $champ, int $taille_min, ?int $taille_max)
{
    $erreure = [];

    if (!empty($champ)) {
        $champ = htmlentities(trim($champ));
        if (mb_strlen($champ) > $taille_min) {
            if (isset($taille_max) && !empty($taille_max) && mb_strlen($champ) < $taille_max) {
                return $erreure[$champ] = '';
            } else {
                return $erreure[$champ] = "Le champs $champ doit avoir au maximum $taille_max caractères ";
            }
        } else {
            return $erreure[$champ] = "Le champs $champ doit avoir au moins $taille_min caractères !";
        }
    } else {
        return $erreure[$erreure] = "Le champs $champ ne doit pas être vide !";
    }
}

function generation_token($taille)
{
    $token = "AZERTYUIOJFDFLKJH23456789O87TFBNHGTCGT6T1NINU8YB76RPCVBNYT2727KFHD8C75YBV7Y0E94387Y20480374V3VMC0MXLOAW4NRCY39N479CNGFHGB8Y02B3U3Y3475Y492U393Y440UKFHDG";
    return substr(str_shuffle(str_repeat($token, $taille)), 0, $taille);
}

/**
 * ajout_dun_role: Ajout d'un role sur l'application
 *
 * @param  mixed $nom
 * @param  mixed $email
 * @param  mixed $role
 * @param  mixed $headers
 * @return void
 */
function ajout_dun_role(string $nom, string $email, $role)
{
    $token = generation_token(50);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $insert_donnees = connectionDB()->prepare("INSERT INTO Admins(Nom, Email, Role, Token)
                                                       VALUES (?, ?, ?, ?)");
        $resultat = $insert_donnees->execute(array($nom, $email, $role, $token));

        if ($resultat) {

            $sujet = "Attribution d'un role";

            $message = '<html lang="fr">
                        <head>
                            <meta charset="utf-8">
                        </head>
                        
                        <body>
                            <div style="text-align: center; font-size: 25px;">
                            <h2>Bonjour ' . $nom . ' </h2><br>
                            <span>Vous êtes attribué le rôle <span style="color: #1a73e8; font-weight: bold;"> ' . $role . '</span> sur l\'application de gestion de votre établissement.</span><br>
                            <span>Voici les identifiants à inserer sur la page suivante afin d\'avoir l\'accès</span> <br><br>
                        
                            <span>* Identifiant (Votre adresse électronique) : <span style="color: #1a73e8; font-weight: bold;">' . $email . '</span> </span> <br>
                            <span>* Mot de passe : <span style="color: #1a73e8; font-weight: bold;">' . $token . '</span> </span><br><br>
                        
                            <a style=" background-color: #1a73e8; padding: 10px; border-radius: 5px; color: #fff;" href="https://b-jules-ferry.000webhostapp.com/Admin/Connexion-admin/administrateur.lycee-application-super.php">Ajouter les identifiants</a> <br>
                            <br /> Après avoir inseré les informations, vous devez choisir un nouveau mot de passe secret pour votre compte
                        </div>                   
                        </body>
                    </html>';

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From:Jules Ferry Ajout d\'un role<contacte.zaenma@gmail.com>' . "\r\n";

            mail($email, $sujet, $message, $headers);
        }
    }
}

/**
 * publication_dans_bibliotheque
 *
 * @param  mixed $titre
 * @param  mixed $document
 * @param  mixed $description
 * @param  mixed $source
 * @return void
 */
function publication_dans_bibliotheque(string $titre, string $document, string $description, string $niveau, string $source)
{
    if (!empty($titre) && !empty($description) && !empty($document) && isset($niveau)) {
        $insert_donnees = connectionDB()->prepare("INSERT INTO Bibliothèque(Titre, Document, Description, Niveau, Source)
                                                           VALUES (?, ?, ?, ?, ?)");
        $resultat = $insert_donnees->execute(array($titre, $document, $description, $niveau, $source));
        return $resultat;
    } else {
        return 0;
    }
}


/**
 * envoie_messages
 *
 * @param  mixed $destinataire
 * @param  mixed $titre
 * @param  mixed $message
 * @param  mixed $expediteur
 * @return void
 */
function envoie_messages(string $destinataire, string $titre, $message, string $expediteur)
{
    /**
     * On enregistre le titre, message, destinataire, expéditeur, l'heure d'envoie
     */
    if (empty($titre)) {
        return 0;
    }
    if (empty($message)) {
        return 0;
    }
    if (!empty($destinataire) && filter_var($destinataire, FILTER_VALIDATE_EMAIL)) {
        $sql = connectionDB()->prepare("INSERT INTO `Message_envoyes` (`titre`, `Messages`, `expéditeur`, `destinataire`) 
                                    VALUES (?, ?, ?, ?)");
        $resultat = $sql->execute(array($titre, $message, $expediteur, $destinataire,));
        if ($resultat) {
            $message = '<html lang="fr">
                        <head>
                            <meta charset="utf-8">
                            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                        </head>
                        <body>
                            <div class="container text-center">
                                <b>Expéditeur du message : ' . $expediteur . '</b>
                                <p>' . $message . '</p>
                            </div>
                        </body>
                    </html>';

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'Message <contacte.zaenma@gmail.com>' . "\r\n";

            if (mail($destinataire, $titre, $message, $headers)) {
                return 1;
            }
        }
    } else {
        return 0;
    }
}


/**
 * role_session Retourne le role de l'utilisateur en session
 *
 * @return void
 */
function role_session()
{
    if (isset($_SESSION['Administrateur'])) {
        return "Super Administrateur";
    }
    if (isset($_SESSION['eleves'])) {
        return "Élève";
    }
    if (isset($_SESSION['enseignant'])) {
        return "Enseignant";
    }
}
