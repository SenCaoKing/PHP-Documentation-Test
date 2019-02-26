<?php
/*
 * 命名空间 - 使用命名空间 : 别名/导入
 */

/**
 * 允许通过别名引用或导入外部的完全限定名称，是命名空间的一个重要特征。这有点类似于在类 unix 文件系统中可以创建对其它的文件或目录的符号链接。
 *
 * 所有支持命名空间的 PHP 版本支持三种别名或导入方式 : 为类名称使用别名、为接口使用别名或为命名空间名称使用别名。PHP5.6 开始允许导入函数或常量或者为它们设置别名。
 *
 * 在 PHP 中，别名是通过操作符 use 来实现的，下面是一个使用所有可能的五种导入方式的例子:
 */

# Example 1 使用 use 操作符导入/使用别名
// 见 example5.php

// 注意对命名空间中的名称（包含命名空间分隔符的完全限定名称如 Foo\Bar 以及相对的不包含命名空间分隔符的全局名称如 FooBar）来说，前导的反斜杠是不必要的也不推荐的，因为导入的名称必须是完全限定的，不会根据当前的命名空间做相对解析。
// 为了简化操作，PHP 还支持在一行中使用多个 use 语句

# Example 2 通过 use 操作符导入/使用别名，一行中包含多个 use 语句
// 见 example6.php

// 导入操作是在编译执行的，但动态的类名称、函数名称或常量名称则不是。

# Example 3 导入和动态名称
// 见 example7.php

// 另外，导入操作只影响非限定名称和限定名称。完全限定名称由于是确定的，故不受导入的影响。

# Example 4 导入和完全限定名称
// 见 example8.php