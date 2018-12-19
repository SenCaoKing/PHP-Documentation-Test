<?php
/*
 * 类与对象 - Final关键字
 */

/**
 * PHP5 新增了一个 final 关键字，如果父类中的方法被声明为 final，则子类无法覆盖该方法。如果一个类被声明为 final，则不能被继承。
 */

# Example 1 Final 方法示例
class BaseClass {
    public function test() {
        echo "BaseClass::test() called\n";
    }

    final public function moreTesting() {
        echo "BaseClass::moreTesting() called\n";
    }
}

class ChildClass extends BaseClass {
    /*
    public function moreTesting() {
        echo "ChildClass::moreTesting() called\n";
    }
    */
}
/**
 * Results in Fatal error: Cannot override final method BaseClass::moreTesting()
 */

# Example 2 Final 类示例
final class BaseClass2 {
    public function test() {
        echo "BaseClass2::test() called\n";
    }

    // 这里无论你是否将方法声明为 final，都没有关系
    final public function moreTesting() {
        echo "BaseClass2::moreTesting() called\n";
    }
}

/*
class ChildClass2 extends BaseClass2 {
}
*/
/**
 * 产生 Fatal error: Class ChildClass2 may not inherit from final class (BaseClass2)
 */

/**
 * Note：
 * 属性不能被定义为 final，只有类和方法才能被定义为 final。
 */


?>