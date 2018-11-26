<?php

/**
 * 流程控制 - do-while
 */
// do-while 循环和 while 循环非常相似，区别在于表达式的值是在每次循环结束时检查而不是开始时。和一般的 while 循环主要的区别是 do-while 的循环语句保证会执行一次（表达式的真值在每次循环结束后检查），然而在一般的 while 循环中就不一定了（表达式真值在循环开始时检查，如果一开始就为 FALSE 则整个循环立即终止）。

// do-while 循环只有一种语法：
$i = 0;
do {
    echo $i;
} while ($i > 0);

echo '<hr>';

// 资深的 C 语言用户可能熟悉另一种不同的 do-while 循环用法，把语句放在 do-while(0) 之中，在循环内部用 break 语句来结束执行循环。以下代码片段示范了此方法：
do {
    if ($i < 5) {
        echo "i is not big enough"; // i is not big enough
        break;
    }
    $i *= $factor;
    if ($i < $minimum_limit) {
        break;
    }
    echo "i is ok";


} while (0);

?>