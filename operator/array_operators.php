<?php

// 数组运算符
/**
 * 例子             名称             结果
 * $a + $b         联合             $a 和 $b 的联合。
 * $a == $b        相等             如果 $a 和 $b 具有相同的 键/值对 则为 TRUE。
 * $a === $b       全等             如果 $a 和 $b 具有相同的 键/值对 并且顺序和类型都相同则为 TRUE。
 * $a != $b        不等             如果 $a 不等于 $b 则为 TRUE。
 * $a <> $b        不等             如果 $a 不等于 $b 则为 TRUE。
 * $a !== $b       不全等           如果 $a 不全等于 $b 则为 TRUE。
 */

// + 运算符把右边的数组元素附加到左边的数组后面，两个数组中都有的键名，则只用左边数组中的，右边的被忽略。

$a = array("a" => "apple", "b" => "banana");
$b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");

$c = $a + $b; // Union of $a and $b
echo "Union of \$a and \$b: \n";
var_dump($c); // array("a" => "apple", "b" => "banana", "c" =>"cherry")

$c = $b + $a; // Union of $b and $a
echo "Union of \$b and \$a: \n";
var_dump($c); // array("a" => "pear", "b" => "strawberry", "c" => "cherry")

$a += $b; // Union of $a += $b is $a and $b
echo "Union of \$a += \$b: \n";
var_dump($a); // array("a" => "apple", "b" => "banana", "c" => "cherry")

// 数组中的单元如果具有相同的键名和值则比较时相等。
# Example 1 比较数组
$a = array("apple", "banana");
$b = array(1 => "banana", "0" => "apple");
var_dump($a == $b);  // true
var_dump($a === $b); // false

?>