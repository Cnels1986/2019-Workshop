<?php
  function raindrops(int $num){
    $factors = array();
    for($a = 1; $a<$num; $a++){
      if($num % $a == 0){
        $b = $num/$a;
        array_push($factors, $a, $b);
      }
    }
    $array = array_unique($factors);
    $result = "";
    for($a = 0; $a < count($array); $a++){
      switch($a){
        case 3:
          $result += "Pling";
          break;
        case 5:
          $result += "Plang";
          break;
        case 7:
          $result += "Plong";
          break;
      }
    }
    // echo $num;
    // echo $result;
    if($result != ""){
      return $result;
    }
    else{
      return $num;
    }
  }
 ?>
