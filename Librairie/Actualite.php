<?php

function selecteActualites() : array
{
  $sql  = 'SELECT * FROM Actualite WHERE DatePublication >= ALL(SELECT DatePublication FROM Actualite)';
  $SQL_Connexion = connectionDB()->prepare($sql);
  $SQL_Connexion->execute();

  // $SQL_Connexion = connectionDB()->query("SELECT * FROM Actualite WHERE DatePublication >= ALL(SELECT DatePublication FROM Actualite)") or die('Erreur de la requête SQL');
  $resultats = $SQL_Connexion->fetchAll();
  return $resultats;
}
