<?php
	// 可变变量
	// 有时候使用可变变量名是很方便的。就是说，一个变量的变量名可以动态的设置和使用。
	
	// # 声明普通变量
	$a = 'Hello';
	echo $a; // Hello

	echo '<hr>';

	// 一个可变变量获取了一个普通变量的值作为这个可变变量的变量名。
	$$a = $hello = 'world';

	// 这时，两个变量都被定义了：$a 的内容是“hello”并且 $hello 的内容是“world”。
	echo "$a ${$a}"; // Hello world

	echo '<hr>';

	echo "$a $hello"; // Hello world (效果同上)

	echo '<hr>';

	#1 可变属性示例
	class foo {
		var $bar = 'I am bar.';
		var $arr = array('I am A.', 'I am B.', 'I am C.');
		var $r = 'I am r.';
	}

	$foo = new foo();
	$bar = 'bar';
	$baz = array('foo', 'bar', 'baz', 'quux');
	echo $foo->$bar . "<br />"; // I am bar.
	echo $foo->$baz[1] . "<br />"; // I am bar.


	$start = 'b';
	$end   = 'ar';
	echo $foo->{$start . $end} . "<br />"; // I am bar.

	$arr = 'arr';
	echo $foo->$arr[1] . "<br />"; // I am r.
	echo $foo->{$arr}[1] . "<br />"; // I am B.

	// Warning 注意，在 PHP 的函数和类的方法中，超全局变量不能用作可变变量。$this 变量也是一个特殊变量，不能被动态引用。


?>