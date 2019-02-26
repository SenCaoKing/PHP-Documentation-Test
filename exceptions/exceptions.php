<?php
/*
 * 异常处理 - 异常处理
 */

/**
 * 扩展 (extend) PHP 内置的异常处理类
 *
 * 用户可以用自定义的异常处理类来扩展 PHP 内置的异常处理类。以下的代码说明了在内置的异常处理类中，哪些属性和方法在子类中是可访问和可继承的。（以下这段代码只为说明内置异常处理类的结构，它并不是一段有实际意义的可用代码。）
 */

# Example 1 内置的异常处理类
// 见 example1.php

// 如果使用自定义的类来扩展内置异常处理类，并且要重新定义 构造函数 的话，建议同时调用 parent::__construct() 来检查所有的变量是否已被赋值。当对象要输出字符串的时候，可以重载 __toString() 并自定义输出的样式。

/**
 * Note:
 * Exception 对象不能被复制。尝试对 Exception 对象复制 会导致一个 E_ERROR 级别的错误。
 */

# Example 2 扩展 PHP 内置的异常处理类 (PHP5.3.0+)

/**
 * 自定义一个异常处理类
 */
class MyException extends Exception
{
    // 重定义构造器使 message 变为必须被指定的属性
    public function __construct($message, $code = 0, Exception $previous = null) {
        // 自定义的代码

        // 确保所有变量都被正确赋值
        parent::__construct($message, $code, $previous);
    }

    // 自定义字符串输出的样式
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {
        echo "A custom function for this type of exception\n";
    }
}

/**
 * 创建一个用于测试异常处理机制的类
 */
class TestException
{
    public $var;

    const THROW_NONE    = 0;
    const THROW_CUSTOM  = 1;
    const THROW_DEFAULT = 2;

    function __construct($avalue = self::THROW_NONE) {

        switch ($avalue) {
            case self::THROW_CUSTOM:
                // 抛出自定义异常
                throw new MyException('1 is an invalid parameter', 5);
                break;

            case self::THROW_DEFAULT:
                // 抛出默认的异常
                throw new Exception('2 is not allowed as a parameter', 6);
                break;

            default:
                // 没有异常的情况下，创建一个对象
                $this->var = $avalue;
                break;
        }
    }
}

// 例子 1
try {
    $o = new TestException(TestException::THROW_CUSTOM);
} catch (MyException $e) { // 捕获异常
    echo "Caught my exception\n", $e;
    $e->customFunction();
} catch (Exception $e) {   // 捕获异常
    echo "Caught Default Exception\n", $e;
}

// Continue execution
var_dump($o); // Null
echo "\n\n";

// 例子 2
try {
    $o = new TestException(TestException::THROW_DEFAULT);
} catch (MyException $e) { // 不能匹配异常的种类，被忽略

    echo "Caught my exception\n", $e;
    $e->customFunction();
} catch (Exception $e) { // 捕获异常
    echo "Caught Default Exception\n", $e;
}

// 执行后续代码
var_dump($o); // Null
echo "\n\n";


// 例子 3
try {
    $o = new TestException(TestException::THROW_CUSTOM);
} catch (Exception $e) { // 捕获异常
    echo "Default Exception caught\n", $e;
}

// 执行后续代码
var_dump($o); // Null
echo "\n\n";


// 例子 4
try {
    $o = new TestException();
} catch (Exception $e) { // 没有异常，被忽略
    echo "Default Exception caught\n", $e;
}

// 执行后续代码
var_dump($o); // TestException
echo "\n\n";

echo "<br/>****************************************<br/>";

/**
 * Define a custom exception class
 */
class MyException2 extends Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0) {
        // some code

        // make sure everything is assigned properly
        parent::__construct($message, $code);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message()}\n";
    }

    public function customFunction() {
        echo "A custom function for this type of exception\n";
    }
}


# Example 3 Throwing an Exception
function inverse($x) {
    if(!$x) {
        throw new Exception('Division by zero.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo "Caught exception: ", $e->getMessage(), "\n";
}

// Continue execution
echo "Hello World\n";
/**
 * Output:
 * 0.2
 * Caught exception: Division by zero.
 * Hello World
 */

echo "<br/>****************************************<br/>";

# Example 4 Exception handling with a finally block
function inverse2($x) {
    if (!$x) {
        throw new Exception('Division by zero.');
    }
    return 1/$x;
}

try {
    echo inverse2(5) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
} finally {
    echo "First finally.\n";
}
/**
 * Output:
 * 0.2
 * First finally.
 */

try {
    echo inverse2(0) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
} finally {
    echo "Second finally.\n";
}
/**
 * Output:
 * Caught exception: Division by zero.
 * Second finally.
 */

// Continue execution
echo "Hello World\n";
/**
 * Hello World
 */

echo "<br/>****************************************<br/>";

# Example 5 Nested Exception
class MyException3 extends Exception { }

class Test {
    public function testing() {
        try {
            try {
                throw new MyException3('foo!');
            } catch (MyException3 $e) {
                // rethrow it
                throw $e;
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
}

$foo = new Test;
$foo->testing();
/**
 * Output:
 * string 'foo!' (length=4)
 */
