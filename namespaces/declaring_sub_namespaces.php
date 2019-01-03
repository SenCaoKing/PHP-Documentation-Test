<?php
/*
 * 命名空间 - 定义子命名空间
 */

// 与目录和文件的关系很像，PHP 命名空间也允许指定层次化的命名空间的名称。因此，命名空间的名字可以使用分层次的方式定义：

# Example 1 声明分层次的单个命名空间
namespace MyProject\Sub\Level;

const CONNECT_OK = 1;
class Connection { /* ... */}
function connect() { /* ... */}

// 上面的例子创建了常量 MyProject\Sub\Level\CONNECT_OK，类 MyProject\Sub\Level\Connection 和函数 MyProject\Sub\Level\connect。

?>