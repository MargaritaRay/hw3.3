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

/*mb_strtoupper- переводит полученное от пользователя значение в верхний регистр
(мультибайтовое по тому что в кириллице 1 буква не 1 байт) нужно для более корректного поиска по массиву
mb_substr- возвращает часть строки, мы указываем что нужное значение в конце (отрицательное значение)
*/
$city_name = mb_strtoupper(mb_substr($city, - 1));


function foo($city_db, $city_name){
	foreach ($city_db as $word){
		/*Если часть массива (с 0 до 1 байта) совпадает с принятым от пользователя значением, то*/
		if (mb_substr($word, 0, 1) == $city_name){
			/*возвращаем найденное значение в массиве на нужную букву*/
			return $word."<br>";
			/*Останавливаем выполнение поиска после первого найденного значения*/
			break;
		}
	}
}

assert(foo('Сочи', 'Иваново'));

