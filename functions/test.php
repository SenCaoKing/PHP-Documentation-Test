<?php

# Example 10 Strict typing
declare(strict_types=1);

function sum(int $a, int $b) {
    return $a + $b;
}

var_dump(sum(1, 2));     // 3
// var_dump(sum(1.5, 2.5)); // Fatal error: Uncaught TypeError: Argument 1 passed to sum() must be of the type integer, float given, called

echo '<hr>';

# Example 12 Catching TypeError
function sum_1 (int $a, int $b) {
    return $a + $b;
}

try{
    var_dump(sum_1(1, 2));     // 3
    var_dump(sum_1(1.5, 2.5)); // Error: Argument 1 passed to sum_1() must be of the type integer, float given,
}catch (TypeError $e) {
    echo 'Error: '.$e->getMessage();
}


?>