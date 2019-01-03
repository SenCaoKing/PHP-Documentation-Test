<?php
/*
 * 命名空间 - 在同一个文件中定义多个命名空间
 */

// 建议使用下面的大括号形式的语法。

# Example 2 定义多个命名空间，大括号语法
namespace MyProject {

    const CONNECT_OK = 1;
    class Connection { /* ... */ }
    function connect() { /* ... */ }
}

namespace AnotherProject {

    const CONNECT_OK = 1;
    class Connection { /* ... */ }
    function connect() { /* ... */ }

}

// 在实际的编程实践中，非常不提倡在同一个文件中定义多个命名空间。这种方式的主要用于将多个 PHP 脚本合并在同一个文件中。

?>