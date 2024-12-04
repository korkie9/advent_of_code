<?php

require_once 'lib/AddedValAndLength.php';

function hello()
{
  /*$testStr = "xmul(2,4)&mul[3,7]!^don't()_mul(5,5)+mul(32,64](mul(11,8)undo()?mul(8,5))";*/
  /*$exp = "/mul\([1-9]\d{0,2},[1-9]\d{0,2}\)/mi";*/
  /*preg_match_all($exp, $testStr, $matches);*/
  /*var_dump($matches[0][0]);*/

  /*$testStr = "Hello, World";*/
  /*$newTest  = substr($testStr, 1);*/
  /*echo $newTest . "\n";*/

  /*xmul(2,4)%&mul[3,7]!@^do_not_mul(5,5)+mul(32,64]then(mul(11,8)mul(8,5))*/

  $mulstr = "dsdsdfdsxmul(2,4)";

  echo substr($mulstr, 3);
  /*$addedvalandlenght = getValAndLenFromString($mulstr);*/
  /*var_dump($addedvalandlenght);*/
}


function getValAndLenFromString(string $mulStr): AddedValAndLength | null
{
  $exp = "/mul\([1-9]\d{0,2},[1-9]\d{0,2}\)/mi";
  $count = preg_match_all($exp, $mulStr, $matches);
  if ($count < 1) return null;
  $cleanStr = substr($matches[0][0], 4, -1);
  $numArr = explode(",", $cleanStr);
  $tot = (int)$numArr[0] * (int)$numArr[1];
  return new AddedValAndLength($tot, strlen($matches[0][0]));
}


hello();
