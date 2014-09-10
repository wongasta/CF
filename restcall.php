<?php

$userInput = $_GET['type'];

if($userInput == 'bar'){
	$output=array('response'=>'foo');
}else{
	$output=array('response'=>'boo');
}

header('Content-Type: application/json');
print $_GET['callback'] . '(' . json_encode($output) . ')';
