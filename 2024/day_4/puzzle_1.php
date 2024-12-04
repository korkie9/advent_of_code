<?php


require_once '../lib/Solution.php';
require_once '../lib/Input.php';

class Puzzle1 implements Solution
{

  public static function solve(): int
  {

    $input = lib\GetInputArr('input.txt');
    $multiDArray = array_map(function ($line) {
      return str_split($line);
    }, $input);

    $ans = self::getBackDiagCount($multiDArray)
      + self::getFrontDiagCount($multiDArray)
      + self::getVertCount($multiDArray)
      + self::getHorizontalCount($multiDArray);


    return $ans;
  }


  private static function getBackDiagCount(array $arr): int
  {
    $count = 0;
    foreach ($arr as $yindex => $yline) {
      foreach ($yline as $xindex => $xline) {
        if (!isset($arr[$yindex + 3][$xindex + 3])) {
          continue;
        }
        $evalStr = $arr[$yindex][$xindex] . $arr[$yindex + 1][$xindex + 1] . $arr[$yindex + 2][$xindex + 2] . $arr[$yindex + 3][$xindex + 3];
        if ($evalStr == "XMAS" || $evalStr == "SAMX") $count++;
      }
    }
    return $count;
  }

  private static function getFrontDiagCount(array $arr): int
  {
    $fdcount = 0;
    foreach ($arr as $yindex => $yline) {
      foreach ($yline as $xindex => $xline) {
        if (!isset($arr[$yindex + 3][$xindex]) || !isset($arr[$yindex][$xindex + 3])) {
          continue;
        }
        $evalStr = $arr[$yindex][$xindex + 3] . $arr[$yindex + 1][$xindex + 2] . $arr[$yindex + 2][$xindex + 1] . $arr[$yindex + 3][$xindex];
        if ($evalStr == "XMAS" || $evalStr == "SAMX") $fdcount++;
      }
    }
    return $fdcount;
  }


  private static function getVertCount(array $arr): int
  {
    $vertCount = 0;
    foreach ($arr as $yindex => $yline) {
      foreach ($yline as $xindex => $xline) {
        if (!isset($arr[$yindex + 3][$xindex])) {
          continue;
        }
        $evalStr = $arr[$yindex][$xindex] . $arr[$yindex + 1][$xindex] . $arr[$yindex + 2][$xindex] . $arr[$yindex + 3][$xindex];
        if ($evalStr == "XMAS" || $evalStr == "SAMX") $vertCount++;
      }
    }
    return $vertCount;
  }


  private static function getHorizontalCount(array $arr): int
  {
    $horizCount = 0;
    foreach ($arr as $yindex => $yline) {
      foreach ($yline as $xindex => $xline) {
        if (!isset($arr[$yindex][$xindex + 3])) {
          continue;
        }
        $evalStr = $arr[$yindex][$xindex] . $arr[$yindex][$xindex + 1] . $arr[$yindex][$xindex + 2] . $arr[$yindex][$xindex + 3];
        if ($evalStr == "XMAS" || $evalStr == "SAMX") $horizCount++;
      }
    }
    return $horizCount;
  }
}
