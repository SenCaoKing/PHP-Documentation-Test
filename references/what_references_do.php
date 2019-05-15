<?php
/*
 * 引用的解释 - 引用做什么
 */

# Example 1 对未定义的变量使用引用
function foo(&$var) { }

foo($a); // $a is "created" and assigned to null
var_dump(foo($a)); // null

$b = array();
foo($b['b']);
var_dump(array_key_exists('b', $b)); // boolean true

$c = new StdClass;
foo($c->d);
var_dump(property_exists($c, 'd')); // boolean true

# Example 2 在函数内引用全局变量
$var1 = "Example variable";
$var2 = "";

function global_references($use_globals)
{
    global $var1, $var2;
    if (!$use_globals) {
        $var2 = & $var1; // visible only inside the function
    } else {
        $GLOBALS["var2"] = & $var1; // visible also in global context
    }
}

global_references(false);
echo "var2 is set to '$var2'\n"; // var2 is set to ''
echo "<br />";
global_references(true);
echo "var2 is set to '$var2'\n"; // var2 is set to 'Example variable'

echo "<br />";

# Example 3 引用与foreach语句
$ref = 0;
$row = & $ref;
foreach (array(1, 2, 3) as $row) {
    // do something
}
echo $ref; // 3 - last element of the iterated array

echo "<br />";

# 用引用传递变量
function foo2(&$var)
{
    $var++;
}
$a = 5;
foo2($a);
echo $a; // 6