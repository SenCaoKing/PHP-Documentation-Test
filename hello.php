<html>
	<head>
		<title>PHP 测试</title>
	</head>
	<body>
		<?php echo '<p>Hello World</p>'; ?>
	</body>
</html>

<!-- 获取系统信息 -->
<!-- <?php phpinfo(); ?>  -->

<!-- 检查浏览页面的浏览器 -->
<?php
	// echo $_SERVER['HTTP_USER_AGENT'];
?>

<!-- 判断使用浏览器的类型(if:流程控制) -->
<?php
	/**
	 * PHP内置函数:strpos()---查找字符串首次出现的位置
	 * mixed strpos ( string $haystack , mixed $needle [, int $offset = 0 ]
	 * 返回 needle 在 haystack 中首次出现的数字位置。
	 */
	// if(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE){
	// 	echo '正在使用谷歌浏览器。';
	// }
?>