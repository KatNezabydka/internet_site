<?php
//$password1 = '111111';
//$password2 = '111111';
//
//$hash_password1 = password_hash($password1, PASSWORD_BCRYPT);
//echo '<br>1   -  ' . $hash_password1;
//$hash_password2 = password_verify($password1,$hash_password1);
//echo '<br> 2  ---';
//var_dump( $hash_password2);
/**
 * Данный код замерит скорость выполнения операции хешитрования для вашего сервера
 * с разными значениями алгоритмической сложности для определения максимального
 * его значения, не приводящего к деградации производительности. Хорошее базовое
 * значение лежит в диапазоне 8-10, но если ваш сервер достаточно мощный, то можно
 * задать и больше. Данный скрипт ищет максимальное значение, при котором
 * хеширование уложится в 50 миллисекунд.
 */
$timeTarget = 0.05; // 50 миллисекунд.

$cost = 8;
do {
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
    $end = microtime(true);
} while (($end - $start) < $timeTarget);

echo "Оптимальная стоимость: " . $cost . "\n";
