<?php
/*
 * 命名空间 - 命名空间和动态语言特征
 */

// PHP 命名空间的实现受到其语言自身的动态特征的影响。因此，如果要将下面的代码转换到命名空间中：

# Example 1 动态访问元素
class classname
{
    function __construct()
    {
        echo __METHOD__, "\n";
    }
}
function funcname()
{
    echo __FUNCTION__, "\n";
}
const constname = "global";

$a = 'classname';
$obj = new $a; // Output: classname::__construct
$b = 'funcname';
$b(); // Output: funcname
echo constant('constname'), "\n"; // Output: global

// 必须使用完全限定名称（包括命名空间前缀的类名称）。注意因为在动态的类名称、函数名称或常量名称中，限定名称和完全限定名称没有区别，因此其前导的反斜杠是不必要的。

# Example 2 动态访问命名空间的元素
// 见 example2.php



?>