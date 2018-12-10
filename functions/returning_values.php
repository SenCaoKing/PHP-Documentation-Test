<?php

/*
 * 函数 - 返回值
 */
// 值通过使用可选的返回语句返回。可以返回包括数组和对象的任意类型。返回语句会立即中止函数的运行，并且将控制权交回调用该函数的代码行。更多信息见 return。

/**
 * Note：
 * 如果省略了 return，则返回值为 NULL。
 */

/* return 的使用 */
# Example 1 return的使用
function square($num)
{
    return $num * $num;
}
echo square(4); // Outputs '16'

echo '<hr>';

// 函数不能返回多个值，但可以通过返回一个数组来得到类似的效果。

# Example 2 返回一个数组以得到多个返回值
function small_numbers()
{
    return array(0, 1, 2);
}
list($zero, $one, $two) = small_numbers();

echo '<hr>';

// 从函数返回一个引用，必须在函数声明和指派返回值给一个变量时都使用引用运算符 &：

# Example 3 从函数返回一个引用
function &returns_reference()
{
    return $someref;
}

$newref = & returns_reference();

/* Return type declarations */
/**
 * PHP 7 adds support for return type declarations. Similarly to argument type declarations, return type declarations specify the type of the value that will be returned from a function. The same types are available for return type declarations as are available for argument type declarations.
 *
 * Strict typing also has an effect on return type declarations. In the default weak mode, returned values will be coerced to the correct type if they are not already of that type. In strong mode, the returned value must be of the correct type, otherwise a TypeError will be thrown.
 */
/**
 * Note:
 * When overriding a parent method, the child's method must match any return type declaration on the parent. If the parent doesn't define a return type, then the child method may do so.
 */

# Example 4 Basic return type declaration
function sum($a, $b): float {
    return $a + $b;
}

// Note that a float will be returned.
var_dump(sum(1, 2));
/**
 * Outputs: float(3)
 */

echo '<hr>';

# Example 5 Strict mode in action
// 见 strict.php


# Example 6 Returning an object
Class C {}

function getc(): C {
    return new C;
}

var_dump(getC());
/**
 * Outputs： object(C)[1]
 */

?>