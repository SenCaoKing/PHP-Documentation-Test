<?php

/**
 * 流程控制 - while
 */

/**
 * while 循环是 PHP 中最简单的循环类型。它与 C 语言中的 while 表现地一样。while 语句的基本格式是：
 * while (expr)
 *      statement
 */
// while 语句的含意很简单，它告诉 PHP 只要 while 表达式的值为 TRUE 就重复执行嵌套中的循环语句。表达式的值在每次开始循环时检查，所以即使这个值在循环语句中改变了，语句也不会停止执行，直到本次循环结束。有时候如果 while 表达式的值一开始就是 FALSE，则循环语句一次都不会执行。

# Example 1
$i = 1;
while ($i <= 10) {
    echo $i++; // 12345678910
}

echo '<hr>';

# Example 2
$i = 1;
while ($i <= 10) :
    print $i;
    $i ++;
    endwhile; // 12345678910



?>