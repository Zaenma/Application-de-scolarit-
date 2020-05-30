<?php

namespace App\Date;

class Mois
{

  /**
   * @param integer $mois le mois commence par 1 à 12 
   * @param integer $annee
   * 
   * @return void
   */
  public function __construct(int $mois, int $annee)
  {
    if ($mois < 1 || $mois > 12) {
      throw new \Exception("Le mois $mois n'est pas valide !");
    }
    if ($annee < 1970) {
      throw new \Exception("L'année est inférieure à 1970 !");
    }
  }
}
