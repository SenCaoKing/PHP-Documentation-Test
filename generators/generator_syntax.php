<?php
/*
 * 生成器 - 生成器语法
 */

/**
 * 一个生成器函数看起来像一个普通的函数，不同的是普通函数返回一个值，而一个生成器可以 yield 生成许多它所需要的值。
 *
 * 当一个生成器被调用的时候，它返回一个可以被遍历的对象.当你遍历这个对象的时候(例如通过一个 foreach 循环)，PHP 将会在每次需要值的时候调用生成器函数，并在产生一个值之后保存生成器的状态，这样它就可以在需要产生下一个值的时候恢复调用状态。
 *
 * 一旦不再需要产生更多的值，生成器函数可以简单退出，而调用生成器的代码还可以继续执行，就像一个数组已经被遍历完了。
 */

/**
 * Note：
 * 一个生成器不可以返回值 : 这样做会产生一个编译错误。然而 return 空是一个有效的语法并且它将会终止生成器继续执行。
 */

/**
 * yield 关键字
 *
 * 生成器函数的核心是 yield 关键字。它最简单的调用形式看起来像一个 return 声明，不同之处在于普通 return 会返回值并终止函数的执行，而 yield 会返回一个值给循环调用此生成器的代码并且只是暂停执行生成器函数。
 */

# Example 1 一个简单的生成值的例子
function gen_one_to_three() {
    for ($i = 1; $i <= 3; $i++) {
        // 注意变量 $i 的值在不同的 yield 之间是保持传递的。
        yield $i;
    }
}

$generator = gen_one_to_three();
foreach ($generator as $value) {
    echo "$value\n";
}
/**
 * Output:
 * 1
 * 2
 * 3
 */

/**
 * Note:
 * 在内部会为生成的值配对连续的整型索引，就像一个非关联的数组。
 */

/**
 * Caution 如果在一个表达式上下文(例如在一个赋值表达式的右侧)中使用 yield，你必须使用圆括号把 yield 申明包围起来。例如这样是有效的:
 *
 * $data = (yield $value);
 *
 * 而这样就不合法，并且在 PHP5 中会产生一个编译错误 :
 *
 * $data = yield $value;
 */

echo "<br/>****************************************<br/>";

/**
 * 指定键名来生成值
 *
 * PHP 的数组支持关联键值对数组，生成器也一样支持。所以除了生成简单的值，你也可以在生成值得时候指定键名。
 *
 * 如下所示，生成一个键值对与定义一个关联数组十分相似。
 */

# Example 生成一个键值对
/**
 * 下面每一行是用分号分割的字段组合，第一个字段将被用作键名。
 */
$input = <<<'EOF'
1;PHP;Likes dollar signs
2;Python;Likes whitespace
3;Ruby;Likes blocks 
EOF;

function input_parser($input) {
    foreach (explode("\n", $input) as $line) {
        $fields = explode(';', $line);
        $id = array_shift($fields);

        yield $id => $fields;
    }
}

foreach (input_parser($input) as $id => $fields) {
    echo "$id:\n";
    echo "      $fields[0]\n";
    echo "      $fields[1]\n";
}
/**
 * Output:
 * 1:
 *      PHP
 *      Likes dollar signs
 * 2:
 *      Python
 *      Likes whitespace
 * 3:
 *      Ruby
 *      Likes blocks
 */

/**
 * Caution: 和之前生成简单值类型一样，在一个表达式上下文中生成键值对也需要使用圆括号进行包围 :
 *
 * $data = (yield $key => $value);
 */

echo "<br/>****************************************<br/>";

/**
 * 生成 null 值
 *
 * Yield 可以在没有参数传入的情况下被调用来生成一个 NULL 值并配对一个自动的键名。
 */

# Example 3 生成 NULLs
function gen_three_nulls() {
    foreach (range(1,  3) as $i) {
        yield;
    }
}

var_dump(iterator_to_array(gen_three_nulls()));
/**
 * Output:
 * array (size=3)
        0 => null
        1 => null
        2 => null
 */

echo "<br/>****************************************<br/>";

/**
 * 使用引用来生成值
 *
 * 生成函数可以像使用值一样来使用引用生成。这个和 returning references from functions (从函数返回一个引用)一样 : 通过在函数名前面加一个引用符号。
 */

# Example 4 使用引用来生成值
function &gen_reference() {
    $value = 3;

    while ($value > 0) {
        yield $value;
    }
}

foreach (gen_reference() as &$number) {
    echo (--$number) . '... ';
}
/**
 * Output:
 * 2... 1... 0...
 */

echo "<br/>****************************************<br/>";

/**
 * Generator delegation via yield from ¶
 *
 * In PHP 7, generator delegation allows you to yield values from another generator, Traversable object, or array by using the yield from keyword. The outer generator will then yield all values from the inner generator, object, or array until that is no longer valid, after which execution will continue in the outer generator.
 *
 * If a generator is used with yield from, the yield from expression will also return any value returned by the inner generator.
 */

# Example 5 Basic use of yield from
function count_to_ten() {
    yield 1;
    yield 2;
    yield from [3, 4];
    yield from new ArrayIterator([5, 6]);
    yield from seven_eight();
    yield 9;
    yield 10;
}

function seven_eight() {
    yield 7;
    yield from eight();
}

function eight() {
    yield 8;
}

foreach (count_to_ten() as $num) {
    echo "$num ";
}
/**
 * Output:
 * 1 2 3 4 5 6 7 8 9 10
 */

echo "<br/>****************************************<br/>";

# Example 6 yield from and return values
function count_to_ten2() {
    yield 1;
    yield 2;
    yield from [3, 4];
    yield from new ArrayIterator([5, 6]);
    yield from seven_eight2();
    return yield from nine_ten();
}

function seven_eight2() {
    yield 7;
    yield from eight2();
}

function eight2() {
    yield 8;
}

function nine_ten() {
    yield 9;
    return 10;
}

$gen = count_to_ten2();
foreach ($gen as $num) {
    echo "$num ";
}
echo $gen->getReturn(); // 10
/**
 * Output: 1 2 3 4 5 6 7 8 9 10
 */