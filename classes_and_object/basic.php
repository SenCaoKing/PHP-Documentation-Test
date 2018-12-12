<?php

/*
 * 类与对象 - 基本概念
 */

/* class */
// 每个类的定义都以关键字 class 开头，后面跟着类名，后面跟着一对花括号，里面包含有类的属性与方法的定义。

// 类名可以是任何非 PHP保留字 的合法标签。一个合法类名以字母或下划线开头，后面跟着若干字母，数字或下划线。以正则表达式表示为：[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*。

// 一个类可以包含有属于自己的 常量、变量(成为"属性")以及函数(称为"方法")。

# Example 1 简单的类定义
class SimpleClass
{
    // 声明属性
    public $var = 'a default value';

    // 声明方法
    public function displayVar() {
        echo $this->var;
    }
}

// 当一个方法在类定义内部被调用时，有一个可用的伪变量 $this。$this 是一个到主叫对象的引用（通常是该方法所从属的对象，但如果是从第二个对象 静态 调用时也可能是另一个对象）。

# Example 2 $this 伪变量的示例：

// We're assuming that error_reporting is disabled for this example;otherwise the following code would trigger deprecated and strict notices,respectively,depending on the PHP version.
class A
{
    function foo()
    {
        if (isset($this)) {
            echo '$this is defined (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this is not defined.\n";
        }
    }
}

class B
{
    function bar()
    {
        A::foo();
    }
}

$a = new A();
$a->foo();

A::foo();

$b = new B();
$b->bar();

B::bar();

/**
 * Output of the above example in PHP5:
 * $this is defined (A)
 * $this is not defined.
 * $this is defined (B)
 * $this is not defined.
 */

/**
 * Output of the above example in PHP7:
 * $this is defined (A)
 * $this is not defined.
 * $this is not defined.
 * $this is not defined.
 */

echo '<hr>';

/* new */
// 要创建一个类的实例，必须使用 new 关键字。当创建新对象时该对象总是被赋值，除非该对象定义了 构造函数 并且在出错时抛出了一个 异常。类应在被实例化之前定义（某些情况下则必须这样）。

// 如果在 new 之后跟着的是一个包含有类名的字符串 string，则该类的一个实例被创建。如果该类属于一个命名空间，则必须使用其完整名称。

# Example 3 创建实例
$instance = new SimpleClass();

// 也可以这样做：
$className = 'A';
$instance = new $className; // A()

// 在类定义内部，可以用 new self 和 new parent 创建新对象。

// 当把一个对象已经创建的实例赋给一个新变量时，新变量会访问同一个实例，就和用该对象赋值一样。此行为和给函数传递入实例时一样。可以用 克隆 给一个已创建的对象建立一个新实例。

# Example 4 对象赋值
$instance = new SimpleClass();

$assigned = $instance;
$reference = & $instance;

$instance->var = '$assigned will have this value';

$instance = null;

var_dump($instance);  // Outputs: NULL
var_dump($reference); // Outputs: NULL
var_dump($assigned);
/**
 * Outputs:
 * object(SimpleClass)[3]
public 'var' => string '$assigned will have this value' (length=30)
 */

echo '<hr>';

// PHP5.3.0 引进了两个新方法来创建一个对象的实例：

# Example 5 创建新对象
class Test
{
    static public function getNew()
    {
        return new static;
    }
}

class Child extends Test
{}

$obj1 = new Test();
$obj2 = new $obj1;
var_dump($obj1 !== $obj2); // Output: boolean true

$obj3 = Test::getNew();
var_dump($obj3 instanceof Test); // Output: boolean true

$obj4 = Child::getNew();
var_dump($obj4 instanceof Child); // Output: boolean true

echo '<hr>';

// PHP5.4.0 起，可以通过一个表达式来访问新创建对象的成员：

# Example 6 访问新创建对象的成员：
echo (new DateTime())->format('Y'); // Output: 2018

echo '<hr>';

/* Properties and methods */

// Class properties and methods live in separate "namespaces", so it is possible to have a property and a method with the same name. Referring to both a property and a method has the same notation, and whether a property will be accessed or a method will be called, solely depends on the context, i.e. whether the usage is a variable access or a function call.

# Example 7 Property access vs. method call
class Foo
{
    public $bar = 'property';

    public function bar() {
        return 'method';
    }
}

$obj = new Foo();
echo $obj->bar, PHP_EOL, $obj->bar(), PHP_EOL; // Output: property method

echo '<hr>';

// That means that calling an anonymous function which has been assigned to a property is not directly possible. Instead the property has to be assigned to a variable first, for instance. As of PHP 7.0.0 it is possible to call such a property directly by enclosing it in parentheses.

# Example 8 Calling an anonymous function stored in a property
class Foo1
{
    public $bar;

    public function __construct() {
        $this->bar = function() {
            return 42;
        };
    }
}

$obj = new Foo1();

// as of PHP5.3.0:
$func = $obj->bar;
echo $func(), PHP_EOL; // Output: 42

// alternatively, as of PHP7.0.0
echo ($obj->bar)(), PHP_EOL; // Output: 42

echo '<hr>';

/* entends */
// 一个类可以在声明中用 extends 关键字继承另一个类的方法和属性。PHP 不支持多重继承，一个类只能继承一个基类。

// 被继承的方法和属性可以通过用同样的名字重新声明被覆盖。但是如果父类定义方法时使用了 final，则该方法不可被覆盖。可以通过 parent:: 来访问被覆盖的方法或属性。

// 当覆盖方法时，参数必须保持一致否则 PHP 将发出 E_STRICT 级别的错误信息。但构造函数例外，构造函数可在被覆盖时使用不同的参数。

# Example 9 简单的类继承
class ExtendClass extends SimpleClass
{
    function displayVar()
    {
        echo "Extending class\n";
        parent::displayVar();
    }
}

$extended = new ExtendClass();
$extended->displayVar(); // Output: Extending class a default value

echo '<hr>';

/* ::class */
// 自 PHP5.5 起，关键词 class 也可用于类名的解析。使用 ClassName::class 你可以获取一个字符串，包含了类 ClassName 的完全限定名称。这对使用了 命名空间 的类尤其有用。

# Example 10 类名的解析
// 见 basic_test.php



?>