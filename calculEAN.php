<?php

/**
* Fonction permettant de calculer la clé de contrôle d'un code EAN13
* En deux temps : Calcul de la somme des chiffres, puis calcul de reste sur cette somme
* Prend en paramètre un int équivalent aux 12 premiers chiffres du code EAN
* Renvoie un int correspondant à la clé de contrôle
*/
function EANkey($key){

  if($key > 1000000000000 || $key < 9999999999){
    return "Erreur : code non conforme (11 ou 12 chiffres attendus)";
  }

  $somme = 0;

  /**
  * Calcul de la somme : Addition des nombres en position pair et addition du triple des nombres en position impair
  */
  for($i = 0; $i < 12; $i++){

    //Récupére le dernier chiffre du code
    $round = round(($key/10 - floor($key/10))*10);

    /**
    * Equivalent de l'opération avec les conditions if/else :
    * if($i%2==0){
    *     $somme += (($test) * 3);
    * }
    * else{
    *     $somme += $test;
    * }
    */
    $somme += ($round + ($round * (2 * ($i%2==0))));
    $key = ($key - ($round)) / 10;
  }

  $reste = $somme % 10;

  /**
  * Equivalent au return en version plus condensée :
  * return 10 - ($reste == 0 ? 10 : $reste);
  */
  if($reste == 0){
    $reste += 10;
  }

  return 10 - $reste;
}
