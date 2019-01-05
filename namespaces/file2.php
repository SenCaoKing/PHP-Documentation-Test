<?php
/*
 * 命名空间 - 使用命名空间：基础
 */

/**
 * 在讨论如何使用命名空间之前，必须了解 PHP 是如何知道要使用哪一个命名空间中的元素的。可以将 PHP 命名空间与文件系统做一个简单的类比。在文件系统中访问一个文件有三种方式：
 *
 * 1. 相对文件名形式如 foo.txt。它会被解析为 currentdirectory/foo.txt，其中 currentdirectory 表示当前目录。因此如果当前目录是 /home/foo，则该文件名被解析为 /home/foo/foo.txt。
 * 2. 相对路径名形式如 subdirectory/foo.txt。它会被解析为 currentdirectory/subdirectory/foo.txt。
 * 3. 绝对路径名形式如 /main/foo.txt。它会被解析为/main/foo.txt。
 */

/**
 * PHP 命名空间中的元素使用同样的原理。例如，类名可以通过三种方式引用：
 * 1. 非限定名称，或不包含前缀的类名称，例如 $a=new foo(); 或 foo::staticmethod();。如果当前命名空间是 currentnamespace，foo 将被解析为 currentnamespace\foo。如果使用 foo 的代码是全局的，不包含在任何命名空间中的代码，则 foo 会被解析为 foo。警告：如果命名空间中的函数或常量未定义，则该非限定的函数名称或常量名称会被解析为全局函数名称或常量名称。详情参见：使用命名空间：后备全局函数名称/常量名称。
 * 2. 限定名称，或包含前缀的名称，例如 $a = new subnamespace\foo(); 或 subnamespace\foo::staticmethod();。如果当前的命名空间是 currentnamespace，则 foo 会被解析为 currentnamespace\subnamespace\foo。如果使用 foo 的代码是全局的，不包含在任何命名空间中的代码，foo 会被解析为 subnamespace\foo。
 * 3. 完全限定名称，或包含了全局前缀操作符的名称，例如 $a = new \currentnamespace\foo(); 或 \currentnamespace\foo::staticmethod();。在这种情况下，foo 总是被解析为代码中的文字名(literalname)currentnamespace\foo。
 */

// 下面是一个使用这三种方式的实例：

# 见 file1.php、file2.php
namespace Foo\Bar;
include 'file1.php';

const FOO = 2;
function foo() {}
class foo
{
    static function staticmethod() {}
}

/* 非限定名称 */
foo(); // 解析为：Foo\Bar\foo resolves to function Foo\Bar\foo
foo::staticmethod(); // 解析为类：Foo\Bar\foo 的静态方法 staticmethod。resolves to class Foo\Bar\foo, method staticmethod
echo FOO; // resolves to constant Foo\Bar\FOO [Output: 2]

/* 限定名称 */
subnamespace\foo(); // 解析为函数 Foo\Bar\subnamespace\foo
subnamespace\foo::staticmethod(); // 解析为类 Foo\Bar\subnamespace\foo，以及类的方法 staticmethod

echo subnamespace\FOO; // 解析为常量 Foo\Bar\subnamespace\FOO [Output: 1]

/* 完全限定名称 */
\Foo\Bar\foo(); // 解析为函数 Foo\Bar\foo
\Foo\Bar\foo::staticmethod(); // 解析为类：Foo\Bar\foo，以及类的方法 staticmethod
echo \Foo\Bar\FOO; // 解析为常量 Foo\Bar\FOO [Output: 2]

// 注意访问任意全局类、函数或常量，都可以使用完全限定名称，例如 \strlen() 或 \Exception 或 \INI_ALL。

?>