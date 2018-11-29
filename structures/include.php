<?php

/**
 * 流程控制 - include
 */
// include 语句包含并运行指定文件。

// 以下文档也适用于 require。

// 被包含文件先按参数给出的路径寻找，如果没有给出目录（只有文件名）时则按照 include_path 指定的目录寻找。如果在 include_path 下没找到该文件则 include 最后才在调用脚本文件所在的目录和当前工作目录下寻找。如果最后仍未找到文件则 include 结构会发出一条警告；这一点和 require 不同，后者会发出一个致命错误。

// 如果定义了路径——不管是绝对路径（在 Windows 下以盘符或者 \ 开头，在 Unix/Linux 下以 / 开头）还是当前目录的相对路径（以 . 或者 .. 开头）—— include_path 都会被完全忽略。例如一个文件以 ../ 开头，则解析器会在当前目录的父目录下寻找该文件。

// 当一个文件被包含时，其中所包含的代码继承了 include 所在行的变量范围。从该处开始，调用文件在该行处可用的任何变量在被调用的文件中也都可用。不过所有在包含文件中定义的函数和类都具有全局作用域。

# Example 1 基本的 include 例子
$color = 'green';
$fruit = 'apple';
// 见 test.php

// 如果 include 出现于调用文件中的一个函数里，则被调用的文件中所包含的所有代码将表现的如同它们是在 该函数内部定义的一样。所以它将遵循该函数的变量范围。此规则的一个例外是魔术常量，它们是在发生包含之前就已被解析器处理的。

# Example 2 函数中的包含
// 见 test.php


// 当一个文件被包含时，语法解析器在目标文件的开头脱离 PHP 模式并进入 HTML 模式，到文件结尾处恢复。由于此原因，目标文件中需要作为 PHP 代码执行的任何代码都必须被包含在 有效的 PHP 起始和结束标记之中。

// 如果“URL fopen wrappers”在 PHP 中被激活（默认配置），可以用 URL（通过 HTTP 或者其它支持的封装协议——见支持的协议和封装协议）而不是本地文件来指定要被包含的文件。如果目标服务器将目标文件作为 PHP 代码解释，则可以用适用于 HTTP GET 的 URL 请求字符串来向被包括的文件传递变量。严格的说这和包含一个文件并继承父文件的变量空间并不是一回事；该脚本文件实际上已经在远程服务器上运行了，而本地脚本则包括了其结果。

// Warning Windows 版本的 PHP 在 4.3.0 版之前不支持通过此函数访问远程文件，即使已经启用 allow_url_fopen.

# Example 3 通过 HTTP 进行的 include
/**
 * This example assumes that www.example.com is configured to parse .php
 * files and not .txt files. Also, 'Works' here means that the variables
 * $foo and $bar are available within the included file.
 */

// Won't works; file.txt wasn't handled by www.example.com as PHP
include 'http://www.example.com/file.txt?foo=1&bar=2';

// Won't work; looks for a file named 'file.php?foo=1&bar=2' on the local filesystem.
include 'file.php?foo=1&bar=2';

// Works.
include 'http://www.example.com/file.php?foo=1&bar=2';

$foo = 1;
$bar = 2;
include 'file.txt'; // Works.
include 'file.php'; // Works.

/**
 * Warning
 * 安全警告
远程文件可能会经远程服务器处理（根据文件后缀以及远程服务器是否在运行 PHP 而定），但必须产生出一个合法的 PHP 脚本，因为其将被本地服务器处理。如果来自远程服务器的文件应该在远端运行而只输出结果，那用 readfile() 函数更好。另外还要格外小心以确保远程的脚本产生出合法并且是所需的代码
 */

// 处理返回值：在失败时 include 返回 FALSE 并且发出警告。成功的包含则返回 1，除非在包含文件中另外给出了返回值。可以在被包括的文件中使用 return 语句来终止该文件中程序的执行并返回调用它的脚本。同样也可以从被包含的文件中返回值。可以像普通函数一样获得 include 调用的返回值。不过这在包含远程文件时却不行，除非远程文件的输出具有合法的 PHP 开始和结束标记（如同任何本地文件一样）。可以在标记内定义所需的变量，该变量在文件被包含的位置之后就可用了。

// 因为 include 是一个特殊的语言结构，其参数不需要括号。在比较其返回值时要注意。
// won't work, evaluated as include((test.php) == 'OK'), i.e. include('')
if (include('test.php') == 'OK') {
    echo 'OK';
}

// works
if((include 'test.php') == 'OK'){
    echo 'OK';
}

# Example 5 include 和 return 语句
// 见 testreturns.php

// 另一个将 PHP 文件“包含”到一个变量中的方法是用输出控制函数结合 include 来捕获其输出，例如：
# Example 6 使用输出缓冲来将 PHP 文件包含入一个字符创
// 见 include_to_string.php

// 要在脚本中自动包含文件，参见 php.ini 中的 auto_prepend_file 和 auto_append_file 配置选项。

// Note：因为是一个语言构造器而不是一个函数，不能被 可变函数 调用。



?>