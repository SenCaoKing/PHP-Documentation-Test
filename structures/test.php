<?php

# Example 1
/*
echo "A $color $fruit"; // A

include 'include.php';

echo "A $color $fruit"; // A green apple
*/

# Example 2
/*
function foo()
{
    global $color;

    include 'include.php';

    echo "A $color $fruit";
}
*/
/**
 * include.php is in the scope of foo() so
 * $fruit is NOT available outside of this
 * scope. $color id because we declared it
 * as global.
 */

/*
foo();                  // A green apple
echo "A $color $first"; // A green
*/


$var = 'PHP';

return $var;

?>