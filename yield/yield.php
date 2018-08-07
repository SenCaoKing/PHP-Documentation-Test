<?php
/**
 * Created by PhpStorm.
 * User: Sen
 * Date: 2018/8/7
 * Time: 14:14
 */
/**
 * 生成器语法
 * yield 关键字
 */
/**
 * ① yield 关键字
 */
// Example #1 一个简单的生成值得例子
function gen_one_to_three() {
    for ($i = 1; $i <= 3; $i++) {
        // 注意变量$i的值在不同的yield之间是保持传递的。
        yield $i;
    }
}

$generator = gen_one_to_three();
foreach ($generator as $value) {
    echo "$value<br>";
    /**
     * 结果:
     * 1
     * 2
     * 3
     */
}

/**
 * ② 指定键名来生成值
 */
# Example #2 生成一个键值对
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
    echo "$id:<br>";
    echo "      $fields[0]<br>";
    echo "      $fields[1]<br>";
    /**
     * 结果：
    1:
        PHP
        Likes dollar signs
    2:
        Python
        Likes whitespace
    3:
        Ruby
        Likes blocks
    */
}

/**
 * ③ 生成 NULL 值
 */
// Example #3 生成NULLs
function gen_three_nulls(){
    foreach (range(1, 3) as $i) {
        yield;
    }
}

var_dump(iterator_to_array(gen_three_nulls())); // array(3) { [0]=> NULL [1]=> NULL [2]=> NULL }

/**
 * ④ 使用引用来生成值
 */
// Elample #4 使用引用来生成值
function &gen_reference() {
    $value = 3;

    while ($value > 0) {
        yield $value;
    }
}

/**
 * 我们可以在循环中修改$number的值，而生成器是使用的引用值来生成，所以gen_reference()内部的$value值也会跟着变化。
 */
foreach (gen_reference() as &$number) {
    echo (--$number).'... '; // 2... 1... 0...
}

// Example #5 Basic use of yield from (PHP7)
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
    echo "$num "; // 1 2 3 4 5 6 7 8 9 10
}

// Example #6 yield from and return values (PHP7)
function count_to_ten6() {
    yield 1;
    yield 2;
    yield from [3, 4];
    yield from new ArrayIterator([5, 6]);
    yield from seven_eight();
    return yield from nine_ten();
}

function nine_ten() {
    yield 9;
    return 10;
}

$gen = count_to_ten6();
foreach ($gen as $num) {
    echo "$num ";
}
echo $gen->getReturn(); // 1 2 3 4 5 6 7 8 9 10