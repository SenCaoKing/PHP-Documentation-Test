<?php

/**
 * 流程控制 - elseif / else if
 */

$a = 6;
$b = 8;
if ($a > $b) {
    echo "a is bigger than b";
} elseif($a == $b) {
    echo "a is equal to b";
} else {
    echo "a is smaller than b" . PHP_EOL; // a is smaller than b
}

/* 不正确的使用方法： */
/*
if($a > $b):
    echo "a is bigger than b";
else if($a == $b): // 将无法编译
    echo "The above line causes a parse error.";
endif;
*/

echo '<hr>';

/* 正确的使用方法: */
if($a > $b):
    echo $a . " is greater than " . $b;
elseif($a == $b): // 注意使用了一个单词的 elseif
    echo $a . " equals " . $b;
else:
    echo $a . " is neither greater than or equal to " . $b; // 6 is neither greater than or equal to 8
endif;

?>