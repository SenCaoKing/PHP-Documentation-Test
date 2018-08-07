<?php

	// 算术运算符
	
	// 例子		名称			结果
	// -$a		取反			$a 的负值。
	// $a + $b	加法			$a 和 $b 的和。
	// $a - $b	减法			$a 和 $b 的差。
	// $a * $b	乘法			$a 和 $b 的积。
	// $a / $b	除法			$a 除以 $b 的商。
	// $a % $b	取模			$a 除以 $b 的余数。
	// $a ** $b	Exponentiation	Result of raising $a to the $b'th power. Introduced in PHP 5.6.

	// 除法运算符总是返回浮点数。只有在下列情况例外：两个操作数都是整数（或字符串转换成的整数）并且正好能整除，这时它返回一个整数。
	
	// 取模运算符的操作数在运算之前都会转换成整数（除去小数部分）。
	// 取模运算符 % 的结果和被除数的符号（正负号）相同。即 $a % $b 的结果和 $a 的符号相同。

	# 例子
	echo (5 % 3) . "\n";   // 2
	echo (5 % -3) . "\n";  // 2
	echo (-5 % 3) . "\n";  // -2
	echo (-5 % -3) . "\n"; // -2

	echo '<hr>';
	# 例子,判断奇偶
	$a = 10;suanshu
	for($i=0; $i<=$a; $i++){
		if($i % 2 == 0)
			echo "$i is even".'<br />';
		else
			echo "$i is odd".'<br />';
	}


?>