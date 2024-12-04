<?php

require_once '../lib/Solution.php';
require_once '../lib/AddedValAndLength.php';
require_once '../lib/Input.php';

class Puzzle2 implements Solution
{

  public static function solve(): int
  {

    $input = lib\GetInputArr('../day_3/input.txt');
    $exp = "/mul\([1-9]\d{0,2},[1-9]\d{0,2}\)/mi";
    $strList = [];
    $allTextAsStr = "";
    foreach ($input as $line) {
      $allTextAsStr = $allTextAsStr . $line;
      preg_match_all($exp, $line, $matches);
      foreach ($matches[0] as $match) {
        array_push($strList, $match);
      }
    }

    $ans = 0;
    $evaluate = true;


    while (strlen($allTextAsStr) > 0) {
      $evaluateDoOrDont = substr($allTextAsStr, 0, 7);
      if (str_contains($evaluateDoOrDont, "do()")) $evaluate = true;
      if (str_contains($evaluateDoOrDont, "don't()")) $evaluate = false;

      $evaluateAddStr = substr($allTextAsStr, 0, 13);
      $valAndLenght = self::getValAndLenFromString($evaluateAddStr);
      if ($valAndLenght == null) {
        $allTextAsStr = substr($allTextAsStr, 1);
        continue;
      }

      $allTextAsStr = substr($allTextAsStr, $valAndLenght->lenght);
      if ($evaluate) $ans += $valAndLenght->val;
    }

    return $ans;
  }

  private static function getValAndLenFromString(string $mulStr): AddedValAndLength | null
  {
    $exp = "/mul\([1-9]\d{0,2},[1-9]\d{0,2}\)/mi";
    $count = preg_match_all($exp, $mulStr, $matches);
    if ($count < 1) return null;
    $cleanStr = substr($matches[0][0], 4, -1);
    $numArr = explode(",", $cleanStr);
    $tot = (int)$numArr[0] * (int)$numArr[1];
    return new AddedValAndLength($tot, strlen($matches[0][0]));
  }
}
