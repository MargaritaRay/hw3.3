<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include "arr.php";

//var_dump($city_db[7]);

if (isset($_POST['city'])){
	$city = $_POST['city'];
}else{
	$city = null;
}

$city_name = mb_strtoupper(substr($city, strlen($city) - 2));

function foo($city_db, $city_name){
	foreach ($city_db as $word){
		if (mb_substr($word, 0, 1) == $city_name){
			return $word."<br>";
			break;
		}
	}
}
