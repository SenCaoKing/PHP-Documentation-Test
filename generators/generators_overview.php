<?php
/*
 * 生成器 - 生成器总览
 */

/**
 * 生成器提供了一种更容易的方法来实现简单的对象迭代，相比较定义类实现 Iterator 接口的方式，性能开销和复杂性大大降低。
 *
 * 生成器允许你在 foreach 代码块中写代码来迭代一组数据而不需要在内存中创建一个数组，那会使你的内存达到上限，或者会占据可观的处理时间。相反，你可以写一个生成器函数，就像一个普通的自定义函数一样，和普通函数只返回一次不同的是，生成器可以根据需要 yield 多次，以便生成需要迭代的值。
 *
 * 一个简单的例子就是使用生成器来重新实现 range() 函数。标准的 range() 函数需要在内存中生成一个数组包含每一个在它范围内的值，然后返回该数组，结果就是会产生多个很大的数组。比如，调用 range(0， 1000000) 将导致内存占用超过 100MB。
 *
 * 作为一种替代方法，我们可以实现一个 xrange() 生成器，只需要足够的内存来创建 Iterator 对象并在内部跟踪生成器的当前状态，这样只需要不到 1K 字节的内存。
 */

# Example 1 将 range() 实现为生成器
function xrange($start, $limit, $step = 1)
{
    if ($start < $limit) {
        if ($step <= 0) {
            throw new LogicException('Step must be +ve');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            yield $i;
        }
    } else {
        if ($step >= 0) {
            throw new LogicException('Step must be -ve');
        }

        for ($i = $start; $i >= $limit; $i += $step) {
            yield $i;
        }
    }
}

/**
 * 注意下面 range() 和 xrange() 输出的结果是一样的。
 */

echo 'Single digit odd numbers from range(): ';
foreach (range(1, 9, 2) as $number) {
     echo "$number ";
}
echo "\n";
/**
 * Output:
 * Single digit odd numbers from range(): 1 3 5 7 9
 */

echo "<br/>****************************************<br/>";

echo 'Single digit odd numbers from xrange(): ';
foreach (xrange(1, 9, 2) as $number) {
    echo "$number ";
}
/**
 * Output:
 * Single digit odd numbers from xrange(): 1 3 5 7 9
 */
