<?php
/**
 * @author: nini
 * Date: 7/6/13
 * Time: 1:51 PM
 */
date_default_timezone_set('Europe/Berlin');
header('Content-Type: text/html; charset=utf-8');

$beginOfMonth = strtotime('first day of this month');
//$beginOfMonth = strtotime('first day of previous month');
$daysInMonth = range(1, date("t", strtotime('July')));
//$daysInMonth = range(1, date("t", strtotime('Juny')));

$weeks = array();
$week = emptyWeek();
$indexOfDay = null;

//@TODO refactor mutable mess
foreach ($daysInMonth as $day) {
    $indexOfDay = date('N', strtotime(($day - 1) . ' day', $beginOfMonth)) - 1;
    switch ($indexOfDay){
        case 5:
        case 6:
            $week[$indexOfDay] = "<span style='color:red'>$day</span>"; break;
        default:
            $week[$indexOfDay] = $day;
    }
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

echo '<p>Календарь на текущий месяц в американском формате:</p>';
echo '<table border="1">';
echo implode("\n", $rows);
echo '</table>';

$columns = array_map($renameMe($wrapToColumn), transpose($weeks));
$rows = array_map($wrapToRow, $columns);

echo '<p>Календарь на текущий месяц в российском формате:</p>';
echo '<table border="1">';
echo implode("\n", $rows);
echo '</table>';


function transpose($array){
    array_unshift($array, NULL);
    return call_user_func_array('array_map', $array);
}

function emptyWeek(){
    return array_fill(0, 7, null);
}