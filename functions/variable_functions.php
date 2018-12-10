<?php

/*
 * 函数 - 可变函数
 */
// PHP 支持可变函数的概念。这意味着如果一个变量名后有圆括号，PHP 将寻找与变量的值同名的函数，并且尝试执行它。可变函数可以用来实现包括回调函数，函数表在内的一些用途。

// 可变函数不能用于例如 echo、print、unset()、isset()、empty()、include、require 以及类似的语言结构。需要使用自己的包装函数来将这些结构用作可变函数。

# Example 1 可变函数示例
function foo() {
    echo "In foo()<br />\n";
}

function bar($arg = '') {
    echo "In bar(); argument was '$arg'.<br />\n";
}

function echoit($string)
{
    echo $string;
}

$func = 'foo';
$func(); // This calls foo() [Outputs: In foo()]

echo '---------'.'<br />';

$func = 'bar';
$func('test'); // This calls bar() [Outputs: In bar(); argument was 'test'.]

echo '---------'.'<br />';

$func = 'echoit';
$func('test'); // This calls echoit() [Outputs: test]

echo '<hr>';

// 也可以用可变函数的语法来调用一个对象的方法：

# Example 2 可变方法范例
class Foo
{
    function Variable()
    {
        $name = 'Bar';
        $this->$name(); // This calls the Bar() method
    }

    function Bar()
    {
        echo "This is Bar";
    }
}

$foo = new Foo();
$funcname = "Variable";
$foo->$funcname(); // This calls $foo->Variable() [Outputs: This is Bar]

echo '<hr>';

// 当调用静态方法时，函数调用要比静态属性优先：

# Example 3 Variable 方法和静态属性示例：
class Foo1
{
    static $variable = 'static property';
    static function Variable()
    {
        echo "Method Variable called";
    }
}

echo Foo1::$variable; // This prints 'static property'. It does need a $variable in  this scope. [Outputs: static property]

echo '<br />';

$variable = "Variable";
Foo1::$variable(); // This calls $foo->Variable() reading $variable in this scope. [Outputs: Method Variable called]

echo '<hr>';

// As of PHP5.4.0, you can call any callable stored in a variable.

# Example 4 Complex callables
class Foo2
{
    static function bar()
    {
        echo "bar\n";
    }
    function baz()
    {
        echo "baz\n";
    }
}

$func = array("Foo2", "bar");
$func(); // prints "bar"
$func = array(new Foo2(), "baz");
$func(); // prints "baz"
$func = "Foo2::bar";
$func(); // prints "bar" as of PHP 7.0.0; prior, it raised a fatal error

?>