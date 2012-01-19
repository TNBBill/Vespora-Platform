<?php
namespace vespora\helpers;

class stringHelper{

    /**
     * Checks to see if string ends with test.
     *
     * @static
     * @param $string a string value
     * @param $test a test value
     * @return bool true, if the string ends with test. False otherwise.
     */
    public static function endsWith($string, $test) {
        $strlen = strlen($string);
        $testlen = strlen($test);
        if ($testlen > $strlen) return false;
        return substr_compare($string, $test, -$testlen, $testlen, true) === 0;
    }
}

?>