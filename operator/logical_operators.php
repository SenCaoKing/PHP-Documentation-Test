<?php

// 逻辑运算符

/**
 * 例子          名称             结果
 * $a and $b    And(逻辑与)      TRUE，如果 $a 和 $b 都为 TRUE。
 * $a or $b     Or(逻辑或)       TRUE，如果 $a 或 $b 任一为 TRUE。
 * $a xor $b    Xor(逻辑异或)    TRUE，如果 $a 或 $b 任一为 TRUE，但不同时是。
 * !$a          Not(逻辑非)      TRUE，如果 $a 不为 TRUE。
 * $a && $b     And(逻辑与)      TRUE，如果 $a 和 $b 都为 TRUE。
 * $a || $b     Or(逻辑或)       TRUE，如果 $a 或 $b 任一为 TRUE。
 */
// "与"和"或"有两种不同形式运算符的原因是它们运算的优先级不同。

# Example 1 逻辑运算符示例
// -------------------------
// foo() 根本没机会被调用，被运算符"短路"了
$a = (false && foo());
$b = (true || foo());
$c = (false and foo());
$d = (true or foo());

// -------------------------
// "||" 比 "or" 的优先极高

// 表达式 (false || true) 的结果被赋给 $e
// 等同于：($e = (false || true))
$e = false || true; // true

// 常量 false 被赋给 $f，true 被忽略
// 等同于：(($f = false) or true)
$f = false or true; // false

var_dump($e, $f); // true false

// -------------------------
// "&&" 比 "and" 的优先级高

// 表达式 (true && false) 的结果被赋给 $g
// 等同于：($g = (true && false))
$g = true && false;   // false

// 常量 true 被赋给 $h，false 被忽略
// 等同于：(($h = true) and false)
$h = true and false; // true

var_dump($g, $h); // false true

// -------------------------

?>