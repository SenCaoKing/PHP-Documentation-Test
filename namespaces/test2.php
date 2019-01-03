<?php
/*
 * 命名空间 - 在同一个文件中定义多个命名空间
 */

# Example 3 定义多个命名空间和不包含在命名空间中的代码
namespace MyProject {

const CONNECT_OK = 1;
class Connection { /* ... */ }
function connect() { /* ... */ }
}

namespace { // global code
session_start();
$a = Myproject\connect();
echo MyProject\Connection::start();
}

// 除了开始的 declare 语句外，命名空间的括号外不得有任何 PHP 代码。

?>