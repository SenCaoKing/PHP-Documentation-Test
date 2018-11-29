<?php

$foo = include 'test.php';

echo $foo; // prints 'PHP'

$bar = include 'noreturn.php';

echo $bar; // prints 1

// $bar 的值为 1 是因为 include 成功运行了。注意以上例子中的区别。第一个在被包含的文件中用了 return 而另一个没有。如果文件不能被包含，则返回 FALSE 并发出一个 E_WARNING 警告。

// 如果在包含文件中定义有函数，这些函数不管是在 return 之前还是之后定义的，都可以独立在主文件中使用。如果文件被包含两次，PHP 5 发出致命错误因为函数已经被定义，但是 PHP 4 不会对在 return 之后定义的函数报错。推荐使用 include_once 而不是检查文件是否已包含并在包含文件中有条件返回。

?>