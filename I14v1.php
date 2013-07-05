<?php
/**
 * @author: nini
 * Date: 7/6/13
 * Time: 12:07 AM
 */
$filename = array("all.php", "auth.php",
    "auth.txt", "base.txt",
    "chat.html", "config.php",
    "count.txt", "count_new.txt",
    "counter.dat", "counter.php",
    "create.php", "dat.db");

$chunkedByTwo = array_chunk($filename, 2);
$max = longestString(array_map(implode, $chunkedByTwo));

echo '<pre>';
echo implode("\n", array_map(implodeByMax($max + 5), $chunkedByTwo));
echo '</pre>';

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
 * Implodes an array with space as glue
 * Length of glue string is based on $max - length of input array as string
 * Works only for array of size 2
 *
 * @param $max
 * @return callable
 */
function implodeByMax($max) {
    return function(array $array) use ($max) {
        return implode(str_repeat(' ', $max - strlen(implode('', $array))), $array);
    };
}