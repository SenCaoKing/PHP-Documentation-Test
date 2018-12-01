<?php

/*
 * 函数 - 函数的参数
 */
// 通过参数列表可以传递信息到函数，即以逗号作为分隔符的表达式列表。参数是从左向右求值的。

// PHP 支持按值传递参数（默认），通过 引用传递参数 以及 默认参数。也支持 可变长度参数列表。

# Example 1 向函数传递数组
function takes_array($input)
{
    echo "$input[0] + $input[1] = ", $input[0]+$input[1];
}

/**
 * 通过引用传递参数
 *
 * 默认情况下，函数参数通过值传递（因而即使在函数内部改变参数的值，它并不会改变函数外部的值）。如果希望允许函数修改它的参数值，必须通过引用传递参数。
 *
 * 如果想要函数的一个参数总是通过引用传递，可以在函数定义中该参数的前面加上符号 &：
 */
# Example 2 用引用传递函数参数
function add_some_extra(&$string)
{
    $string .= 'and something extra.';
}
$str = 'This is a string, ';
add_some_extra($str);
echo $str; // outputs: This is a string, and something extra.

echo '<hr>';

/**
 * 默认参数的值
 */
// 函数可以定义 C++ 风格的标量参数默认值，如下所示：
# Example 3 在函数中使用默认参数
function makecoffee($type = "cappuccino")
{
    return "Making a cup of $type.\n";
}

echo makecoffee();
echo makecoffee(null);
echo makecoffee("espresso");
/**
 * Outputs: Making a cup of cappuccino. Making a cup of . Making a cup of espresso.
 */

echo '<hr>';

// PHP 还允许使用数组 array 和特殊类型 NULL 作为默认参数，例如：
# Example 4 使用非标量类型作为默认参数
function makecoffee_1($types = array("cappuccino"), $coffeeMaker = NULL)
{
    $device = is_null($coffeeMaker) ? "hands" : $coffeeMaker;
    return "Making a cup of ".join(", ", $types)." with $device.\n";
}

echo makecoffee_1();
echo makecoffee_1(array("cappuccino", "lavazza"), "teapot");
/**
 * Outputs:
 * Making a cup of cappuccino with hands. Making a cup of cappuccino, lavazza with teapot.
 */

echo '<hr>';

// 默认值必须是常量表达式，不能是诸如变量，类成员，或者函数调用等。

// 注意当使用默认参数时，任何默认参数必须放在任何非默认参数的右侧；否则，函数将不会按照预期的情况工作。考虑下面的代码片段：

# Example 5 函数默认参数的不正确用法
function makeyogurt($type = "acidophilus", $flavour)
{
    return "Making a bowl of $type $flavour.\n";
}

echo makeyogurt("raspberry"); // won't work as expected

/**
 * Outputs:  Warning: Missing argument 2 for makeyogurt(),
 * Making a bowl of raspberry .
 */

echo '<hr>';
// 比较上面的例子和这个例子：
# Example 6 函数默认参数正确的用法：
function makeyogurt_1($flavour, $type = "acidophilus")
{
    return "Making a bowl of $type $flavour.\n";
}

echo makeyogurt_1("raspberry"); // works as expected
/**
 * Outputs: Making a bowl of acidophilus raspberry.
 */
/**
 * Note:
 * 自 PHP5 起，传引用的参数也可以有默认值。
 */

echo '<hr>';

/**
 * 类型声明：
 *
 * Note:
 * 在 PHP5 中，类型声明也被称为类型提示。
 *
 * 类型声明允许函数在调用时要求参数为特定类型。如果给出的值类型不对，那么将会产生一个错误：在 PHP5 中，这将是一个可恢复的致命错误，而在 PHP7 中将会抛出一个 TypeError 异常。
 *
 * 为了指定一个类型声明，类型应该加到参数名前。这个声明可以通过将参数的默认值设为 NULL 来实现允许传递 NULL。
 */
/*
function test(boolean $param) {}
test(true);
*/
/**
 * Outputs:  Fatal error: Uncaught TypeError: Argument 1 passed to test() must be an instance of boolean, boolean given,
 */

# Example 7 Basic class type declaration
class C {}
class D extends C {}

// This doesn't extend C.
class E {}

function f(C $c) {
    echo get_class($c)."\n";
}

f(new C); // C
f(new D); // D
// f(new E); // Fatal error: Uncaught TypeError: Argument 1 passed to f() must be an instance of C, instance of E given,

echo '<hr>';

# Example 8 Basic interface type declaration
interface I { public function k(); }
class G implements I { public function k() {} }

// This doesn't implement I.
class H {}

function k (I $i) {
    echo get_class($i)."\n";
}

k(new G); // G
// k(new H); // Fatal error: Uncaught TypeError: Argument 1 passed to k() must implement interface I, instance of H given,

echo '<hr>';

# Example 9 Nullable type declaration
class M {}

function n(M $c = null) {
    var_dump($c);
}

n(new M); // object(M)[1]
n(null); // null

echo '<hr>';

/**
 * 严格类型
 *
 * 默认情况下，如果能做到的话，PHP 将会强迫错误类型的值转为函数期望的标量类型。例如，一个函数的一个参数期望是 string，但传入的是 integer，最终函数得到的将会是一个 string 类型的值。
 *
 * 可以基于每一个文件开启严格模式。在严格模式中，只有一个与类型声明完全相符的变量才会被接受，否则将会抛出一个 TypeError。唯一的一个例外是可以将 integer 传给一个期望 float 的函数。
 *
 * 使用 declare 语句和 strict_types 声明来启用严格模式：
 *
 * Caution 启用严格模式同时也会影响 返回值类型声明。
 */
/**
 * Note：
 * 严格类型适用于在启用严格模式的文件内的函数调用，而不是在那个文件内声明的函数。一个没有启用严格模式的文件内调用了一个在启用严格模式的文件中定义的函数，那么将会遵循调用者的偏好（弱类型），而这个值将会被转换。
 */

/**
 * Note:
 * 严格类型仅用于标量类型声明，也正是因为如此，这需要 PHP7.0.0 或更新版本，因为标量类型声明也是在那个版本中添加的。
 */

# Example 10 Strict typing
// 见 test.php

echo '<hr>';

# Example 11 Weak typing
function sum(int $a, int $b) {
    return $a + $b;
}

var_dump(sum(1, 2));     // 3

// These will be coerced to integers: note the output below!
var_dump(sum(1.5, 2.5)); // 3

echo '<hr>';

# Example 12 Catching TypeError
// 见 test.php

echo '<hr>';

/**
 * 可变数量的参数列表
 *
 * PHP 在用户自定义函数中支持可变数量的参数列表。在 PHP5.6 及以上的版本中，由 ... 语法实现；在 PHP5.5 及更早版本中，使用函数 func_num_args()，func_get_arg() 和 func_get_args()。
 */

// ... in PHP5.6+

// in PHP5.6 and later,argument lists may include the ... token to denote that the function accepts a variable number of arguments.The arguments will be passed into the given variable as an array;for example:

# Example 13 Using ... to access variable arguments.
function sum_1 (...$numbers) {
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}

echo sum_1(1, 2, 3, 4); // 10

echo '<hr>';

// You can also use ... when calling functions to unpack an array or Traversable variable or literal into the argument list:
# Example 14 Using ... to provide arguments
function add ($a, $b) {
    return $a + $b;
}

echo add(...[1, 2])."\n"; // 3

$a = [1, 2];
echo add(...$a);          // 3

echo '<hr>';

// You may specify normal positional arguments before the ... token. In this case, only the trailing arguments that don't match a positional argument will be added to the array generated by ....

// It is also possible to add a type hint before the ... token. If this is present, then all arguments captured by ... must be objects of the hinted class.

# Example 15 Type hinted variable arguments
function total_intervals($unit, DeteInterval ...$intervals) {
    $time = 0;
    foreach ($intervals as $interval) {
        $time += $interval->$unit;
    }
    return $time;
}

$a = new DateInterval('P1D');
$b = new DateInterval('P2D');
// echo total_intervals('d', $a, $b).' days'; // 3 days

// echo total_intervals('d', null);             // TypeError: Argument 2 passed to total_intervals() must be an instance of DeteInterval, instance of DateInterval given

// Finally, you may also pass variable arguments by reference by prefixing the ... with an ampersand (&).

echo '<hr>';

/**
 * Older versions of PHP
 *
 * No special syntax is required to note that a function is variadic; however access to the function's arguments must use func_num_args(), func_get_arg() and func_get_args().
 *
 * The first example above would be implemented as follows in PHP 5.5 and earlier:
 */
# Example 16 Accessing variable arguments in PHP5.5 and earlier.
function sum_2 () {
    $acc = 0;
    foreach (func_get_args() as $n) {
        $acc += $n;
    }
    return $acc;
}

echo sum_2(1, 2, 3, 4); // 10

?>