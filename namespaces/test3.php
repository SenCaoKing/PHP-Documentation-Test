<?php
/*
 * 命名空间 - 在同一个文件中定义多个命名空间
 */

# Example 4 定义多个命名空间和不包含在命名空间中的代码
declare(encoding='UTF-8');
namespace MyProject {

    const CONNECT_OK = 1;
    class Connection { /* ... */ }
    function connect() { /* ... */ }
}

namespace { // 全局代码
    session_start();
    $a = Myproject\connect();
    echo MyProject\Connection::start();
}

?>