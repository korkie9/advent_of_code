<?php


require_once '../lib/Solution.php';
require_once '../lib/Input.php';

class Puzzle1 implements Solution {

  public static function solve(): int {
    $input = lib\GetInputArr();


  // Make left and right arr

    $leftArr = [];
    $rightArr = [];

    foreach($input as $val){
      $newVal = explode("  ", $val);
      array_push($leftArr, (int)trim($newVal[0]));
      array_push($rightArr, (int)trim($newVal[1]));
    }


// find smallest in first index
    $ans = 0;

    for($i = 0; $i < sizeOf($input); $i++){

      if(sizeOf($leftArr) > 0){
        $leftSmallest = $leftArr[0];
        $leftIndex = 0;
      }
      
      if(sizeOf($rightArr) > 0){
        $rightSmallest = $rightArr[0];
        $rightIndex = 0;
      } 

      foreach($leftArr as $index => $leftVal) {
        if($leftVal < $leftSmallest){
          $leftSmallest = $leftVal;
          $leftIndex = $index;
        }
  
      }

      foreach($rightArr as $index => $rightVal) {
        if($rightVal < $rightSmallest){
          $rightSmallest = $rightVal;
          $rightIndex = $index;
        }
  
      }

      $diff = $leftSmallest - $rightSmallest;
      if($diff < 0) $diff *= -1;
      $ans += $diff;

      array_splice($leftArr, $leftIndex, 1);
      array_splice($rightArr, $rightIndex, 1);


    }

    return $ans;
  }
}


?>
