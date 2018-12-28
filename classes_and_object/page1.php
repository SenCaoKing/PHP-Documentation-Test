<?php
/*
 * 类与对象 - 对象序列化
 */

/* 序列化对象 -  在会话中存放对象 */

# Example 1
// 见 classa.inc、page1.php、page2.php

include("./classa.inc");

$a = new A;
$s = serialize($a);
// 把变量 $s 保存起来以便文件 page2.php 能够读到
file_put_contents('store', $s);

?>