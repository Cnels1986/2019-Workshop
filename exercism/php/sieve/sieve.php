<?php
  function sieve(int $num){
    $prime = array();

    if($num == 1){
      return $prime;
    }

    else{
      for($a=2; $a<=$num; $a++){
        $isPrime = true;

        for($b=2; $b<=$a; $b++){
          if($b%$a == 0){
            $isPrime = false;
          }
        }

        if($isPrime == true){
          array_push($prime, $a);
        }
      }
    }
    return $isPrime;
  }

  print_r(sieve(10));
 ?>
