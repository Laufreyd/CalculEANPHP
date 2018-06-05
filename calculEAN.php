<?php
function EANkey(int $key){
  $somme = 0;
  for($i = 0; $i < 12; $i++){
          /*if($i%2==0){
              $somme += (($key%10) * 3);
          }
          else{
              $somme += $key%10;
          }*/
        $somme += (($key%10) + (($key%10) * (2 * ($i%2==0))));
        $key = ($key - ($key%10)) / 10;
  }
  $reste = $somme % 10;
  if($reste == 0){ $reste += 10; }
  return 10 - $reste;
}

echo EANkey(303792016200) == 3 ? 'TRUE ' : 'FALSE ';
echo EANkey(978294019961) == 7 ? 'TRUE ' : 'FALSE ';
echo EANkey(471951200288) == 9 ? 'TRUE ' : 'FALSE ';
echo EANkey(345312023645) == 8 ? 'TRUE ' : 'FALSE ';
echo EANkey(978020137973) == 0 ? 'TRUE ' : 'FALSE ';

?>
