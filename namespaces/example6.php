<?php
/*
 * 命名空间 - 使用命名空间 : 别名/导入
 */

// 注意对命名空间中的名称（包含命名空间分隔符的完全限定名称如 Foo\Bar 以及相对的不包含命名空间分隔符的全局名称如 FooBar）来说，前导的反斜杠是不必要的也不推荐的，因为导入的名称必须是完全限定的，不会根据当前的命名空间做相对解析。
// 为了简化操作，PHP 还支持在一行中使用多个 use 语句

# Example 2 通过 use 操作符导入/使用别名，一行中包含多个 use 语句
use My\Full\Classname as Another, My\Full\Nsname;

$obj = new Another; // 实例化 My\Full\Classname 对象
Nsname\subns\func(); // 调用函数 My\Full\NSname\subns\func


