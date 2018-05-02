<?php

	// Integer 整型
	$a = 1234;   	 // 十进制数
	var_dump($a);    // int(1234)
	$b = -123;       // 负数
	var_dump($b);    // int(-123)
	$c = 0123;       // 八进制数(0 开头)
	var_dump($c);    //int(83)
	$d = 0x1A;       // 十六进制数(0x 开头)
	var_dump($d);    //int(26)
	$e = 0b11111111; // 二进制数(0b 开头)
	var_dump($e);    // int(255) 
?>
<?php

	/* 整数溢出(如果给定的一个数超出了integer 的范围,将会被解释为float。同样如果执行的运算结果超出了 integer 范围,也会返回 float。) */

	// 32位系统下的整数溢出
	echo '<br>';
	$large_number = 2147483647;
	var_dump($large_number); // int(2147483647)
	echo '<br>';
	$large_number = 2147483648;
	var_dump($large_number); // float(2147483648) 
	echo '<br>';

	$million = 1000000;
	$large_number = 50000 * $million;
	var_dump($large_number);  // float(50000000000)
	
	// 64位系统下的整数溢出
	echo '<br>';
	$large_number = 9223372036854775807;
	var_dump($large_number); // int(92233720368547758077)
	echo '<br>';
	$large_number = 9223372036854775808;
	var_dump($large_number); // float(9.2233720368548E+18)
	echo '<br>';

	$million = 1000000;
	$large_number = 50000000000000 * $million;
	var_dump($large_number);  // float(5.0E+19)

?>
<?php
	
	// PHP中没有整除的运算符
	echo '<hr>';
	var_dump(25/7); 		  // float(3.5714285714286)
	echo '<hr>';
	var_dump((int) (25/7));   // int(3)
	echo '<hr>';
	/**
	 * round() --- 对浮点数进行四舍五入
	 * float round ( float $val [, int $precision = 0 [, int $mode = PHP_ROUND_HALF_UP ]] )
	 * 返回将 val 根据指定精度 precision（十进制小数点后数字的数目）进行四舍五入的结果。precision 也可以是负数或零（默认值）。 
	 */
	var_dump(round(25/7));    // float(4)
	echo '<hr>';
	
?>
<?php

	//Warning:绝不要将未知的分数强制转换未 integer ，这样有时会导致不可预料的结果。
	echo (int) ( (0.1+0.7) * 10); // 7
?>