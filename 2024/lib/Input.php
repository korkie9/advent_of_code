<?php
  namespace lib;

  function GetInputArr(): array {
    $arr = [];
    $fh = fopen('../day_1/input.txt','r');
    while ($line = fgets($fh)) {
      array_push($arr, $line);
    }
    fclose($fh);
    return $arr;
  }
?>
