<?php
/*
 * 类与对象 - 访问控制（可见性）
 */

// 对属性或方法的访问控制，是通过在前面添加关键字 public(公有)，protected(受保护) 或 private(私有) 来实现的。被定义为公有的类成员可以在任何地方被访问。被定义为受保护的类成员则可以被其自身以及其子类和父类访问。被定义为私有的类成员则只能被其定义所在的类访问。

/* 属性的访问控制 */

// 类属性必须定义为公有，受保护，私有之一。如果用 var 定义，则被视为公有。

# Example 1 属性声明
/**
 * Define MyClass
 */
class MyClass
{
    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}

$obj = new MyClass();
echo $obj->public; // 这行能被正常执行 [Output: public]
// echo $obj->protected; // 这行会产生一个致命错误
// echo $obj->private; // 这行也会产生一个致命错误

echo '<br />';

$obj->printHello(); // 输出 PublicProtectedPrivate

echo '<br />----------<br />';

/**
 * Define MyClass2
 */
class MyClass2 extends MyClass
{
    // 可以对 public 和 protected 进行重定义，但 private 而不能
    protected $protected = 'Protected2';

    function  printHello()
    {
        echo $this->public;
        echo $this->protected;
        // echo $this->private;
    }
}

$obj2 = new MyClass2();
echo $obj->public; // 这行能被正常执行 [Output: public]
// echo $obj->private; // 未定义 private
// echo $obj->protected; // 这行会产生一个致命错误

echo '<br />';

$obj2->printHello(); // 输出： PublicProtected2Undefined

/**
 * Note：
 * 为了兼容性考虑，在 PHP4 中使用 var 关键字对变量进行定义的方法在 PHP5 中仍然有效（只是作为 public 关键字的一个别名）。在 PHP5.1.3 之前的版本，该语法会产生一个 E_STRICT 警告。
 */

echo '<hr>';

/* 方法的访问控制 */

// 类中的方法可以被定义为公有、私有或受保护。如果没有设置这些关键字，则该方法默认为公有。

# Example 2 方法声明
/**
 * Define MyClass3
 */
class MyClass3
{
    // 声明一个公有的构造函数
    public function __construct() { }

    // 声明一个公有的方法
    public function MyPublic() { }

    // 声明一个受保护的方法
    protected function MyProtected() { }

    // 声明一个私有的方法
    private function MyPrivate() { }

    // 此方法为公有
    function Foo()
    {
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate();
    }
}

$myclass = new MyClass3;
$myclass->MyPublic(); // 这行能被正常执行
// $myclass->MyProtected(); // 这行会产生一个致命错误
// $myclass->MyPrivate(); // 这行会产生一个致命错误
$myclass->Foo(); // 公有，受保护，私有都可以执行

/**
 * Define MyClass4
 */
class MyClass4 extends MyClass3
{
    function Foo2()
    {
        $this->MyPublic();
        $this->MyProtected();
        // $this->MyPrivate(); // 这行会产生一个致命错误
    }
}

$myclass2 = new MyClass4();
$myclass2->MyPublic(); // 这行能被正常执行
// $myclass2->Foo2(); // 公有的和受保护的都可执行，但私有的不行

class Bar
{
    public function test() {
        $this->testPrivate();
        $this->testPublic();
    }

    public function testPublic() {
        echo "Bar::testPublic\n";
    }

    private function testPrivate() {
        echo "Bar::testPrivate\n";
    }
}

class Foo extends Bar
{
    public function testPublic() {
        echo "Foo::testPublic\n";
    }

    private function testPrivate() {
        echo "Foo::testPrivate\n";
    }
}

$myFoo = new Foo();
$myFoo->test(); // Output: Bar::testPrivate Foo::testPublic

echo '<hr>';

/* 其它对象的访问控制 */

// 同一个类的对象即使不是用一个实例也可以互相访问对方的私有与受保护成员。这是由于在这些对象的内部具体实现的细节都是已知的。

# Example 3 访问同一个对象类型的私有成员
class Test
{
    private $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    private function bar()
    {
        echo "Accessed the private method.";
    }

    public function baz(Test $other)
    {
        // we can change the private property:
        $other->foo = 'hello';
        var_dump($other->foo);

        // we can also call the private method:
        $other->bar();
    }
}

$test = new Test('test');

$test->baz(new Test('other'));
/**
 * Output：
 * string 'hello' (length=5)
 * Accessed the private method.
 */


?>