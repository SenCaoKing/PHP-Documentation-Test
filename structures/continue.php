<?php

/**
 * 流程控制 - continue
 */
// continue 在循环结构用来跳过本次循环中剩余的代码并在条件求值为真时开始执行下一次循环。
// Note：注意在 PHP 中 switch 语句被认为是可以使用 continue 的一种循环结构。

// continue 接受一个可选的数字参数来决定跳过几重循环到循环结尾。默认值是 1，即跳到当前循环末尾。
$arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
while (list ($key, $value) = each($arr)) {
    if ($key % 2) { // skip odd numbers
        continue;
    }
    echo "$value<br />\n";
    /*
    1
    3
    5
    7
    9
    */
}

echo '<br />----------<br />';

$i = 0;
while ($i++ < 5) {
    echo "Outer<br />\n";
    while (1) {
        echo "Middle<br />\n";
        while (1) {
            echo "Inner<br />\n";
            continue 3;
        }
        echo "This never gets output.<br />\n";
    }
    echo "Neither does this.<br />\n";
}
/*
Outer
Middle
Inner
Outer
Middle
Inner
Outer
Middle
Inner
Outer
Middle
Inner
Outer
Middle
Inner
*/

echo '<br />----------<br />';

// 省略 continue 后面的分号会导致混淆。以下例子示意了不应该这样做。
for ($i = 0; $i < 5; ++$i) {
    if ($i == 2)
        /*
        continue
        print "$i\n"; // 2 [PHP5.3 以下版本输出结果 2, 以上版本错误]
        */

        continue; // 分号不要省略！
        print "$i\n"; // 0 1 3 4
}

// 因为整个 continue print "$i\n"; 被当成单一的表达式而求值，所以 print 函数只有在 $i == 2 为真时才被调用（ print 的值被当成了上述的可选数字参数而传递给了 continue）。




?>