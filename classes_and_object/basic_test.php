<?php
/*
 * 类与对象 - 基本概念
 */

# Example 10 类名的解析
namespace NS {
    class ClassName {
    }

    echo ClassName::class; // Output: NS\ClassName
}

/**
 * Note:
 * The class name resolution using ::class is a compile time transformation. That means at the time the class name string is created no autoloading has happened yet. As a consequence, class names are expanded even if the class does not exist. No error is issued in that case.
 */

?>