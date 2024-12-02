<?php


require_once '../lib/Solution.php';
require_once '../lib/Input.php';

class Puzzle1 implements Solution
{

  public static function solve(): int
  {

    $input = lib\GetInputArr('../day_2/input.txt');
    $levelsArr = [];
    $ans = 0;

    foreach ($input as $val) {
      $inputArr = explode(" ", trim($val));
      array_push($levelsArr, $inputArr);
    }


    //Do stuff where with 2d array
    foreach ($levelsArr as $reportArr) {
      $isSafe = self::arrayIsSafe($reportArr);

      if ($isSafe) $ans++;
    }


    return $ans;
  }

  private static function arrayIsSafe(array $arr): bool
  {

    $isIncreasing = true;
    $isSafe = true;
    if ((int)$arr[0] - (int)$arr[1] > 0) {
      $isIncreasing = false;
    }

    for ($i = 0; $i < sizeof($arr) - 1; $i++) {
      if (
        ((int)$arr[$i] - (int)$arr[$i + 1] > 0 && $isIncreasing)
        || ((int)$arr[$i] - (int)$arr[$i + 1] < 0 && !$isIncreasing)
        || ((int)$arr[$i] - (int)$arr[$i + 1] == 0)
      ) {

        $isSafe = false;
      }

      if (((int)$arr[$i] - (int)$arr[$i + 1] > 3) || ((int)$arr[$i] - (int)$arr[$i + 1] < -3)) {
        $isSafe = false;
      }
    }
    return $isSafe;
  }
}
