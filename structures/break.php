<?php

/**
 * 流程控制 - break
 */
// break 结束当前 for,foreach,while,do-while 或者 switch 结构的执行。
// break 可以接受一个可选的数字参数来决定跳出几重循环。

$arr = array('one', 'two', 'three', 'four', 'stop', 'five');
while (list (, $val) = each($arr)) {
    if ($val == 'stop') {
        break; /* You could also write 'break 1;' here. */
    }
    echo "$val<br/>\n";
    /*
    one
    two
    three
    four
    */
}

echo '<br/>-----------<br/>';

/* 使用可选参数 */
$i = 0;
while (++$i) {
    switch ($i) {
        case 5:
            echo "At 5<br />\n"; // At 5
            break 1; /* 只退出 switch. */
        case 10:
            echo "At 10; quitting<br />\n"; // At 10; quitting
            break 2; /* 退出 switch 和 while 循环 */
        default :
            break;
    }
}

?>