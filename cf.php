<?php

$ch = curl_init("https://entgaming.net/forum/games_all_fast.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);

$cfFind = '[ENT] Castle Fight!';
$cfName = '';

$cfArray = [];

$arr = explode("\n", $data);

foreach($arr as $val){
    if (strpos($val, $cfFind)!==false){
        $pos = strpos($val, $cfFind);
        $endLine = stripos($val,'|' );
        $cfNumber = substr($val, 0, $endLine);
        $cfName = substr($val, $pos);

        $ch2 = curl_init("https://entgaming.net/forum/slots_fast.php?id=" . $cfNumber);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        $metadata = curl_exec($ch2);
        curl_close($ch2);
        $gameOutput = array('name'=>$cfName, 'id'=>$cfNumber, 'meta'=>$metadata);

        array_push($cfArray, $gameOutput);
    }
}



header('Content-Type: application/json');
print $_GET['callback'] . '(' . json_encode($cfArray) . ')';
