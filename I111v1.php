<?php
/**
 * @author: nini
 * Date: 7/6/13
 * Time: 9:25 AM
 */
$string = 'Hello World!';
print_r(nl2br(chunk_split($string, 1)));