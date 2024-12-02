<?php

namespace lib;

function GetInputArr(string $input): array
{
  $arr = [];
  $fh = fopen($input, 'r');
  while ($line = fgets($fh)) {
    array_push($arr, $line);
  }
  fclose($fh);
  return $arr;
}
