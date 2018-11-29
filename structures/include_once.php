<?php

/*
 * 流程控制 - include_once
 */
// include_once 语句在脚本执行期间包含并运行指定文件。此行为和 include 语句类似，唯一区别是如果该文件中已经被包含过，则不会再次包含。如同此语句名字暗示的那样，只会包含一次。

// include_once 可以用于在脚本执行期间同一个文件有可能被包含超过一次的情况下，想确保它只被包含一次以避免函数重定义，变量重新赋值等问题。

// 更多信息参见 include 文档。

/**
 * Note:
 * 在 PHP4 中， _once 的行为在不区分大小写字母的操作系统(例如 Windows)中有所不同，例如：
 */

# Example 1 include_once 在 PHP4 运行下不区分大小写的操作系统中
include_once "a.php"; // 这将包含 a.php
include_once "A.php"; // 这将再次包含 a.php!(仅 PHP4)

// 此行为在 PHP5 中改了，例如在 Windows 中路径先被规格化，因此 C:\PROGRA~1\A.php 和 C:\Program Files\a.php 的实现一样，文件只会被包含一次。


?>