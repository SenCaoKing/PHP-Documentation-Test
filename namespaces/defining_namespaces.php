<?php
/*
 * 命名空间 - 定义命名空间
 */

/**
 * 虽然任意合法的 PHP 代码都可以包含在命名空间中，但只有以下类型的代码受命名空间的影响，它们是：类（包括抽象类和 traits）、接口、函数和常量。
 *
 * 命名空间通过关键字 namespace 来声明。如果一个文件中包含命名空间，它必须在其它所有代码之前声明命名空间，除了一个以外：declare 关键字。
 */

# Example 1 声明单个命名空间
namespace MyProject;

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */ }

?>
<html>
<?php

// 在声明命名空间之前唯一合法的代码是用于定义源文件编码方式的 declare 语句。另外，所有非 PHP 代码包括空白字符都不能出现在命名空间的声明之前：

# Example 2 声明单个命名空间
namespace Myproject;

// 另外，与 PHP 其它的语言特征不同，同一个命名空间可以定义在多个文件中，即允许将同一个命名空间的内容分割存放在不同的文件中。



?>