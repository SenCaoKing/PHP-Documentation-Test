<?php

    $a_bool = TRUE;

    $a_str = "foo";

    $a_str2 = 'foo';

    $an_int = 12;

    /**
     * gettype() --- 获取变量的类型
     * string gettype ( mixed $var )
     * 返回 PHP 变量的类型 var.
     */
    echo gettype($a_bool).'<br>'; // boolean
    echo gettype($a_str).'<br>';  // string
    echo gettype($a_str2).'<br>'; // string
    echo gettype($an_int).'<br>'; // integer

    /**
     * is_int()--- 检测变量是否是整数
     * bool is_int ( mixed $var )
     * 如果 var 是 integer 则返回 TRUE，否则返回 FALSE.
     */
    // 判断变量 an_int 是否是整形，是就加上4
    if (is_int($an_int)) {
        $an_int += 4;
    }
    echo $an_int; // 6
    echo '<br>';

    /**
     * is_string --- 检测变量是否是字符串
     * bool is_string ( mixed $var )
     * 如果 var 是 string 则返回TRUE，否则返回 FALSE. 
     */
    // 如果变量 a_str 是字符串，就打印出来
    if (is_string($a_str)) {
        echo "String: $a_str"; // String: foo
    }

    // 同理还有函数:is_bool()、is_integer()、is_float()、is_real()、is_object() 和 is_array()。 

?>