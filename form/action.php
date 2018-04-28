<?php
	
	/**
	 * htmlspecialchars()---使得 HTML 之中的特殊字符被正确的编码，从而不会被使用者在页面注入 HTML 标签或者 Javascript 代码。
	 * string htmlspecialchars ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] )
	 */
	echo '你好，'.htmlspecialchars($_POST['name']);
	echo '<br>';
	/**
	 * int(由于 age 已知是一个数值，因此将它转换为一个整形值[integer]来自动的消除任何不必要的字符。)
	 */
	echo '你 '.(int)$_POST['age'].' 岁了';
?>