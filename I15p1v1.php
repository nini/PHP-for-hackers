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

$chunkedByThree = array_chunk($filename, 3);

$wrapToColumn = function ($string) {
    return "<td>$string</td>";
};

$wrapToRow = function (array $array) {
    return "<tr>".implode('', $array)."</tr>";
};

$renameMe = function($fn) {
    return function($xxxx) use ($fn) {
        return array_map($fn, $xxxx);
    };
};

$columns = array_map($renameMe($wrapToColumn), $chunkedByThree);
$rows = array_map($wrapToRow, $columns);

echo '<table border="1">';
echo implode("\n", $rows);
echo '</table>';