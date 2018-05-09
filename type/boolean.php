<?php
    
    // Boolean 布尔类型
    
    // 通常运算符所返回的 boolean 值结果会被传递给流程控制
    // == 是一个操作符，他检测两个变量是否相等，并返回一个布尔值
    if($action == "show version"){
        echo "The version is 1.23";
    }

    // 这样做是不必要的...
    if($show_separators == TRUE){
        echo "<hr>\n";
    }

    // ...因为可以使用下面这种简单的方式
    if($show_separators){
        echo "<hr>\n";
    }

?>
<?php

    var_dump((bool) "");        // bool(false)
    echo '<br>';
    var_dump((bool) 1);         // bool(true)
    echo '<br>';
    var_dump((bool) -2);        // bool(true)
    echo '<br>';
    var_dump((bool) "foo");     // bool(true) 
    echo '<br>';    
    var_dump((bool) 2.3e5);     // bool(true) 
    echo '<br>';
    var_dump((bool) array(12)); // bool(true) 
    echo '<br>';
    var_dump((bool) array());   // bool(false)
    echo '<br>';
    var_dump((bool) "false");   // bool(true)

?>