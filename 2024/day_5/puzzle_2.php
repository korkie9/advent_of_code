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

    $ruleset = array_map(function ($val) {
      return explode("|", $val);
    }, $ruleset_input);
    $dataset = array_map(function ($val) {
      return explode(",", $val);
    }, $dataset_input);

    $ans = 0;

    foreach ($dataset as $index => $data_arr) {
      if (!self::arraryIsValid($data_arr, $ruleset)) {
        $sorted_arr = self::sortArr($data_arr, $ruleset);

        $mid = floor(sizeof($sorted_arr) / 2);
        $ans += $sorted_arr[$mid];
      }
    }



    return $ans;
  }

  private static function arraryIsValid(array $eval_arr, array $ruleset): bool
  {
    foreach ($eval_arr as $eval_index => $val) {
      for ($other_index = $eval_index; $other_index < sizeof($eval_arr); $other_index++) {
        if ($eval_index == $other_index) continue;
        //Check ruleset with the two indexes from the arrays 
        foreach ($ruleset as $rule_index => $rule_arr) {

          if (
            $eval_index > $other_index
            && $eval_arr[$eval_index] == $rule_arr[0]
            && $eval_arr[$other_index] == $rule_arr[1]
          ) return false;
          if (
            $eval_index < $other_index
            && $eval_arr[$eval_index] == $rule_arr[1]
            && $eval_arr[$other_index] == $rule_arr[0]
          ) return false;
        }
      }
    }

    return true;
  }

  private static function sortArr(array $eval_arr, array $ruleset): array
  {
    $tempArr = $eval_arr;
    while (!self::arraryIsValid($eval_arr, $ruleset)) {


      foreach ($eval_arr as $eval_index => $val) {
        for ($other_index = 0; $other_index < sizeof($eval_arr); $other_index++) {
          if ($eval_index == $other_index) continue; // TODO: Might need to delete this
          //Check ruleset with the two indexes from the arrays 
          foreach ($ruleset as $rule_index => $rule_arr) {

            if (
              $eval_index > $other_index
              && $tempArr[$eval_index] == $rule_arr[0]
              && $tempArr[$other_index] == $rule_arr[1]
            ) {
              [$tempArr[$eval_index], $tempArr[$other_index]] = [$tempArr[$other_index], $tempArr[$eval_index]];
            };
            if (
              $eval_index < $other_index
              && $tempArr[$eval_index] == $rule_arr[1]
              && $tempArr[$other_index] == $rule_arr[0]
            ) {
              [$tempArr[$eval_index], $tempArr[$other_index]] = [$tempArr[$other_index], $tempArr[$eval_index]];
            }
          }
        }
      }


      return $tempArr;
    }
  }
}
