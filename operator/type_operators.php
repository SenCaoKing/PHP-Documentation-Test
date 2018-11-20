<?php

// 类型运算符
// instanceof 用于确定一个 PHP 变量是否属于某一类 class 的实例:
# Example 1 对类使用 instanceof
class MyClass
{
}

class NotMyClass
{
}
$a = new MyClass;

var_dump($a instanceof  MyClass);    // true
var_dump($a instanceof  NotMyClass); // false

echo '<hr>';

// instanceof 也可用来确定一个变量是不是继承自某一父类的子类的实例：
# Example 2 对继承类使用 instanceof
class ParentClass
{
}

class MyClass2 extends ParentClass
{
}

$a = new MyClass2;

var_dump($a instanceof MyClass2);    // true
var_dump($a instanceof ParentClass); // true

echo '<hr>';

// 检查一个对象是否不是某个类的实例，可以使用逻辑运算符 not。
# Example 3 使用 instanceof 检查对象不是某个类的实例
class MyClass3
{
}

$a = new MyClass3;
var_dump(!($a instanceof stdClass)); // true

echo '<hr>';

// instanceof 也可用于确定一个变量是不是实现了某个接口的对象的实例：
# Example 4 对接口使用 instanceof
interface MyInterface
{
}

class MyClass4 implements MyInterface
{
}

$a = new MyClass4;
var_dump($a instanceof MyClass4);    // true
var_dump($a instanceof MyInterface); // true

echo '<hr>';

// 虽然 instanceof 通常直接与类名一起使用，但也可以使用对象或字符串变量：
# Example 5 对其它变量使用 instanceof
interface MyInterface1
{
}

class MyClass5 implements MyInterface1
{
}

$a = new MyClass5;
$b = new MyClass5;
$c = 'MyClass5';
$d = 'NotMyClass1';
var_dump($a instanceof $b); // treu [$b is an object of class MyClass5]
var_dump($a instanceof $c); // true [$c is a string 'MyClass5']
var_dump($a instanceof $d); // false [$d is a string 'NotMyClass1']


echo '<hr>';


echo '<hr>';


?>