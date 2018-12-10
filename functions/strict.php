<?php

# Example 5 Strict mode in action
declare(strict_types=1);

function sum($a, $b): int {
    return $a + $b;
}

var_dump(sum(1, 2)); // Outputs: int(3)

var_dump(sum(1, 2.5)); //  Fatal error: Uncaught TypeError: Return value of sum() must be of the type integer, float returned

?>