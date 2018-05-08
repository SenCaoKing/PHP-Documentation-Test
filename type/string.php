<!-- 
	String 字符串
    
    四种表达方式
    ① 单引号
    ② 双引号
    ③ heredoc 语法结构
    ④ nowdoc  语法结构 
-->
<?php
    // ① 单引号
    echo 'this is a simple string'; // this is a simple string

    echo '<br />';
    // 可以录入多行
    echo 'You can also have embedded newlines in 
strings this way as it is
okay to do'; // You can also have embedded newlines in strings this way as it is okay to do

	echo '<br />';
	// \ 转义单引号
	echo 'Arnold once said: "I\'ll be back"'; // Arnold once said: "I'll be back"

	echo '<br />';
	echo 'You deleted C:\\*.*?'; // You deleted C:\*.*?

	echo '<br />';
	echo 'You deleted C:\*.*?'; // You deleted C:\*.*?

	echo '<br />';
	echo 'This will ont expand: \n a newline'; // This will ont expand: \n a newline

	echo '<br />';
	echo 'Variables do not $expand $either'; // Variables do not $expand $either

	echo '<hr>';
?>
<?php
	// ② 双引号
	/**
	 * 如果字符串是包围在双引号（"）中， PHP 将对一些特殊的字符进行解析
	 * 和单引号字符串一样，转义任何其它字符都会导致反斜线被显示出来
	 * 用双引号定义的字符串最重要的特征是变量会被解析
	 */
	
?>
<?php
	// ③ Heredoc
	/**
	 * 结构第三种表达字符串的方法是用 heredoc 句法结构：<<<。在该运算符之后要提供一个标识符，然后换行。接下来是字符串 string 本身，最后要用前面定义的标识符作为结束标志。
	 * 
	 * 结束时所引用的标识符必须在该行的第一列，而且，标识符的命名也要像其它标签一样遵守 PHP 的规则：只能包含字母、数字和下划线，并且必须以字母和下划线作为开头。
	 */
	$str = <<<EOD
	Example of string
spanning multiple lines
using heredoc syntax.
EOD;
	/* 含有变量的更复杂示例 */
	class foo
	{
		var $foo;
		var $bar;

		function foo()
		{
			$this->foo = 'Foo';
			$this->bar = array('Bar1', 'Bar2', 'Bar3');
		}
	}

	$foo = new foo();
	$name = 'MyName';

	echo <<<EOT
	My name is "$name". I am printing some $foo->foo.
	Now, I am printing some {$foo->bar[1]}.
	This should print a capital 'A':\x41
EOT;
// My name is "MyName". I am printing some Foo. Now, I am printing some Bar2. This should print a capital 'A':A
	echo '<br />';

	// 使用 Heredoc 结构来初始化静态值
	function foo()
	{
		static $bar = <<<LABEL
		Nothing in here...
LABEL;
	}

	// 类的常量、属性
	class foo1
	{
		const BAR = <<<FOOBAR
		Constant example
FOOBAR;

	public $baz = <<<FOOBAR
	Property example
FOOBAR;
	}

	// 自 PHP 5.3.0 起还可以在 Heredoc 结构中用双引号来声明标识符：
	echo <<<"FOOBAR"
	Hello World!
FOOBAR;
// Hello World!
	echo '<hr>';
?>
<?php
	// ④ Nowdoc 结构
	/**
	 * 就象 heredoc 结构类似于双引号字符串，Nowdoc 结构是类似于单引号字符串的。Nowdoc 结构很象 heredoc 结构，但是 nowdoc 中不进行解析操作。这种结构很适合用于嵌入 PHP 代码或其它大段文本而无需对其中的特殊字符进行转义。与 SGML 的 <![CDATA[ ]]> 结构是用来声明大段的不用解析的文本类似，nowdoc 结构也有相同的特征。
	 * 
	 * 一个 nowdoc 结构也用和 heredocs 结构一样的标记 <<<， 但是跟在后面的标识符要用单引号括起来，即 <<<'EOT'。Heredoc 结构的所有规则也同样适用于 nowdoc 结构，尤其是结束标识符的规则。
	 */
	$str = <<<'EOD'
	Example of string
spanning multiple lines
using heredoc syntax.
EOD;

	/* 含有变量的更复杂示例 */
	class foo2
	{
		var $foo;
		var $bar;

		function foo()
		{
			$this->foo = 'Foo';
			$this->bar = array('Bar1', 'Bar2', 'Bar3');
		}
	}

	$foo = new foo2();
	$name = 'MyName';

	echo <<<'EOT'
	My name is "$name". I am printing some $foo->foo.
	Now, I am printing some {$foo->bar[1]}.
	This should print a capital 'A':\x41
EOT;
	// My name is "$name". I am printing some $foo->foo. Now, I am printing some {$foo->bar[1]}. This should print a capital 'A':\x41
	
	// 不象 heredoc 结构，nowdoc 结构可以用在任意的静态数据环境中，最典型的示例是用来初始化类的属性或常量：
	// 静态数据示例
	class foo3{
		public $bar = <<<'EOT'
		bar
EOT;
	}
	echo '<hr>';
?>
<?php
	// 变量解析
	/**
	 * 当字符串用双引号或 heredoc 结构定义时，其中的变量将会被解析。
	 * 这里共有两种语法规则：一种简单规则，一种复杂规则。简单的语法规则是最常用和最方便的，它可以用最少的代码在一个 string 中嵌入一个变量，一个 array 的值，或一个 object 的属性。
	 * 复杂规则语法的显著标记是用花括号包围的表达式。
	 */
	
	// 简单语法
	// 当 PHP 解析器遇到一个美元符号（$）时，它会和其它很多解析器一样，去组合尽量多的标识以形成一个合法的变量名。可以用花括号来明确变量名的界线。
	
	// $juice = "apple";

	// echo "He drank some $juice juice.".PHP_EOL; // He drank some apple juice.
	// // Invalid. "s" is a valid character for a variable name, but the variable is $juice.
	// echo "He drank some juice mode of $juices."; // He drank some juice mode of .

	echo '<br>';
	echo '------------------------------------------------------------------------------------------------------------';
	echo '<br>';
	$juices = array("apple", "orange", "koolaid1" => "purple");

	echo "He drank some $juices[0] juice.".PHP_EOL; // He drank some apple juice. 
	echo '<br>';
	echo "He drank some $juices[1] juice.".PHP_EOL; // He drank some orange juice. 
	echo '<br>';
	echo "He drank some juice made of $juice[0]s.".PHP_EOL; // Notice: Undefined variable: juice in E:\WWW\git\PHP-Documentation-Test\type\string.php on line 181
	// He drank some juice made of s. 
	echo '<br>';
	echo "He drank some $juices[koolaid1] juice.".PHP_EOL; // He drank some purple juice.
	echo '<br>';
	echo '------------------------------------------------------------------------------------------------------------';
	echo '<br>';

	class people{
		public $john = "John Smith";
		public $jane = "Jane Smith";
		public $robert = "Robert Paulsen";

		public $smith = "Smith";
	}

	$people = new people();
	echo "$people->john drank some $juices[0] juice.".PHP_EOL; // John Smith drank some apple juice.
	echo '<br>';
	echo "$people->john then said hello to $people->jane.".PHP_EOL; // John Smith then said hello to Jane Smith.
	echo '<br>';
	echo "$people->john's wife greeted $people->robert.".PHP_EOL; // John Smith's wife greeted Robert Paulsen. 
	echo '<br />';
	echo "$people->robert greeted the two $people->smiths."; // Notice: Undefined property: people::$smiths in E:\WWW\git\PHP-Documentation-Test\type\string.php on line 204
	// Robert Paulsen greeted the two .
	
	echo '<br>';
	echo '------------------------------------------------------------------------------------------------------------';
	echo '<br>';
	



	 
 







 

?>