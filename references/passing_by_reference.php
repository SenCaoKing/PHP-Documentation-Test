<?php
/*
 * 引用的解释 - 引用传递
 */

function foo(&$var)
{
    $var++;
}

$a = 5;
foo($a); // $a is 6 here
print_r($a); // 6

/**
 * 以下内容可以通过引用传递：
 *
 * 变量，例如 foo($a)
 * New 语句，例如 foo(new foobar())
 * 从函数中返回的引用，例如:
 */
function &bar()
{
    $a = 5;
    return $a;
}
foo(bar());

/**
 * 任何其它表达式都不能通过引用传递，结果未定义。例如下面引用传递的例子是无效的：
 */
function foo2(&$var)
{
    $var++;
}
function bar2()
{
    $a = 5;
    return $a;
}
foo(bar());

foo($a = 5); // 表达式，不是变量
foo(5); // 导致致命错误