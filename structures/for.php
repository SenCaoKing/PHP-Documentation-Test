<?php

/**
 * 流程控制 - for
 */
/**
 * for 循环是 PHP 中最复杂的循环结构。它的行为和 C 语言的相似。for 循环的语法是：
 for (expr1; expr2; expr3)
    statement
 * 第一个表达式 ( expr1 ) 在循环开始前无条件求值（并执行）一次。
 * expr2 在每次循环开始前求值。如果值为 TRUE，则继续循环，执行嵌套的循环语句。如果值为 FALSE，则终止循环。
 * expr3 在每次循环之后被求值（并执行）。
 */
// 每个表达式都可以为空或包括逗号分隔的多个表达式。表达式 expr2 中，所有用逗号分隔的表达式都会计算，但只取最后一个结果。expr2 为空意味着将无限循环下去（和 C 一样，PHP 暗中认为其值为 TRUE）。这可能不像想象中那样没有用，因为经常会希望用有条件的 break 语句来结束循环而不是用 for 的表达式真值判断。

# Example
for ($i =1; $i <= 10; $i++) {
    echo $i; // 12345678910
}

echo '<hr>';

# Example 2
for ($i =1; ; $i++) {
    if ($i > 10) {
        break;
    }
    echo $i; // 12345678910
}

echo '<hr>';

# Example 3
$i = 1;
for (;;) {
    if ($i > 10) {
        break;
    }
    echo $i;
    $i++; // 12345678910
}

echo '<hr>';

# Example 4
for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++); // 12345678910

// PHP 也支持用冒号的 for 循环的替代语法。
/*
for (expr1; expr2; expr3):
    statement;
endfor;
*/

echo '<hr>';

// 数组遍历
/**
 * 此数组将在遍历的过程中改变其中某些单元的值
 */
$people = Array(
    Array('name' => 'Kalle', 'salt' => 856412),
    Array('name' => 'Pierre', 'salt' => 215863),
);

for ($i = 0; $i < count($people); ++$i)
{
    $people[$i]['salt'] = rand(000000, 999999);
}

var_dump($people);

echo '<hr>';

// 以上代码可能执行很慢，因为每次循环时都要计算一遍数组的长度。由于数组的长度始终不变，可以用一个中间变量来储存数组长度以优化而不是不停调用 count();
$people = Array(
    Array('name' => 'Kalle', 'salt' => 856412),
    Array('name' => 'Pierre', 'salt' => 215863),
);
 for ($i = 0, $size = count($people); $i < $size; ++$i)
 {
     $people[$i]['salt'] = rand(000000, 999999);
 }
var_dump($people);

?>