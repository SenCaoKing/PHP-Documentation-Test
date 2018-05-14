<?php

	// 表达式
	
	// 表达式是 PHP 最重要的基石。在 PHP 中，几乎所写的任何东西都是一个表达式。简单但却最精确的定义一个表达式的方式就是“任何有值的东西”。
	// 最基本的表达式形式是常量和变量。

	// 当然，PHP 中的值常常并非是整型的。PHP 支持四种标量值（标量值不能拆分为更小的单元，例如和数组不同）类型：整型值（integer），浮点数值（float），字符串值（string）和布尔值（boolean）。PHP 也支持两种复合类型：数组和对象。这两种类型具可以赋值给变量或者从函数返回。
	
	# 前、后递增和表达式的例子
	function double($i)
	{
		return $i*2;
	}
	$b = $a = 5;
	$c = $a++;
	echo $c; // 5
	echo '<hr>';

	$e = $d = ++$b;
	echo $e; // 6
	echo '<hr>';

	$f = double($d++);
	echo $f; // 12
	echo '<hr>';

	$g = double(++$e);
	echo $g; // 14
	echo '<hr>';

	$h = $g += 10;
	echo $h; // 24
	echo '<hr>';
	

?>