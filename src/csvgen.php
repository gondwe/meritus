<?php
$data = explode(",",urldecode($_REQUEST["data"]));

array_unshift($data,"NAMES");
array_unshift($data,"ADM");
array_push($data,"MG");
array_push($data,"POS");

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="template.csv"');


$fp = fopen('php://output', 'wb');
fputcsv($fp, $data);
fclose($fp);