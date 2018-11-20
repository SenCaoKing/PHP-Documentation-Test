<?php

// 字符串运算符
// 有两个字符串 (string) 运算符。第一个是连接运算符(".")，它返回其左右参数连接后的字符串。第二个是连接赋值运算符(".=")，它将右边参数附加到左边的参数之后。

$a = "Hello ";
$b = $a . "World!";
var_dump($b); // Hello World! [now $b contains "Hello World!"]

$a = "Hello ";
$a .= "World!";
var_dump($a); // Hello World! [now $a contains "Hello World!"]


?>