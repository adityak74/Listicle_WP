<?php

$file = json_decode(file_get_contents('whatwedo.json'));
foreach ($file as $key => $value)
	$last=$key;

$last=(int)$last;
$last++;
$last=strval($last);

//print_r($file);

$newdata = array($last => 'prabhat');
array_push($file,$newdata);
print_r($file);
//file_put_contents('whatwedo.json', json_encode($data));

$file = json_decode(file_get_contents('whatwedo.json'));
//foreach ($file as $key => $value)
//	echo $key;

?>