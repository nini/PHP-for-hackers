<?php
/**
 * @author: nini
 * Date: 7/5/13
 * Time: 11:10 PM
 */
$filename = array("all.php", "auth.php",
    "auth.txt", "base.txt",
    "chat.html", "config.php",
    "count.txt", "count_new.txt",
    "counter.dat", "counter.php",
    "create.php", "dat.db");

/**
 * Return longest string in array
 *
 * @param array $array
 * @return mixed
 */
function longestString(array $array) {
    return max(array_map(strlen, $array));
};

/**
 * Return str_pad
 *
 * @param $max
 * @param $sep
 * @return callable
 */
function strPadByLengthAndSeparator($max, $sep) {
    return function ($string) use ($max, $sep){
        return str_pad($string, $max, $sep, STR_PAD_LEFT);
    };
}

echo '<pre>';
echo implode("\n", array_map(strPadByLengthAndSeparator(longestString($filename), ' '), $filename));
echo '</pre>';
