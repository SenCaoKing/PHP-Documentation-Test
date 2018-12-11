<?php

/*
 * 函数 - 匿名函数
 */
// 匿名函数(Anonymous functions)，也叫闭包函数(closures)，允许临时创建一个没有指定名称的函数。最经常用作回调函数(callback)参数的值。当然，也有其它应用的情况。

// 匿名函数目前是通过 Closure 类来实现的。

# Example 1 匿名函数示例
echo preg_replace_callback('~-([a-z])~', function ($match) {
    return strtoupper($match[1]);
}, 'hello-world'); // Outputs: helloWorld

echo '<hr>';

// 闭包函数也可以作为变量的值来使用。PHP 会自动把此种表达式转换成内置类 Closure 的对象实例。把一个 closure 对象赋值给一个变量的方式与普通变量赋值的语法是一样的，最后也要加上分号 :

# Example 2 匿名函数变量赋值示例
$greet = function($name)
{
    printf("Hello %s\r\n", $name);
};

$greet('World'); // Outputs: Hello World

echo '<br />';

$greet('PHP'); // Outputs: Hello PHP

echo '<hr>';

// 闭包可以从父作用域中继承变量。任何此类变量都应该用 use 语言结构传递进去。 PHP7.1起，不能传入此类变脸：superglobals、$this 或者和参数重名。

# Example 3 从父作用域继承变量
$message = 'hello';

// 没有 use
$example = function () {
    var_dump($message);
};
echo $example();
/**
 * Outputs:
 * Notice: Undefined variable: message
 * NULL
 */

echo '----------';

// 继承 $message
$example = function () use ($message) {
    var_dump($message);
};
echo $example(); // Outputs: string 'hello' (length=5)

echo '----------';

// Inherited variable's value is from when the function is defined, not when called
$message = 'world';
echo $example(); // Outputs: string 'hello' (length=5)

echo '----------';

// Reset message
$message = 'hello';

// Inherit by-reference
$example = function () use (&$message) {
    var_dump($message);
};
echo $example(); // Outputs: string 'hello' (length=5)

echo '----------';

// The changed value in the parent scope is reflected inside the function call
$message = 'world';
echo $example(); // Outputs: string 'world' (length=5)

echo '----------';

// Closures can also accept regular arguments
$example = function ($arg) use ($message) {
    var_dump($arg . ' ' . $message);
};
$example("hello"); // Outputs: string 'hello world' (length=11)

echo '<hr>';

// 这些变量都必须在函数或类的头部声明。从父作用域中继承变量与使用全局变量是不同的。全局变量存在于一个全局的范围，无论当前在执行的是哪个函数。而闭包的父作用域是定义该闭包的函数（不一定是调用它的函数）。示例如下：

# Example 4 Closures 和作用域

// 一个基本的购物车，包括一些已经添加的商品和每种商品的数量。
// 其中有一个方法用来计算购物车中所有商品的总价格，该方法使用了一个 closure 作为回调函数。
class Cart
{
    const PRICE_BUTTER = 1.00;
    const PRICE_MILK   = 3.00;
    const PRICE_EGGS   = 6.95;

    protected $products = array();

    public function add($product, $quantity)
    {
        $this->products[$product] = $quantity;
    }

    public function getQuantity($product)
    {
        return isset($this->products[$product]) ? $this->products[$product] : FALSE;
    }

    public function getTotal($tax)
    {
        $total = 0.00;

        $callback =
            function ($quantity, $product) use ($tax, &$total)
            {
                $pricePerItem = constant(__CLASS__ . "::PRICE_" . strtoupper($product));
                $total += ($pricePerItem * $quantity) * ($tax + 1.0);
            };
        array_walk($this->products, $callback);
        return round($total, 2);
    }
}

$my_cart = new Cart;

// 往购物车里添加条目
$my_cart->add('butter', 1);
$my_cart->add('milk', 3);
$my_cart->add('eggs', 6);

// 打出总价格，其中有 5% 的销售税.
print($my_cart->getTotal(0.05)) . "\n"; // 最后机构是 54.29

echo '<hr>';

# Example 5 Automatic binding of $this
class Test
{
    public function testing()
    {
        return function() {
            var_dump($this);
        };
    }
}

$object = new Test;
$function = $object->testing();
$function(); // Outputs: object(Test)[4]

/**
 * 以上例程在 PHP5.3 中的输出：
 * Notice: Undefined variable: this
 * NULL
 */

echo '<hr>';

// As of PHP 5.4.0, when declared in the context of a class, the current class is automatically bound to it, making $this available inside of the function's scope. If this automatic binding of the current class is not wanted, then static anonymous functions may be used instead.

/* Static anonymous functions */
// As of PHP 5.4, anonymous functions may be declared statically. This prevents them from having the current class automatically bound to them. Objects may also not be bound to them at runtime.

# Example 6 Attempting to use $this inside a static anonymous function
class Foo
{
    function __construct()
    {
        $func = static function () {
            var_dump($this);
        };
        $func();
    }
}
new Foo();
/**
 * Outputs:
 * Notice: Undefined variable: this
 * NULL
 */

echo '<hr>';

# Example 7 Attempting to bind an object to a static anonymous function
$func = static function() {
    // function body
};
$func = $func->bindTo(new StdClass);
$func(); // Outputs:  Warning: Cannot bind an instance to a static closure


?>