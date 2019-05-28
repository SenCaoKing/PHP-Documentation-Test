<?php
/*
 * 引用的解释 - 取消引用
 */

$a = 1;
$b = &$a;
var_dump($a); // 1
var_dump($b); // 1
unset($a);
var_dump($a); // Notice: Undefined variable: a
var_dump($b); // 1