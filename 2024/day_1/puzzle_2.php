<?php

require_once '../lib/Solution.php';
require_once '../lib/Input.php';

class Puzzle2 implements Solution
{

  public static function solve(): int
  {
    $input = lib\GetInputArr('../day_1/input.txt');

    $leftArr = [];
    $rightArr = [];

    foreach ($input as $val) {
      $newVal = explode("  ", $val);
      array_push($leftArr, (int)trim($newVal[0]));
      array_push($rightArr, (int)trim($newVal[1]));
    }


    $ans = 0;

    foreach ($leftArr as $leftVal) {
      $count = 0;

      foreach ($rightArr as $rightVal) {
        if ($leftVal == $rightVal) $count++;
      }

      $ans = $ans + ($leftVal * $count);
    }

    return $ans;
  }
}
