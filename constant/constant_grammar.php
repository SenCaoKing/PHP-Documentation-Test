<?php

    // 常量语法
    // 可以用 define() 函数来定义常量，在 PHP 5.3.0 以后，可以使用 const 关键字在类定义之外定义常量。一个常量一旦被定义，就不能再改变或者取消定义。
    
    // 常量只能包含标量数据（boolean，integer，float 和 string）。可以定义 resource 常量，但应尽量避免，因为会造成不可预料的结果。

    // 可以简单的通过指定其名字来取得常量的值，与变量不同，不应该在常量前面加上 $ 符号。如果常量名是动态的，也可以用函数 constant() 来获取常量的值。用 get_defined_constants() 可以获得所有已定义的常量列表。
    
    // Note: 常量和（全局）变量在不同的名字空间中。这意味着例如 TRUE 和 $TRUE 是不同的。
    
    // 如果使用了一个未定义的常量，PHP 假定想要的是该常量本身的名字，如同用字符串调用它一样（CONSTANT 对应 "CONSTANT"）。此时将发出一个 E_NOTICE 级的错误。参见手册中为什么 $foo[bar] 是错误的（除非事先用 define() 将 bar 定义为一个常量）。如果只想检查是否定义了某常量，用 defined() 函数。
    

    /**
     * 常量和变量有如下不同：
     * ① 常量前面没有美元符号（$）；
     * ② 常量只能用 define() 函数定义，而不能通过赋值语句；
     * ③ 常量可以不用理会变量的作用域而在任何地方定义和访问；
     * ④ 常量一旦定义就不能被重新定义或者取消定义；
     * ⑤ 常量的值只能是标量。
     */
    
    #1 定义常量
    define("CONSTANT", "Hello World");
    echo CONSTANT; // Hello World

    echo '<br />';

    // 输出 "Constant" 并发出一个提示级别错误信息
    echo Constant; // Constant(报错：Notice: Use of undefined constant Constant - assumed 'Constant' in E:\WWW\git\PHP-Documentation-Test\constant\constant_grammar.php on line 30)

    echo '<hr>';

    #2 使用关键字 const 定义常量
    
    // 以下代码在 PHP 5.3.0 后可以正常工作
    const CON = "Hello,world!"; // Hello,world!
    echo CON;

    // Note:
    // 和使用 define() 来定义常量相反的是，使用 const 关键字定义常量必须处于最顶端的作用区域，因为用此方法是在编译时定义的。这就意味着不能在函数内，循环内以及 if 语句之内用 const 来定义常量。





?>
