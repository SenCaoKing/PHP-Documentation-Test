<?php
/*
 * 类与对象 - 重载
 */

/**
 *  PHP 所提供的"重载"（overloading）是指动态地"创建"类属性和方法。我们是通过魔术方法（magic methods）来实现的。
 *
 * 当调用当前环境下未定义或不可见的类属性或方法时，重载方法会被调用。本节后面将使用"不可访问属性（inaccessible properties）"和"不可访问方法（inaccessible methods）"来称呼这些未定义或不可见的类属性或方法。
 *
 * 所有的重载方法都必须被声明为 public。
 */

/**
 * Note：
 * 这些魔术方法的参数都不能通过引用传递。
 */

/**
 * Note：
 * PHP 中的"重载"与其它绝大多数面向对象语言不同。传统的"重载"是用于提供多个同名的类方法，但各方法的参数类型和个数不同。
 */

/* 属性重载 */

/*
public void __set ( string $name, mixed $value )

public mixed __get ( string $name )

public bool __isset ( string $name )

public void __unset ( string $name )
*/
/**
 * 在给不可访问属性赋值时，__set() 会被调用。
 *
 * 读取不可访问属性的值时，__get() 会被调用。
 *
 * 当对不可访问属性调用 isset() 或 empty() 时，__isset() 会被调用。
 *
 * 当对不可访问属性调用 unset() 时，__unset() 会被调用。
 *
 * 参数 $name 是指要操作的变量名称。__set() 方法的 $value 参数指定了 $name 变量的值。
 *
 * 属性重载只能在对象中进行。在静态方法中，这些魔术方法将不会被调用。所以这些方法都不能被声明为 static。从 PHP5.3.0 起，将这些魔术方法定义为 static 会产生一个警告。
 */

/**
 * Note：
 * 因为 PHP 处理赋值运算的方式，__set() 的返回值将被忽略。类似的，在下面这样的链式赋值中，__get() 不会被调用：
 * $a = $obj->b = 8;
 */

/**
 * Note:
 * 在除 isset() 外的其它语言结构中无法使用重载的属性，这意味着当对一个重载的属性使用 empty() 时，重载魔术方法将不会被调用。
 *
 * 为避开此限制，必须将重载属性赋值到本地变量再使用 empty()。
 */

# Example 1 使用 __get(), __set(), __isset() 和 __unset() 进行属性重载
class PropertyTest {
    private $data = array();

    public $declared = 1;

    private $hidden = 2;

    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' .  $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    public function __isset($name)
    {
        echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        echo "Unsetting '$name'\n";
        unset($this->data[$name]);
    }

    public function getHidden()
    {
        return $this->hidden;
    }
}

echo "<pre>\n";

$obj = new PropertyTest();

$obj->a = 1; // Output: Setting 'a' to '1'
echo $obj->a . "\n\n";
/**
 * Output:
 * Getting 'a'
 * 1
 */

var_dump(isset($obj->a));
/**
 * Output:
 * Is 'a' set?
 * boolean true
 */

unset($obj->a); // Output: Unsetting 'a'

var_dump(isset($obj->a));
/**
 * Output:
 * Is 'a' set?
 * boolean false
 */
echo "\n";

echo $obj->declared . "\n\n"; // Output: 1

echo "Let's experiment with the private property named 'hidden':\n";
echo "Privates are visible inside the class, so __get() not used...\n";
echo $obj->getHidden() . "\n";
/**
 * Output:
 * Let's experiment with the private property named 'hidden':
 * Privates are visible inside the class, so __get() not used...
 * 2
 */

echo "Privates not visible outside of class, so __get() is userd...\n";
echo $obj->hidden . "\n";
/**
 * Output：
 * Privates not visible outside of class, so __get() is userd...
 * Getting 'hidden'
 *
 * Notice: Undefined property via __get(): hidden in
 */

echo '<hr>';

/* 方法重载 */

/*
public mixed __call ( string $name, array $arguments )

public static mixed __callStatic ( string $name, array $arguments )
*/

/**
 * 在对象中调用一个不可访问方法时，__call() 会被调用。
 *
 * 在静态上下文中调用一个不可访问方法时，__callStatic() 会被调用。
 *
 * $name 参数是要调用的方法名称。$arguments 参数是一个枚举数组，包含着要传递给方法 $name 的参数。
 */

# Example 2 使用 __call() 和 __callStatic() 对方法重载
class MethodTest
{
    public function __call($name, $arguments)
    {
        echo "Calling object method '$name' "
        . implode(', ', $arguments). "\n";
    }

    public static function __callStatic($name, $arguments)
    {
        echo "Calling static method '$name' "
        . implode(', ', $arguments). "\n";
    }
}

$obj = new MethodTest();
$obj->runTest('in object context'); // Output: Calling object method 'runTest' in object context

MethodTest::runTest('in static context'); // Output: Calling static method 'runTest' in static context






?>