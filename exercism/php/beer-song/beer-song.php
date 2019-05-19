<?php
  function BeerSong(){
    // $count = 100; /
    for($a = 99; $a >= 0; $a--){
      switch($a){
        case 2:
          echo "2 bottles of beer on the wall, 2 bottles of beer.\nTake one down pass it around, 1 bottle of beer on the wall.\n";
          break;
        case 1:
          echo "1 bottle of beer on the wall, 1 bottle of beer.\nTake one down and pass it around, no more bottles of beer on the wall.\n";
          break;
        case 0:
          echo "No more bottles of beer on the wall, no more bottles of beer.\nGo to the store and buy some more, 99 bottles of beer on the wall.\n";
          break;
        default:
          echo $a . " bottles of beer on the wall, " . $a . " bottles of beer.\nTake one down and pass it around, " . ($a-1) . "bottles of beer on the wall.\n";
          break;
      }
    }
  }
 ?>
