<?php


require_once '../lib/Solution.php';
require_once '../lib/Input.php';

class Puzzle2 implements Solution
{

  public static function solve(): int
  {

    $input = lib\GetInputArr('input.txt');
    $multiDArray = array_map(function ($line) {
      return str_split($line);
    }, $input);

    $ans = self::getXmas($multiDArray);

    return $ans;
  }


  private static function getXmas(array $arr): int
  {
    $count = 0;
    foreach ($arr as $yindex => $yline) {
      foreach ($yline as $xindex => $xline) {
        $topLeftExists = isset($arr[$yindex - 1][$xindex - 1]);
        $topRightExists = isset($arr[$yindex - 1][$xindex + 1]);
        $bottomLeftExists = isset($arr[$yindex + 1][$xindex - 1]);
        $bottomRightExists = isset($arr[$yindex + 1][$xindex + 1]);
        if (!$topLeftExists || !$topRightExists || !$bottomLeftExists || !$bottomRightExists) {
          continue;
        }
        $backslash = $arr[$yindex - 1][$xindex - 1] . $arr[$yindex][$xindex] . $arr[$yindex + 1][$xindex + 1];
        $forwardslash = $arr[$yindex + 1][$xindex - 1] . $arr[$yindex][$xindex] . $arr[$yindex - 1][$xindex + 1];
        if (($backslash == "MAS" || $backslash == "SAM") && ($forwardslash == "MAS" || $forwardslash == "SAM")) $count++;
      }
    }
    return $count;
  }
}
