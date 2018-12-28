<?php
/*
 * 类与对象 - 对象序列化
 */

/* 序列化对象 -  在会话中存放对象 */

# Example 1
// 见 classa.inc、page1.php、page2.php

class A {
    public $one = 1;

    public function show_one() {
        echo $this->one;
    }
}

?>