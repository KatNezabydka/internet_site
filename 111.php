<?php

$numb = 100;
//d строку и перевернули
$res = strrev(strval($numb));
$num1 = intval($res) * $numb;
$result = $num1 / 5;
$result /= $numb;
var_dump($result);