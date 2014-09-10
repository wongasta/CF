<?php

$ch = curl_init("https://entgaming.net/forum/games_fast.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);

$cfFind = '[ENT] Castle Fight!';
$cfName = '';

$arr = explode("\n", $data);

foreach($arr as $val){
    if (strpos($val, $cfFind)!==false){
        $pos = strpos($val, $cfFind);
        $cfNumber = substr($val, 0, 5);
        $cfName = substr($val, $pos);
    }
}

$ch = curl_init("https://entgaming.net/forum/slots_fast.php?id=" . $cfNumber);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$metadata = curl_exec($ch);
curl_close($ch);


$output = array('name'=>$cfName, 'id'=>$cfNumber, 'meta'=>$metadata);



header('Content-Type: application/json');
print $_GET['callback'] . '(' . json_encode($output) . ')';
