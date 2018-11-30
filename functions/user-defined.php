<?php

/*
 * 函数 - 用户自定义函数
 */
// 一个函数可由以下的语法来定义：

# Example 1 展示函数用途的伪代码
function foo($arg_1, $arg_2, /* ..., */ $arg_n)
{
    echo "Example function.\n";
    return $retval;
}

// 任何有效的 PHP 代码都有可能出现在函数内部，甚至包括其它函数和类定义。

// 函数名和 PHP 中的其它标识符命名规则相同。有效的函数名以字母或下划线打头，后面跟字母，数字或下划线。可以用正则表达式表示为：[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*。

// 函数无需在调用之前被定义，除非是下面的两个例子中函数是有条件而被定义时。

// 当一个函数是有条件被定义时，必须在调用函数之前定义。

# Example 2 有条件的函数
$makefoo = true;

/**
 * 不能在此处调用 foo_1() 函数，因为它还不存在，但可以调用 bar() 函数。
 */

bar();

if ($makefoo) {
    function foo_1()
    {
        echo "I don't exist until program execution reaches me.\n";
    }
}

/**
 * 现在可以安全调用函数 foo_1() 了，因为 $makefoo 值为真。
 */

if ($makefoo) foo_1();

function bar()
{
    echo "I exist immediately upon program start.\n";
}
/**
 * Output: I exist immediately upon program start. I don't exist until program execution reaches me.
 */

echo '<hr>';

# Example 3 函数中的函数
function foo_2()
{
    function bar_1()
    {
        echo "I don't exist until foo() is called.\n";
    }
}

/* 现在还不能调用 bar() 函数，因为它还不存在。 */

foo_2();

/* 现在可以调用 bar() 函数了，因为 foo() 函数的执行使得 bar() 函数变为已定义的函数。 */

bar_1();
/**
 * Output: I don't exist until foo() is called.
 */

echo '<hr>';

// PHP 中的所有函数和类都具有全局作用域，可以定义在一个函数之内而在之外调用，反之亦然。

// PHP 不支持函数重载，也不可能取消定义或者重定义已声明的函数。

/**
 * Note:
 * 函数名是大小写无关的，不过在调用函数的时候，使用其在定义时相同的形式是个好习惯。
 */

// PHP 的函数支持 可变数量的参数 和 默认参数。

// 在 PHP 中可以调用递归函数。
function recursion($a)
{
    if ($a < 20) {
        echo "$a\n";
        recursion($a + 1);
    }
}


recursion(10); // 10 11 12 13 14 15 16 17 18 19

/**
 * Note:
 * 但是要避免 递归函数/方法 调用超过 100-200 层，因为可能会使堆栈崩溃从而使当前脚本终止。无限递归可视为编程错误。
 */


?>