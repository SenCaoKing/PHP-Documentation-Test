<?php
	// 变量范围
	// 变量的范围即它定义的上下文背景（也就是它的生效范围）。大部分的 PHP 变量只有一个单独的范围。这个单独的范围跨度同样包含了 include 和 require 引入的文件。
	
	// global 关键字
	
	// #1 使用 global
	$a = 1;
	$b = 2;

	function Sum()
	{
		global $a, $b;
		$b = $a + $b;
	}

	Sum();
	echo $b; // 3
	// 以上脚本的输出将是“3”。在函数中声明了全局变量 $a 和 $b 之后，对任一变量的所有引用都会指向其全局版本。对于一个函数能够声明的全局变量的最大个数，PHP 没有限制。

	echo '<hr>';

	// 在全局范围内访问变量的第二个办法，是用特殊的 PHP 自定义 $GLOBALS 数组。

	// #2 使用 $GLOBALS 替代 global
	$a = 1;
	$b = 2;

	function Sum2()
	{
		$GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
	}

	Sum2();
	echo $b; // 3

	echo '<hr>';

	// $GLOBALS 是一个关联数组，每一个变量为一个元素，键名对应变量名，值对应变量的内容。$GLOBALS 之所以在全局范围内存在，是因为 $GLOBALS 是一个超全局变量。

	// #3 演示超全局变量和作用域的例子
	function test_global()
	{
		// 大多数的预定义变量并不 "super"，它们需要用 'global' 关键字来使它们在函数的本地区域中有效。
		global $HTTP_POST_VARS;

		echo $HTTP_POST_VARS['name'];

		// Superglobals 在任何范围内都有效，它们并不需要 'global' 声明。Superglobals 是在 PHP 4.1.0 引入的。
		echo $_POST['name'];
	}
	

	echo '<hr>';

	// 使用静态变量
	// 变量范围的另一个重要特性是静态变量（static variable）。静态变量仅在局部函数域中存在，但当程序执行离开此作用域时，其值并不丢失。
	
	// 本函数没什么用处，因为每次调用时都会将 $a 的值设为 0 并输出 0。将变量加一的 $a++ 没有作用，因为一旦退出本函数则变量 $a 就不存在了。要写一个不会丢失本次计数值的计数函数，要将变量 $a 定义为静态的:
	// #4 需要静态变量的例子
	function test()
	{
		$t = 0;
		echo $t;
		$t++;
	}
	$tt = test();
	echo $tt; // 0

	echo '<hr>';

	// 现在，变量 $a 仅在第一次调用 test() 函数时被初始化，之后每次调用 test() 函数都会输出 $a 的值并加一。
	// #5 静态变量的例子
	function test1()
	{
		static $t1 = 0;
		echo $t1;
		$t1++;
	}
	$tt1 = test1();
	echo $tt1; // 0
	echo '<br />';

	$tt2 = test1();
	echo $tt2; // 1
	echo '<br />';

	$tt3 = test1();
	echo $tt3; // 2

	echo '<hr>';

	// 静态变量也提供了一种处理递归函数的方法。递归函数是一种调用自己的函数。写递归函数时要小心，因为可能会无穷递归下去。必须确保有充分的方法来中止递归。
	// #6 静态变量与递归函数
	function test2()
	{
		static $count = 0;

		$count++;
		echo $count.'<br />';
		if ($count < 5) {
			test2();
		}
		$count--;
	}

	$tt2 = test2().'<br />'; // 1 2 3 4 5(循环输出1-5)

	// Note:静态变量可以按照上面的例子声明。如果在声明中用表达式的结果对其赋值会导致解析错误。

	echo '<hr>';
	// #7 声明静态变量的例子
	function foo(){
		static $int = 1;      		  // 正确
		// static $int1 = 1+2;		  // 错误(声明的静态变量不能是表达式)
		// static $int3 = sqrt(121);  // 错误(声明的静态变量不能是表达式)

		$int++;
		echo $int;
	}

	$foo = foo(); // 2

	// 静态声明是在编译时解析的。
	
	echo '<hr>';

	// Note:在函数之外使用 global 关键字不算错。可以用于在一个函数之内包含文件时。

	// 全局和静态变量的引用
	// 在 Zend 引擎 1 代，它驱动了 PHP4，对于变量的 static 和 global 定义是以引用的方式实现的。例如，在一个函数域内部用 global 语句导入的一个真正的全局变量实际上是建立了一个到全局变量的引用。这有可能导致预料之外的行为

	function test_global_ref() {
		global $obj;
		$obj = &new stdclass();
	}

	function test_global_noref() {
		global $boj;
		$obj = new stdclass();
	}

	test_global_ref();
	var_dump($obj);
	test_global_noref();
	var_dump($obj);

	




?>