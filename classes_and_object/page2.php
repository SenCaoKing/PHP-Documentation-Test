<?php
/*
 * 类与对象 - 对象序列化
 */

/* 序列化对象 -  在会话中存放对象 */

# Example 1
// 见 classa.inc、page1.php、page2.php

include("./page1.php");

$s = file_get_contents('store');
$a = unserialize($s);

$a->show_one(); // Output:1



?>