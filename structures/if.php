<?php

/**
 * 流程控制 - if
 */
// if 结构是很多语言包括 PHP 在内最重要的特性之一，它允许按照条件执行代码片段。 PHP 的 if 结构和 C 语言相似：
/*
if(expr)
    statement
*/

$a = 8;
$b = 6;

if($a > $b) // 满足条件，执行下面的语句
    echo "a is bigger than b"; // a is bigger than b

echo '<hr>';

if($a >$b){
    echo "a is bigger than b"; // a is bigger than b
    $b = $a;
    echo "<br>";
    echo $b; // 8
}

// if 语句可以无限层地嵌套在其它 if 语句中，这给程序的不同部分的条件执行提供了充分的弹性。


?>