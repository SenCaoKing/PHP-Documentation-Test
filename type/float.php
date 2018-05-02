<?php

    // Float 浮点数
    // 比较浮点数
    $a = 1.234567890;
    $b = 1.23456780;
    $epsilon = 0.00001;

    if(abs($a-$b) < $epsilon){
        echo "true";
    }
?>
<?php

    /**
     * is_nan() --- 判断是否为合法数值
     * bool is_nan ( float $val )
     * 如果 val 为"非数值",例如 acos(1.01) 的结果，则返回 TRUE,否则返回 FALSE.。
     */
    echo "<hr>";
    /**
     * acos() --- 反余弦。
     * float acos ( float $arg )
     * 返回 arg 的反余弦值，单位是弧度。acos() 是 cos() 的反函数，它的意思是在 acos() 范围里的每个值都是 a==cos(acos(a))
     */
    $nan = acos(8);
    var_dump($nan);         // float(NAN)
    var_dump(is_nan($nan)); // bool(true)
?>
