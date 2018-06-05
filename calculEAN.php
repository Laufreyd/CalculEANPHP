<?php
/**
* Fonction permettant de calculer la clé de contrôle d'un code EAN13
* En deux temps : Calcul de la somme des chiffres, puis calcul de reste sur cette somme
* Prend en paramètre un int équivalent aux 12 premiers chiffres du code EAN
* Renvoie un int correspondant à la clé de contrôle
*/
function EANkey(int $key){

  $somme = 0;

  /**
  * Calcul de la somme : Addition des nombres en position pair et addition du triple des nombres en position impair
  */
  for($i = 0; $i < 12; $i++){
    /**
    * Equivalent de l'opération avec les conditions if/else :
    * if($i%2==0){
    *     $somme += (($key%10) * 3);
    * }
    * else{
    *     $somme += $key%10;
    * }
    */
    $somme += (($key%10) + (($key%10) * (2 * ($i%2==0))));
    $key = ($key - ($key%10)) / 10;
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
