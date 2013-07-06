<?php
/**
 * @author: nini
 * Date: 7/6/13
 * Time: 12:47 AM
 */
$filename = array("all.php", "auth.php",
    "auth.txt", "base.txt",
    "chat.html", "config.php",
    "count.txt", "count_new.txt",
    "counter.dat", "counter.php",
    "create.php", "dat.db");

$chunkedByFour = array_chunk($filename, 4);

//Rotate array by 90 degree
$transposedArray = array_map(null, $chunkedByFour[0], $chunkedByFour[1], $chunkedByFour[2]);


$wrapToColumn = function ($string) {
    return "<td>$string</td>";
};

$wrapToRow = function (array $array) {
    return "<tr>".implode('', $array)."</tr>";
};

$monadOrWhat = function($fn) {
    return function($value) use ($fn) {
        return array_map($fn, $value);
    };
};

$columns = array_map($monadOrWhat($wrapToColumn), $transposedArray);
$rows = array_map($wrapToRow, $columns);

echo '<table border="1">';
echo implode("\n", $rows);
echo '</table>';