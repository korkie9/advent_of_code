<?php


require_once '../lib/Solution.php';
require_once '../lib/Coord.php';
require_once '../lib/Input.php';

class Puzzle1 implements Solution
{
  public static $dataset = [];



  function __construct()
  {

    $datasetFileString = '../day_6/input.txt';
    /*$datasetFileString = '../day_6/inputtest.txt';*/
    $dataset_input = lib\GetInputArr($datasetFileString);

    self::$dataset = array_map(function ($val) {
      $arr = str_split($val);
      unset($arr[count($arr) - 1]);
      return $arr;
    }, $dataset_input);
  }

  public static function solve(): int
  {
    $direction = "u";
    $current_coord = self::getStartingPoint();
    $map_array = self::$dataset; // Making new array here for readability
    $map_array[$current_coord->yindex][$current_coord->xindex] = "X";
    while (self::nextValue($direction, $current_coord->yindex, $current_coord->xindex) != "eof") {
      $nextValue = self::nextValue($direction, $current_coord->yindex, $current_coord->xindex);
      if ($nextValue == "eof") break;
      if ($nextValue == "#") {
        if ($direction == "u") {
          $direction = "r";
          continue;
        }
        if ($direction == "d") {
          $direction = "l";
          continue;
        }
        if ($direction == "l") {
          $direction = "u";
          continue;
        }
        if ($direction == "r") {
          $direction = "d";
          continue;
        }
      }
      if ($nextValue == "." || $nextValue == "X" || $nextValue == "^") {
        if ($direction == "u") {
          $map_array[$current_coord->yindex - 1][$current_coord->xindex] = "X";
          $current_coord = new Coord($current_coord->yindex - 1, $current_coord->xindex);
        }
        if ($direction == "d") {
          $map_array[$current_coord->yindex + 1][$current_coord->xindex] = "X";
          $current_coord = new Coord($current_coord->yindex + 1, $current_coord->xindex);
        }
        if ($direction == "l") {
          $map_array[$current_coord->yindex][$current_coord->xindex - 1] = "X";
          $current_coord = new Coord($current_coord->yindex, $current_coord->xindex - 1);
        }
        if ($direction == "r") {
          $map_array[$current_coord->yindex][$current_coord->xindex + 1] = "X";
          $current_coord = new Coord($current_coord->yindex, $current_coord->xindex + 1);
        }
      }
    }

    $ans = 0;

    foreach ($map_array as $outerset) {
      foreach ($outerset as $innerset) {
        if ($innerset == "X") $ans++;
      }
    }

    return $ans;
  }

  public static function getStartingPoint(): Coord
  {
    foreach (self::$dataset as $yind => $outerset) {
      foreach ($outerset as $xind => $innerset) {
        if ($innerset == "^") return new Coord($yind, $xind);
      }
    }
  }


  public static function nextValue(string $direction, int $yindex, int $xindex): string
  {
    if ($direction === "u" && isset(self::$dataset[$yindex - 1][$xindex])) return self::$dataset[$yindex - 1][$xindex];
    if ($direction === "d" && isset(self::$dataset[$yindex + 1][$xindex])) return self::$dataset[$yindex + 1][$xindex];
    if ($direction === "l" && isset(self::$dataset[$yindex][$xindex - 1])) return self::$dataset[$yindex][$xindex - 1];
    if ($direction === "r" && isset(self::$dataset[$yindex][$xindex + 1])) return self::$dataset[$yindex][$xindex + 1];

    return "eof";
  }
}
