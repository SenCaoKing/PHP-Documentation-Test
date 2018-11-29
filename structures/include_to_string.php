<?php

$string = get_include_contents('testreturns.php');
var_dump($string); // PHP 1

function get_include_contents($filename) {
    if (is_file($filename)) {
        ob_start();
        include $filename;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }
    return false;
}

?>