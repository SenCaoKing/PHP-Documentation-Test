<?php
/*
 * 类与对象 - 魔术方法
 */

// __construct()，__destruct()，__call()，__callStatic()，__get()，__set()，__isset()，__unset()，__sleep()，__wakeup()，toString()，__invoke()，__set_state()，__clone() 和 __debugInfo() 等方法在 PHP 中被称为"魔术方法"(Magic methods)。在命名自己的类方法时不能使用这些方法名，除非是想使用其魔术功能。

/**
 * Caution：
 * PHP 将所有以 __ （两个下划线）开头的类方法保留为魔术方法。所以在定义类方法时，除了上述魔术方法，建议不要以 __ 为前缀。
 */

/* __sleep() 和 __wakeup() */

/*
public array __sleep ( void )

void __wakeup ( void )
*/

// serialize() 函数会检查类中是否存在一个魔术方法 __sleep()。如果存在，该方法会先被调用，然后才执行序列化操作。此功能可以用于清理对象，并返回一个包含对象中所有应被序列化的变量名称的数组。如果该方法未返回任何内容，则 NULL 被序列化，并产生一个 E_NOTICE 级别的错误。

/**
 * Note：
 * __sleep() 不能返回父类的私有成员的名字。这样做会产生一个 E_NOTICE 级别的错误。可以用 Serializable 接口来替代。
 */

/**
 * __sleep() 方法常用于提交未提交的数据，或类似的清理操作。同时，如果有一些很大的对象，但不需要全部保存，这个功能就很好用。
 *
 * 与之相反，unserialize() 会检查是否存在一个 __wakeup() 方法。如果存在，则会先调用 __wakeup 方法，预先准备对象需要的资源。
 *
 * __wakeup() 经常用在反序列化操作中，例如重新建立数据库连接，或执行其它初始化操作。
 */

# Example 1 Sleep 和 wakeup
class Connection
{
    protected $link;
    private $server, $username, $password, $db;

    public function __construct($server, $username, $password, $db)
    {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;
        $this->connect();
    }

    private function connect()
    {
        $this->link = mysql_connect($this->server, $this->username, $this->password);
        mysql_select_db($this->db, $this->link);
    }

    public function __sleep()
    {
        return array('server', 'username', 'password', 'db');
    }

    public function __wakeup()
    {
        $this->connect();
    }
}

/* __toString() */

/**
 * public string __toString ( void )
 */

// __toString() 方法用于一个类被当成字符串时应怎样回应。例如 echo $obj; 应该显示些什么。此方法必须返回一个字符串，否则将发出一条 E_RECOVERABLE_ERROR 级别的致命错误。

/**
 * Warning:
 * 不能在 __toString() 方法中抛出异常。这么做会导致致命错误。
 */

# Example 2 简单示例
// Declare a simple class
class TestClass
{
    public $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    public function __toString()
    {
        return $this->foo;
    }
}

$class = new TestClass('Hello');
echo $class; // Output: Hello

// 需要指出的是在 PHP5.2.0 之前，__toString() 方法只有在直接使用于 echo 或 print 时才能生效。PHP5.2.0 之后，则可以在任何字符串环境生效（例如通过 printf()，使用 %s 修饰符），但不能用于非字符串环境（如使用 %d 修饰符）。自 PHP5.2.0 起，如果将一个未定义 __toString() 方法的对象转换为字符串，会产生 E_RECOVERABLE_ERROR 级别的错误。

echo '<hr>';

/* __invoke() */

/*
mixed __invoke ( [ $... ] )
*/

// 当尝试以调用函数的方式调用一个对象时，__invoke() 方法会被自动调用。

/**
 * Note：
 * 本特性只在 PHP5.3.0 及以上版本有效。
 */

# Example 3 使用 __invoke()
class CallableClass
{
    function __invoke($x) {
        var_dump($x);
    }
}

$obj = new CallableClass;
$obj(5); // Output: int 5
var_dump(is_callable($obj)); // Output: boolean true

echo '<hr>';

/* __set_state() */

/*
static object __set_state ( array $properties )
*/

// 自 PHP5.1.0 起当调用 var_export() 导出类时，此静态方法会被调用。

// 本方法的唯一参数是一个数组，其中包含按 array('property' => value, ...) 格式排列的类属性。

# Example 4 使用 __set_state()>(PHP5.1.0起)
class A
{
    public $var1;
    public $var2;

    public static function __set_state($an_array) // As of PHP 5.1.0
    {
        $obj = new A;
        $obj->var1 = $an_array['var1'];
        $obj->var2 = $an_array['var2'];
        return $obj;
    }
}

$a = new A;
$a->var1 = 5;
$a->var2 = 'foo';

eval('$b = ' . var_export($a, true) . ';'); // $b = A::__set_state(array(
                                                  //    'var1' => 5,
                                                  //    'var2' => 'foo',
                                                  // ));

var_dump($b);
/**
 * Output:
object(A)[4]
public 'var1' => int 5
public 'var2' => string 'foo' (length=3)
 */

echo '<hr>';

/* __debugInfo() */

/*
array __debugInfo ( void )
*/

// This method is called by var_dump() when dumping an object to get the properties that should be shown. If the method isn't defined on an object, then all public, protected and private properties will be shown.

// This feature was added in PHP5.6.0

# Example 5 Using __debugInfo()
class C {
    private $prop;

    public function __construct($val) {
        $this->prop = $val;
    }

    public function __debugInfo() {
        return [
            'propSquared' => $this->prop ** 2.
        ];
    }
}

var_dump(new C(42));
/**
 * Output:
 * object(C)[5]
public 'propSquared' => float 1764
 */


?>