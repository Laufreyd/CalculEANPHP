<?php

include 'calculEAN.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['codeEAN'])){
  $result = EANkey($_POST['codeEAN']);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>Renseignez les 12 premiers chiffres EAN et validez pour obtenir la clé :</p>
    <form action="index.php" method="post">
      <input type="number" name="codeEAN" value="codeEAN" placeholder="codeEAN">
      <input type="submit" name="submitForm" value="Valider">
    </form>
    <span>
      <?php
      if(isset($result)){
          echo("Clé du code " . $_POST['codeEAN'] . " : " . $result);
      }
      ?>
  </span>
  </body>

</html>
