<?php

// 比较运算符
// 比较运算符，如同它们名称所暗示的，允许对两个值进行比较。

// 如果比较一个数字和字符串或者比较涉及到数字内容的字符串，则字符串会被转换为数值并且比较按照数值来进行。此规则也适用于 switch 语句。当用 === 或 !== 进行比较时则不进行类型转换，因为此时类型和数值都要比对。

var_dump(0 == "a");      // 0 == 0 -> true
var_dump("1" == "01");   // 1 == 1 -> true
var_dump("10" == "1e1"); // 10 == 10 -> true
var_dump(100 == "1e2");  // 100 == 100 -> true

switch ("a") {
    case 0:
        echo "0";
        break; // 0
    case "a": // never reached because "a" is already matched with 0
        echo "a";
        break;
}

echo '<hr>';

// Integers
echo 1 <=> 1; // 0
echo 1 <=> 2; // -1
echo 2 <=> 1; // 1

echo '<hr>';

// Floats
echo 1.5 <=> 1.5; // 0
echo 1.5 <=> 2.5; // -1
echo 2.5 <=> 1.5; // 1

echo '<hr>';

// Strings
echo "a" <=> "a"; // 0
echo "a" <=> "b"; // -1
echo "b" <=> "a"; // 1

echo "a" <=> "aa";  // -1
echo "zz" <=> "aa"; // 1

echo '<hr>';

// Arrays
echo [] <=> [];               // 0
echo [1, 2, 3] <=> [1, 2, 3]; // 0
echo [1, 2, 3] <=> [];        // 1
echo [1, 2, 3] <=> [1, 2, 1]; // 1
echo [1, 2, 3] <=> [1, 2, 4]; // -1

echo '<hr>';

// Objects
$a = (object)["a" => "b"];
$b = (object)["a" => "b"];
echo $a <=> $b; // 0

$a = (object)["a" => "b"];
$b = (object)["a" => "c"];
echo $a <=> $b; // -1

$a = (object)["a" => "c"];
$b = (object)["a" => "b"];
echo $a <=> $b; // 1

// only values are compared
$a = (object)["a" => "b"];
$b = (object)["b" => "b"];
echo $a <=> $b; // 1

echo '<hr>';

# Example 1 标准数组比较代码
// 数组是用标准比较运算符这样比较的
function standard_array_compare($op1, $op2)
{
    if (count($op1) < count($op2)) {
        return -1; // $op1 < $op2
    } elseif (count($op1) > count($op2)) {
        return 1; // $op1 > $op2
    }
    foreach ($op1 as $key => $val) {
        if (!array_key_exists($key, $op2)){
            return null; // uncomparable
        } elseif ($val < $op2[$key]) {
            return -1;
        } elseif ($val > $op2[$key]) {
            return 1;
        }
    }
    return 0; // $op1 == $op2
}

echo '<hr>';

// 三元运算符
# Example 3 赋默认值
$action = (empty($_POST['action'])) ? 'default' : $_POST['action'];
var_dump($action);

// The above is identical to this if/else statement
if (empty($_POST['action'])) {
    $action = 'default';
} else {
    $action = $_POST['action'];
}

echo '<hr>';

# Example 4 不清晰的三元运算符行为
echo (true ? 'true' : false ? 't' : 'f'); // t [三元运算符是从左往右计算的]


echo ((true ? 'true' : 'false') ? 't' : 'f'); // t
// here, you can see that the first expression is evaluated to 'true', which in turn evaluates to (bool)true, thus retrning the true branch of the second ternary expression.

?>