<?php
/**
 * @author: nini
 * Date: 7/6/13
 * Time: 1:51 PM
 */
date_default_timezone_set('Europe/Berlin');

//$beginOfMonth = strtotime('first day of this month');
$beginOfMonth = strtotime('first day of previous month');
//$daysInMonth = range(1, date("t", strtotime('July')));
$daysInMonth = range(1, date("t", strtotime('Juny')));

function emptyWeek(){
    return array_fill(0, 7, null);
}


$weeks = array();
$week = emptyWeek();
$indexOfDay = null;

foreach ($daysInMonth as $day) {
    $indexOfDay = date('N', strtotime(($day - 1) . ' day', $beginOfMonth)) - 1;
    $week[$indexOfDay] = $day;
    if($indexOfDay == 6) {
        $weeks[] = $week;
        $week = emptyWeek();
    }
}
if ($indexOfDay != 6) {
    $weeks[] = $week;
}

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

$columns = array_map($renameMe($wrapToColumn), $weeks);
$rows = array_map($wrapToRow, $columns);

echo '<table border="1">';
echo implode("\n", $rows);
echo '</table>';