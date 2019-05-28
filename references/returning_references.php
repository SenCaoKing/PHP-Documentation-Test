<?php
/*
 * 引用的解释 - 引用返回
 */

class foo {
    public $value = 42;

    public function &getValue() {
        return $this->value;
    }
}

$obj = new foo;
$myValue = &$obj->getValue();
var_dump($obj);
/**
 * Output：
 * object(foo)[1]
        public 'value' => int 42
 */
$obj->value = 2;
var_dump($myValue); // int 2