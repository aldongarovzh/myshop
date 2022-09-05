<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

function myEach(&$arr) {
    $key = key($arr);
    $result = ($key === null) ? false : [$key, current($arr), 'key' => $key, 'value' => current($arr)];
    next($arr);
    return $result;
}


if(! isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}



include_once '../config/config.php';			// Иницилизация настроек
include_once '../config/db.php';				// Иницилизация базы данных
include_once '../library/mainFunctions.php';	// Основные функции


$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';


$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';


//если в сессии есть данные об авторизованном пользователе, то передаем их в шаблон
if(isset($_SESSION['user'])){
	$smarty->assign('arUser', $_SESSION['user']);
}



// иницилизируем переменную шаблонизатора количества элементов в корзине
$smarty->assign('cartCntItems', count($_SESSION['cart'])); //функция count автоматически считает количество элементов в массиве

loadPage($db, $smarty, $controllerName, $actionName);





