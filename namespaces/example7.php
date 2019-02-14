<?php
/*
 * 命名空间 - 使用命名空间 : 别名/导入
 */

// 导入操作是在编译执行的，但动态的类名称、函数名称或常量名称则不是。

# Example 3 导入动态名称
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // 实例化一个 My\Full\Classname 对象
$a = 'Another';
$obj = new $a; // 实例化一个 Another 对象


