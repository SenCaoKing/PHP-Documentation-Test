<?php
/*
 * 类与对象 - 遍历对象
 */

// PHP5 提供了一种定义对象的方法使其可以通过单元列表来遍历，例如用 foreach 语句。默认情况下，所有可见属性都将被用于遍历。

# Example 1 简单的对象遍历
class MyClass
{
    public $var1 = 'value 1';
    public $var2 = 'value 2';
    public $var3 = 'value 3';

    protected $protected = 'protected var';
    private   $private   = 'private var';

    function iterateVisible() {
        echo "MyClass::iterateVisible:\n";
        foreach($this as $key => $value) {
            print "$key => $value\n";
        }
    }
}

$class = new MyClass();

foreach($class as $key => $value) {
    print "$key => $value\n";
}
/**
 * Output:
 * var1 => value 1
 * var2 => value 2
 * var3 => value 3
 */

echo "\n";

echo "<br />";

$class->iterateVisible();
/**
 * Output:
 * MyClass::iterateVisible:
 * var1 => value 1
 * var2 => value 2
 * var3 => value 3
 * protected => protected var
 * private => private var
 */

// 如上所示，foreach 遍历了所有其能够访问的可见属性

echo '<hr>';

// 更进一步，可以实现 Iterator 接口。可以让对象自行决定如何遍历以及每次遍历时那些值可用。

# Example 2 实现 Iterator 接口的对象遍历
class MyIterator implements Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function rewind()
    {
        echo "rewinding\n";
        reset($this->var);
    }

    public function current() {
        $var = current($this->var);
        echo "current: $var\n";
        return $var;
    }

    public function key() {
        $var = key($this->var);
        echo "key: $var\n";
        return $var;
    }

    public function next() {
        $var = next($this->var);
        echo "next: $var\n";
        return $var;
    }

    public function valid() {
        $var = $this->current() !== false;
        echo "valid: {$var}\n";
        return  $var;
    }
}

$values = array(1, 2, 3);
$it = new MyIterator($values);

foreach ($it as $a => $b) {
    print "$a: $b\n";
}
/**
 * Outpu:
 * rewinding
 * current: 1
 * valid: 1
 * current: 1
 * key: 0
 * 0: 1
 * next: 2
 * current: 2
 * valid: 1
 * current: 2
 * key: 1
 * 1: 2
 * next: 3
 * current: 3
 * valid: 1
 * current: 3
 * key: 2
 * 2: 3
 * next:
 * current:
 * valid:
 */

echo '<hr>';

// 可以用 IteratorAggregate 接口以替代实现所有的 Iterator 方法。IteratorAggregate 只需要实现一个方法 IteratorAggregate::getIterator()，其应返回一个实现了 Iterator 的类的实例。

# Example 3 通过实现 IteratorAggregate 来遍历对象
class MyCollection implements IteratorAggregate
{
    private $items = array();
    private $count = 0;

    public function getIterator() {
        return new MyIterator($this->items);
    }

    public function add($value) {
        $this->items[$this->count++] = $value;
    }
}

$coll = new MyCollection();
$coll->add('value 1');
$coll->add('value 2');
$coll->add('value 3');

foreach ($coll as $key =>$val) {
    echo "key/value: [$key -> $val]\n\n";
}
/**
 * Output:
 * rewinding
 * current: value 1
 * valid: 1
 * current: value 1
 * key: 0
 * key/value: [0 -> value 1]
 *
 * next: value 2
 * current: value 2
 * valid: 1
 * current: value 2
 * key: 1
 * key/value: [1 -> value 2]
 *
 * next: value 3
 * current: value 3
 * valid: 1
 * current: value 3
 * key: 2
 * key/value: [2 -> value 3]
 *
 * next:
 * current:
 * valid:
 */

/**
 * Note:
 * 更多遍历的示例见 SPL扩展。
 */

/**
 * Note：
 * PHP5.5 及以后版本的用户也可参考 生成器，其提供了另一方法来定义 Iterators。
 */




?>