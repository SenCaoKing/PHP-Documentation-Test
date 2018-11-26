<?php

/**
 * 流程控制 - else
 */
// else 延伸了 if 语句，可以在 if 语句中的表达式的值为 false 时执行语句。

$a = 6;
$b = 8;
if ($a > $b) {
    echo 'a is greater than b';
} else {
    echo "a is NOT greater than b"; // a is NOT greater than b
}

// else 语句仅在 if 以及 elseif（如果有的话）语句中的表达式的值为 FALSE 时执行。

?>