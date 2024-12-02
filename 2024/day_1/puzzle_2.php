
<?php


require_once '../lib/Solution.php';
require_once '../lib/Input.php';

class Puzzle2 implements Solution {

  public static function solve(): int {
    $input = lib\GetInputArr();

    $leftArr = [];
    $rightArr = [];

    foreach($input as $val){
      $newVal = explode("  ", $val);
      array_push($leftArr, (int)trim($newVal[0]));
      array_push($rightArr, (int)trim($newVal[1]));
    }


    $recurrLeftVals = [];
    $recurrRightVals = [];
    $ans = 0;

    foreach($leftArr as $lindex => $leftVal) {
      $count = 0;

      foreach($rightArr as $rindex => $rightVal){
        if($leftVal == $rightVal) $count++;
      }

      $ans = $ans + ($leftVal*$count);

    }

    return $ans;
  }
}


?>
