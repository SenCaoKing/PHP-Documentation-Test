<?php
	// NULL
	// 特殊的 NULL 值表示一个变量没有值。NULL 类型唯一可能的值就是 NULL。

	/**
	 * 在下列情况下一个变量被认为是 NULL：
	 * ① 被赋值为 NULL。
	 * ② 尚未被赋值。
	 * ③ 被 unset()。
	 */
	
	// 语法
	// NULL 类型只有一个值，就是不区分大小写的常量 NULL。
	$var = NULL;

	// 转换到 NULL
	// 使用 (unset) $var 将一个变量转换为 null 将不会删除该变量或 unset 其值。仅是返回 NULL 值而已。



?>