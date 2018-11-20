<?php

// 赋值运算符
	
// 基本的赋值运算符是“=”。一开始可能会以为它是“等于”，其实不是的。它实际上意味着把右边表达式的值赋给左边的运算数。

// 赋值运算表达式的值也就是所赋的值。
$a = ($b = 4) + 5;
var_dump($a); // 9

echo '<hr>';

// 在基本赋值运算符之外，还有适合于所有二元算术，数组集合和字符串运算符的“组合运算符”，这样可以在一个表达式中使用它的值并把表达式的结果赋给它，
$a = 3;
$a += 5;
var_dump($a); // 8

echo '<br />';
$b = "Hello ";
$b .= "There!";
var_dump($b); // Hello There!

/* 注意赋值运算将原变量的值拷贝到新变量中（传值赋值），所以改变其中一个并不影响另一个。这也适合于在密集循环中拷贝一些值例如大数组。 */
/* 在 PHP 中普通的传值赋值行为有个例外就是碰到对象 object 时，在 PHP5 中是以引用赋值的，除非明确使用了 clone 关键字来拷贝。 */

echo "<hr><br>";
// 引用赋值
// PHP 支持引用赋值，使用 "$var = &$othervar;" 语法。引用赋值意味着两个变量指向了同一个数据，没有拷贝任何东西。
# Example #1 引用赋值
$a= 3;
$b = &$a; // $b 是 $a 的引用

print "$a\n"; // 3
print "$b\n"; // 3

$a = 4; // 修改 $a

print "$a\n"; // 4
print "$b\n"; // 4 [因为 $b 是 $a 的引用，因此也被改变]

/* 自 PHP5 起，new 运算符自动返回一个引用，因此再对 new 的结果进行引用赋值在 PHP5.3 以及以后版本中会发出一条 E_DEPRECATED 错误信息，在之前版本会发出一条 E_STRICT 错误信息。 */

class C {}

$o = &new C; // Deprecated: Assigning the return value of new by reference is deprecated in E:\WWW\git\PHP-Documentation-Test\operator\assignment_operators.php on line 45
?>