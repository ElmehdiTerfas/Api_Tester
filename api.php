<?php

$params = array();
$values = array();

$url = $_GET['url'];

if(isset($_GET['params']) && isset($_GET['values'])){
	$params = $_GET['params'];
	$values = $_GET['values'];
}
$parameters = "";
if(count($params) >= 1){
	
	for($i = 0; $i < count($params); $i++){
		$parameters = $parameters.$params[$i].'='.$values[$i].'&';
	}
	$parameters = substr($parameters, 0, -1);
}

$ch = curl_init();

if($_GET['methode'] == 1){
	$url .= '?'.$parameters;

}
else{
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
}
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);
echo $result;
