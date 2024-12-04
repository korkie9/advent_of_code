<?php


require_once '../lib/Solution.php';
require_once '../lib/Input.php';

class Puzzle1 implements Solution
{

  public static function solve(): int
  {

    $input = lib\GetInputArr('../day_3/input.txt');
    $exp = "/mul\([1-9]\d{0,2},[1-9]\d{0,2}\)/mi";
    $lineMatches = [];
    foreach ($input as $line) {
      preg_match_all($exp, $line, $matches);
      array_push($lineMatches, $matches);
    }

    $onlyNumArr = [];

    //So much O of n 😩 hoyyeaaa
    foreach ($lineMatches as $matchArr) {
      foreach ($matchArr as $match) {
        foreach ($match as $matchStr) {

          array_push($onlyNumArr, substr($matchStr, 4, -1));
        }
      }
    }

    $onlyNums = [];
    foreach ($onlyNumArr as $onlyNumStr) {
      array_push($onlyNums, explode(",", $onlyNumStr));
    }

    $ans = 0;
    foreach ($onlyNums as $onlyNumArr) {
      $ans += (int)$onlyNumArr[0] * (int)$onlyNumArr[1];
    }


    return $ans;
  }
}
