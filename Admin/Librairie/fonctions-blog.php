<?php

$db = connectionDB();

/**
 * selection_articles
 *
 * @return void
 */
function selection_articles()
{
    global $db;
    $sql = $db->query('SELECT Articles.Id, Articles.Titres, Articles.Articles, Articles.Image, Articles.Date, Articles.Auteur, Admins.Nom FROM Articles LEFT JOIN Admins ON Articles.Auteur = Admins.Email WHERE Visible = 1 ORDER BY Date DESC LIMIT 0,3');

    $resultats = array();
    while ($ligne = $sql->fetchObject()) {
        $resultats[] = $ligne;
    }
    return $resultats;
}


/**
 * tous_articles
 *
 * @return void
 */
function tous_articles()
{
    global $db;
    $sql = $db->query('SELECT Articles.Id, Articles.Titres, Articles.Articles, Articles.Image, Articles.Date, Articles.Auteur, Admins.Nom FROM Articles LEFT JOIN Admins ON Articles.Auteur = Admins.Email WHERE Visible = 1 ORDER BY Date DESC');

    $resultats = array();
    while ($ligne = $sql->fetchObject()) {
        $resultats[] = $ligne;
    }
    return $resultats;
}



/**
 * tous_articles
 *
 * @return void
 */
function retoune_un_article($identifiant)
{
    global $db;
    $sql = $db->query("SELECT Articles.Id, Articles.Titres, Articles.Articles, Articles.Image, Articles.Date, Articles.Auteur, Admins.Nom FROM Articles LEFT JOIN Admins ON Articles.Auteur = Admins.Email WHERE Articles.Id = $identifiant AND Visible = 1");
    $resultats = $sql->fetch();
    return $resultats;
}



function insert_commentaire($id_article, $auteur, $commentaire)
{
    if (!empty($_POST['pseudo']) && !empty($commentaire)) {
        global $db;
        $sql = $db->prepare("INSERT INTO Commentaires(Id_publications, Auteur, Commentaire) 
                                VALUES(?, ?, ?)");
        $response = $sql->execute(array($id_article, $auteur, $commentaire));
        return $response;
    }
}



function commentaire_par_article($id_article)
{
    global $db;
    $sql = $db->query("SELECT Commentaires.Id, Commentaires.Auteur, Commentaires.Commentaire, Commentaires.Date_commente FROM Commentaires LEFT JOIN Articles ON Articles.Id = Commentaires.Id_publications WHERE Commentaires.Id_publications = $id_article");
    $resultats = $sql->fetchAll();
    return $resultats;
}



function nombre_commentaire_par_article($id_article)
{
    global $db;
    $sql = $db->query("SELECT Commentaires.Id, Commentaires.Auteur, Commentaires.Commentaire, Commentaires.Date_commente FROM Commentaires LEFT JOIN Articles ON Articles.Id = Commentaires.Id_publications WHERE Commentaires.Id_publications = $id_article");
    $resultats = $sql->rowCount();
    return $resultats;
}
