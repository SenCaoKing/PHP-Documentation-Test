<?php
/*
 * 命名空间 - namespace关键字和__NAMESPACE__常量
 */

# Example 3 使用 __NAMESPACE__ 动态创建名称
namespace MyProject;

function get($classname)
{
    $a = __NAMESPACE__ . '\\' . $classname;
    return new $a;
}