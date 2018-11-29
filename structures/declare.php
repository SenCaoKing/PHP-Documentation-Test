<?php

/**
 * 流程控制 - declare
 */
// declare 结构用来设定一段代码的执行指令。declare 的语法和其它流程控制相似：
/**
 declare (directive)
        statement
 *
 * directive 部分允许设定 declare 代码段的行为。目前只认识两个指令：ticks 以及 encoding。
 *
 * Note：encoding 是 PHP5.3.0 新增指令。
 *
 * declare 代码段中的 statement 部分将被执行——怎样执行以及执行中有什么副作用出现取决于 directive 中设定的指令。
 *
 * declare 结构也可用于全局范围，影响到其后的所有代码（但如果有 declare 结构的文件被其它文件包含，则对包含它的父文件不起作用）。
 */

// these are the same:

// you can use this:
declare (ticks=1) {
    // entire script here
}

// or you can use this:
declare(ticks=1);
// entire script here

echo '<br />----------<br />';

/* Ticks */
// Tick（时钟周期）是一个在 declare 代码段中解释器每执行 N 条可计时的低级语句就会发生的事件。N 的值是在 declare 中的 directive 部分用 ticks= N 来指定的。

// 不是所有语句都可计时。通常条件表达式和参数表达式都不可计时。

// 在每个 tick 中出现的事件是由 register_tick_function() 来指定的。更多细节见下面的例子。注意每个 tick 中可以出现多个事件。

# Example 1 Tick 的用法示例
/*
declare(ticks=1);

// A function called on each tick event
function tick_handler()
{
    echo "tick_handler() called\n<br />";
}

register_tick_function('tick_handler');

$a = 1;

if ($a > 0) {
    $a += 2;
    print($a).'<br>';
}

/*
tick_handler() called
tick_handler() called
tick_handler() called
3
tick_handler() called
*/

# Example 2 Ticks 的用法示例
function tick_handler()
{
    echo "tick_handler() called\n<br />";
}

$a = 1;
tick_handler();

if ($a > 0) {
    $a += 2;
    tick_handler();
    print($a).'<br />';
    tick_handler();
}
tick_handler();
/*
tick_handler() called
tick_handler() called
3
tick_handler() called
tick_handler() called
*/

/* Encoding */
// 可以用 encoding 指令来对每段脚本指定其编码方式。

# Example 3 对脚本指定编码方式
// declare(encoding='ISO-8859-1');


// Caution 当和命名空间结合起来时 declare 的唯一合法语法是 declare(encoding='...');，其中 ... 是编码的值。而 declare(encoding='...') {} 将在与命名空间结合时产生解析错误。

// 在 PHP 5.3 中除非在编译时指定了 --enable-zend-multibyte，否则 declare 中的 encoding 值会被忽略。

// 注意除非用 phpinfo()，否则 PHP 不会显示出是否在编译时指定了 --enable-zend-multibyte。


?>