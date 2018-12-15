<?php
/*
 * 类与对象 - 对象接口
 */

/**
 * 使用接口 (interface)，可以指定某个类必须实现哪些方法，但不需要定义这些方法的具体内容。
 *
 * 接口是通过 interface 关键字来定义的，就像定义一个标准的类一样，但其中定义所有的方法都是空的。
 *
 * 接口中定义的所有方法都必须是公有，这是接口的特性。
 */

/* 实现 (implements) */

/**
 * 要实现一个接口，使用 implements 操作符。类中必须实现接口中定义的所有方法，否则会报一个致命错误。类可以实现多个接口，用逗号来分割多个接口的名称。
 */

/**
 * Note：
 * 实现多个接口时，接口中的方法不能有重名。
 */

/**
 * Note：
 * 接口也可以继承，通过使用 extends 操作符。
 */

/**
 * Note：
 * 类要实现接口，必须使用和接口中所定义的方法完全一致的方式。否则会导致致命错误。
 */

/* 常量 */

/**
 * 接口中也可以定义常量。接口常量 和 类常量 的使用完全相同，但是不能被子类或子接口所覆盖。
 */

# Example 1 接口示例
// 声明一个 'iTemplate'接口
interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// 实现接口
// 下面的写法是正确的
class Template implements iTemplate
{
    private $vars = array();

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }

    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }

        return $template;
    }
}

// 下面的写法是错误的，会报错，因为没有实现 getHtml():
// Fatal error: Class BadTemplate contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (iTemplate::getHtml)
/*
class BadTemplate implements iTemplate
{
    private $vars = array();

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
}
*/

# Example 2 可扩充的接口
interface a
{
    public function foo();
}

interface b extends a
{
    public function baz(Baz $baz);
}

// 正确写法
class c implements b
{
    public function foo()
    {
    }

    public function baz(Baz $baz)
    {
    }
}

// 错误写法会导致一个致命错误
/*
class d implements b
{
    public function foo()
    {
    }

    public function baz(Foo $foo) // 应为: Baz $foo
    {
    }
}
*/

# Example 3 继承多个接口
interface a2
{
    public function foo();
}

interface b2
{
    public function bar();
}

interface c2 extends  a2, b2
{
    public function baz();
}

class d2 implements c2
{
    public function foo()
    {
    }

    public function bar()
    {
    }

    public function baz()
    {
    }
}

# Example 4 使用接口常量
interface a3
{
    const b = 'Interface constant';
}

// 输出接口常量
echo a3::b; // Output: Interface constant

// 错误写法，因为常量不能被覆盖。接口常量的概念和类常量是一样的。
/*
class b3 implements a3
{
    const b = 'Class constant';
}
*/

// 接口加上类型约束，提供了一种很好的方式来确保某个对象包含有某些方法。参见 instanceof 操作符和 类型约束。


?>