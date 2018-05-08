<?php
	// Object 对象
	
	// 要创建一个新的对象 object ，使用 new 语句实例化一个类：
	class foo
	{
		function do_foo()
		{
			echo "Doing foo.";
		}
	}

	$bar = new foo();
	$bar->do_foo(); // Doing foo.

	echo '<hr>';
	echo '<br />';

?>
<?php

	// 转换未对象
	$obj = (object) array('1' => 'foo');
	var_dump(isset($obj->{'1'})); // bool(false) 
	echo '<br />';
	var_dump(key($obj)); // int(1)

	echo '<br />';
	echo '-------------------------------------------------------------------------------------------------------------------------------';
	echo '<br />';

	$obj = (object) 'ciao';
	// var_dump($obj); // object(stdClass)#3 (1) { ["scalar"]=> string(4) "ciao" }
	echo $obj->scalar; // ciao

?>