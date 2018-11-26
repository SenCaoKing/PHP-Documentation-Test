<?php

/**
 * 流程控制 - foreach
 */
/**
 * foreach 语法结构提供了遍历数组的简单方式。foreach 仅能够应用于数组和对象，如果尝试应用于其他数据类型的变量，或者未初始化的变量将发出错误信息。有两种语法：
 foreach (array_expression as $value)
    statement

 foreach (array_expression as $key => $value)
    statement
 * 第一种格式遍历给定的 array_expression 数组。每次循环中，当前单元的值被赋给 $value 并且数组内部的指针向前移一步（因此下一次循环中将会得到下一个单元）。
 *
 * 第二种格式做同样的事，只除了当前单元的键名也会在每次循环中被赋给变量 $key.
 */

/**
 * Note: 当 foreach 开始执行时，数组内部的指针会自动指向第一个单元。这意味着不需要在 foreach 循环之前调用 reset()。
 *
 * 由于 foreach 依赖内部数组指针，在循环中修改其值将可能导致意外的行为。
 */

// 可以很容易地通过在 $value 之前加上 & 来修改数组的元素，此方法将以 引用 赋值而不是拷贝一个值。
$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
}

// $arr is now array(2, 4, 6, 8)
var_dump($arr);

unset($value); // 最后取消掉引用

echo '<hr>';

// $value 的引用仅在被遍历的数组可以被引用时才可用（例如是个变量）。以下代码则无法运行：
foreach (array(1, 2, 3, 4) as &$value) { // PHP5 以下版本：Parse error: syntax error, unexpected '&'
    $value = $value * 2;
}

var_dump($arr); // PHP5 以上版本 array(2, 4, 6, 8)
// Warning 数组最后一个元素的 $value 引用在 foreach 循环之后仍会保留。建议使用 unset() 来将其销毁。
unset($value);

// Note: foreach 不支持用 "@" 来抑制错误信息的能力。

echo '<hr>';
# Example 1 功能相同的代码
$arr = array("one", "two", "three");
reset($arr);
while (list(, $value) = each($arr)) {
    echo "Value: $value<br />\n";
    /*
    value: one
    value: two
    value: three
    */
}

echo '----------<br>';

foreach ($arr as $value) {
    echo "Value: $value<br />\n";
    /*
    Value: one
    Value: two
    Value: three
    */
}

echo '<hr>';
# Example 2 功能相同的代码
$arr = array("one", "two", "three");
reset($arr);
while (list($key, $value) = each($arr)) {
    echo "Key: $key; Value: $value<br />\n";
    /*
     Key: 0; Value: one
     Key: 1; Value: two
     Key: 2; Value: three
    */
}

echo '----------<br>';

foreach ($arr as $key => $value) {
    echo "Key: $key; Value: $value<br />\n";
    /*
    Key: 0; Value: one
    Key: 1; Value: two
    Key: 2; Value: three
    */
}

echo '<hr>';
// 示范用法的更多例子:
/* foreach example 1: value only */
$a = array(1, 2, 3, 17);

foreach ($a as $v) {
    echo "Current value of \$a: $v.\n"; // Current value of $a: 1. Current value of $a: 2. Current value of $a: 3. Current value of $a: 17.
}

echo '<br>----------<br>';

/* foreach example 2: value (with its manual access notation printed for illustration) */
$a = array(1, 2, 3, 17);

$i = 0; /* for illustrative purposes only */

foreach ($a as $v){
    echo "\$a[$i] => $v.\n"; // $a[0] => 1. $a[1] => 2. $a[2] => 3. $a[3] => 17.
    $i++;
}

echo '<br>----------<br>';
/* foreach example 3: key and value */
$a = array(
    "one"       => 1,
    "two"       => 2,
    "three"     => 3,
    "seventeen" => 17
);

foreach ($a as $k => $v) {
    echo "\$a[$k] => $v.\n"; // $a[one] => 1. $a[two] => 2. $a[three] => 3. $a[seventeen] => 17.
}

echo '<br>----------<br>';

/* foreach example 4: multi-dimensional arrays */
$a = array();
$a[0][0] = "a";
$a[0][1] = "b";
$a[1][0] = "y";
$a[1][1] = "z";

foreach ($a as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2\n"; // a b y z
    }
}

echo '<br>----------<br>';

/* foreach example 5: dynamic arrays */
foreach (array(1, 2, 3, 4, 5) as $v) {
    echo "$v\n"; // 1 2 3 4 5
}

echo '<hr>';

/**
 * 用 list() 给嵌套的数组解包
 * (PHP5>=5.5.0, PHP7)
 * PHP5.5 增添了遍历一个数组的功能并且把嵌套的数组解包到循环变量中，只需将 list() 作为值提供。
 */
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as list($a, $b)) {
    // $a contains the first element of the nested array.
    // and $b contains the Second element.
    echo "A: $a; B: $b\n<br>";
    /*
    A: 1; B: 2
    A: 3; B: 4
    */
}

echo '<hr>';
// list() 中的单元可以少于嵌套数组的，此时多出来的数组单元将被忽略：
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as list($a)) {
    // Note that there is no $b here.
    echo "$a\n"; // 1 3
}

echo '<hr>';
// 如果 list() 中列出的单元多于嵌套数组则会发出一条消息级别的错误信息：
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as list($a, $b, $c)) {
    echo "A: $a; B: $b; C: $c\n";
    /*
    Notice: Undefined offset: 2
    A: 1; B: 2; C:
    Notice: Undefined offset: 2
    A: 3; B: 4; C:
    */
}

?>