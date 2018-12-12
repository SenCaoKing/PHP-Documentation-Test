<?php
/*
 * 类与对象 - 类常量
 */
// 可以把在类中始终保持不变的值定义为常量。在定义和使用常量的时候不需要使用 $ 符号。

// 常量的值必须是一个定值，不能是变量，类属性，数学运算的结果或函数调用。

// 接口 (interface) 中也可以定义常量。更多示例见文档中的 接口 部分。

// 自 PHP5.3.0 起，可以用一个变量来动态调用类。但该变量的值不能为 关键字（如 self，parent 或 static）。

# Example 1 定义和使用一个类常量
class MyClass
{
    const constant = 'constant value';

    function showConstant() {
        echo self::constant . "\n";
    }
}

echo MyClass::constant . "\n"; // Output: constant value

echo '<br />';

$classname = "MyClass";
echo $classname::constant . "\n"; // 自 PHP5.3.0 起 [Output: constant value]

echo '<br />';

$class = new MyClass();
$class->showConstant(); // Output: constant value

echo '<br />';

echo $class::constant . "\n"; // 自 PHP5.3.0 起 [Output: constant value]

# Example 2 静态数据示例
class foo {
    const bar = <<<'EOT'
bar
EOT;
}

// 和 heredoc 不同，nowdoc 可以用在任何静态数据中。

/**
 * Note：
 * Nowdoc 支持是在 PHP5.3.0 新增的。
 */


?>