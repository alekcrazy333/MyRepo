<?php
echo "Log:<br>";
$arr_log = file('Log/log.txt');
foreach($arr_log as $m) {
    $dt_str = explode("|", $m)[0];
    $page_str = explode("|", $m)[1];
    $ref_str = explode("|", $m)[2];
    $date = new DateTime("@$dt_str");
    echo $date->format('Y-m-d H:i:s') . " - " . $ref_str . " -> " . $page_str  . "<br>";
}