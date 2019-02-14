<?php
/*
 * 命名空间 - namespace关键字和__NAMESPACE__常量
 */

// PHP 支持两种抽象的访问当前命名空间内部元素的方法，__NAMESPACE__ 魔术常量和namespace关键字。

// 常量 __NAMESPACE__ 的值是包含当前命名空间名称的字符串。在全局的，不包括在任何命名空间中的代码，它包含一个空的字符串。

# Example 1 __NAMESPACE__ 示例，在命名空间中的代码
namespace MyProject;

echo '"', __NAMESPACE__, '"'; // Output: "MyProject"

# Example 2 __NAMESPACE__ 示例，全局代码
// 见 example3.php

// 常量 __NAMESPACE__ 在动态创建名称时很有用，例如：

# Example 3 使用 __NAMESPACE__ 动态创建名称
// 见 example4.php

// 关键字 namespace 可用来显式访问当前命名空间或子命名空间中的元素。它等价于类中的 self 操作符。

