<?php
/*
 * 命名空间 - 使用命名空间 : 别名/导入
 */

// 另外，导入操作只影响非限定名称和限定名称。完全限定名称由于是确定的，故不受导入的影响。

# Example 4 导入和完全限定名称
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // instantiates object of class My\Full\Classname
$obj = new \Another; // instantiates object of class Another
$obj = new Another\thing; // instantiates object of class My\Full\Classname\thing
$obj = new \Another\thing; // instantiates object of class Another\thing

