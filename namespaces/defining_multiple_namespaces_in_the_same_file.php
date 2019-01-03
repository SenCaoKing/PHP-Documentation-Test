<?php
/*
 * 命名空间 - 在同一个文件中定义多个命名空间
 */

// 也可以在同一个文件中定义多个命名空间。在同一个文件中定义多个命名空间的两种语法形式。

# Example 1 定义多个命名空间，简单组合语法
namespace MyProject;

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */ }

namespace AnotherProject;

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */ }

// 不建议使用这种语法在单个文件中定义多个命名空间。建议使用下面的大括号形式的语法。

# Example 2 定义多个命名空间，大括号语法
// 见 test.php

// 在实际的编程实践中，非常不提倡在同一个文件中定义多个命名空间。这种方式的主要用于将多个 PHP 脚本合并在同一个文件中。

// 将全局的非命名空间中的代码与命名空间中的代码组合在一起，只能使用大括号形式的语法。全局代码必须用一个不带名称的 namespace 语句加上大括号括起来，例如：

# Example 3 定义多个命名空间和不包含在命名空间中的代码
// 见 test2.php

// 除了开始的 declare 语句外，命名空间的括号外不得有任何 PHP 代码。

# Example 4 定义多个命名空间和不包含在命名空间中的代码
// 见 test3.php


?>