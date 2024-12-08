<?php


require_once '../lib/Solution.php';
require_once '../lib/Input.php';

class Puzzle2 implements Solution
{

  public static function solve(): int
  {
    /*$datasetFileString = '../day_5/dataset_test_file.txt';*/
    /*$rulesetFileString = '../day_5/ruleset_test_file.txt';*/
    $datasetFileString = '../day_5/dataset_file.txt';
    $rulesetFileString = '../day_5/ruleset_file.txt';
    $dataset_input = lib\GetInputArr($datasetFileString);
    $ruleset_input = lib\GetInputArr($rulesetFileString);


    $ans = 0;

    return $ans;
  }
}
