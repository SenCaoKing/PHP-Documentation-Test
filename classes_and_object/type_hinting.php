<?php
/*
 * 类与对象 - 类型约束
 */

/**
 * PHP5 可以使用类型约束。函数的参数可以指定必须为对象（在函数原型里面指定类的名字），接口，数组（PHP5.1 起）或者 callable (PHP5.4 起)。不过如果使用 NULL 作为参数的默认值，那么在调用函数的时候依然可以使用 NULL 作为实参。
 *
 * 如果一个类或接口指定了类型约束，则其所有的子类或实现也如此。
 *
 * 类型约束不能用于标量类型如 int 或 string。Traits 也不允许。
 */

# Example 1 类型约束示例
// 如下面的类
class MyClass
{
    /**
     * 测试函数
     * 第一个参数必须为 OtherClass 类的一个对象
     */
    public function test(OtherClass $otherclass) {
        echo $otherclass->var;
    }

    /**
     * 另一个测试函数
     * 第一个参数必须为数组
     */
    public function test_array(array $input_array) {
        print_r($input_array);
    }


    /**
     * 第一个参数必须为递归类型
     */
    public function test_interface(Traversable $iterator) {
        echo get_class($iterator);
    }

    /**
     * 第一个参数必须为回调类型
     */
    public function test_callable(callable $callback, $data) {
        call_user_func($callback, $data);
    }
}

// OtherClass 类定义
class OtherClass {
    public $var = 'Hello World';
}

// 函数调用的参数与定义的参数类型不一致时，会抛出一个可捕获的致命错误。

// 两个类的对象
$myclass = new MyClass;
$otherclass = new OtherClass;

// 致命错误：第一个参数必须是 OtherClass 类的一个对象
// $myclass->test('hello');

// 致命错误：第一个参数必须为 OtherClass 类的一个实例
$foo = new stdClass;
// $myclass->test($foo);

// 致命错误：第一个参数不能为 null
// $myclass->test(null);

// 致命错误：第一个参数必须为数组
// $myclass->test_array('a string');

// 正确 Output：Array ( [0] => a [1] => b [2] => c )
$myclass->test_array(array('a', 'b', 'c'));

// 正确 Output：ArrayObject
$myclass->test_interface(new ArrayObject(array()));

// 正确 Output：int 1
$myclass->test_callable('var_dump', 1);

echo '<hr>';

// 类型约束不只是用在类的成员函数里，也能使用在函数里：

// 如下面的类
class MyClass2 {
    public $var = "Hello World";
}

/**
 * 测试函数
 * 第一个参数必须是 MyClass2 类的一个对象
 */
function MyFunction (MyClass2 $foo) {
    echo $foo->var;
}

// 正确
$myclass = new MyClass2;
MyFunction($myclass); // Output: Hello World

echo '<hr>';

// 类型约束允许 NULL 值：

/* 接受 NULL 值 */
function test(stdClass $obj = NULL) {

}

test(null);
test(new stdClass());



?>